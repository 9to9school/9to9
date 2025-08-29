<?php

namespace App\Http\Controllers;

use App\Models\daycare_banner;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding
use Illuminate\Support\Facades\Validator;

class DaycareBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = 'DayBanner';
        $banners = daycare_banner::all();
        return view('admin.daycare.banner.banner-list', compact('banners', 'nav' ));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request, $id = null)
    {
        $title = $id ? "Edit Day Care Banner" : "Add  Day Care Banner";
        $webbanner = $id ? daycare_banner::findOrFail($id) : new daycare_banner();
        $message = $id ? " Day Care Banner has been updated successfully!" : " Day Care Banner has been created successfully!";

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
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
                $image->encode(new WebpEncoder(quality: 65));
                $filename = uniqid() . '.webp';
                $image->save($path . $filename);
                $data['image'] = $path . $filename;
            }

            if ($id === null) {
                daycare_banner::create($data);
            } else {
                $webbanner->update($data);
            }
            return redirect()->back()->with('success', $message);
        }
        $banners = daycare_banner::all();
        return view('admin.daycare.banner.create', compact('title', 'webbanner', 'banners'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $data = daycare_banner::findOrFail($id);

        if (!empty($data->image) && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }
        $data->delete();

        return redirect()->route('daycare.banner.create')->with('success', 'Day Care deleted successfully.');
    }
}
