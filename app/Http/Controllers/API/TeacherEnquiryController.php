<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherApplication;
use App\Mail\TeacherMail;
use App\Mail\EnquiryNotification;
use Illuminate\Support\Facades\Mail;

class TeacherEnquiryController extends Controller
{

    public function teacherenquiry(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'fullname'     => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'state'        => 'required|string|max:100',
            'city'         => 'required|string|max:100',
            'pin_code'     => 'required|string|max:10',
            'resume'       => 'required|file|mimes:pdf,doc,docx|max:2048', // 2MB max
        ]);

        // Handle file upload
        $resumePath = null;
        if ($request->hasFile('resume')) {
            $file = $request->file('resume');
            $filename = uniqid('resume_') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/pdfs/teacher/'), $filename);
            $resumePath = 'assets/pdfs/teacher/' . $filename;
        }

        // Store in database
        TeacherApplication::create([
            'fullname'     => $validated['fullname'],
            'email'        => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'state'        => $validated['state'],
            'city'         => $validated['city'],
            'pin_code'     => $validated['pin_code'],
            'resume'       => $resumePath,
        ]);

        // Send confirmation email to the teacher
        Mail::to($validated['email'])->send(new TeacherMail($validated['fullname']));

        // Send admin notification
        $data = [
            'fullname'     => $validated['fullname'],
            'email'        => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'state'        => $validated['state'],
            'city'         => $validated['city'],
            'pin_code'     => $validated['pin_code'],
            'resume'       => $resumePath,
            'type'         => 'teacherapply'
        ];

        Mail::to('anandsingh678970@gmail.com')->send(new EnquiryNotification($data));

        return response()->json([
            'message' => 'Teacher enquiry submitted successfully.'
        ], 201);
    }


}
