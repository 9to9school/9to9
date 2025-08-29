<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\School;
use App\Models\User;
use App\Models\Shift;
use App\Models\Topic;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use  Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{
    public function index()
    {        
        $teachers = Teacher::orderBy('id', 'desc')->get();   
        return view('admin.teachers.teacher-list', compact('teachers'));
    }

    // Show form to create a new School
    public function create()
    {
        $schools = School::where('status','active')->get();
        $topics = Topic::with('popular')->get();
        $shifts = Shift::all();

        // Simulate next ID (get latest and add 1)
        $latest = Teacher::orderBy('id', 'desc')->first();
        $nextId = $latest ? $latest->id + 1 : 1;

        // Simulate teacher_code
        $prefix = 'T' . now()->format('dmy'); // T140725
        $idPart = str_pad($nextId % 1000, 3, '0', STR_PAD_LEFT);
        $previewTeacherCode = $prefix . $idPart;
        return view('admin.teachers.create',compact('schools','shifts','topics','previewTeacherCode'));
    }
   
    // Handle add logic
    public function store(Request $request)
    {

     
        // Validate request inputs
        $request->validate([
            // Image validation
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

            // Basic Info
            'teacher_id' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'class' => 'nullable|string|max:255',
            'subject' => 'required|array|max:255',
            'school' => 'required|string|max:255',
            'work_shift' => 'required',


            // Gender & Contact
            'gender' => 'required|in:Male,Female',
            'primary_contact_number1' => 'required|digits:10|unique:users,phone_number',
            'primary_contact_number2' => 'nullable|digits:10',

            // Dates
            'date_of_joining' => 'required|date',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email',

            // Personal Info
            'marital_status' => 'nullable|string|max:50',
          
            'language_known' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'work_experience' => 'nullable|string|max:255',

            // Previous Schools
            'previous_school1' => 'nullable|string|max:255',
            'previous_school2' => 'nullable|string|max:255',
            'previous_school_number' => 'nullable|digits:10',

            // Address
            'address' => 'required|string|max:500',
            'permanent_address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'id_number' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|digits_between:4,10',

            // Notes
            'notes' => 'nullable|string',

            // Payroll
            'epf_no' => 'nullable|string|max:100',
            'basic_salary' => 'nullable|numeric|min:0',
            'contract_type' => 'nullable|string|max:100',
            'date_leaving' => 'nullable|date|after_or_equal:date_of_joining',

            // Leaves
            'medical_leaves' => 'nullable|string|max:255',
            'casual_leaves' => 'nullable|string|max:50',
            'maternity_leaves' => 'nullable|string|max:255',
            'sick_leaves' => 'nullable|string|max:20',

            // Bank
            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:20',
            'branch_name' => 'nullable|string|max:255',

            // Documents
            'resume' => 'nullable|mimes:pdf|max:4096',
            'letter' => 'nullable|mimes:pdf|max:4096',

            // Password
            'password' => 'required|string|confirmed|min:6',

            'school' => 'required',
            'status' => 'required',
            'coordinator' => 'required',
        ]);

        $email = $request->email;
        $phone = $request->primary_contact_number1;
    

        // Create user
        $user = new User();
        $user->name = $request->first_name;
        $user->email = $email;
        $user->address = $request->address;
        $user->phone_number = $phone;
        $user->password = Hash::make($request->password);
        $user->salt_password = '12345';  // Replace with proper encryption
        $user->role = 'teacher';
        $user->status = 'active';
        $user->save();

        if ($user->save()) {
            // Create teacher
            $teacher = new Teacher();
            $teacher->user_id = $user->id;

            
            $teacher->teacher_id = $request->teacher_id;

            // Basic Info
            $teacher->first_name = $request->first_name;
            $teacher->last_name = $request->last_name;
            $teacher->class = $request->class;
            $teacher->subject = json_encode($request->subject);
            $teacher->school_id = $request->school;
            $teacher->work_shift = json_encode($request->work_shift);

            // Gender & Contact
            $teacher->gender = $request->gender;
            $teacher->primary_contact_number1 = $request->primary_contact_number1;
            $teacher->primary_contact_number2 = $request->primary_contact_number2;

            // Dates
            $teacher->dob = $request->dob;
            $teacher->date_of_joining = $request->date_of_joining;
            $teacher->email = $request->email;

            // Personal Info
            $teacher->marital_status = $request->marital_status;           
            $teacher->language_known = $request->language_known;
            $teacher->qualification = $request->qualification;
            $teacher->work_experience = $request->work_experience;

            // Previous Schools
            $teacher->previous_school1 = $request->previous_school1;
            $teacher->previous_school2 = $request->previous_school2;
            $teacher->previous_school_number = $request->previous_school_number;

            // Address
            $teacher->address = $request->address;
            $teacher->permanent_address = $request->permanent_address;
            $teacher->id_number = $request->id_number;
            $teacher->city = $request->city;
            $teacher->state = $request->state;
            $teacher->zip = $request->zip;

            // Notes
            $teacher->notes = $request->notes;

            // Payroll
            $teacher->epf_no = $request->epf_no;
            $teacher->basic_salary = $request->basic_salary;
            $teacher->contract_type = $request->contract_type;            
            $teacher->date_leaving = $request->date_leaving;

            // Leaves
            $teacher->medical_leaves = $request->medical_leaves;
            $teacher->casual_leaves = $request->casual_leaves;
            $teacher->maternity_leaves = $request->maternity_leaves;            
            $teacher->sick_leaves = $request->sick_leaves;

            // Bank Details
            $teacher->account_name = $request->account_name;
            $teacher->account_number = $request->account_number;
            $teacher->bank_name = $request->bank_name;
            $teacher->ifsc_code = $request->ifsc_code;
            $teacher->branch_name = $request->branch_name;
            $teacher->status = $request->status;
            $teacher->is_coordinator = $request->coordinator;
           

            // Handle uploads
            if ($request->hasFile('image')) {
                
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move('assets/images/user/teacher', $filename);
                $teacher->image = 'assets/images/user/teacher/' . $filename;
            }

            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $filename = time() . '_resume_' . $file->getClientOriginalName();
                $file->move('assets/docs/teacher/resume', $filename);
                $teacher->resume = 'assets/docs/teacher/resume/' . $filename;
            }

            if ($request->hasFile('letter')) {
                $file = $request->file('letter');
                $filename = time() . '_letter_' . $file->getClientOriginalName();
                $file->move('assets/docs/teacher/letter', $filename);
                $teacher->letter = 'assets/docs/teacher/letter/' . $filename;
            }

            // Save teacher
            $teacher->save();
        }

        return redirect()->route('teacher.list')->with('success', 'Teacher added successfully.');
    }


  // Show the edit form for a USP
    public function edit($id)
    {
        $teacher = Teacher::with('user')->findOrFail($id);
         $schools = School::where('status','active')->get();
        $topics = Topic::with('popular')->get();
        $shifts = Shift::all();
       
        return view('admin.teachers.edit', compact('teacher','schools','topics','shifts'));
    }


    // upddate data 
    public function update(Request $request, $id)
    {
        // dd($teacher->user_id);
        // Find teacher and associated user
        $teacher = Teacher::findOrFail($id);
        $user = User::findOrFail($teacher->user_id);

        // Validate request
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'teacher_id' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'class' => 'nullable|string|max:255',
            'subject' => 'required|array',
            'school' => 'required|string|max:255',
            'work_shift' => 'required',

            'gender' => 'required|in:Male,Female',
            'primary_contact_number1' => 'required|digits:10|unique:users,phone_number,' . $teacher->user_id ,
            'primary_contact_number2' => 'nullable|digits:10',
            'date_of_joining' => 'required|date',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $teacher->user_id ,
            'marital_status' => 'nullable|string|max:50',
            'language_known' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'work_experience' => 'nullable|string|max:255',

            'previous_school1' => 'nullable|string|max:255',
            'previous_school2' => 'nullable|string|max:255',
            'previous_school_number' => 'nullable|digits:10',

            'address' => 'required|string|max:500',
            'permanent_address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'id_number' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|digits_between:4,10',

            'notes' => 'nullable|string',
            'epf_no' => 'nullable|string|max:100',
            'basic_salary' => 'nullable|numeric|min:0',
            'contract_type' => 'nullable|string|max:100',
            'date_leaving' => 'nullable|after_or_equal:date_of_joining',

            'medical_leaves' => 'nullable|string|max:255',
            'casual_leaves' => 'nullable|string|max:50',
            'maternity_leaves' => 'nullable|string|max:255',
            'sick_leaves' => 'nullable|string|max:20',

            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:20',
            'branch_name' => 'nullable|string|max:255',

            'resume' => 'nullable|mimes:pdf|max:4096',
            'letter' => 'nullable|mimes:pdf|max:4096',

            'school' => 'required',
            'status' => 'required',
            'coordinator' => 'required',
        ]);

        // Update user
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->primary_contact_number1;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->salt_password = '12345'; // replace with secure method
        }
        $user->status = $request->status;
        $user->save();

        // Update teacher
        $teacher->teacher_id = $request->teacher_id;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->class = $request->class;
        $teacher->subject = json_encode($request->subject);
        $teacher->school_id = $request->school;
        $teacher->work_shift = json_encode($request->work_shift);

        $teacher->gender = $request->gender;
        $teacher->primary_contact_number1 = $request->primary_contact_number1;
        $teacher->primary_contact_number2 = $request->primary_contact_number2;
        $teacher->dob = $request->dob;
        $teacher->date_of_joining = $request->date_of_joining;
        $teacher->email = $request->email;

        $teacher->marital_status = $request->marital_status;
        $teacher->language_known = $request->language_known;
        $teacher->qualification = $request->qualification;
        $teacher->work_experience = $request->work_experience;

        $teacher->previous_school1 = $request->previous_school1;
        $teacher->previous_school2 = $request->previous_school2;
        $teacher->previous_school_number = $request->previous_school_number;

        $teacher->address = $request->address;
        $teacher->permanent_address = $request->permanent_address;
        $teacher->id_number = $request->id_number;
        $teacher->city = $request->city;
        $teacher->state = $request->state;
        $teacher->zip = $request->zip;

        $teacher->notes = $request->notes;
        $teacher->epf_no = $request->epf_no;
        $teacher->basic_salary = $request->basic_salary;
        $teacher->contract_type = $request->contract_type;
        $teacher->date_leaving = $request->date_leaving;

        $teacher->medical_leaves = $request->medical_leaves;
        $teacher->casual_leaves = $request->casual_leaves;
        $teacher->maternity_leaves = $request->maternity_leaves;
        $teacher->sick_leaves = $request->sick_leaves;

        $teacher->account_name = $request->account_name;
        $teacher->account_number = $request->account_number;
        $teacher->bank_name = $request->bank_name;
        $teacher->ifsc_code = $request->ifsc_code;
        $teacher->branch_name = $request->branch_name;
        $teacher->status = $request->status;
        $teacher->is_coordinator = $request->coordinator;

        // Image update
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/images/user/teacher', $filename);
            $teacher->image = 'assets/images/user/teacher/' . $filename;
        }

        // Resume update
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '_resume_' . $file->getClientOriginalName();
            $file->move('assets/docs/teacher/resume', $filename);
            $teacher->resume = 'assets/docs/teacher/resume/' . $filename;
        }

        // Letter update
        if ($request->hasFile('letter')) {
            $file = $request->file('letter');
            $filename = time() . '_letter_' . $file->getClientOriginalName();
            $file->move('assets/docs/teacher/letter', $filename);
            $teacher->letter = 'assets/docs/teacher/letter/' . $filename;
        }

        $teacher->save();

        return redirect()->route('teacher.list')->with('success', 'Teacher updated successfully.');
    }


    // public function update(Request $request, $id)
    // {
    //     $teacher = Teacher::findOrFail($id);
    //     $user = User::findOrFail($teacher->user_id);

    //     $validatedData = $request->validate([
    //         // Image validation
    //         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',

    //         // Basic Info
    //         'first_name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'class' => 'nullable|string|max:255',
    //         'subject' => 'nullable',

    //         // Gender & Contact
    //         'gender' => 'required|in:Male,Female',
    //         'primary_contact_number1' => 'required|digits:10',
    //         'primary_contact_number2' => 'nullable|digits:10',

    //         // Dates
    //         'date_of_joining' => 'required|date',
    //         'dob' => 'required|date',

    //         // Personal Info
    //         'marital_status' => 'nullable|string|max:50',
    //         'email' => 'required|email|unique:users,email',
    //         'language_known' => 'nullable|string|max:255',
    //         'qualification' => 'nullable|string|max:255',
    //         'work_experience' => 'nullable|string|max:255',

    //         // Previous Schools
    //         'previous_school1' => 'nullable|string|max:255',
    //         'previous_school2' => 'nullable|string|max:255',
    //         'previous_school_number' => 'nullable|digits:10',

    //         // Address
    //         'address' => 'nullable|string|max:500',
    //         'permanent_address' => 'nullable|string|max:500',
    //         'city' => 'nullable|string|max:100',
    //         'id_number' => 'nullable|string|max:100',
    //         'state' => 'nullable|string|max:100',
    //         'zip' => 'nullable|digits_between:4,10',

    //         // Notes
    //         'notes' => 'nullable|string',

    //         // Payroll
    //         'epf_no' => 'nullable|string|max:100',
    //         'basic_salary' => 'nullable|numeric|min:0',
    //         'contract_type' => 'nullable|string|max:100',
    //         'work_shift' => 'nullable',
    //         'date_leaving' => 'nullable|date|after_or_equal:date_of_joining',

    //         // Bank
    //         'account_name' => 'nullable|string|max:255',
    //         'account_number' => 'nullable|string|max:50',
    //         'bank_name' => 'nullable|string|max:255',
    //         'ifsc_code' => 'nullable|string|max:20',
    //         'branch_name' => 'nullable|string|max:255',

    //         // Documents
    //         'resume' => 'nullable|mimes:pdf|max:4096',
    //         'letter' => 'nullable|mimes:pdf|max:4096',

    //         // Password
    //         'password' => 'required|string|confirmed|min:6',

    //         'school' => 'required',
    //         // 'status' => 'required',
    //     ]);

    // $user->name = $request->first_name;
    //     $user->email = $request->email;
    //     $user->address = $request->address;
    //     $user->phone_number = $request->primary_contact_number1;
    //     $user->save();

    //     // Update image if uploaded
    //     $teacher->fill($validatedData);
        
    // if ($request->hasFile('image')) {
    //         if ($teacher->image && File::exists(public_path($teacher->image))) {
    //             File::delete(public_path($teacher->image));
    //         }

    //         $file = $request->file('image');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //     $destination = public_path('assets/images/user/teacher');
    //         if (!File::exists($destination)) {
    //             File::makeDirectory($destination, 0755, true);
    //         }
    //         $file->move($destination, $filename);

    //         $teacher->image = 'assets/images/user/teacher/' . $filename;
    //     }

    //     // Update resume if uploaded
    //     if ($request->hasFile('resume')) {
    //         if ($teacher->resume && File::exists(public_path($teacher->resume))) {
    //             File::delete(public_path($teacher->resume));
    //         }
    //         $file = $request->file('resume');
    //         $filename = time() . '_resume_' . $file->getClientOriginalName();
    //         $file->move(public_path('assets/docs/teacher/resume'), $filename);
    //         $teacher->resume = 'assets/docs/teacher/resume/' . $filename;
    //     }

    //     // Update letter if uploaded
    //     if ($request->hasFile('letter')) {
    //         if ($teacher->letter && File::exists(public_path($teacher->letter))) {
    //             File::delete(public_path($teacher->letter));
    //         }
    //         $file = $request->file('letter');
    //         $filename = time() . '_letter_' . $file->getClientOriginalName();
    //         $file->move(public_path('assets/docs/teacher/letter'), $filename);
    //         $teacher->letter = 'assets/docs/teacher/letter/' . $filename;
    //     }

    //     // Fill all other validated teacher fields
    //     $teacher->save();

        
    

    //     return redirect()->route('teacher.list')->with('success', 'Teacher updated successfully.');
    // }

    // Delete USP
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        
        if ($teacher->image && File::exists($teacher->image)) {
            File::delete($teacher->image);
        }
        $teacher->delete();

        return redirect()->route('teacher.list')->with('success', 'Teacher deleted successfully.');
    }


    //Show Teacher dashboard
    public function dashboard()
    {
        return view('teacher.dashboard');
    }

    //  login page
    public function signin()
    {
        return view('teacher.login');
    }

    //  profile page
    public function Profile()
    {
        return view('teacher.profile');
    }

    public function addtest()
    {
        echo "test"; die;
    }

    public function edittest()
    {
        echo "test"; die;
    }


    // School functions
    public function indexTeacher()
    {        
        $id=  Auth::id();
        $teachers = Teacher::where('school_id',$id)->orderBy('id', 'desc')->get();   
        return view('school.teachers.teacher-list', compact('teachers'));
    }

    // Show form to create a new School
    public function createTeacher()
    {
        $schools = School::where('status','active')->get();
        $topics = Topic::with('popular')->get();
        $shifts = Shift::all();

        // Simulate next ID (get latest and add 1)
        $latest = Teacher::orderBy('id', 'desc')->first();
        $nextId = $latest ? $latest->id + 1 : 1;

        // Simulate teacher_code
        $prefix = 'T' . now()->format('dmy'); // T140725
        $idPart = str_pad($nextId % 1000, 3, '0', STR_PAD_LEFT);
        $previewTeacherCode = $prefix . $idPart;
        return view('school.teachers.create',compact('schools','shifts','topics','previewTeacherCode'));
    }
   
    // Handle add logic
    public function storeTeacher(Request $request)
    {

     
        // Validate request inputs
        $request->validate([
            // Image validation
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

            // Basic Info
            'teacher_id' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'class' => 'nullable|string|max:255',
            'subject' => 'required|array|max:255',
            // 'school' => 'required|string|max:255',
            'work_shift' => 'required',


            // Gender & Contact
            'gender' => 'required|in:Male,Female',
            'primary_contact_number1' => 'required|digits:10|unique:users,phone_number',
            'primary_contact_number2' => 'nullable|digits:10',

            // Dates
            'date_of_joining' => 'required|date',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email',

            // Personal Info
            'marital_status' => 'nullable|string|max:50',
          
            'language_known' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'work_experience' => 'nullable|string|max:255',

            // Previous Schools
            'previous_school1' => 'nullable|string|max:255',
            'previous_school2' => 'nullable|string|max:255',
            'previous_school_number' => 'nullable|digits:10',

            // Address
            'address' => 'required|string|max:500',
            'permanent_address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'id_number' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|digits_between:4,10',

            // Notes
            'notes' => 'nullable|string',

            // Payroll
            'epf_no' => 'nullable|string|max:100',
            'basic_salary' => 'nullable|numeric|min:0',
            'contract_type' => 'nullable|string|max:100',
            'date_leaving' => 'nullable|date|after_or_equal:date_of_joining',

            // Leaves
            'medical_leaves' => 'nullable|string|max:255',
            'casual_leaves' => 'nullable|string|max:50',
            'maternity_leaves' => 'nullable|string|max:255',
            'sick_leaves' => 'nullable|string|max:20',

            // Bank
            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:20',
            'branch_name' => 'nullable|string|max:255',

            // Documents
            'resume' => 'nullable|mimes:pdf|max:4096',
            'letter' => 'nullable|mimes:pdf|max:4096',

            // Password
            'password' => 'required|string|confirmed|min:6',

           
            'status' => 'required',
            'coordinator' => 'required',
        ]);

        $email = $request->email;
        $phone = $request->primary_contact_number1;
    

        // Create user
        $user = new User();
        $user->name = $request->first_name;
        $user->email = $email;
        $user->address = $request->address;
        $user->phone_number = $phone;
        $user->password = Hash::make($request->password);
        $user->salt_password = '12345';  // Replace with proper encryption
        $user->role = 'teacher';
        $user->status = 'active';
        $user->save();

        if ($user->save()) {
            // Create teacher
            $teacher = new Teacher();
            $teacher->user_id = $user->id;

            
            $teacher->teacher_id = $request->teacher_id;

            // Basic Info
            $teacher->first_name = $request->first_name;
            $teacher->last_name = $request->last_name;
            $teacher->class = $request->class;
            $teacher->subject = json_encode($request->subject);
            $teacher->school_id = Auth::id();
            $teacher->work_shift = json_encode($request->work_shift);

            // Gender & Contact
            $teacher->gender = $request->gender;
            $teacher->primary_contact_number1 = $request->primary_contact_number1;
            $teacher->primary_contact_number2 = $request->primary_contact_number2;

            // Dates
            $teacher->dob = $request->dob;
            $teacher->date_of_joining = $request->date_of_joining;
            $teacher->email = $request->email;

            // Personal Info
            $teacher->marital_status = $request->marital_status;           
            $teacher->language_known = $request->language_known;
            $teacher->qualification = $request->qualification;
            $teacher->work_experience = $request->work_experience;

            // Previous Schools
            $teacher->previous_school1 = $request->previous_school1;
            $teacher->previous_school2 = $request->previous_school2;
            $teacher->previous_school_number = $request->previous_school_number;

            // Address
            $teacher->address = $request->address;
            $teacher->permanent_address = $request->permanent_address;
            $teacher->id_number = $request->id_number;
            $teacher->city = $request->city;
            $teacher->state = $request->state;
            $teacher->zip = $request->zip;

            // Notes
            $teacher->notes = $request->notes;

            // Payroll
            $teacher->epf_no = $request->epf_no;
            $teacher->basic_salary = $request->basic_salary;
            $teacher->contract_type = $request->contract_type;            
            $teacher->date_leaving = $request->date_leaving;

            // Leaves
            $teacher->medical_leaves = $request->medical_leaves;
            $teacher->casual_leaves = $request->casual_leaves;
            $teacher->maternity_leaves = $request->maternity_leaves;            
            $teacher->sick_leaves = $request->sick_leaves;

            // Bank Details
            $teacher->account_name = $request->account_name;
            $teacher->account_number = $request->account_number;
            $teacher->bank_name = $request->bank_name;
            $teacher->ifsc_code = $request->ifsc_code;
            $teacher->branch_name = $request->branch_name;
            $teacher->status = $request->status;
            $teacher->is_coordinator = $request->coordinator;
           

            // Handle uploads
            if ($request->hasFile('image')) {
                
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move('assets/images/user/teacher', $filename);
                $teacher->image = 'assets/images/user/teacher/' . $filename;
            }

            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                $filename = time() . '_resume_' . $file->getClientOriginalName();
                $file->move('assets/docs/teacher/resume', $filename);
                $teacher->resume = 'assets/docs/teacher/resume/' . $filename;
            }

            if ($request->hasFile('letter')) {
                $file = $request->file('letter');
                $filename = time() . '_letter_' . $file->getClientOriginalName();
                $file->move('assets/docs/teacher/letter', $filename);
                $teacher->letter = 'assets/docs/teacher/letter/' . $filename;
            }

            // Save teacher
            $teacher->save();
        }

        return redirect()->route('school.teacher.list')->with('success', 'Teacher added successfully.');
    }


  // Show the edit form for a USP
    public function editTeacher($id)
    {
        $teacher = Teacher::with('user')->findOrFail($id);
         $schools = School::where('status','active')->get();
        $topics = Topic::with('popular')->get();
        $shifts = Shift::all();
       
        return view('school.teachers.edit', compact('teacher','schools','topics','shifts'));
    }


    // upddate data 
    public function updateTeacher(Request $request, $id)
    {
        // dd($teacher->user_id);
        // Find teacher and associated user
        $teacher = Teacher::findOrFail($id);
        $user = User::findOrFail($teacher->user_id);

        // Validate request
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'teacher_id' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'class' => 'nullable|string|max:255',
            'subject' => 'required|array',
            // 'school' => 'required|string|max:255',
            'work_shift' => 'required',

            'gender' => 'required|in:Male,Female',
            'primary_contact_number1' => 'required|digits:10|unique:users,phone_number,' . $teacher->user_id ,
            'primary_contact_number2' => 'nullable|digits:10',
            'date_of_joining' => 'required|date',
            'dob' => 'required|date',
            'email' => 'required|email|unique:users,email,' . $teacher->user_id ,
            'marital_status' => 'nullable|string|max:50',
            'language_known' => 'nullable|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'work_experience' => 'nullable|string|max:255',

            'previous_school1' => 'nullable|string|max:255',
            'previous_school2' => 'nullable|string|max:255',
            'previous_school_number' => 'nullable|digits:10',

            'address' => 'required|string|max:500',
            'permanent_address' => 'required|string|max:500',
            'city' => 'required|string|max:100',
            'id_number' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|digits_between:4,10',

            'notes' => 'nullable|string',
            'epf_no' => 'nullable|string|max:100',
            'basic_salary' => 'nullable|numeric|min:0',
            'contract_type' => 'nullable|string|max:100',
            'date_leaving' => 'nullable|after_or_equal:date_of_joining',

            'medical_leaves' => 'nullable|string|max:255',
            'casual_leaves' => 'nullable|string|max:50',
            'maternity_leaves' => 'nullable|string|max:255',
            'sick_leaves' => 'nullable|string|max:20',

            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:50',
            'bank_name' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:20',
            'branch_name' => 'nullable|string|max:255',

            'resume' => 'nullable|mimes:pdf|max:4096',
            'letter' => 'nullable|mimes:pdf|max:4096',

            'status' => 'required',
            'coordinator'  => 'required',
        ]);

        // Update user
        $user->name = $request->first_name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->primary_contact_number1;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->salt_password = '12345'; // replace with secure method
        }
        $user->status = $request->status;
        $user->save();

        // Update teacher
        $teacher->teacher_id = $request->teacher_id;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->class = $request->class;
        $teacher->subject = json_encode($request->subject);
        $teacher->school_id = Auth::id();
        $teacher->work_shift = json_encode($request->work_shift);

        $teacher->gender = $request->gender;
        $teacher->primary_contact_number1 = $request->primary_contact_number1;
        $teacher->primary_contact_number2 = $request->primary_contact_number2;
        $teacher->dob = $request->dob;
        $teacher->date_of_joining = $request->date_of_joining;
        $teacher->email = $request->email;

        $teacher->marital_status = $request->marital_status;
        $teacher->language_known = $request->language_known;
        $teacher->qualification = $request->qualification;
        $teacher->work_experience = $request->work_experience;

        $teacher->previous_school1 = $request->previous_school1;
        $teacher->previous_school2 = $request->previous_school2;
        $teacher->previous_school_number = $request->previous_school_number;

        $teacher->address = $request->address;
        $teacher->permanent_address = $request->permanent_address;
        $teacher->id_number = $request->id_number;
        $teacher->city = $request->city;
        $teacher->state = $request->state;
        $teacher->zip = $request->zip;

        $teacher->notes = $request->notes;
        $teacher->epf_no = $request->epf_no;
        $teacher->basic_salary = $request->basic_salary;
        $teacher->contract_type = $request->contract_type;
        $teacher->date_leaving = $request->date_leaving;

        $teacher->medical_leaves = $request->medical_leaves;
        $teacher->casual_leaves = $request->casual_leaves;
        $teacher->maternity_leaves = $request->maternity_leaves;
        $teacher->sick_leaves = $request->sick_leaves;

        $teacher->account_name = $request->account_name;
        $teacher->account_number = $request->account_number;
        $teacher->bank_name = $request->bank_name;
        $teacher->ifsc_code = $request->ifsc_code;
        $teacher->branch_name = $request->branch_name;
        $teacher->status = $request->status;
        $teacher->is_coordinator = $request->coordinator;

        // Image update
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('assets/images/user/teacher', $filename);
            $teacher->image = 'assets/images/user/teacher/' . $filename;
        }

        // Resume update
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = time() . '_resume_' . $file->getClientOriginalName();
            $file->move('assets/docs/teacher/resume', $filename);
            $teacher->resume = 'assets/docs/teacher/resume/' . $filename;
        }

        // Letter update
        if ($request->hasFile('letter')) {
            $file = $request->file('letter');
            $filename = time() . '_letter_' . $file->getClientOriginalName();
            $file->move('assets/docs/teacher/letter', $filename);
            $teacher->letter = 'assets/docs/teacher/letter/' . $filename;
        }

        $teacher->save();

        return redirect()->route('school.teacher.list')->with('success', 'Teacher updated successfully.');
    }

    // Delete USP
    public function destroyTeacher($id)
    {
        $teacher = Teacher::findOrFail($id);
        
        if ($teacher->image && File::exists($teacher->image)) {
            File::delete($teacher->image);
        }
        $teacher->delete();

        return redirect()->route('school.teacher.list')->with('success', 'Teacher deleted successfully.');
    }

    



  

}