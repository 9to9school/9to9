<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Token;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
class AuthController extends Controller
{
   
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $role = $request->is('api/parent/*') ? 'student' : ($request->is('api/teacher/*') ? 'teacher' : null);

        if (!$role) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid login route. Role not recognized.'
            ], 400);
        }

        $user = User::where('email', $request->email)
            ->where('role', $role)
            ->first();


        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

            // Create Sanctum token
            $token = $user->createToken('parent-token')->plainTextToken;

             $data = [
            'login_id' => $user->id,
            'token' => $token,
            'source' => 'parent login',
            ];
                // You can use Eloquent
            Token::create($data); //

            return response()->json([
                'status' => true,
                'message' => 'Login successful.',
                'token' => $token,
                'user' => $user,
            ]);
    }


    public function parentProfile($id)
    {
        $user = User::find($id);
        // Use relationship
        
        // Fetch students with school and shift
        $students = $user->student()
            ->with([
                'school:id,school_name,school_phone_1',
                'shifts:id,time_from,time_to'
            ])
            ->get();

        $studentsData = $students->map(function ($student) {
            // Get teachers where work_shift JSON contains this shift_id
            $teachers = Teacher::whereJsonContains('work_shift', (string) $student->time_shift)
            ->get()
            ->map(function ($teacher) {
                return $teacher->first_name . ' ' . $teacher->last_name;
            });


            $studentArray = $student->toArray();
           
            $studentArray['teachers'] = $teachers;
            $studentArray['age'] = $student->ages->title ?? '';
            $studentArray['shift_time'] = optional($student->shifts)->time_from . ' - ' . optional($student->shifts)->time_to;

            return $studentArray;
        });

        if ($user->role !== 'student') {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized access. Only parents allowed.'
            ], 403);
        }

        $data = [
            'id'            => $user->id,
            'name'          => $user->name,
            'email'         => $user->email,
            'phone_number'  => $user->phone_number,
            'dob'           => $user->dob,
            'address'       => $user->address,
            'role'          => $user->role,
            'status'        => $user->status,
            'students'      => $studentsData,
        ];


        return response()->json([
            'status'  => true,
            'message' => 'Parent profile retrieved successfully.',
            'data'    => $data
        ]);
    }

    public function logout(Request $request)
    {

        $request->validate([
            'token' => 'required',
        ]);
       
        $token = $request->token;

        // Also delete from custom tokens table if used
        $data = Token::where('token', $token)->delete();

        if($data){
            $mess = 'Logout successful.';
            $status = 'true';
        }else{
            $status = 'false';
            $mess = 'Redirect on login page.';
        }

        return response()->json([
            'status' => $status,
            'message' => $mess,
        ]);
    }

    public function parent_post_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Fetch students with school and shift
        $students = $user->student()
            ->with([
                'school:id,school_name,school_phone_1',
                'shifts:id,time_from,time_to'
            ])
            ->get();

        $studentsData = $students->map(function ($student) {
            // Get teachers where work_shift JSON contains this shift_id
            $teachers = Teacher::whereJsonContains('work_shift', (string) $student->time_shift)
            ->get()
            ->map(function ($teacher) {
                return $teacher->first_name . ' ' . $teacher->last_name;
            });


            $studentArray = $student->toArray();
           
            $studentArray['teachers'] = $teachers;
            $studentArray['age'] = $student->ages->title ?? '';
             $studentArray['shift_time'] = optional($student->shifts)->time_from . ' - ' . optional($student->shifts)->time_to;

            return $studentArray;
        });

        // Create token
        $token = $user->createToken('parent-token')->plainTextToken;

        // Save token to custom tokens table
        Token::create([
            'login_id' => $user->id,
            'source'   => 'parent',
            'token'    => $token,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Login successful.',
            'token' => $token,
            'user' => $user ,
            'students' => $studentsData,
        ]);
    }



    public function parentupdate(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user || $user->role !== 'student') {
            return response()->json([
                'status' => false,
                'message' => 'Parent user not found.',
            ], 404);
        }

        $pdata = Student::where('user_id',$user->id)->first();


         if (!$pdata) {
            return response()->json([
                'status' => false,
                'message' => 'Parent Data not found.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name'          => 'nullable|string|max:255',
            'email'           => 'required|email|unique:users,email,' . $id,
            'phone_number'  => 'nullable|string|max:15|unique:users,phone_number,' . $user->id,
            'dob'           => 'nullable|date',
            'address'       => 'nullable|string|max:255',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error.',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Upload avatar if present
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/user/student/parents/'), $filename);
            $user->avtar = 'assets/images/user/student/parents/' . $filename;
            // $pdata->father_image = 'assets/images/user/student/parents/' . $filename;
        }

      

        
        // Update other fields
        $user->name         = $request->name;
        $user->phone_number = $request->phone_number;
        $user->dob          = $request->dob;
        $user->address      = $request->address;
        $user->email        = $request->email;
        $user->save();

          // Update other fields
        $pdata->father_name	         = $request->name;
        $pdata->primary_contact         = $request->phone_number;
        $pdata->dob                  = $request->dob;
        $pdata->address              = $request->address;
        $pdata->email                = $request->email;
        $pdata->save();



        return response()->json([
            'status'  => true,
            'message' => 'Parent profile updated successfully.',
            'user'    => [
                'id'              => $user->id,
                'name'            => $user->name,
                'email'           => $user->email,
                'avtar'           => $user->avtar,
                'dob'             => $user->dob,
                'address'         => $user->address,
                'phone_number'    => $user->phone_number,
                'salt_password'   => $user->salt_password,
                'role'            => $user->role,
                'email_verified'  => $user->email_verified,
                'phone_verified'  => $user->phone_verified,
                'status'          => $user->status,
                'created_at'      => $user->created_at,
                'updated_at'      => $user->updated_at,
            ],
        ]);
    }


    public function teacherlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Get user with teacher role
        $user = User::where('email', $request->email)
                    ->where('role', 'teacher')
                    ->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found or not a teacher.',
            ], 404);
        }

        // check password
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // get teacher profile
        $teacher = Teacher::where('user_id', $user->id)->first();

        if (!$teacher) {
            return response()->json([
                'status' => false,
                'message' => 'Teacher profile not found.',
            ], 404);
        }

        $user['teacher'] = $teacher;

        // Create Sanctum token
        $token = $user->createToken('teacher-token')->plainTextToken;

        // Save token to custom tokens table
        Token::create([
            'login_id' => $user->id,
            'source'   => 'teacher',
            'token'    => $token,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Login successful.',
            'token'   => $token,
            'user'    => $user,
            
        ]);
    }


    public function teacherProfile($id)
    {
        $user = User::find($id);

        if ($user->role !== 'teacher') {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized access. Only teachers allowed.'
            ], 403);
        }

        $teacher = Teacher::where('user_id', $user->id)->first();

        if (!$teacher) {
            return response()->json([
                'status' => false,
                'message' => 'Teacher profile not found.'
            ], 404);
        }

        $data = [
            'id'                      => $user->id,
            'name'                    => $user->name,
            'email'                   => $user->email,
            'phone_number'            => $user->phone_number,
            'dob'                     => $teacher->dob,
            'address'                 => $teacher->address,
            'role'                    => $user->role,
            'status'                  => $user->status,
            'teacher_id'              => $teacher->id,
            'school_id'               => $teacher->school_id,
            'qualification'           => $teacher->qualification,
            'experience'              => $teacher->experience,
            'subject'                 => json_decode($teacher->subject),
            'gender'                  => $teacher->gender,
            'joining_date'            => $teacher->date_of_joining,
            'primary_contact_number1' => $teacher->primary_contact_number1,
            'primary_contact_number2' => $teacher->primary_contact_number2,
            'work_shift'              => json_decode($teacher->work_shift),
            'image'                   => $teacher->image,
        ];

        return response()->json([
            'status'  => true,
            'message' => 'Teacher profile retrieved successfully.',
            'data'    => $data
        ]);
    }
   
    // coordinator login
    public function coorLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Get user with teacher role
        $user = User::where('email', $request->email)
                    ->where('role', 'coordinator')
                    ->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found or not a coordinator.',
            ], 404);
        }

        // check password
        if (!Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        
        // Create Sanctum token
        $token = $user->createToken('teacher-token')->plainTextToken;

        // Save token to custom tokens table
        Token::create([
            'login_id' => $user->id,
            'source'   => 'teacher',
            'token'    => $token,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Login successful.',
            'token'   => $token,
            'user'    => $user,
            
        ]);
    }
}