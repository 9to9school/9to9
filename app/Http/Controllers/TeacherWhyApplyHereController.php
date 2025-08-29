<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeacherWhyApplyHere;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TeacherWhyApplyHereController extends Controller
{
    public function WhyApplyHere()
    {
        $title ="Why Apply Here";
        $data = TeacherWhyApplyHere::all();
        return view('admin.teacher-page.why-apply-here', compact('title','data'));
    }


    public function addWhyApplyHere(Request $request, $id = null)
    {
        if ($id == null) {
            $title = "Add Why Apply Here";
            $teacherWhyApplyHere = new TeacherWhyApplyHere();
            $message = "Entry has been created successfully!";
        } else {
            $title = "Edit Why Apply Here";
            $teacherWhyApplyHere = TeacherWhyApplyHere::findOrFail($id);
            $message = "Entry has been updated successfully!";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Image upload
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/teacher_why_apply_here/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->encode(new WebpEncoder(quality: 70)); // Size adjust as per your design
                $filename = uniqid() . '.webp';
                $img->save($imagePath . $filename);
                $data['image'] = $imagePath . $filename;
            }

            if ($id == null) {
                TeacherWhyApplyHere::create($data);
            } else {
                $teacherWhyApplyHere->update($data);
            }

            return redirect()->back()->with('success', $message);
        }
        return view('admin.teacher-page.add-why-apply-here', compact('title', 'teacherWhyApplyHere'));
    }
}
