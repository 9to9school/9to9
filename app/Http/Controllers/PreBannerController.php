<?php

namespace App\Http\Controllers;

use App\Models\PreBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PreBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = 'PreBanner';
        $banners = PreBanner::all();
        return view('admin.PreSchool.banner.banner-list', compact('banners', 'nav' ));
    }
    public function store(Request $request, $id = null)
    {
        $title = $id ? "Edit PreSchool Banner" : "Add PreSchool Banner";
        $webbanner = $id ? PreBanner::findOrFail($id) : new PreBanner();
        $message = $id ? "PreSchool Banner has been updated successfully!" : "PreSchool Banner has been created successfully!";

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'topbar' => 'required|string|max:255',
                'heading' => 'required|string|max:255',
                'sub_heading' => 'required|string|max:255',
                'description' => 'required|string',
                'button_name1' => 'required|string|max:100',
                'button_link1' => 'required|url',
                'button_name2' => 'required|string|max:100',
                'button_link2' => 'required|url',
                'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $manager = new ImageManager(new Driver());
            $imagePath = 'assets/images/preschool/banner/';

            if (!is_dir($imagePath)) {
                mkdir($imagePath, 0755, true);
            }
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $path = 'assets/images/preschool/banner/';
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }

                $uploadedImage = $request->file('image');
                $image = $manager->read($uploadedImage);
//                $image->resize(480, 320);
                $image->encode(new WebpEncoder(quality: 65));
                $filename = uniqid() . '.webp';
                $image->save($path . $filename);
                $data['image'] = $path . $filename;
            }

            if ($id === null) {
                PreBanner::create($data);
            } else {
                $webbanner->update($data);
            }
            return redirect()->back()->with('success', $message);
        }
        $banners = PreBanner::all();
        return view('admin.PreSchool.banner.create', compact('title', 'webbanner', 'banners'));
    }


    /**
     * Show the form for editing the specified resource.
     */
//    public function destroy($id)
//    {
//        $data = PreBanner::findOrFail($id);
//
//        if (!empty($data->image) && file_exists(public_path($data->image))) {
//            unlink(public_path($data->image));
//        }
//        $data->delete();
//
//        return redirect()->route('pre.banner.create')->with('success', 'Pre-Banner deleted successfully.');
//    }
}
