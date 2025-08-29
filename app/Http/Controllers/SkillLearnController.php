<?php

namespace App\Http\Controllers;

use App\Models\SkillLearn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SkillLearnController extends Controller
{
    public function index()
    {
        $nav = 'SkillLearn';
        $banners = SkillLearn::all();
        return view('admin.PreSchool.banner.banner-list', compact('banners', 'nav' ));
    }


    public function store(Request $request, $id = null)
    {
        $title = $id ? "Edit Skill Learn" : "Add Skill Learn";
        $webbanner = $id ? SkillLearn::findOrFail($id) : new SkillLearn();
        $message = $id ? "Skill Learn has been updated successfully!" : "Skill Learn has been created successfully!";

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'heading' => 'required|string|max:255',
                'button' => 'required|string|max:100',
                'url' => 'required|url',
                'playbtn' => 'required|string|max:100',
                'playurl' => 'required|url',
                'image' => ($id ? 'nullable' : 'required') .'|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $manager = new ImageManager(new Driver());
            $imagePath = public_path('assets/images/skillLearn/');

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
                SkillLearn::create($data);
            } else {
                $webbanner->update($data);
            }
            return redirect()->back()->with('success', $message);
        }
        $banners = SkillLearn::all();
        return view('admin.skilllearn.create', compact('title', 'webbanner', 'banners'));
    }

}
