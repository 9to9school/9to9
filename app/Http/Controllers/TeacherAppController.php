<?php


namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\TeacherApplication;
use App\Mail\TeacherMail;
use App\Mail\EnquiryNotification;
use Illuminate\Support\Facades\Mail;


class TeacherAppController extends Controller
{
    public function save(Request $request)
    {

        // Validate input
        $validated = $request->validate([
            'fullname'     => 'required|string|max:255',
            'email'    => 'required|email|max:255',
            'phone_number'   => 'required',
            'state'    => 'required',
            'city'     => 'required',
            'pin_code' => 'required',
            'resume'  => 'required|file|mimes:pdf,doc,docx|max:2048', // 2MB max
        ]);

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');

            // Generate unique filename
            $filename = uniqid('resume_') . '.' . $file->getClientOriginalExtension();

            // Move to public path
            $file->move(public_path('assets/pdfs/teacher/'), $filename);

            // Save path to variable or database
            $resumePath = 'assets/pdfs/teacher/' . $filename;
        }


        // Save or process the data (e.g. send email or store in DB)
        // Example: Storing in DB
        TeacherApplication::create([
            'fullname' => $validated['fullname'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'state' => $validated['state'],
            'city' => $validated['city'],
            'pin_code' => $validated['pin_code'],
            'resume' => $resumePath,
            'created_at' => now() ?? null,
            'updated_at' => now() ?? null,
        ]);


           $recipient = $validated['email']; // Replace with your email
           $name = $validated['fullname'];

            // Mail::to($recipient)->send(new TestMail($name));
            Mail::to($recipient)->send(new TeacherMail($name));

            $data = [
                'fullname'      => $validated['fullname'],
                'email'         => $validated['email'],
                'phone_number'  => $validated['phone_number'],
                'state'         => $validated['state'],
                'city'          => $validated['city'],
                'resume'        => $resumePath,
                'type'           => 'teacherapply'
            ];

            $admrecipient = 'anandsingh678970@gmail.com';
            // // Mail::to($recipient)->send(new TestMail($name));
            Mail::to($admrecipient)->send(new EnquiryNotification($data));

           return redirect('/thank-you');



        // Redirect with success
        // return back()->with('success', 'submitted successfully.');
    }
}
