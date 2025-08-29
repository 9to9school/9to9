<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Demo;
use App\Models\Talk;
use App\Mail\ParentEnquiryMail;
use App\Mail\FranchiseEnquiryMail;
use App\Mail\AdmissionMail;
use App\Mail\EnquiryNotification;
use App\Mail\TestMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DemoController extends Controller
{
   
   public function index()
    {
        $demos = Demo::all();

        return response()->json([
            'status' => true,
            'message' => 'Demo data retrieved successfully',
            'data' => $demos
        ]);
    }

    /**
     * Store a newly created demo entry in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'full_name' => 'required|string|max:255',
            'mobile_number' => 'required|digits:10',
            'email' => 'nullable|email',
            'preferred_time' => 'required|string|max:255',
            'question_or_concern' => 'nullable|string|max:1000',
        ]);

        Talk::create([
            'full_name' => $request->full_name,
            'mobile_number' => $request->mobile_number,
            'email' => $request->email,
            'preferred_time' => $request->preferred_time,
            'question_or_concern' => $request->question_or_concern,
        ]);

        $recipient = $request->email; // Replace with your email
        $name = $request->full_name;

        // Mail::to($recipient)->send(new TestMail($name));
       $data =  Mail::to($recipient)->send(new AdmissionMail($name));

       $data = [
            'full_name'           => $request->full_name,
            'mobile_number'       => $request->mobile_number,
            'email'               => $request->email,
            'preferred_time'      => $request->preferred_time,
            'question_or_concern' => $request->question_or_concern,
            'type' => 'talkexp',
        ];

        $admrecipient = 'anandsingh678970@gmail.com';
        // // Mail::to($recipient)->send(new TestMail($name));
        Mail::to($admrecipient)->send(new EnquiryNotification($data));

        return response()->json([
            'status' => true,
            'message' => 'Demo entry created successfully',
        ], 200);
    }

   
}
