<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Student;

class EnrollController extends Controller
{
    public function index()
    {
        // Get all students with their associated user data (assuming Student model has a relation 'user')
        

        $students = Student::with('user')->get();

        return response()->json([
            'status' => true,
            'message' => 'All students retrieved successfully',
            'data' => $students
        ]);
    }

    public function enroll(Request $request)

    {

        try {
            $validator = Validator::make($request->all(), [
                'child_name'     => 'required|string|max:255',
                'age'            => 'nullable|integer|min:1',
                'gender'         => 'nullable|string|in:male,female,other',
                'father_name'    => 'nullable|string|max:255',
                'mother_name'    => 'nullable|string|max:255',
                'phone_number_1' => 'required|numeric',
                'phone_number_2' => 'nullable|numeric',
                'email'          => 'required|email|unique:users,email',
                'address'        => 'required|string|max:500',
                'city'           => 'required|string|max:100',
                'state'          => 'required|string|max:100',
                'zip'            => 'required|string|max:20',
                'school_id'      => 'required|exists:schools,school_id',

                'academic_year'     => 'nullable|string|max:20',
                'primary_contact'   => 'nullable|string|max:20',
                'mother_tongue'     => 'nullable|string|max:50',
                'admission_date'    => 'nullable|date',
                'student_image'     => 'nullable|image|max:2048', // validate image upload
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::beginTransaction();

            // Create Parent User
            $user = new User();
            $user->name = $request->father_name ?? $request->mother_name ?? 'Parent';
            $user->email = $request->email;
            $user->address = $request->address;
            $user->phone_number = $request->phone_number_1;
            $user->password = Hash::make('password'); // default password - consider random or env-based in prod
            $user->salt_password = '12345'; // generally avoid storing plain salts
            $user->role = 'parent';
            $user->save();

            // Create Student
            $student = new Student();
            $student->user_id = $user->id;

        
            $student->first_name = $request->first_name;
            $student->last_name = $request->last_name;

            $student->academic_year = $request->academic_year;
            $student->age = $request->age;
            $student->gender = $request->gender;
            $student->child_name = $request->child_name;
            $student->primary_contact = $request->primary_contact;
            $student->mother_tongue = $request->mother_tongue;
            $student->father_name = $request->father_name;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->city = $request->city;
            $student->state = $request->state;
            $student->zip = $request->zip;
            $student->religion = $request->religion;
            $student->nationality = $request->nationality;
            $student->admission_date = $request->admission_date ?? now();
            $student->admission_number = 'ADM' . str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $student->school_id = $request->school_id;
            $student->save();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Parent and Student enrolled successfully.',
                'data' => [
                    'user_id' => $user->id,
                    'student_id' => $student->id
                ]
            ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}