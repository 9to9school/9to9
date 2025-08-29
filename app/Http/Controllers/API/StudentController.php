<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\SubTopic;
use App\Models\User;
use App\Models\Student;
use App\Models\AddRemark;
use App\Models\AddProgress;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
   public function update(Request $request, $id)
   {

        // print_r($request->all());
        $request->validate([
            'academic_year' => 'required|string',
            'admission_number' => 'required|unique:students,admission_number,' . $id,
            'admission_date' => 'required|date',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'primary_contact' => 'required|numeric',
        
            'father_name' => 'required|string|max:255',
            'mother_tongue' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'phone_number_1' => 'nullable|numeric',
            'phone_number_2' => 'nullable|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'gender' => 'required',
        
            'student_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $student = Student::findOrFail($id);

        $student->academic_year = $request->academic_year;
        $student->admission_number = $request->admission_number;
        $student->admission_date = $request->admission_date;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->primary_contact = $request->primary_contact;
        $student->mother_tongue = $request->mother_tongue;
        $student->father_name = $request->father_name;
    
        $student->email = $request->email;
        $student->phone_number_1 = $request->phone_number_1;
        $student->phone_number_2 = $request->phone_number_2;
        $student->address = $request->address;
        $student->city = $request->city;
        $student->state = $request->state;
        $student->zip = $request->zip;
        $student->gender = $request->gender;
    

        // If a new student image is provided, upload it
        if ($request->hasFile('student_image')) {
            $file = $request->file('student_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student', $filename);
            $student->student_image = 'assets/images/user/student/' . $filename;
        }

         $saved = $student->save();

        if (!$saved) {
            return response()->json([
                'status' => false,
                'message' => 'Failed to update student profile.'
            ], 500);
        }

        return response()->json([
            'status' => true,
            'message' => 'Student profile updated successfully!',
            'student' => $student
        ]);
    }

    //get remark  list
    public function remarkList(Request $request,$id)
    {
        $remarkdata = AddRemark::with('topics:id,topic_name')->where('student_id',$id)->get();

        if (! $remarkdata) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => $remarkdata,
        ]);
    }


    //get progress  list
    public function ProgressList(Request $request, $id)
    {
        $progressdata = AddProgress::with('topicDetail') // eager load topic name
            ->where('student_id', $id)
            ->get();

        if ($progressdata->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data'    => [],
            ], 404);
        }

        $progressdata = $progressdata->map(function($progress) {
            // decode sub_topic JSON
            $subTopicIds = json_decode($progress->sub_topic, true) ?? [];
            $subTopicNames = [];

            if (!empty($subTopicIds)) {
                $subTopicNames = SubTopic::whereIn('id', $subTopicIds)->pluck('name')->toArray();
            }

            return [
                'id'              => $progress->id,
                'school_id'       => $progress->school_id,
                'teacher_id'      => $progress->teacher_id,
                'student_id'      => $progress->student_id,
                'topic_id'        => $progress->topic,
                'topic_name'      => $progress->topicDetail->topic_name ?? null,
                'sub_topic_ids'   => $subTopicIds,
                'sub_topic_names' => $subTopicNames,
                'percent'         => $progress->percent,
                'status'          => $progress->status,
                'created_at'      => $progress->created_at,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Progress list fetched successfully.',
            'data'    => $progressdata,
        ]);
    }

       
    // Kids list
    public function kidslist($id)
    {
        $user = User::with('student')->find($id);

        if (!$user || $user->role !== 'student') {
            return response()->json([
                'status' => false,
                'message' => 'Parent not found.'
            ], 404);
        }

        $children = Student::where('user_id', $id)
            ->select('id', DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"))
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Children fetched successfully.',
            'data' => $children
        ]);
    }

    // Get Syllabus
    public function getSyllabus($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => 'Student Data not found.'
            ], 404);
        }

        // Get all topics for student's age
        $topics = Topic::where('age', $student->age)->get();

        $result = [];

        foreach ($topics as $topic) {
            // Group subtopics by quarters
            $groupedSubtopics = SubTopic::where('topic_name', $topic->id)
                                        ->get()
                                        ->groupBy('quarters');

            // Prepare topic data
            $topicData = [
                'topic_id'   => $topic->id,
                'topic_name' => $topic->topic_name,
            ];

            // Add quarter-wise subtopics
            foreach ($groupedSubtopics as $quarter => $subtopics) {
                $topicData[$quarter] = $subtopics->values(); // Reset keys
            }

            $result[] = $topicData;
        }

        return response()->json([
            'status'  => true,
            'message' => 'Syllabus fetched successfully.',
            'data'    => $result
        ]);
    }


    public function deleteParentAccount(Request $request, $id)
    {
        // Validate that the user exists
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|exists:users,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Parent ID.',
                'errors' => $validator->errors(),
            ], 422);
        }
    
        // Find the user
        $user = User::find($id);
    
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Parent not found.',
            ], 404);
        }
    
        // Optional: Check if the user is of type 'parent'
        if ($user->role !== 'student') {
            return response()->json([
                'success' => false,
                'message' => 'User is not a parent.',
            ], 403);
        }
    
        // Delete all associated students (assuming relation is parent_id)
        $students = Student::where('user_id', $user->id)->get();
        foreach ($students as $student) {
            $student->delete();
        }
    
        // Delete the parent user
        $user->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Parent account and associated student(s) deleted successfully.',
        ]);
    }






}
