<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;
use Illuminate\Support\Facades\DB;
use App\Models\ContactUs;
use Illuminate\Support\Facades\Mail;
use App\Mail\AdmissionMail;
use App\Mail\EnquiryNotification;

class ContactUsController extends Controller
{
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'mobile' => 'required',
            'state' => 'required|string',
            'city'  => 'required|string',
            'pin_code'  => 'required',
            'message' => 'required|string',
        ]);

       // Insert into DB
        $contact = DB::table('enquire')->insert([
            'page'      => 'contact',
            'name'      => $data['name'],
            'email' => $data['email'] ?? null,
            'mobile'     => $data['mobile'],
            'state'     => $data['state'] ?? null,
            'city'      => $data['city'] ?? null,
            'pin_code'      => $data['pin_code'] ?? null,
            'source'   => 'app',
            'message'   => $data['message'],
            'created_at' => now() ?? null,
            'updated_at' => now() ?? null,
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

        return response()->json([
            'status' => true,
            'message' => 'Message sent successfully',
            // 'data' => $contact,
        ]);
    }

    // GET: List all contact messages
    public function index()
    {
        $messages = DB::table('enquire')->where('page','contact')->where('source','app')->latest()->get();

        return response()->json([
            'status' => true,
            'data' => $messages,
        ]);
    }
}
