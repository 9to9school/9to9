<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use function Sodium\crypto_shorthash;

class AboutController extends Controller
{

    public function AboutContent()
    {
        $title= "About Content";
        $about_content = About::latest()->get();
        return view('admin.about.index', compact('title','about_content'));
    }


    public function addOrUpdateAbout(Request $request, $id = null)
    {
        $about = $id ? About::findOrFail($id) : new About();
        $title = $id ? 'Update About Section' : 'Add About Section';
        $message = $id ? 'About section updated successfully.' : 'About section added successfully.';

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'banner_image' => $id
                    ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048'
                    : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',

                'image_sec1' => $id
                    ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048'
                    : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',

                'icon_image1' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024',
                'icon_image2' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024',
                'icon_image3' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024',
                'icon_image3' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024',

                'image_newsletter' => $id
                    ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048'
                    : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',

                // Content fields (no change needed based on $id)
                'banner_heading'     => 'nullable|string|max:255',
                'banner_sub_heading' => 'nullable|string|max:255',
                'banner_para'        => 'nullable|string|max:255',
              /*  'banner_btn_name'    => 'nullable|string|max:255',
                'banner_btn_link'    => 'nullable|string|max:255',*/

                'main_sub_heading'   => 'nullable|string|max:255',
                'main_heading'       => 'required|string|max:255',
                'main_para'          => 'required|string',

                'sub_heading1'       => 'required|string|max:255',
//                'para1'              => 'nullable|string',
                'sub_heading2'       => 'required|string|max:255',
//                'para2'              => 'required|string',
                'sub_heading3'       => 'required|string|max:255',
                'sub_heading4'       => 'required|string|max:255',
//                'para3'              => 'nullable|string',

                'sub_heaading_sec2'  => 'required|string|max:255',
                'heading_sec2'       => 'required|string|max:255',
                'para_sec2'          => 'nullable|string',
//                'video_link_sec2'    => 'required|string|max:255',
                'choose_heading'    => 'required|string|max:255',
                'choose_title1'    => 'required|string|max:255',
                'choose_para1'    => 'nullable|string|max:255',
                'choose_link1'    => 'nullable|string|max:255',
                'choose_title2'    => 'required|string|max:255',
                'choose_para2'    => 'nullable|string|max:255',
                'choose_link2'    => 'nullable|string|max:255',
                'choose_title3'    => 'required|string|max:255',
                'choose_para3'    => 'nullable|string|max:255',
                'choose_link3'    => 'nullable|string|max:255',
                'choose_title4'    => 'required|string|max:255',
                'choose_para4'    => 'nullable|string|max:255',
                'choose_link4'    => 'nullable|string|max:255',
                'choose_title5'    => 'required|string|max:255',
                'choose_para5'    => 'nullable|string|max:255',
                'choose_link5'    => 'nullable|string|max:255',
                'choose_title6'    => 'required|string|max:255',
                'choose_para6'    => 'nullable|string|max:255',
                'choose_link6'    => 'nullable|string|max:255',

                'heading_newsletter' => 'required|string|max:255',
                'para_newsletter'    => 'required|string|max:255',
            ];

            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Image fields with only paths (no resizing)
            $imageFields = [
                'banner_image'     => 'assets/images/about/banner/',
                'image_sec1'       => 'assets/images/about/sec1/',
                'icon_image1'      => 'assets/images/about/icons/',
                'icon_image2'      => 'assets/images/about/icons/',
                'icon_image3'      => 'assets/images/about/icons/',
                'icon_image4'      => 'assets/images/about/icons/',
                'choose_icon1'     => 'assets/images/about/whychoose/',
                'choose_icon2'     => 'assets/images/about/whychoose/',
                'choose_icon3'     => 'assets/images/about/whychoose/',
                'choose_icon4'     => 'assets/images/about/whychoose/',
                'choose_icon5'     => 'assets/images/about/whychoose/',
                'choose_icon6'     => 'assets/images/about/whychoose/',
                'image_newsletter' => 'assets/images/about/newsletter/',
            ];

            $manager = new ImageManager(new Driver());

            foreach ($imageFields as $field => $path) {
                if ($request->hasFile($field)) {
                    if (!is_dir($path)) {
                        mkdir($path, 0755, true);
                    }

                    $img = $manager->read($request->file($field));
                    // Removed resize() to keep original image dimensions
                    $img->encode(new WebpEncoder(quality: 90));

                    $filename = uniqid() . '.webp';
                    $img->save($path . $filename);

                    $data[$field] = $path . $filename;
                }
            }

            // Create or Update
            if ($id) {
                $about->update($data);
            } else {

                About::create($data);
            }

            return back()->with('success', $message);
        }

        return view('admin.about.create', compact('about', 'title'));
    }
}