<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CommonSetting;
use App\Models\School;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CommonSettingController extends Controller
{
    public function index()
    {
        $commonsetting = CommonSetting::all();
        return view('admin.CommonSetting.common-list', compact('commonsetting'));
    }
    public function edit($id)
    {
        $commonsetting = CommonSetting::findOrFail($id);
        return view('admin.CommonSetting.edit', compact('commonsetting'));
    }

    // Update USP
    public function update(Request $request, $id)
    {
        $request->validate([
            'site_title' => 'required|string|max:255',
            'site_desc' => 'required|string',
            'logo_header' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'logo_footer' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'mobile_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'favicon' => 'nullable|image|mimes:png,jpg,jpeg,ico|max:512',
            'copyright_content' => 'nullable|string',
            'address' => 'nullable|string',
            'mobile_number' => 'nullable|string',
            'email_id' => 'nullable|email',
            'facebook' => 'nullable|url',
            'insta' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'privacy_policy' => 'nullable|string',
            'terms_and_conditions' => 'nullable|string',
            'refund_policy' => 'nullable|string',
            'shipping_policy' => 'nullable|string',
        ]);

        $commonsetting = CommonSetting::findOrFail($id);
        $commonsetting->site_title = $request->site_title;
        $commonsetting->site_desc = $request->site_desc;
        $commonsetting->copyright_content = $request->copyright_content;
        $commonsetting->address = $request->address;
        $commonsetting->mobile_number = $request->mobile_number;
        $commonsetting->email_id = $request->email_id;
        $commonsetting->facebook = $request->facebook;
        $commonsetting->insta = $request->insta;
        $commonsetting->twitter = $request->twitter;
        $commonsetting->linkedin = $request->linkedin;
        $commonsetting->privacy_policy = $request->privacy_policy;
        $commonsetting->terms_and_conditions = $request->terms_and_conditions;
        $commonsetting->refund_policy = $request->refund_policy;
        $commonsetting->shipping_policy = $request->shipping_policy;
    
        // Handle image uploads
        if ($request->hasFile('logo_header')) {
            $logoHeader = $request->file('logo_header');
            $logoHeaderName = time() . '_header.' . $logoHeader->getClientOriginalExtension();
            $logoHeader->move(public_path('uploads/settings'), $logoHeaderName);
            $commonsetting->logo_header = 'uploads/settings/' . $logoHeaderName;
        }
    
        if ($request->hasFile('logo_footer')) {
            $logoFooter = $request->file('logo_footer');
            $logoFooterName = time() . '_footer.' . $logoFooter->getClientOriginalExtension();
            $logoFooter->move(public_path('uploads/settings'), $logoFooterName);
            $commonsetting->logo_footer = 'uploads/settings/' . $logoFooterName;
        }
    
        if ($request->hasFile('mobile_logo')) {
            $mobileLogo = $request->file('mobile_logo');
            $mobileLogoName = time() . '_mobile.' . $mobileLogo->getClientOriginalExtension();
            $mobileLogo->move(public_path('uploads/settings'), $mobileLogoName);
            $commonsetting->mobile_logo = 'uploads/settings/' . $mobileLogoName;
        }
    
        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $faviconName = time() . '_favicon.' . $favicon->getClientOriginalExtension();
            $favicon->move(public_path('uploads/settings'), $faviconName);
            $commonsetting->favicon = 'uploads/settings/' . $faviconName;
        }
    
        $commonsetting->save();

        return redirect()->route('common.list')->with('success', 'CommomSetting updated successfully.');
    }

    // Delete USP
    public function destroy($id)
    {
        $commonsetting = CommonSetting::findOrFail($id);
       
        $commonsetting->delete();

        return redirect()->route('common.list')->with('success', 'CommonSetting deleted successfully.');
    }


    // School dashbaord setting
    public function showSchoolsetting(){
        $schoolId = Auth::id();
        $getschool =  School::where('user_id',$schoolId)->first();
        return view('school.setting.setting',compact('getschool'));
    }

    public function updatesetting(Request $request)
    {

        $id = $request->id;
        $school = School::findOrFail($id);
      
        $user = User::findOrFail($school->user_id);

        $request->validate([
            'school_name' => 'required|string|max:255',
            'school_email' => 'required|string|email|unique:users,email,' . $user->id,
            'school_phone_1' => 'required|digits:10',
            'school_phone_2' => 'nullable|digits:10',
            'principal_name' => 'required|string|max:255',
            'vice_principal_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:10',
            'school_logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,avif|max:2048',
            'document' => 'nullable|mimes:pdf|max:2048',
            
        ]);

        $user->name = $request->school_name;
        $user->email = $request->school_email;
        $user->address = $request->address;
        $user->phone_number = $request->school_phone_1;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $school->school_name = $request->school_name;
        $school->school_email = $request->school_email;
        $school->school_phone_1 = $request->school_phone_1;
        $school->school_phone_2 = $request->school_phone_2;
        $school->address = $request->address;
        $school->city = $request->city;
        $school->state = $request->state;
        $school->zip = $request->zip;
        $school->principal_name = $request->principal_name;
        $school->vice_principal_name = $request->vice_principal_name;

        if ($request->hasFile('school_logo')) {
            if ($school->school_logo && File::exists(public_path($school->school_logo))) {
                File::delete(public_path($school->school_logo));
            }

            $file = $request->file('school_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('assets/images/user/school');

            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $school->school_logo = 'assets/images/user/school/' . $filename;
        }

        // if ($request->hasFile('image')) {
        //     if ($school->image && File::exists(public_path($school->image))) {
        //         File::delete(public_path($school->image));
        //     }

        //     $file = $request->file('image');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $destinationPath = public_path('assets/images/user/school');

        //     if (!File::exists($destinationPath)) {
        //         File::makeDirectory($destinationPath, 0755, true);
        //     }

        //     $file->move($destinationPath, $filename);
        //     $school->image = 'assets/images/user/school/' . $filename;
        // }

        // if ($request->hasFile('document')) {
        //     if ($school->document && File::exists(public_path($school->document))) {
        //         File::delete(public_path($school->document));
        //     }

        //     $file = $request->file('document');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $destinationPath = public_path('assets/documents/school');

        //     if (!File::exists($destinationPath)) {
        //         File::makeDirectory($destinationPath, 0755, true);
        //     }

        //     $file->move($destinationPath, $filename);
        //     $school->document = 'assets/documents/school/' . $filename;
        // }

        $school->save();

        return redirect()->route('school.setting')->with('success', 'Setting updated successfully.');
    }

}