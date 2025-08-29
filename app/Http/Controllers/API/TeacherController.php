<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Teacher;
use App\Models\Topic;
use App\Models\SubTopic;
use App\Models\Shift;
use App\Models\Student;
use App\Models\AddRemark;
use App\Models\AddProgress;
use App\Models\ApplyLeave;
use App\Models\TeacherWallet;
use App\Models\TeacherGallery;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function update(Request $request, $id)
    {
        $teacher = Teacher::where('id', $id)->firstOrFail();
        
        if (! $teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Teacher not found',
            ], 404);
        }


        $user = User::findOrFail($teacher->user_id);
        // $teacher = Teacher::where('user_id', $id)->firstOrFail();

        // Validate input
        $validator = Validator::make($request->all(), [
            // User table
            'first_name'          => 'required|string|max:255',
            'last_name'          => 'required|string|max:255',
            'email'         => 'required|email|unique:users,email,' . $id,
            'dob'           => 'nullable|date_format:d/m/Y',
            'address'       => 'nullable|string|max:255',

            // Teacher table
            'qualification'             => 'required|string|max:255',
            'work_experience'           => 'nullable|string|max:255',
            'subject'                   => 'required|array',
            'gender'                    => 'required|in:Male,Female,Other',
            'primary_contact_number1'   => 'required|string|max:15|unique:users,phone_number,' . $id,
            'primary_contact_number2'   => 'nullable|numeric',
            'work_shift'                => 'nullable|array',
            'image'                     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // ========== Update User table ==========
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->phone_number = $request->primary_contact_number1;
        $user->address = $request->address;
        $user->dob = $request->dob
            ? \DateTime::createFromFormat('d/m/Y', $request->dob)?->format('Y-m-d')
            : null;

        // // Upload avtar (user profile image)
        // if ($request->hasFile('avtar')) {
        //     if ($user->avtar && File::exists(public_path($user->avtar))) {
        //         File::delete(public_path($user->avtar));
        //     }

        //     $file = $request->file('avtar');
        //     $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        //     $file->move(public_path('uploads/avatars'), $filename);
        //     $user->avtar = 'uploads/avatars/' . $filename;
        // }

         // Upload teacher-specific image
        if ($request->hasFile('image')) {
            if ($teacher->image && File::exists(public_path($teacher->image))) {
                File::delete(public_path($teacher->image));
            }

            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/teacher_images'), $filename);
            $teacher->image = 'uploads/teacher_images/' . $filename;
            $user->avtar = 'uploads/teacher_images/' . $filename;
        }

        $user->save();

        // ========== Update Teacher table ==========
        $teacher->first_name = $request->first_name;
         $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->address = $request->address;
        $teacher->work_experience = $request->work_experience;
        $teacher->subject = json_encode($request->subject);
        $teacher->gender = $request->gender;
        $teacher->primary_contact_number1 = $request->primary_contact_number1;
        $teacher->primary_contact_number2 = $request->primary_contact_number2;
        $teacher->work_shift = $request->work_shift ? json_encode($request->work_shift) : null;

        $teacher->save();

        return response()->json([
            'status' => true,
            'message' => 'Teacher profile updated successfully.',
            'user' => $user,
            'teacher' => $teacher
        ]);
    }

    // Teacher Details
    public function getTeacherDetails(Request $request, $id)
    {

        $data = Teacher::with(['schools:id,school_name'])->find($id);

       
        if (! $data) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ], 422);
        }

        // Decode subject ids
        $subjectIds = json_decode($data->subject, true);

       $subjectIds = json_decode($data->subject, true) ?? [];
        $shiftIds = json_decode($data->work_shift, true) ?? [];

        // Prevent foreach error when null
        $subjects = Topic::whereIn('id', $subjectIds)->pluck('topic_name');

        $shifts = Shift::whereIn('id', $shiftIds)->get()->map(function ($shift) {
            return [
                'id' => $shift->id,
                'shift' => $shift->time_from . ' - ' . $shift->time_to,
            ];
        });
        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => [
                'teacher' => $data,
                'subjects' => $subjects, 
                'shifts' => $shifts,
            ],
        ]);
    }

    //get students
    public function getTeacherStudents($teacherId)
    {
        $teacher = Teacher::find($teacherId);

        if (!$teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Teacher not found',
            ], 404);
        }

        $shiftIds = json_decode($teacher->work_shift, true);
        $topicIds = json_decode($teacher->subject, true); // Assuming it's a JSON array

        // Fetch topic names
        $topics = Topic::whereIn('id', $topicIds)->pluck('topic_name', 'id');

        $result = [];
        $studentCount = 0;
        

        foreach ($shiftIds as $shiftId) {
            $shift = Shift::find($shiftId);

            if (!$shift) continue;

            $students = Student::where('time_shift', $shiftId)->where('school_id',$teacher->school_id)->get();


            $students->transform(function ($student) {
                $student->age = $student->ages->title ?? '';
                return $student;
            });

            $studentCount += $students->count();

            $result[] = [
                'shift_id' => $shift->id,
                'time' => $shift->time_from . ' - ' . $shift->time_to,
                'students' => $students,
            ];
        }

        if ($studentCount === 0) {
            return response()->json([
                'success' => false,
                'message' => 'Student Data not available under this time shift and teacher',
            ]);
        }

        return response()->json([
            'success' => true,
            'topics' => $topics->values(), // Only topic names
            'data' => $result,
        ]);
    }



    //get topic subtopic  list
    public function getSkills(Request $request)
    {
        // Get all topics
        $topics = Topic::select('id', 'topic_name')->get();

        $result = [];

        foreach ($topics as $topic) {
            
            $grouped = SubTopic::where('topic_name', $topic->id) 
                ->get()
                ->groupBy('quarters');

            
            $topicData = [
                'topic_id' => $topic->id,
                'topic_name' => $topic->topic_name,
            ];

            
            foreach ($grouped as $quarter => $subtopics) {
                $topicData[$quarter] = $subtopics->values(); 
            }

            $result[] = $topicData;
        }

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => $result,
        ]);
    }

     //get topic subtopic  list
    public function getteacherSkills(Request $request,$teacherId)
    {  
        $teacher = Teacher::find($teacherId);

        if (! $teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Teacher not found',
            ], 404);
        }

         // Decode subject ids
        $subjectIds = json_decode($teacher->subject, true);


        // Get all topics
        $topics = Topic::select('id', 'topic_name')->whereIn('id', $subjectIds)->get();

        $result = [];

        foreach ($topics as $topic) {
            
            $grouped = SubTopic::where('topic_name', $topic->id) 
                ->get()
                ->groupBy('quarters');

            
            $topicData = [
                'topic_id' => $topic->id,
                'topic_name' => $topic->topic_name,
            ];

            
            foreach ($grouped as $quarter => $subtopics) {
                $topicData[$quarter] = $subtopics->values(); 
            }

            $result[] = $topicData;
        }

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => $result,
        ]);
    }



    // Add Remark 
    public function storeRemark(Request $request)
    {
        $validated = $request->validate([
            'school_id'    => 'nullable|exists:schools,id',
            'teacher_id'   => 'required|exists:teachers,id',
            'student_id'   => 'nullable|exists:students,id',
            'remark'       => 'required|string',
            'remark_note'  => 'nullable|string',
            'date'         => 'required|date',
            'topic_id'     => 'required',
            'subtopic_id'  => 'nullable',
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['subtopic_id'] = json_encode($request->subtopic_id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            // Relative move to public folder without using public_path()
            $path = 'assets/images/remark/'; // relative to Laravel public folder
            if (!is_dir($path)) {
                mkdir($path, 0755, true); // create folder if it doesn't exist
            }

            $file->move($path, $filename);

            $validated['image'] = $path . $filename;
        }

        $remark = AddRemark::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Remark saved successfully',
            'data' => $remark,
        ]);
    }



    // Add progress
    public function storePerformance(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'school_id'   => 'nullable|exists:schools,id',
            'teacher_id'  => 'required|exists:teachers,id',
            'student_id'  => 'nullable|exists:students,id',
            'topic'       => 'nullable|string|max:255',
            'sub_topic'   => 'nullable|array',
            'percent'     => 'nullable|string|max:10',
            'date_start' => 'required',
            'date_end' => 'required',          
        ]);

        // $validated['sub_topic'] = json_encode($request->sub_topic);

        // Create performance record
        $performance = AddProgress::create([
            'school_id'   => $request->school_id,
            'teacher_id'  => $request->teacher_id,
            'student_id'  => $request->student_id,
            'topic'       => $request->topic ?? "",
            'sub_topic'   => json_encode($request->sub_topic),
            'percent'     => $request->percent,
            'status'      => 'active',
            'date_start' => $request->date_start,
            'date_end' => $request->date_end
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Progress data saved successfully.',
            // 'data'    => $performance,
        ]);
    }



    // Apply Leave 
    public function applyLeave(Request $request)
    {
        $validated = $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'school_id' => 'required|exists:schools,id',
            'type' => 'required',
            'reason' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        // Create performance record
        $leave = ApplyLeave::create([
            'teacher_id'  => $request->teacher_id,
            'type'  => $request->type,
            'reason'       => $request->reason,
            'date_start'   => $request->start_date,
            'date_end'   => $request->end_date,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data saved successfully',
            'data' => $leave,
        ]);
    }

    // Get Leave
    public function getLeave(Request $request,$id)
    {
        $data = ApplyLeave::where('teacher_id', $id)->get();

        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully',
            'data'    => $data,
        ]);
    }

    // get teacher list
    public function teacherList(Request $request,$id)
    {
        $data = Teacher::where('status','active')->where('school_id',$id)->get();

        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Teacher Data not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully',
            'data'    => $data,
        ]);
    }

    // Gallery Upload
    public function uploadGalleryFile(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'type'       => 'required|in:image,video',
            'file'       => 'required|file|mimes:jpg,jpeg,png,mp4,mov,avi,webm|max:10240',
        ]);

        $file = $request->file('file');

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        if ($request->type === 'image') {
            $destination = 'assets/images/teacher/gallery/images';
            $relativePath = $destination . '/' . $filename;
        } else {
            $destination = 'assets/images/teacher/gallery/videos';
            $relativePath = $destination . '/' . $filename;
        }

        // Make sure destination folder exists (optional, but recommended)
        if (!is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        // Move file
        $file->move($destination, $filename);

        // Save record
        $gallery = TeacherGallery::create([
            'teacher_id' => $request->teacher_id,
            'name'       => $relativePath,
            'type'       => $request->type,
            'status'     => 'active',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'File uploaded successfully.',
            'data' => [
                'id'   => $gallery->id,
                'type' => $gallery->type,
                'url'  => $relativePath, // this expects files to be publicly accessible from "public/assets/..."
            ],
        ]);
    }



    // get gallery
    public function fetchGallery($id)
    {
        

        $teacherId = $id;

        if (! $teacherId) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        // Get images
        $images = TeacherGallery::where('teacher_id', $teacherId)
                ->where('type', 'image')
                ->where('status', 'active')
                ->orderByDesc('id')
                ->get();


        // Get videos
        $videos = TeacherGallery::where('teacher_id', $teacherId)
                        ->where('type', 'video')
                        ->where('status', 'active')
                        ->orderByDesc('id')
                        ->get();
                        
                        

        return response()->json([
            'success' => true,
            'images' => $images,
            'videos' => $videos,
        ]);
    }



    public function getWalletlistByTeacherId(Request $request)
    {

        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'start_date' => 'nullable',
            'end_date'   => 'nullable|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // 2️⃣ If no date filter given → default to current month
        if (!$startDate || !$endDate) {
            $startDate = now()->startOfMonth()->format('Y-m-d');
            $endDate = now()->endOfMonth()->format('Y-m-d');
        }

        // 3️⃣ Filter list
        $list = TeacherWallet::where('teacher_id',$request->teacher_id)
            ->where('ledger_status', 'credit')
            ->whereBetween('payment_date', [$startDate, $endDate])
            ->get();

        $filteredTotal = $list->sum('teacher_coins');

        // 4️⃣ Response
        if ($list->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No credited wallet entries found for this teacher in the selected date range.',
                'filtered_total' => $filteredTotal
            ], 404);
        }

        return response()->json([
            'success' => true,
            'teacher_id' => $request->teacher_id,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'filtered_total' => $filteredTotal,
            'credited_wallets' => $list,
        ]);
    }


    public function deleteTeacherAccount(Request $request, $id)
    {
        // Validate teacher ID exists
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:teachers,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid teacher ID.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json([
                'success' => false,
                'message' => 'Teacher not found.',
            ], 404);
        }

        $user = User::find($teacher->user_id);

        // Delete teacher (you can also delete related data via model events or cascades)
       
        $user->delete();
        $teacher->delete();

        return response()->json([
            'success' => true,
            'message' => 'Teacher account deleted successfully.',
        ]);
    }



        

}
    

    


