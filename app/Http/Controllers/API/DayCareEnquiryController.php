<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Enquiry;
use App\Mail\AdmissionMail;
use App\Mail\EnquiryNotification;

class DayCareEnquiryController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'mobile'   => 'required|string|max:15',
            'state'    => 'required|string|max:100',
            'city'     => 'required|string|max:100',
            'pin_code' => 'required|string|max:10',
            'message'  => 'required|string',
        ]);


        DB::table('enquire')->insert([
            'page'      => 'day-care',
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


        return response()->json([
            'status' => true,
            'message' => 'Enquiry submitted successfully.',
        ]);
    }

    // GET: List all enquiries
    public function index()
    {
        $enquiries = DayCareEnquiry::latest()->get();

        return response()->json([
            'status' => true,
            'data' => $enquiries,
        ]);
    }
}
