<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Franchise;
use App\Models\Applyfranchise;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\EnquiryNotification;
use App\Mail\FranchiseMail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class FranchiseController extends Controller
{
    public function FranchiseContent()
    {
        $title= "Franchise Content";
        $franchise_content = Franchise::latest()->get();
        return view('admin.franchise.index', compact('title','franchise_content'));
    }

    public function addOrUpdateFranchise(Request $request, $id = null)
    {
        $franchise = $id ? Franchise::findOrFail($id) : new Franchise();
        $title = $id ? 'Update Franchise Page' : 'Add Franchise Page';
        $message = $id ? 'Franchise page updated successfully.' : 'Franchise page added successfully.';

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'banner_image'     => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'banner_heading'   => 'required|string|max:255',
                'banner_para'      => 'required|string|max:255',
                'btn_name'         => 'required|string|max:255',
                'btn_link'         => 'nullable|string|max:255',

                'why_choose_heading' => 'nullable|string|max:255',
                'why_choose_para'    => 'nullable|string|max:255',

                'requirement_heading' => 'required|string|max:255',
                'requirement_para'    => 'required|string|max:255',
                'requirement_image1'  => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'requirement_title1'  => 'required|string|max:255',
                'requirement_image2'  => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'requirement_title2'  => 'required|string|max:255',

                'investment_heading' => 'nullable|string|max:255',
                'investment_para'    => 'nullable|string|max:255',
                'investment_image'  => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',

                'steps_heading' => 'required|string|max:255',
                'steps_para'    => 'required|string|max:255',
                'step1'         => 'required|string|max:255',
                'step2'         => 'required|string|max:255',
                'step3'         => 'required|string|max:255',
                'step4'         => 'required|string|max:255',

                'location_heading' => 'required|string|max:255',
                'location_para'    => 'required|string|max:255',

                'blog_heading' => 'required|string|max:255',
                'blog_para'    => 'nullable|string|max:255',

                'get_start_heading'  => 'required|string|max:255',
                'get_start_para'     => 'required|string|max:255',
                'get_start_btn_name' => 'required|string|max:255',
                'get_start_link'     => 'required|string|max:255',
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            // Image upload settings
            $imageFields = [
                'banner_image'       => [null, null, 'assets/images/franchise/banner/'],
                'requirement_image1' => [151, 109, 'assets/images/franchise/requirement/'],
                'requirement_image2' => [151, 109, 'assets/images/franchise/requirement/'],
                'investment_image' => [456, 471, 'assets/images/franchise/requirement/'],
            ];

            $manager = new ImageManager(new Driver());

            foreach ($imageFields as $field => [$width, $height, $path]) {
                if ($request->hasFile($field)) {
                    if (!is_dir($path)) {
                        mkdir($path, 0755, true);
                    }

                    $image = $manager->read($request->file($field));

                    // Resize only if width and height are defined
                    if ($width && $height) {
                        $image->resize($width, $height);
                    }

                    $image->encode(new WebpEncoder(quality: 70));
                    $filename = uniqid() . '.webp';
                    $image->save($path . $filename);

                    $data[$field] = $path . $filename;
                }
            }
            if ($id) {
                $franchise->update($data);
            } else {
                Franchise::create($data);
            }
            return back()->with('success', $message);
        }
        return view('admin.franchise.create', compact('franchise', 'title'));
    }


    // apply franchise data submit
    public function applyFranchiSubmit(Request $request)
    {

           $data =  new Applyfranchise();
           $data->full_name = $request->fullName;
           $data->email = $request->email;
           $data->phone_number  = $request->phone;
           $data->pin_code = $request->pin_code;
           $data->city = $request->city;
           $data->state = $request->state;
           $data->preferred_location = $request->preferredLocation;
           $data->investment_capacity = $request->investment;
           $data->business_background = $request->bus_background;
           $data->comments = $request->comments;
           $data->save();

           $recipient =  $request->email; // Replace with your email
           $name = $request->fullName;

          // Mail::request->fullNameto($recipient)->send(new TestMail($name));
          Mail::to($recipient)->send(new FranchiseMail($name));

            $formData = [
                'full_name'             => $request->fullName,
                'email'                 => $request->email,
                'phone_number'          => $request->phone,
                'city_state'            => $request->city,
                'preferred_location'    => $request->preferredLocation,
                'investment_capacity'   => $request->investment,
                'business_background'   => $request->bus_background,
                'comments'              => $request->comments,
                'type'                 => 'french'
            ];

            $admrecipient = 'Shayankhan.vrs@gmail.com';
            // // Mail::to($recipient)->send(new TestMail($name));
            Mail::to($admrecipient)->send(new EnquiryNotification($formData));



         return redirect('/thank-you');

    }
}
