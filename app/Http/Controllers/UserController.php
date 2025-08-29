<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    // show user list page
    public function index()
    {
       
        $users = User::where('role','!=','school')->orderBy('id', 'desc')->get();     
        return view('admin.user.user-list', compact('users'));
    }

    // Show form to create a new USP
    public function create()
    {
        return view('admin.user.create');
    }
     
    // Handle the add user logic
    public function store(Request $request)
    {
        // Validate all user and school fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'address' => 'required|string|max:100',
            'phone_number' => 'required|digits:10||unique:users,phone_number',
            'password' => 'required|min:6',
            'salt_password' => 'required',
            'role' => 'required',
            'avtar' => 'required|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
            'status' => 'required',

            // School-specific fields
            // 'school_logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            // 'document' => 'nullable|mimes:pdf,doc,docx|max:5120',
            // 'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            // 'city' => 'required|string|max:100',
            // 'state' => 'required|string|max:100',
            // 'zip' => 'required|string|max:10',
            // 'principal_name' => 'required|string|max:255',
            // 'vice_principal_name' => 'nullable|string|max:255',
        ]);



        
        // role based folder
        switch($request->role) {
            case 'school':
                $avatarPath = 'assets/images/user/school/';
                break;
            case 'teacher':
                $avatarPath = 'assets/images/user/teacher/';
                break;
            case 'student':
                $avatarPath = 'assets/images/user/student/';
                break;
            default:
                $avatarPath = 'assets/images/user/general/';
                break;
        }

    

        // Save user
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->salt_password = $request->salt_password;
        $user->role = $request->role;
        $user->status = $request->status;
     
        // Upload user avatar
        if ($request->hasFile('avtar')) {

            $file = $request->file('avtar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path($avatarPath);

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $user->avtar = $avatarPath . $filename;
        }

        $user->save();



        if($request->role == 'school' && $user->save()){
           $userid = $user->id;
            // Save school
            $school = new School();
            $school->school_id =  $userid ; // link to user
            $school->school_name = $request->name;
            $school->school_email = $request->email;
            $school->school_phone_1 = $request->phone_number;
            $school->school_logo = $avatarPath . $filename;
            // $school->address = $request->address;
            // $school->city = $request->city;
            // $school->state = $request->state;
            // $school->zip = $request->zip;
            // $school->principal_name = $request->principal_name;
            // $school->vice_principal_name = $request->vice_principal_name;

            // Upload school logo
            // if ($request->hasFile('school_logo')) {
            //     $logo = $request->file('school_logo');
            //     $logoName = time() . '_logo.' . $logo->getClientOriginalExtension();
            //     $logo->move(public_path('uploads/school/logo'), $logoName);
            //     $school->school_logo = 'uploads/school/logo/' . $logoName;
            // }

            // Upload school document
            // if ($request->hasFile('document')) {
            //     $doc = $request->file('document');
            //     $docName = time() . '_doc.' . $doc->getClientOriginalExtension();
            //     $doc->move(public_path('uploads/school/documents'), $docName);
            //     $school->document = 'uploads/school/documents/' . $docName;
            // }

            // // Upload school image
            // if ($request->hasFile('image')) {
            //     $img = $request->file('image');
            //     $imgName = time() . '_img.' . $img->getClientOriginalExtension();
            //     $img->move(public_path('uploads/school/images'), $imgName);
            //     $school->image = 'uploads/school/images/' . $imgName;
            // }

            $school->save();

        }else if($request->role == 'teacher'  && $user->save()){
             $userid = $user->id;
            // Save school
            $teacher = new Teacher();
            $teacher->user_id =  $userid ; // link to user
            $teacher->first_name = $request->name;
            $teacher->email = $request->email;
            $teacher->primary_contact_number1 = $request->phone_number;
            $teacher->image = $avatarPath . $filename;

            $teacher->save();


        }else if($request->role == 'student'  && $user->save()){

            $userid = $user->id;
            // Save school
            $student = new Student();
            $student->user_id =  $userid ; // link to user
            $student->father_name = $request->name;
            $student->email = $request->email;
            $student->primary_contact	 = $request->phone_number;
            $student->father_image	 = $avatarPath . $filename;

            $student->save();
        }

        return redirect()->route('user.list')->with('success', 'User and school added successfully.');
    }

   // Show the edit form for a USP
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    // Update USP
    public function update(Request $request, $id)
    {

        $user = User::find($id);

         // You can also validate here if you want
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'address' => 'required|string|max:100',
            'phone_number' => 'required|digits:10|unique:users,phone_number,'.$id,
            'status' => 'required',
            'avtar' => 'nullable|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
        ]);

        $avatarPath = null;
        $filename = null;

                
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->status = $request->status;

        // role based folder
        switch($request->role) {
            case 'school':
                $avatarPath = 'assets/images/user/school/';
                break;
            case 'teacher':
                $avatarPath = 'assets/images/user/teacher/';
                break;
            case 'student':
                $avatarPath = 'assets/images/user/student/';
                break;
            default:
                $avatarPath = 'assets/images/user/general/';
                break;
        }


        // Upload user avatar
        if ($request->hasFile('avtar')) {

            $file = $request->file('avtar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path($avatarPath);

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $user->avtar = $avatarPath . $filename;
        }

        $user->save();

        // update related models
        if ($user->role === 'school') {
            $school = School::where('school_id', $user->id)->first();
            if ($school) {
                $school->school_name = $request->name;
                $school->school_email = $request->email;
                $school->school_phone_1 = $request->phone_number;
                if ($filename && $avatarPath) {
                    $school->school_logo = $avatarPath . $filename;
                }
                $school->save();
            }
        }

        if ($user->role === 'teacher') {
            $teacher = Teacher::where('user_id', $user->id)->first();
            if ($teacher) {
                $teacher->first_name = $request->name;
                $teacher->email = $request->email;
                $teacher->primary_contact_number1 = $request->phone_number;
                if ($filename && $avatarPath) {
                    $teacher->image = $avatarPath . $filename;
                }
                $teacher->save();
            }
        }

        if ($user->role === 'student') {
            $student = Student::where('user_id', $user->id)->first();
            if ($student) {
                $student->father_name = $request->name;
                $student->email = $request->email;
                $student->primary_contact = $request->phone_number;
                if ($filename && $avatarPath) {
                    $student->father_image = $avatarPath . $filename;
                }
                $student->save();
            }
        }


        return redirect()->route('user.list')->with('success', 'User updated successfully.');
    }

    // Delete USP
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->image) {
            Storage::disk('public')->delete($user->image);
        }
        $user->delete();

        return redirect()->route('user.list')->with('success', 'User deleted successfully.');
    }


}
