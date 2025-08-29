<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\partnerSchool;
class BecomePartnerController extends Controller
{
    public function index(){
        return view ('web.become_a_partner');
    }

    public function store(Request $request)
    {
        // Validation
            $request->validate([
                'school_name' => 'required|string|max:255',
                'school_email' => 'string|email|unique:partner_schools,school_email',
                'school_phone_1' => 'digits:10|unique:partner_schools,school_phone_1',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:100',
                'state' => 'required|string|max:100',
                'zip' => 'required|string|max:10',
                
            ]);

 
            // Create School
            $school = new partnerSchool();
            $school->school_name = $request->school_name;
            $school->school_email = $request->school_email;
            $school->school_phone_1 = $request->school_phone_1;
            $school->address = $request->address;
            $school->city = $request->city;
            $school->state = $request->state;
            $school->zip = $request->zip;
            $school->status = 'inactive';
            $school->source = 'web';
            

            // Handle Logo Upload
            if ($request->hasFile('school_logo')) {
                $file = $request->file('school_logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $destinationPath = 'assets/images/user/partner_school';

                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0755, true);
                }

                $file->move($destinationPath, $filename);
                $school->school_logo = 'assets/images/user/partner_school/' . $filename;
            }

            $school->save();

            return redirect()->to('become-a-partner')->with('success', 'School added successfully!');


            // return redirect()->route('partner.school.list')->with('success', 'Partner School added successfully.');
    }
}
