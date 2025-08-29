<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding
use Illuminate\Support\Facades\Validator;
class WebBannerController extends Controller
{
    public function index()
    {
        $webbanners = WebBanner::all();
        return view('admin.webbanner.webbanner-list', compact('webbanners'));
    }


    public function create()
    {
        return view('admin.webbanner.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'image'   => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $webbanner = new WebBanner();
        $webbanner->heading = $request->heading;

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/daycare/banner/');

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/daycare/banner/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
//                $image->resize(1920, 640);
            $image->encode(new WebpEncoder(quality: 95));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $webbanner->image = $path . $filename;
        }

        $webbanner->save();

        return redirect()->route('webbanner.list')->with('success', 'WebBanner added successfully.');
    }
    // Show the edit form for a USP
    public function edit($id)
    {
        $webbanner = WebBanner::findOrFail($id);
        return view('admin.webbanner.edit', compact('webbanner'));
    }

    // Update USP
    public function update(Request $request, $id)
    {
        $request->validate([
//            'subheading' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
//            'description' => 'required|string',
//            'button_name' => 'nullable|string|max:100',
//            'button_link' => 'nullable|url',
//            'btn_name' => 'nullable|string|max:100',
//            'btn_link' => 'nullable|url',
//            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
//            'backgroundimage' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $webbanner = WebBanner::findOrFail($id);
//        $webbanner->subheading = $request->subheading;
        $webbanner->heading = $request->heading;
//        $webbanner->description = $request->description;
//        $webbanner->button_name = $request->button_name;
//        $webbanner->button_link = $request->button_link;
//        $webbanner->btn_name = $request->btn_name;
//        $webbanner->btn_link = $request->btn_link;
//        $webbanner->status = $request->status;

         // Update Image if new one is uploaded
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/webbanner/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
//                $image->resize(1920, 640);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

//        if ($request->hasFile('backgroundimage')) {
//            if ($webbanner->backgroundimage && File::exists(public_path($webbanner->backgroundimage))) {
//                File::delete(public_path($webbanner->backgroundimage));
//            }
//            $webbanner->backgroundimage = ImageHelper::uploadImage($request->file('backgroundimage'), 'webbanner');
//        }
        $webbanner->save();

        return redirect()->route('webbanner.list')->with('success', 'WebBanner updated successfully.');
    }

    public function destroy($id)
    {
        $webbanner = WebBanner::findOrFail($id);
        if ($webbanner->image) {
            Storage::disk('public')->delete($webbanner->image);
        }
        $webbanner->delete();

        return redirect()->route('webbanner.list')->with('success', 'Web-Banner deleted successfully.');
    }

    

}
