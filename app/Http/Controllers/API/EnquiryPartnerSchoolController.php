<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryPartnerSchool;
use App\Models\partnerSchool;
use Illuminate\Support\Facades\Mail;
use App\Mail\PartnerSchoolAdmissionMail;
use App\Mail\PartnerSchoolEnquiryMail;

class EnquiryPartnerSchoolController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'partner_school_id' => 'nullable|exists:partner_schools,id',
            'full_name'         => 'required|string|max:255',
            'email'             => 'required|email|max:255',
            'mobile_number'     => 'required|string|max:20',
            'que_of_concern'    => 'nullable|string|max:500',
        ]);

        $enquiry = EnquiryPartnerSchool::create($validated);

        $schooldata = partnerSchool::where('id',$validated['partner_school_id'])->first();

       // ✅ Prepare data for email
        $datanew = [
            'full_name'         => $validated['full_name'],
            'mobile_number'     => $validated['mobile_number'],
            'email'             => $validated['email'],
            'message'           => $validated['que_of_concern'],
            'school_name'           => $schooldata->school_name,
            'type'              => 'partner_school',
        ];

        $admRecipient = 'anandsingh678970@gmail.com';
        $schoolRecipient = $schooldata->school_email;
        $userRecipient = $validated['email'];
        $userName = $validated['full_name'];

        $userdata= [
            'full_name'         => $validated['full_name'],
            'school_name'           => $schooldata->school_name,
        ];


        // ✅ Try sending emails
        try {
            Mail::to($admRecipient)->send(new PartnerSchoolEnquiryMail($datanew));
            Mail::to($schoolRecipient)->send(new PartnerSchoolEnquiryMail($datanew));
            Mail::to($userRecipient)->send(new PartnerSchoolAdmissionMail($userdata));
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was a problem sending your email.');
        }

        return response()->json([
            'success' => true,
            'message' => 'Enquiry submitted successfully.',
            'data'    => $enquiry,
        ]);
    }
}
