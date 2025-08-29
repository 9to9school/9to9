<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talk;
use App\Mail\ParentEnquiryMail;
use App\Mail\FranchiseEnquiryMail;
use App\Mail\AdmissionMail;
use App\Mail\EnquiryNotification;
use App\Mail\TestMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TalkController extends Controller
{
          public function index()
{
    $talks = Talk::latest()->get();
    return view('admin.talk-expert.index', compact('talks'));
}
    public function TalkExpert()
    {
        return view('web.talk-expert');
    }

    public function submitTalkExpert(Request $request)
    {
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

        return redirect('/thank-you');

        // return redirect()->route('talk.expert')->with('success', 'Your request has been submitted successfully!');
    }
}
