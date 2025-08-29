<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PreSchoolRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Enquiry;
use App\Mail\AdmissionMail;
use App\Mail\EnquiryNotification;

class PreSchoolRegistrationController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([            
            'name'  => 'required|max:255',
            'email'  => 'required|max:255',
            'mobile' => 'required|digits:10',
            'age' => 'required',
        ]);

        // Insert into DB
        DB::table('enquire')->insert([
            'page'      => 'pre-school',
            'name'      => $data['name'],
            'mobile'     => $data['mobile'],
            'age'   => $data['age'],
            'email' => $data['email'],
            'created_at' => now() ?? null,
            'updated_at' => now() ?? null,
        ]);

        $data['type'] = 'preschool';

        $recipient = $request->email;
        $name = $data['name'];

        Mail::to($recipient)->send(new AdmissionMail($name));

        $admrecipient = 'anandsingh678970@gmail.com';

        Mail::to($admrecipient)->send(new EnquiryNotification($data));

        return response()->json([
            'status' => true,
            'message' => 'Pre-school registration submitted successfully.',
        ]);
    }

    // Optional: List all registrations (admin)
    public function index()
    {
        $registrations = PreSchoolRegistration::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $registrations,
        ]);
    }
}
