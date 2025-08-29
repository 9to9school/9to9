<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\User;
use App\Models\Enroll;
use App\Models\Parents;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use  Hash;

class EnrollController extends Controller
{
    public function enroll1()
    {        
         $schools = School::all();
        return view('enquirypages.enroll-enquiry',compact('schools'));
    }
public function enroll2($school_id)
{
    // store it if you like:
    session(['selected_school_id' => $school_id]);
// print_r($school_id); die;
    // pass to the view
    return view('enrollpages.enroll2', compact('school_id'));
}
public function saveEnroll2(Request $request)
{
    // Print_r($request->all()); die;
    $validated = $request->validate([
        'child_name'     => 'required|string|max:255',
        'age'            => 'nullable|integer|min:1',
        'father_name'    => 'nullable|string|max:255',
        'mother_name'    => 'nullable|string|max:255',
        'phone_number_1' => 'required|numeric',
        'phone_number_2' => 'nullable|numeric',
        'email'          => 'required|email|unique:users,email',
        'address'        => 'required|string|max:500',
        'city'           => 'required|string|max:100',
        'state'          => 'required|string|max:100',
        'zip'            => 'required|string|max:20',
        'school_id'      => 'required|exists:schools,id',
        
        'academic_year'  => 'nullable|string|max:20',
        'dob'            => 'nullable|date',
        'gender'         => 'nullable|string|max:10',
        'primary_contact'=> 'nullable|string|max:20',
        'mother_tongue'  => 'nullable|string|max:50',
        'medical_condition' => 'nullable|string|max:255',
        'allergies'      => 'nullable|string|max:255',
        'student_image'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

   
//  $school = School::find($request->school_id);
//     if (!$school) {
//         return redirect()->back()->withErrors(['Invalid School ID']);
//     }

    // 2) Create User (Parent)
    $user = new User();
    $user->name = $request->father_name;
    $user->email = $request->email;
    $user->address = $request->address;
    $user->phone_number = $request->phone_number_1;
    $user->password = Hash::make($request->password);
    $user->salt_password = '12345';  // This should probably be hashed or encrypted
   $user->role = 'student';
   // $user->role = 'parent';
    $user->save();

     return redirect('/enroll4')->with('success', 'Parent & Student data saved successfully.');
// dd($user); die;

    // 3) Create Parent
    $parent = new Parents();
    $parent->user_id = $user->id;
    // $parent->school_id = $school->id;  
        
        $parent->email = $request->email;
        $parent->phone_number_1 = $request->phone_number_1;
        $parent->phone_number_2 = $request->phone_number_2;  // Optional field
        $parent->mother_name = $request->mother_name;  // Optional field
        $parent->father_name = $request->father_name;  // Optional field
        $parent->address = $request->address;
        $parent->city = $request->city;
        $parent->state = $request->state;
        $parent->zip = $request->zip;
  
   
        // dd($parent); die;
        $parent->save();

    // 4) Create Student
    $student = new Student();
    $student->user_id = $user->id;

    if ($request->hasFile('student_image')) {
        $file = $request->file('student_image');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('assets/images/user/student'), $filename);
        $student->student_image = 'assets/images/user/student/' . $filename;
    }


    $student->academic_year = $request->academic_year ?? null;
$student->age = $request->age ?? null;
$student->gender = $request->gender ?? null;
$student->child_name = $request->child_name;
$student->dob = $request->dob ?? null;
$student->primary_contact = $request->primary_contact ?? null;
$student->mother_tongue = $request->mother_tongue ?? null;
$student->father_name = $request->father_name ?? null;
$student->medical_condition = $request->medical_condition ?? null;
$student->allergies = $request->allergies ?? null;
$student->admission_date = $request->admission_date;
$student->admission_number = 'ADM' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
    //  dd($student); die;
    $student->save();

    // 5) Redirect to step 3
    return redirect('/enroll3')->with('success', 'Parent & Student data saved successfully.');
}
}
