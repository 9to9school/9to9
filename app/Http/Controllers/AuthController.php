<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PermissionModel;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;


class AuthController extends Controller
{
    // Show login form    
    public function signin()
    {
     return view('admin.login');
    }
    
    //Handle the login request
    public function login(Request $request){
       
         $request->validate([
         'email'=>'required',
         'password'=>'required',
        ]);

        $role = $request->input('role'); 

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'active','role' => $role])) {
            // dd('test');
            // After successful login, check the role and redirect accordingly
            $user = Auth::user();
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'marketing':
                    return redirect()->route('marketing.dashboard');
                case 'teacher':
                    return redirect()->route('teacher.dashboard');
                // case 'student':
                //     return redirect()->route('student.dashboard');
                case 'school':
                    return redirect()->route('school.dashboard');

                
                default:
                    return redirect()->back()->withErrors(['email' => 'Unauthorized access']);
            }
            
        }

        // If login fails, return back with error message
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    //logout
    public function logout(Request $request)
    {
        $user = Auth::user(); // Get the user before logging out

        Auth::logout();
        $request->session()->invalidate();
        // $request->session()->regenerateToken(); 

        // Redirect based on role
        switch ($user->role) {
            case 'admin':
                return redirect()->route('admin.loginform');
            case 'marketing':
                return redirect()->route('marketing.loginform');
            case 'school':
                return redirect()->route('school.login');
            case 'teacher':
                return redirect()->route('teacher.login');
            default:
               return redirect()->back()->withErrors(['email' => 'Unauthorized access']);
        }
    }

    //Handle the profile update request
    public function updateProfile(Request $request ,$id)
    {
       
        $user=User::find($id);
      
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'required|string|unique:users,phone_number,' . Auth::id(),
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        if($request->password){
           $user->password = Hash::make($request->password);
        }

        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;

        // if ($request->hasFile('avtar')) {
        //     $file = $request->file('avtar');
        //     $filename = 'avatars/' . uniqid() . '.' . $file->getClientOriginalExtension();
        //     $path = $file->storeAs('public', $filename); // stores in storage/app/public/avatars
        //     $user->avtar = $filename;
        // }
    
        if ($request->hasFile("avatar")) {
            $file = $request->file("avatar");
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/profile/', $filename);
            $user->avtar = 'assets/images/profile/' . $filename;
        }

        $user->save();

        if($user->role == 'school'){
          return redirect()->route('school.dashboard')->with('success', 'Profile updated successfully.');
        }else{
         return redirect()->route('admin.dashboard')->with('success', 'Profile updated successfully.');
        }       
    }

    
}
