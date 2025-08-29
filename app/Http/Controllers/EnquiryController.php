<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Enquiry;
use App\Models\EnquiryPartnerSchool;
use App\Mail\AdmissionMail;
use App\Mail\EnquiryNotification;

class EnquiryController extends Controller
{

    public function submit(Request $request)
    {
//        print_r($request->all());die;
        // ✅ Validate form input
        $data = $request->validate([
            'page'     => 'required|string|max:255',
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'mobile'   => 'required|string|max:15',
            'state'    => 'required|string|max:100',
            'city'     => 'required|string|max:100',
            'pin_code' => 'required|string|max:10',
            'message'  => 'required|string',
        ]);

        // ✅ Insert into DB
        DB::table('enquire')->insert([
            'page'      => $data['page'],
            'name'      => $data['name'],
            'email'     => $data['email'],
            'mobile'    => $data['mobile'],
            'state'     => $data['state'],
            'city'      => $data['city'],
            'pin_code'  => $data['pin_code'],
            'message'   => $data['message'],
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        // ✅ Prepare data for email
        $datanew = [
            'full_name'         => $data['name'],
            'mobile_number'     => $data['mobile'],
            'email'             => $data['email'],
            'state'             => $data['state'],
            'city'              => $data['city'],
            'message'           => $data['message'],
            'type'              => 'enquiry',
        ];

        $admRecipient = 'anandsingh678970@gmail.com';
        $userRecipient = $data['email'];
        $userName = $data['name'];

        // ✅ Try sending emails
        try {
            Mail::to($admRecipient)->send(new EnquiryNotification($datanew));
            Mail::to($userRecipient)->send(new AdmissionMail($userName));
        } catch (\Exception $e) {
            \Log::error('Email sending failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'There was a problem sending your email.');
        }

        return redirect('/thank-you')->with('success', 'Form submitted successfully.');
    }

    public function enrollEnquirySubmit(Request $request)
    {

        // ✅ Validate form input
        $data = $request->validate([
            'page'      => 'required|string',
            'name'      => 'required|string|max:255',
            'email'     => 'required|email',
            'mobile'    => 'required|digits:10',
            'state'     => 'required|string|max:100',
            'city'      => 'required|string|max:100',
            'pin_code'  => 'required|string|max:10',
            'message'   => 'required|string',
        ]);

        // ✅ Insert into DB
        DB::table('enquire')->insert([
            'page'       => $data['page'],
            'name'       => $data['name'],
            'email'      => $data['email'],
            'mobile'     => $data['mobile'],
            'state'      => $data['state'],
            'city'       => $data['city'],
            'pin_code'   => $data['pin_code'],
            'message'    => $data['message'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ✅ Prepare data for email
        $datanew = [
            'full_name'       => $data['name'],
            'mobile_number'   => $data['mobile'],
            'email'           => $data['email'],
            'state'           => $data['state'],
            'city'            => $data['city'],
            'message'         => $data['message'],
            'type'            => 'enquiry',
        ];

        $adminRecipient = 'anandsingh678970@gmail.com';
        // Admin notification
        Mail::to($adminRecipient)->send(new EnquiryNotification($datanew));

//        die;


        $userRecipient  = $data['email'];
        $userName       = $data['name'];
        // Auto-reply to user
        Mail::to($userRecipient)->send(new AdmissionMail($userName));

        return redirect('/thank-you')->with('success', 'Form submitted successfully.');
    }


    // Enroll enquiry data submit
    public function preschoolEnquirySubmit(Request $request)
    {
        // Validate form input

        $data = $request->validate([
            'page'  => 'required|string',
            'name'  => 'required|max:255',
//            'email'  => 'required|max:255',
            'mobile' => 'required|digits:10',
            'age' => 'required',
        ]);


        $data['type'] = 'preschool';

        // Insert into DB
        DB::table('enquire')->insert([
            'page'      => $data['page'],
            'name'      => $data['name'],
            'mobile'     => $data['mobile'],
            'age'   => $data['age'],
            'created_at' => now() ?? null,
            'updated_at' => now() ?? null,
        ]);

//        $recipient = $request->email;
//        $name = $data['name'];
//
//        Mail::to($recipient)->send(new AdmissionMail($name));

        $admrecipient = 'anandsingh678970@gmail.com';

        Mail::to($admrecipient)->send(new EnquiryNotification($data));

        return redirect('/thank-you');

    }

    public function index($page)
    {
        if($page == 'contact'){
            $title = 'Contact Us';
        }else if($page == 'enroll_enquiry'){
            $title = 'Enroll Enquiry';
        }else  if($page == 'Events'){
            $title = 'Event';
        }else if($page == 'franchise'){
            $title = 'Franchise';
        }else if($page == 'pre-school'){
            $title = 'Pre School';
        }else{
             $title = '';
        }

        $enquires = DB::table('enquire')->where('page',$page)->get(); // or use Enquire::all() if using Eloquent
        return view('admin.enquiry.index', compact('enquires','title'));
    }

    public function enquiryPartnerSchool()
    {
        $data = EnquiryPartnerSchool::with('school')->get();
        return view('admin.enquiry.partner_school_enquiry', compact('data'));
    }




}
