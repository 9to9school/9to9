<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\SchoolFees;
use App\Models\User;
use App\Models\StudentWallet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use Hash;
use Illuminate\Validation\Rule;
use DB;
use Illuminate\Support\Facades\Auth;


class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('id', 'desc')->get();
        return view('admin.school.school-list', compact('schools'));
    }

   public function create()
    {
        $users = User::where('role', 'school')
                    ->where('status', 'active')  // add status filter
                    ->get();
       

        return view('admin.school.create', compact('users'));
    }

    public function store(Request $request)
    {
        // Validation
            $request->validate([
                'school_name' => 'required|string|max:255',
                'school_email' => 'required|string|email|unique:users,email',
                'password' => 'required|min:6',
                'school_phone_1' => 'required|digits:10|unique:users,phone_number',
                'school_phone_2' => 'nullable|digits:10',
                'principal_name' => 'required|string|max:255',
                'vice_principal_name' => 'nullable|string|max:255',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'zip' => 'required|string|max:10',
                'school_logo' => 'required|image|mimes:jpg,png,jpeg,gif,avif,webp|max:2048',
                'status' => 'required',
                'rating' => 'required',
            ]);

            // Create User
            $user = User::create([
                'name' => $request->school_name,
                'email' => $request->school_email,
                'address' => $request->address,
                'phone_number' => $request->school_phone_1,
                'password' => Hash::make($request->password),
                'salt_password' => '12345',
                'role' => 'school',
                'status' => 'active'
            ]);

            $fees = [];

            foreach ($request->annual_fees as $index => $annualFee) {
                $fees[] = [
                    'annual_fees' => $annualFee,
                    'per_month_fees' => $request->per_month_fees[$index] ?? null,
                ];
            }

            // Create School
            $school = new School();
            $school->user_id = $user->id;
            $school->school_name = $request->school_name;
            $school->school_email = $request->school_email;
            $school->school_phone_1 = $request->school_phone_1;
            $school->school_phone_2 = $request->school_phone_2;
            $school->address = $request->address;
            $school->city = $request->city;
            $school->state = $request->state;
            $school->zip = $request->zip;
            $school->principal_name = $request->principal_name;
            $school->vice_principal_name = $request->vice_principal_name;
            $school->age = json_encode($request->age);
            $school->fees_price = json_encode($fees);
            $school->rating = $request->rating;

            // Handle Logo Upload
            if ($request->hasFile('school_logo')) {
                $file = $request->file('school_logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = 'assets/images/user/school';

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $school->school_logo = 'assets/images/user/school/' . $filename;
            }

            $school->save();

            // Create School Fees
            if ($request->has('age')) {
                foreach ($request->age as $i => $age) {
                    SchoolFees::create([
                        'age' => $age,
                        'school_id' => $school->id,
                        'per_month_fees' => $request->per_month_fees[$i] ?? null,
                        'annual_fees' => $request->annual_fees[$i] ?? null,
                        'status' => 'active',
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('school.list')->with('success', 'School added successfully.');
    }


    public function edit($id)
    {
        $school = School::findOrFail($id);
        return view('admin.school.edit', compact('school'));
    }

    public function update(Request $request, $id)
    {
     

        $school = School::findOrFail($id);

        $user = User::findOrFail($school->user_id);

        $fees = [];

        foreach ($request->annual_fees as $index => $annualFee) {
            $fees[] = [
                'annual_fees' => $annualFee,
                'per_month_fees' => $request->per_month_fees[$index] ?? null,
            ];
        }

        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_email' => 'required|string|email|unique:users,email,' . $school->user_id,
            'school_phone_1' => 'required|digits:10|unique:users,phone_number,' . $school->user_id,
            'school_phone_1' => 'required|digits:10',
            'school_phone_2' => 'nullable|digits:10',
            'principal_name' => 'required|string|max:255',
            'vice_principal_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:10',
            'school_logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
            // 'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
            // 'document' => 'nullable|mimes:pdf|max:2048',
            'status' => 'required',
            'rating' => 'required',
        ]);

        $user->name = $request->school_name;
        $user->email = $request->school_email;
        $user->address = $request->address;
        $user->phone_number = $request->school_phone_1;
        $user->status = $request->status;

        if($request->password){
           $user->password = Hash::make($request->password);
        }
        
        $user->save();

        $school->school_name = $request->school_name;
        $school->school_email = $request->school_email;
        $school->school_phone_1 = $request->school_phone_1;
        $school->school_phone_2 = $request->school_phone_2;
        $school->address = $request->address;
        $school->city = $request->city;
        $school->state = $request->state;
        $school->zip = $request->zip;
        $school->principal_name = $request->principal_name;
        $school->vice_principal_name = $request->vice_principal_name;
        $school->age = json_encode($request->age);
        $school->fees_price = json_encode($fees);
        $school->rating = $request->rating;

        if ($request->hasFile('school_logo')) {
            if ($school->school_logo && File::exists($school->school_logo)) {
                File::delete($school->school_logo);
            }

            $file = $request->file('school_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = 'assets/images/user/school';

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $school->school_logo = 'assets/images/user/school/' . $filename;
        }

        if ($school) {
            // Delete old fee records
            SchoolFees::where('school_id', $school->id)->delete();

            // Add new fee records
            if ($request->has('age')) {
                for ($i = 0; $i < count($request->age); $i++) {
                    $schoolfees = new SchoolFees();
                    $schoolfees->age = $request->age[$i];
                    $schoolfees->school_id = $school->id;
                    $schoolfees->per_month_fees = $request->per_month_fees[$i];
                    $schoolfees->annual_fees = $request->annual_fees[$i];
                    $schoolfees->status = 'active';
                    $schoolfees->save();
                }
            }
        }
        // if ($request->hasFile('image')) {
        //     if ($school->image && File::exists(public_path($school->image))) {
        //         File::delete(public_path($school->image));
        //     }

        //     $file = $request->file('image');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $destinationPath = public_path('assets/images/user/school');

        //     if (!File::exists($destinationPath)) {
        //         File::makeDirectory($destinationPath, 0755, true);
        //     }

        //     $file->move($destinationPath, $filename);
        //     $school->image = 'assets/images/user/school/' . $filename;
        // }

        // if ($request->hasFile('document')) {
        //     if ($school->document && File::exists(public_path($school->document))) {
        //         File::delete(public_path($school->document));
        //     }

        //     $file = $request->file('document');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $destinationPath = public_path('assets/documents/school');

        //     if (!File::exists($destinationPath)) {
        //         File::makeDirectory($destinationPath, 0755, true);
        //     }

        //     $file->move($destinationPath, $filename);
        //     $school->document = 'assets/documents/school/' . $filename;
        // }

        $school->save();

    return redirect()->route('school.list')->with('success', 'School updated successfully.');
    }

    public function destroy($id)
    {
        $school = School::findOrFail($id);
        if ($school->image) {
            Storage::disk('public')->delete($school->image);
        }
        $school->delete();

        return redirect()->route('school.list')->with('success', 'School deleted successfully.');
    }

    public function show()
    {
        $students = Student::all();     

        return view('admin.students.details', compact('students'));
    }

    //Show School dashboard
    public function dashboard()
    {

    $schoolId = Auth::id();

    $totalStudents = Student::where('school_id',$schoolId)->where('status', 'active')->count();

    // Active students
    $activeStudents = Student::where('school_id',$schoolId)->where('status', 'active')->count();

    // Inactive students
    $inactiveStudents = $totalStudents - $activeStudents;

        // Teachers
    $totalTeachers = Teacher::where('school_id',$schoolId)->where('status', 'active')->count();
    $activeTeachers = Teacher::where('school_id',$schoolId)->where('status', 'active')->count();
    $inactiveTeachers = $totalTeachers - $activeTeachers;

    $totalSchools = User::where('role', 'school')->count();
    $activeSchools = School::where('status', 'active')->count();

    $totalcredit = StudentWallet::where('ladger_status','credit')->sum('student_coins');
    
    $inactiveSchools = $totalSchools - $activeSchools;
        return view('school.dashboard', compact(
        'totalStudents', 'activeStudents', 'inactiveStudents',
        'totalTeachers', 'activeTeachers', 'inactiveTeachers',
        'totalSchools', 'activeSchools', 'inactiveSchools'
    ));
    }

    //  profile page
    public function Profile()
    {
      return view('school.profile');
    }


    public function signin()
    {
        return view('school.login');
    }
}
