<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\School;
use App\Models\ChildModel;
use App\Models\Popular;
use App\Models\Shift;
use App\Models\SubTopic;
use App\Models\DaycareRegister;
use App\Models\StudentFee;
use App\Models\StudentWallet;
use App\Models\Programme;
use App\Models\Event;
use App\Models\daycarePay;
use App\Models\activityPay;
use App\Models\AcademicYear;
use App\Models\Topic;
use App\Models\Habit;
use App\Models\childSyllabus;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; 
use Intervention\Image\Encoders\WebpEncoder; 
use Session;
use Carbon\Carbon;
use DB;
// use Illuminate\Support\Str;

class StudentController extends Controller
{
    // List all students
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->get();
        return view('admin.students.list', compact('students'));
    }

    // Show form to create a new student
    public function create()
    {
        $schools = School::where('status','active')->get();

        $parents = \App\Models\User::where('role', 'student')
        ->where('status', 'active') 
        ->get();  
        
        $shifts = Shift::where('status', 'active') 
        ->get();

        $topic = Topic::where('status',1)->get();

        $acyear = AcademicYear::where('status', 1)->get();
        $good_habits = Habit::where('status', 'active')->where('type', 'good')->get();
        $bad_habits = Habit::where('status', 'active')->where('type', 'bad')->get();
   
        $schoolId = Auth::id();
        $admissionid = $this->generateAdmissionId($schoolId); //harshita's code      
        return view('admin.students.create',compact('good_habits','bad_habits','schools','admissionid','parents','shifts','acyear','topic'));
    }

    
    


    public function store(Request $request)
    {

        $rules = [
            'father_name' => 'required',
            'mother_name' => 'required|string|max:255',
            'phone_number_1' => 'required|digits_between:10,15|unique:students,phone_number_1',
            'phone_number_2' => 'required|digits_between:10,15|unique:students,phone_number_2',
            'father_occ' => 'required',
            'mother_occ' => 'required',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'status' => 'required',
            'mother_tongue' => 'required|string|max:255',
            'lang_known' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required',
            'sib_first_name.*' => 'required',
          
        ];


        $messages = [      
            'father_name.required' => 'Father’s name is required.',
            'mother_name.required' => 'Mother’s name is required.',
            'phone_number_1.required' => 'Phone number is required.',
            'phone_number_2.required' => 'Phone number is required.',
            'father_occ.required' => 'Father occupation is required.',
            'address.required' => 'Address is required.',
            'city.required' => 'City is required.',
            'state.required' => 'State is required.',
            'zip.required' => 'Zip code is required.',
            'status.required' => 'Status is required.',
            'lang_known.required' => 'Language known is required.',
            'mother_tongue.required' => 'Mother tongue is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
        
        ];

        $existsInUsers = User::where('phone_number', $request->phone_number_1)
            ->exists();

        if ($existsInUsers) {
            return back()->withErrors(['phone_number_1' => 'This phone number is already used in users.']);
        }

        $existsInUsers = User::where('email', $request->email)
            ->exists();

        if ($existsInUsers) {
            return back()->withErrors(['email' => 'This email is already used in users.']);
        }

       $request->validate($rules, $messages);

        // Create or assign user
        $email = $request->email;
        $phone = $request->phone_number_1;
        // $email = rand(111, 999) . $request->email;
        // $phone = rand(111, 999) . $request->phone_number_1;
        $userid = null;

        $user = new User();
        $user->name = $request->father_name;
        $user->email = $email;
        $user->address = $request->address;
        $user->phone_number = $phone;
        $user->password = Hash::make($request->password);
        $user->salt_password = '12345';
        $user->role = 'student';
        $user->status = 'active';
        $user->save();
        $userid = $user->id;

        // Handle father image upload per sibling
        $fatherImagePath = null;
        if ($request->hasFile("father_image")) {
            $file = $request->file("father_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/parents', $filename);
            $fatherImagePath = 'assets/images/user/student/parents/' . $filename;
        }

        // Handle mother image upload per sibling
        $motherImagePath = null;
        if ($request->hasFile("mother_image")) {
            $file = $request->file("mother_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/parents', $filename);
            $motherImagePath = 'assets/images/user/student/parents/' . $filename;
        }

    
        // Loop through siblings
        if ($userid && $request->has('sib_first_name')) {
            foreach ($request->sib_first_name as $i => $fname) {
                $student_id = $this->generateStudentId($request->school_id[$i]);
                // $admission_number = $this->generateAdmissionId($request->school_id);
                // Handle medical image upload per sibling
                $medicalImagePath = null;
                if ($request->hasFile("medical_image.$i")) {
                    $file = $request->file("medical_image.$i");
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/images/user/student/medical', $filename);
                    $medicalImagePath = 'assets/images/user/student/medical/' . $filename;
                }

               
                // Handle student image upload
                $studentImagePath = null;
                if ($request->hasFile("student_image.$i")) {
                    $file = $request->file("student_image.$i");
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/images/user/student', $filename);
                    $studentImagePath = 'assets/images/user/student/' . $filename;
                }

                 $birthImagePath = null;
                if ($request->hasFile("birthcer.$i")) {
                    $file = $request->file("birthcer.$i");
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/images/user/student/certificate', $filename);
                    $birthImagePath = 'assets/images/user/student/certificate/' . $filename;
                }


                $trancImagePath = null;
                if ($request->hasFile("trancer.$i")) {
                    $file = $request->file("trancer.$i");
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/images/user/student/certificate', $filename);
                    $trancImagePath = 'assets/images/user/student/certificate/' . $filename;
                }
                // dd(json_encode($request->input("topic.$i")));
                
                $student = Student::create([
                    'user_id' => $userid,
                    'school_id' => $request->school_id[$i] ?? null,
                    'academic_year' => $request->academic_year[$i] ?? null,
                    'admission_number' => $request->admission_number[$i] ?? null,
                    'admission_date' => $request->admission_date[$i] ?? null,
                    'first_name' => $fname,
                    'last_name' => $request->sib_last_name[$i] ?? null,
                    'primary_contact' => $phone,
                    'mother_tongue' => $request->mother_tongue,
                    'language_known' => $request->lang_known,
                    'father_name' => $request->father_name ?? null,
                    'mother_name' => $request->mother_name  ?? null,
                    'email' => $email,
                    'phone_number_1' => $request->phone_number_1 ?? null,
                    'phone_number_2' => $request->phone_number_2  ?? null,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                    'religion' => $request->religion,
                    'age' => $request->sib_age[$i] ?? null,
                    'per_month_fee' => $request->sib_per_mo_amount[$i] ?? null,
                    'discount_fee' => $request->sib_dis_amount[$i] ?? null,
                    'annual_fee' => $request->sib_ann_amount[$i] ?? null,
                    'gender' => $request->gender_1[$i] ?? null,
                    'time_shift' => $request->time_shift[$i] ?? null,
                    'good_habit' => $request->good_habit[$i] ?? null,
                    'bad_habit' => $request->bad_habit[$i] ?? null,
                    'topic' => json_encode($request->topic[$i]) ?? null,
                    'subtopic' => json_encode($request->sub_topic[$i]) ?? null,
                    'medical_condition' => $request->condition_0[$i] ?? null,
                    'description' => $request->description[$i] ?? null,
                    'medical_image' => $medicalImagePath,
                    'father_image' => $fatherImagePath,
                    'mother_image' => $motherImagePath,
                    'birth_cert' => $birthImagePath,
                    'tranc_cert' => $trancImagePath,
                    'status' => $request->status,
                    'student_image' => $studentImagePath ?? null,
                    'student_id' => $request->student_id[$i] ?? null,
                    'father_occup' => $request->father_occ ?? null,
                    'mother_occup' => $request->mother_occ ?? null,
                ]);

                
            }
        }

        return redirect()->route('student.list')->with('success', 'Student added successfully.');
    }


    // Show edit form
    public function edit($id)
    {
        $schools = School::where('status','active')->get();

        $parents = \App\Models\User::where('role', 'student')
        ->where('status', 'active') 
        ->get();  
        
        $shifts = Shift::where('status', 'active') 
        ->get();

        $topic = Topic::where('status',1)->get();
        $subtopic = SubTopic::where('status','active')->get();

        $acyear = AcademicYear::where('status', 1)->get();
        $good_habits = Habit::where('status', 'active')->where('type', 'good')->get();
        $bad_habits = Habit::where('status', 'active')->where('type', 'bad')->get();
        $student = Student::with('user')->findOrFail($id);
        return view('admin.students.edit', compact('student','schools','acyear','shifts','good_habits','bad_habits','topic','subtopic'));
    }

    // Update student
    
    // harshita's code
    public function update(Request $request)
    {
        $id = $request->id;
                // Find existing student and associated user
        $student = Student::findOrFail($id);
        $user = User::findOrFail($student->user_id);
    //   dd($request->lang_known);
        $request->validate([

            'father_name' => 'required',
            'mother_name' => 'required|string|max:255',
            'phone_number_1' => 'required|digits_between:10,15|unique:students,phone_number_1,' . $id,
            'phone_number_2' => 'required|digits_between:10,15|unique:students,phone_number_2,' . $id,
            'father_occ' => 'required',
            'mother_occ' => 'required',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'status' => 'required',
            'mother_tongue' => 'required|string|max:255',
            'lang_known' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            // 'password' => 'required',
            // 'sib_first_name.*' => 'required',
        ]);

        $existsInUsers = User::where('phone_number', $request->phone_number_1)
            ->where('id', '!=', $student->user_id)
            ->exists();

        if ($existsInUsers) {
            return back()->withErrors(['phone_number_1' => 'This phone number is already used in users.']);
        }

        $existsInUsers = User::where('email', $request->email)
            ->where('id', '!=', $student->user_id)
            ->exists();

        if ($existsInUsers) {
            return back()->withErrors(['email' => 'This email is already used in users.']);
        }


        // Update user information
        $user->name = $request->father_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->phone_number = $request->phone_number_1;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Handle image upload
        $studentImagePath = $student->student_image;
        if ($request->hasFile('student_image')) {
            $file = $request->file('student_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student', $filename);
            $studentImagePath = 'assets/images/user/student/' . $filename;
        }else{
             $studentImagePath = $student->student_image;
        }

        // Handle father image upload per sibling
        $fatherImagePath = null;
        if ($request->hasFile("father_image")) {
            $file = $request->file("father_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/parents', $filename);
            $fatherImagePath = 'assets/images/user/student/parents/' . $filename;
        }

        // Handle mother image upload per sibling
        $motherImagePath = null;
        if ($request->hasFile("mother_image")) {
            $file = $request->file("mother_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/parents', $filename);
            $motherImagePath = 'assets/images/user/student/parents/' . $filename;
        }


        $birthImagePath = null;
        if ($request->hasFile("birthcer")) {
            $file = $request->file("birthcer");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/certificate', $filename);
            $birthImagePath = 'assets/images/user/student/certificate/' . $filename;
        }


        $trancImagePath = null;
        if ($request->hasFile("trancer")) {
            $file = $request->file("trancer");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/certificate', $filename);
            $trancImagePath = 'assets/images/user/student/certificate/' . $filename;
        }

        $student_id = $this->generateStudentId($request->school_id);
        // $admission_number = $this->generateAdmissionId($request->school_id);
        // Handle medical image upload per sibling
        $medicalImagePath = null;
        if ($request->hasFile("medical_image")) {
            $file = $request->file("medical_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/medical', $filename);
            $medicalImagePath = 'assets/images/user/student/medical/' . $filename;
        }

     
        // Update the main student record
        $student->update([
            'user_id' => $student->user_id,
            'school_id' => $request->school_id ?? null,
            'academic_year' => $request->academic_year ?? null,
            'admission_number' => $request->admission_number ?? null,
            'admission_date' => $request->admission_date ?? null,
            'first_name' => $request->sib_first_name,
            'last_name' => $request->sib_last_name ?? null,
            'mother_tongue' => $request->mother_tongue,
            'language_known' => $request->lang_known,
            'father_name' => $request->father_name ?? null,
            'mother_name' => $request->mother_name  ?? null,
            'email' => $request->email,
            'phone_number_1' => $request->phone_number_1 ?? null,
            'phone_number_2' => $request->phone_number_2  ?? null,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'religion' => $request->religion,
            'age' => $request->sib_age ?? null,
            'per_month_fee' => $request->sib_per_mo_amount ?? null,
            'discount_fee' => floatval($request->sib_dis_amount ?? 0.00),
            'annual_fee' => floatval($request->sib_ann_amount ?? 0.00),
            'gender' => $request->gender_1 ?? null,
            'time_shift' => $request->time_shift ?? null,
            'good_habit' => $request->good_habit ?? null,
            'bad_habit' => $request->bad_habit?? null,
            'topic' => json_encode($request->topic) ?? null,
            'subtopic' => json_encode($request->sub_topic) ?? null,
            'medical_condition' => $request->condition_0 ?? null,
            'description' => $request->description ?? null,
            'medical_image' => $medicalImagePath,
            'father_image' => $fatherImagePath,
            'mother_image' => $motherImagePath,
            'birth_cert' => $birthImagePath,
            'tranc_cert' => $trancImagePath,
            'status' => $request->status,
            'student_image' => $studentImagePath ?? null,
            'student_id' => $request->student_id ?? null,
            'father_occup' => $request->father_occ ?? null,
            'mother_occup' => $request->mother_occ ?? null, 
        ]);
      
        return redirect()->route('student.list')->with('success', 'Student updated successfully.');
    }
     //end harshita's code

    // Delete student
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->student_image && File::exists($student->student_image)) {
            File::delete($student->student_image);
        }

        $student->delete();

        return response()->json([
            'success' => $student,
            'message' => $student ? 'Student deleted successfully' : 'Failed to delete student',
        ]);

        // return redirect()->route('student.list')->with('success', 'Student deleted successfully.');
    }


    //show student pay list
    public function PayList(Request $request,$id){

      
        $student = Student::find($id);
        $paylistdata = StudentWallet::with('student')->where('ladger_status','credit')->where('parent_id',$student->user_id)->get();
        $paydata = Student::where('id',$id)->first();

        return  view('admin.students.student-payment-list',compact('paylistdata','paydata'));

    }


     //show student activity pay list
    public function activityPayList(Request $request,$id){
        $role = Auth::user()->role;
        if($role == 'admin'){
          $layout = 'layouts.admin';
        }else{
            $layout = 'layouts.school';
        }
      
        $paylistdata = activityPay::with('student')->where('student_id',$id)->get();

        $paydata = Student::where('id',$id)->first();
        $activity =  Event::all();

        return  view('admin.students.activity-pay-list',compact('paylistdata','paydata','activity','layout'));

    }

     // get event details
    public function getEventDetails($activityId)
    {
        $activity = Event::findOrFail($activityId);
        $program = json_decode($activity->program);

        $ratios = [];

        foreach ($program as $index => $data) {
          $program = Programme::where('id',$data)->first();
            $ratios[] = [
                'label' => $program->title,
                'id' => $program->id,
            ];
        }

        return response()->json($ratios);
    }

    public function getprogramDetails($activityId)
    {
        $data = Programme::where('title',$activityId)->first();

        $ratios = [];

            $ratios[] = [
                'fees' => $data->fees
            ];
        

        return response()->json($ratios);
    }


     //show student daycare pay list
    public function daycarePayList(Request $request,$id){

         $role = Auth::user()->role;
        if($role == 'admin'){
          $layouts = 'layouts.admin';
        }else{
            $layouts = 'layouts.school';
        }
        // $paylistdata = StudentWallet::with('student')->where('student_id',$id)->get();
        $paylistdata = daycarePay::with(['student', 'daycare'])->where('student_id',$id)->get();
        $paydata = Student::where('id',$id)->first();
        $daycare =  DaycareRegister::all();

        return  view('admin.students.daycare-pay-list',compact('paylistdata','paydata','daycare','layouts'));

    }

    // get daycare details
    public function getDaycareDetails($daycareid)
    {
        $daycare = DaycareRegister::where('id',$daycareid)->first();

        $data = [];

        // foreach ($students as $index => $stu) {
            $data[] = [
                // 'id' => $index,
                'type' => $daycare->type,
                'hours' => $daycare->hour,
                'fee' => $daycare->price,
            ];
        // }

        return response()->json($data);
    }


     //show student transaction list
    public function TransactionList(Request $request,$id){

      
        $paylistdata = StudentWallet::with('student')->where('student_id',$id)->get();


        return  view('admin.students.transaction-list',compact('paylistdata'));

    }


    // For school Dashboard Functions    
    public function studentList()
    {
        $schoolId = Auth::id();
        $students = Student::where('school_id', $schoolId)
                   ->orderBy('id', 'desc') 
                   ->get();

        return view('school.student.list',compact('students'));
    }

    //Show  Studen Add form
    public function studentAddForm()
    {
      
        $parents = \App\Models\User::where('role', 'student')
        ->where('status', 'active') 
        ->get();  
        
        $shifts = Shift::where('status', 'active') 
        ->get();

        $acyear = AcademicYear::where('status', 1)->get();

        $schoolId = Auth::id();
        $admissionid = $this->generateAdmissionId($schoolId); //harshita's code 
        $studentid = $this->generateStudentId($schoolId); //harshita's code 

        $parents = \App\Models\User::where('role', 'student')
        ->where('status', 'active') 
        ->get();  
        
        $shifts = Shift::where('status', 'active') 
        ->get();

        $topic = Topic::where('status',1)->get();


        $good_habits = Habit::where('status', 'active')->where('type', 'good')->get();
        $bad_habits = Habit::where('status', 'active')->where('type', 'bad')->get();
       
      return view('school.student.create',compact('parents','shifts','acyear','admissionid','bad_habits','good_habits','studentid'));
    }

     // Handle The Add Logic
    public function studentPostFormold(Request $request)
    {
         $type = $request->student_type; // 'new' or 'existing'
        $studentId = $request->student_id ?? null; // For update/edit cases

        $rules = [
            // Optional if image is required only for new
            'student_image' => ($type === 'new') 
                ? 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048' 
                : 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'academic_year' => 'required|string',
            'admission_date' => 'required|date',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'primary_contact' => 'required|numeric',
            'mother_tongue' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'phone_number_1' => 'nullable|numeric',
            'phone_number_2' => 'nullable|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'status' => 'required',
            'time_shift' => 'required',

            // Sibling Fields
            'sib_first_name.*' => 'required|string|max:255',
            'sib_last_name.*' => 'required|string|max:255',
            'sib_age.*' => 'required|numeric',
            'gender_1.*' => 'required|in:Male,Female,Other',
        ];

        // Unique rules based on type
        if ($type === 'new') {
            $rules['email'] = 'required|email|unique:students,email';
            $rules['admission_number'] = 'required|unique:students,admission_number';
        } else {
            $rules['email'] = 'required|email|unique:students,email,' . $studentId;
            $rules['admission_number'] = 'required|unique:students,admission_number,' . $studentId;
        }

        // Validation messages
        $messages = [
            'sib_first_name.*.required' => 'The sibling first name is required.',
            'sib_last_name.*.required' => 'The sibling last name is required.',
            'sib_age.*.required' => 'The sibling age is required.',
            'sib_age.*.numeric' => 'The sibling age must be a number.',
            'gender_1.*.required' => 'The sibling gender is required.',
            'gender_1.*.in' => 'The sibling gender must be Male, Female, or Other.',
        ];

        // Apply validation
        $request->validate($rules, $messages);

        // Get the logged-in school user ID
        $schoolId = Auth::id();
        $parent = $request->parent;

        // Generate a unique email and phone (optional, as per your code)
        // $email = rand(111, 999) . $request->email;
        // $phone = rand(111, 999) . $request->primary_contact;
        $email =  $request->email;
        $phone = $request->primary_contact;

        // Create a new User
        if($type == 'new'){
        // Create a new User
        $user = new User();
        $user->name = $request->father_name;
        $user->email = $email;
        $user->address = $request->address;
        $user->phone_number = $phone;
        $user->password = Hash::make($request->password);
        $user->salt_password = '12345'; 
        $user->role = 'student';
        $user->status = 'active';
        $user->save();
        $userid = $user->id;
        }else{
        $userid = $parent;
        }

        // Handle student image upload
        $studentImagePath = null;
        if ($request->hasFile('student_image')) {
            $file = $request->file('student_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student', $filename);
            $studentImagePath = 'assets/images/user/student/' . $filename;
        }

        // If user is created and sibling data exists
        if ($userid) {
            if ($request->has('sib_first_name')) {
                for ($i = 0; $i < count($request->sib_first_name); $i++) {
                    $student_id = $this->generateStudentId($schoolId);
                    $admission_number = $this->generateAdmissionId($schoolId);
                   
                    // Prepare student data for each sibling
                    $studentData = [
                        'user_id' => $userid,
                        'school_id' => $schoolId,
                        'academic_year' => $request->academic_year,
                        'admission_number' => $request->admission_number,
                        'admission_date' => $request->admission_date,
                        'first_name' => $request->sib_first_name[$i],
                        'last_name' => $request->last_name,
                        'primary_contact' => $request->primary_contact,
                        'mother_tongue' => $request->mother_tongue,
                        'language_known' => $request->language_known ?? null,
                        'father_name' => $request->father_name,
                        'mother_name' => $request->mother_name,
                        'email' => $request->email,
                        'phone_number_1' => $request->phone_number_1,
                        'phone_number_2' => $request->phone_number_2,
                        'address' => $request->address,
                        'city' => $request->city,
                        'state' => $request->state,
                        'zip' => $request->zip,
                        'nationality' => $request->nationality,
                        'age' => $request->sib_age[$i],
                        'per_month_fee' => $request->sib_per_mo_amount[$i],
                        'discount_fee' => $request->sib_dis_amount[$i],
                        'annual_fee' => $request->sib_ann_amount[$i],
                        'gender' => $request->gender_1[$i],
                        'student_image' => $studentImagePath,
                        'status' => $request->status,
                        'student_id' => $student_id,
                        'time_shift' => $request->time_shift
                    ];

                    // Create the student record
                    $student = Student::create($studentData);
                    $studentId = $student->id;
                    // $parentId = $user->id;

                    // Prepare session data
                    // $data['student_parent_data'] = $request->except('student_image');
                    // $data['student_id'] = $studentId;
                    // $data['school_id'] = $schoolId;
                    // $data['parent_id'] = $user->id;
                    // $data['order_id'] = $order_id;

                    // // Store in session
                    // Session::put('studentsession', $data);

                    // Create student fees record if IDs are set
                    
                }
            }
        }

        return redirect()->route('school.student.list')->with('success', 'Student added successfully.');
    }

    public function studentPostForm(Request $request)
    {

        $rules = [
            'father_name' => 'required',
            'mother_name' => 'required|string|max:255',
            'phone_number_1' => 'required|digits_between:10,15|unique:students,phone_number_1',
            'phone_number_2' => 'required|digits_between:10,15|unique:students,phone_number_2',
            'father_occ' => 'required',
            'mother_occ' => 'required',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'status' => 'required',
            'mother_tongue' => 'required|string|max:255',
            'lang_known' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'password' => 'required',
            'sib_first_name.*' => 'required',
          
        ];


        $messages = [      
            'father_name.required' => 'Father’s name is required.',
            'mother_name.required' => 'Mother’s name is required.',
            'phone_number_1.required' => 'Phone number is required.',
            'phone_number_2.required' => 'Phone number is required.',
            'father_occ.required' => 'Father occupation is required.',
            'address.required' => 'Address is required.',
            'city.required' => 'City is required.',
            'state.required' => 'State is required.',
            'zip.required' => 'Zip code is required.',
            'status.required' => 'Status is required.',
            'lang_known.required' => 'Language known is required.',
            'mother_tongue.required' => 'Mother tongue is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
        
        ];

        $existsInUsers = User::where('phone_number', $request->phone_number_1)
            ->exists();

        if ($existsInUsers) {
            return back()->withErrors(['phone_number_1' => 'This phone number is already used in users.']);
        }

        $existsInUsers = User::where('email', $request->email)
            ->exists();

        if ($existsInUsers) {
            return back()->withErrors(['email' => 'This email is already used in users.']);
        }

       $request->validate($rules, $messages);
       $schoolId = Auth::id();

        // Create or assign user
        $email = $request->email;
        $phone = $request->phone_number_1;
        // $email = rand(111, 999) . $request->email;
        // $phone = rand(111, 999) . $request->phone_number_1;
        $userid = null;

        $user = new User();
        $user->name = $request->father_name;
        $user->email = $email;
        $user->address = $request->address;
        $user->phone_number = $phone;
        $user->password = Hash::make($request->password);
        $user->salt_password = '12345';
        $user->role = 'student';
        $user->status = 'active';
        $user->save();
        $userid = $user->id;

        // Handle father image upload per sibling
        $fatherImagePath = null;
        if ($request->hasFile("father_image")) {
            $file = $request->file("father_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/parents', $filename);
            $fatherImagePath = 'assets/images/user/student/parents/' . $filename;
        }

        // Handle mother image upload per sibling
        $motherImagePath = null;
        if ($request->hasFile("mother_image")) {
            $file = $request->file("mother_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/parents', $filename);
            $motherImagePath = 'assets/images/user/student/parents/' . $filename;
        }

    
        // Loop through siblings
        if ($userid && $request->has('sib_first_name')) {
            foreach ($request->sib_first_name as $i => $fname) {
                $student_id = $this->generateStudentId($schoolId);
                // $admission_number = $this->generateAdmissionId($request->school_id);
                // Handle medical image upload per sibling
                $medicalImagePath = null;
                if ($request->hasFile("medical_image.$i")) {
                    $file = $request->file("medical_image.$i");
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/images/user/student/medical', $filename);
                    $medicalImagePath = 'assets/images/user/student/medical/' . $filename;
                }

               
                // Handle student image upload
                $studentImagePath = null;
                if ($request->hasFile("student_image.$i")) {
                    $file = $request->file("student_image.$i");
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/images/user/student', $filename);
                    $studentImagePath = 'assets/images/user/student/' . $filename;
                }

                 $birthImagePath = null;
                if ($request->hasFile("birthcer.$i")) {
                    $file = $request->file("birthcer.$i");
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/images/user/student/certificate', $filename);
                    $birthImagePath = 'assets/images/user/student/certificate/' . $filename;
                }


                $trancImagePath = null;
                if ($request->hasFile("trancer.$i")) {
                    $file = $request->file("trancer.$i");
                    $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move('assets/images/user/student/certificate', $filename);
                    $trancImagePath = 'assets/images/user/student/certificate/' . $filename;
                }
                // dd(json_encode($request->input("topic.$i")));
                
                $student = Student::create([
                    'user_id' => $userid,
                    'school_id' => $schoolId ?? null,
                    'academic_year' => $request->academic_year[$i] ?? null,
                    'admission_number' => $request->admission_number[$i] ?? null,
                    'admission_date' => $request->admission_date[$i] ?? null,
                    'first_name' => $fname,
                    'last_name' => $request->sib_last_name[$i] ?? null,
                    'primary_contact' => $phone,
                    'mother_tongue' => $request->mother_tongue,
                    'language_known' => $request->lang_known,
                    'father_name' => $request->father_name ?? null,
                    'mother_name' => $request->mother_name  ?? null,
                    'email' => $email,
                    'phone_number_1' => $request->phone_number_1 ?? null,
                    'phone_number_2' => $request->phone_number_2  ?? null,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                    'religion' => $request->religion,
                    'age' => $request->sib_age[$i] ?? null,
                    'per_month_fee' => $request->sib_per_mo_amount[$i] ?? null,
                    'discount_fee' => $request->sib_dis_amount[$i] ?? null,
                    'annual_fee' => $request->sib_ann_amount[$i] ?? null,
                    'gender' => $request->gender_1[$i] ?? null,
                    'time_shift' => $request->time_shift[$i] ?? null,
                    'good_habit' => $request->good_habit[$i] ?? null,
                    'bad_habit' => $request->bad_habit[$i] ?? null,
                    'topic' => json_encode($request->topic[$i]) ?? null,
                    'subtopic' => json_encode($request->sub_topic[$i]) ?? null,
                    'medical_condition' => $request->condition_0[$i] ?? null,
                    'description' => $request->description[$i] ?? null,
                    'medical_image' => $medicalImagePath,
                    'father_image' => $fatherImagePath,
                    'mother_image' => $motherImagePath,
                    'birth_cert' => $birthImagePath,
                    'tranc_cert' => $trancImagePath,
                    'status' => $request->status,
                    'student_image' => $studentImagePath ?? null,
                    'student_id' => $request->student_id[$i] ?? null,
                    'father_occup' => $request->father_occ ?? null,
                    'mother_occup' => $request->mother_occ ?? null,
                ]);

                
            }
        }

        return redirect()->route('school.student.list')->with('success', 'Student added successfully.');
    }



    //Show Edit Form
    public function studentEditForm($id){
        $student = Student::with('user')->findOrFail($id);
        // $siblings = ChildModel::where('student_id',$id)->get();
        $shifts = Shift::where('status', 'active') 
        ->get();

        $topic = Topic::where('status',1)->get();
        $subtopic = SubTopic::where('status','active')->get();

        $acyear = AcademicYear::where('status', 1)->get();
        $good_habits = Habit::where('status', 'active')->where('type', 'good')->get();
        $bad_habits = Habit::where('status', 'active')->where('type', 'bad')->get();

        $acyear = AcademicYear::where('status', 1)->get();
        return view('school.student.edit',compact('student','shifts','acyear','bad_habits','good_habits','topic','subtopic'));
    }

    // Handle The update Logic
    public function studentUpdateFormold(Request $request)
    {
        $schoolId = Auth::id();
        $id = $request->id;
      
        $student = Student::find($id);
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }
       
        $user = User::find($student->user_id);

        if (!$user) {
            return redirect()->back()->with('error', 'user not found.');
        }

        // Validate request
        $request->validate([
            'school_id' => 'required|exists:users,id',
            'student_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'academic_year' => 'required|string',
            'admission_number' => 'required|unique:students,admission_number,' . $id,
            'admission_date' => 'required|date',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'primary_contact' => 'required|numeric',
            'mother_tongue' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'email'  =>'required|email|unique:students,email,' . $id,
            'phone_number_1' => 'nullable|numeric',
            'phone_number_2' => 'nullable|numeric',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'status' => 'required',
            'time_shift' => 'required',
        ]);

        
        $user->name = $request->first_name;
        $user->email =  $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->primary_contact;
        $user->save();

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Handle image upload
        $studentImagePath = $student->student_image;
        if ($request->hasFile('student_image')) {
            $file = $request->file('student_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student', $filename);
            $studentImagePath = 'assets/images/user/student/' . $filename;
        }

        // Handle image upload
        $studentImagePath = $student->student_image;
        if ($request->hasFile('student_image')) {
            $file = $request->file('student_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student', $filename);
            $studentImagePath = 'assets/images/user/student/' . $filename;
        }else{
             $studentImagePath = $student->student_image;
        }

        // Update the main student record
        $student->update([
            'school_id' => $request->school_id,
            'academic_year' => $request->academic_year,
            'admission_number' => $request->admission_number,
            'admission_date' => $request->admission_date,
            'first_name' => $request->sib_first_name,
            'last_name' => $request->sib_last_name,
            'primary_contact' => $request->primary_contact,
            'mother_tongue' => $request->mother_tongue,
            'language_known' => $request->language_known ?? null,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'email' => $request->email,
            'phone_number_1' => $request->phone_number_1,
            'phone_number_2' => $request->phone_number_2,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'nationality' => $request->nationality,
            'religion' => $request->religion,
            'age' => $request->age,
            'per_month_fee' => $request->per_month_fee,
            'discount_fee' => $request->discount_fee,
            'annual_fee' => $request->annual_fee,
            'student_image' => $studentImagePath,
            'status' => $request->status,
            'age' => $request->sib_age,
            'per_month_fee' => $request->sib_per_mo_amount,
            'discount_fee' => $request->sib_dis_amount,
            'annual_fee' => $request->sib_ann_amount,
            'gender' => $request->gender_1,
            'time_shift' => $request->time_shift,
            'student_image' =>  $studentImagePath,  
        ]);
      

        return redirect()->route('school.student.list')->with('success', 'Student updated successfully.');
    }

    public function studentUpdateForm(Request $request)
    {
        $id = $request->id;
        $schoolId = Auth::id();
                // Find existing student and associated user
        $student = Student::findOrFail($id);
        $user = User::findOrFail($student->user_id);
    //   dd($request->lang_known);
        $request->validate([

            'father_name' => 'required',
            'mother_name' => 'required|string|max:255',
            'phone_number_1' => 'required|digits_between:10,15|unique:students,phone_number_1,' . $id,
            'phone_number_2' => 'required|digits_between:10,15|unique:students,phone_number_2,' . $id,
            'father_occ' => 'required',
            'mother_occ' => 'required',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip' => 'required|numeric',
            'status' => 'required',
            'mother_tongue' => 'required|string|max:255',
            'lang_known' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            // 'password' => 'required',
            // 'sib_first_name.*' => 'required',
        ]);

        $existsInUsers = User::where('phone_number', $request->phone_number_1)
            ->where('id', '!=', $student->user_id)
            ->exists();

        if ($existsInUsers) {
            return back()->withErrors(['phone_number_1' => 'This phone number is already used in users.']);
        }

        $existsInUsers = User::where('email', $request->email)
            ->where('id', '!=', $student->user_id)
            ->exists();

        if ($existsInUsers) {
            return back()->withErrors(['email' => 'This email is already used in users.']);
        }


        // Update user information
        $user->name = $request->father_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->status = $request->status;
        $user->phone_number = $request->phone_number_1;


        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // Handle image upload
        $studentImagePath = $student->student_image;
        if ($request->hasFile('student_image')) {
            $file = $request->file('student_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student', $filename);
            $studentImagePath = 'assets/images/user/student/' . $filename;
        }else{
             $studentImagePath = $student->student_image;
        }

        // Handle father image upload per sibling
        $fatherImagePath = null;
        if ($request->hasFile("father_image")) {
            $file = $request->file("father_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/parents', $filename);
            $fatherImagePath = 'assets/images/user/student/parents/' . $filename;
        }

        // Handle mother image upload per sibling
        $motherImagePath = null;
        if ($request->hasFile("mother_image")) {
            $file = $request->file("mother_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/parents', $filename);
            $motherImagePath = 'assets/images/user/student/parents/' . $filename;
        }


        $birthImagePath = null;
        if ($request->hasFile("birthcer")) {
            $file = $request->file("birthcer");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/certificate', $filename);
            $birthImagePath = 'assets/images/user/student/certificate/' . $filename;
        }


        $trancImagePath = null;
        if ($request->hasFile("trancer")) {
            $file = $request->file("trancer");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/certificate', $filename);
            $trancImagePath = 'assets/images/user/student/certificate/' . $filename;
        }

        $student_id = $this->generateStudentId($schoolId);
        // $admission_number = $this->generateAdmissionId($request->school_id);
        // Handle medical image upload per sibling
        $medicalImagePath = null;
        if ($request->hasFile("medical_image")) {
            $file = $request->file("medical_image");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/user/student/medical', $filename);
            $medicalImagePath = 'assets/images/user/student/medical/' . $filename;
        }

     
        // Update the main student record
        $student->update([
            'user_id' => $student->user_id,
            'school_id' => $schoolId ?? null,
            'academic_year' => $request->academic_year ?? null,
            'admission_number' => $request->admission_number ?? null,
            'admission_date' => $request->admission_date ?? null,
            'first_name' => $request->sib_first_name,
            'last_name' => $request->sib_last_name ?? null,
            'mother_tongue' => $request->mother_tongue,
            'language_known' => $request->lang_known,
            'father_name' => $request->father_name ?? null,
            'mother_name' => $request->mother_name  ?? null,
            'email' => $request->email,
            'phone_number_1' => $request->phone_number_1 ?? null,
            'phone_number_2' => $request->phone_number_2  ?? null,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'religion' => $request->religion,
            'age' => $request->sib_age ?? null,
            'per_month_fee' => $request->sib_per_mo_amount ?? null,
            'discount_fee' => floatval($request->sib_dis_amount ?? 0.00),
            'annual_fee' => floatval($request->sib_ann_amount ?? 0.00),
            'gender' => $request->gender_1 ?? null,
            'time_shift' => $request->time_shift ?? null,
            'good_habit' => $request->good_habit ?? null,
            'bad_habit' => $request->bad_habit?? null,
            'topic' => json_encode($request->topic) ?? null,
            'subtopic' => json_encode($request->sub_topic) ?? null,
            'medical_condition' => $request->condition_0 ?? null,
            'description' => $request->description ?? null,
            'medical_image' => $medicalImagePath,
            'father_image' => $fatherImagePath,
            'mother_image' => $motherImagePath,
            'birth_cert' => $birthImagePath,
            'tranc_cert' => $trancImagePath,
            'status' => $request->status,
            'student_image' => $studentImagePath ?? null,
            'student_id' => $request->student_id ?? null,
            'father_occup' => $request->father_occ ?? null,
            'mother_occup' => $request->mother_occ ?? null, 
        ]);
      
        return redirect()->route('school.student.list')->with('success', 'Student updated successfully.');
    }


   

    //get popular data amount
    public function getAmount(Request $request){
     $id = $request->id;

     $getamount = Popular::where('id',$id)->first();
     return response()->json(['amount'=> $getamount]);

    }

    //show student pay list
    public function studentPayList(Request $request,$id){

      $student = Student::find($id);
        $paylistdata = StudentWallet::with('student')->where('ladger_status','credit')->where('parent_id',$student->user_id)->get();
        $paydata = Student::where('id',$id)->first();
        return  view('school.student.student-payment-list',compact('paylistdata','paydata'));

    }
 
    // Show student details
    public function show()
    {
    
        $students = Student::with('school')->get(); // ensure 'school' is loaded
    

        return view('school.student.details', compact('students'));
    }

    //create admission number
    public function generateAdmissionId($schoolId)
    {
        // Get date in yymmdd format
        $datePart = Carbon::now()->format('ymd'); // e.g. 250528
        // 3️⃣ Get last student record's ID from the students table
        $lastStudent = DB::table('students')->max('id') ?? 0;
        $nextId = $lastStudent ? $lastStudent + 1 : 1;

        // Generate full admission ID
        $admissionId = '9T9' .
                    str_pad($schoolId, 2, '0', STR_PAD_LEFT) .
                    $datePart .
                    str_pad($nextId, 5, '0', STR_PAD_LEFT);

        return $admissionId;
    }

    public function generateAdmissionIdAjax($schoolId)
    {
        // Get date in yymmdd format
        $datePart = Carbon::now()->format('ymd'); // e.g. 250528

        // Get the last student ID
        $lastStudent = DB::table('students')->orderBy('id', 'desc')->first();
        $nextId = $lastStudent ? $lastStudent->id + 1 : 1;

        // Generate full admission ID
        $admissionId = '9T9' .
                    str_pad($schoolId, 2, '0', STR_PAD_LEFT) .
                    $datePart .
                    str_pad($nextId, 5, '0', STR_PAD_LEFT);

        return response()->json(['admission_id' => $admissionId]);
    }

    //genrate unic student id
    protected function generateStudentId(int $schoolId)
    {
        // 1️⃣ School ID padded to 2 digits
        $schoolPart = str_pad($schoolId, 2, '0', STR_PAD_LEFT);

        // 2️⃣ Date part in YYMMDD
        $datePart = Carbon::now()->format('ymd');

        // 3️⃣ Get last student record's ID from the students table
        $lastId = DB::table('students')->max('id') ?? 0;

        // 4️⃣ Next sequence = lastId + 1, padded to 4 digits
        $seqPart = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        // 5️⃣ Concatenate all parts
        return "STU-{$schoolPart}{$datePart}{$seqPart}";
    }

    //genrate unic student id
    public function generateAjaxstudentId(int $schoolId)
    {
        // 1️⃣ School ID padded to 2 digits
        $schoolPart = str_pad($schoolId, 2, '0', STR_PAD_LEFT);

        // 2️⃣ Date part in YYMMDD
        $datePart = Carbon::now()->format('ymd');

        // 3️⃣ Get last student record's ID from the students table
        $lastId = DB::table('students')->max('id') ?? 0;

        // 4️⃣ Next sequence = lastId + 1, padded to 4 digits
        $seqPart = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT);

        $studenid = "STU-{$schoolPart}{$datePart}{$seqPart}";

        return response()->json(['student_id' => $studenid]);


    }


    //get parent data
    public function getParentData($parentid)
    {
    
        $studentdata = Student::where('user_id',$parentid)->get(); // ensure 'school' is loaded
        $schoolid = Student::where('user_id',$parentid)
                    ->orderBy('id', 'desc')
                    ->first();
        $agedata = Popular::all();

        $parent = User::where('id',$parentid)->first();
        
    
        $admissionnum =  $this->generateAdmissionId($schoolid->school_id);
         $html = view('admin.students.sibling',compact('studentdata','agedata'))->render();
     
            return response()->json([
                'admissionnum' => $admissionnum ,
                'html' => $html,
                'parent' => $parent
                ]);
    }



}
