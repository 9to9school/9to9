<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecializedClass;
use App\Models\Programme;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;

class SpecializedClassController extends Controller
{
    public function index()
    {
        $classes = SpecializedClass::all();
        return view('admin.specialized.specialize-list', compact('classes'));
    }

    public function AddClass(Request $request, $id = null)
    {
        if ($id === null) {
            $title = "Add Specialized Class";
            $class = new SpecializedClass();
            $message = "Specialized class has been created successfully!";
        } else {
            $title = "Edit Specialized Class";
            $class = SpecializedClass::findOrFail($id);
            $message = "Specialized class has been updated successfully!";
        }

        $progdata = Programme::where('status', 'active')->get();

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'class_name' => 'required|string|max:255|unique:specialized_classes,class_name,' . $id,
                'class_url' => 'required|string|max:255',
                'image' => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description' => 'nullable|string',
                'banner_heading' => 'nullable|string|max:255',
                'banner_description' => 'nullable|string',
                'sub_heading' => 'nullable|string|max:255',
                'duration' => 'nullable|string|max:255',
                'age' => 'nullable|string|max:255',
                'materials' => 'nullable|string|max:255',
                'fees' => 'required',
                'no_of_student' => 'required',
                'no_of_teacher' => 'required',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data['fees'] = json_encode($request->fees, true);
            $data['no_of_student'] = json_encode($request->no_of_student, true);
            $data['no_of_teacher'] = json_encode($request->no_of_teacher, true);

            // Image upload
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/specialized/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->resize(302, 200)->encode(new WebpEncoder(quality: 70));
                $filename = uniqid() . '.webp';
                $img->save($imagePath . $filename);
                $data['image'] = $imagePath . $filename;
            }

            // Banner image upload
            if ($request->hasFile('banner_image')) {
                $manager = new ImageManager(new Driver());
                $bannerPath = 'assets/images/specialized/';
                if (!is_dir($bannerPath)) mkdir($bannerPath, 0755, true);

                $banner = $manager->read($request->file('banner_image'));
                $banner->resize(1920, 1000)->encode(new WebpEncoder(quality: 70));
                $filename = uniqid() . '.webp';
                $banner->save($bannerPath . $filename);
                $data['banner_image'] = $bannerPath . $filename;
            }

            if ($id === null) {
                SpecializedClass::create($data);
            } else {
                $class->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.specialized.create', compact('title', 'class', 'progdata'));
    }

    // public function specializedClasses()
    // {
    //     $classes = SpecializedClass::where('status', 1)->get();

    //     $data['grouped_classes'] = $classes->groupBy('age');
    //     $data['age_groups'] = $data['grouped_classes']->keys();

    //     return view('web.specialized', $data);
    // }

    // public function classDetails($url)
    // {
    //     $data['class'] = SpecializedClass::where('class_url', $url)->firstOrFail();
    //     return view('web.specialized-details', $data);
    // }

   public function destroy($id)
{
    $special = SpecializedClass::findOrFail($id);

    // Delete the image if it exists
    if ($special->image && Storage::disk('public')->exists($special->image)) {
        Storage::disk('public')->delete($special->image);
    }

    // Delete the banner image if it exists
    if ($special->banner_image && Storage::disk('public')->exists($special->banner_image)) {
        Storage::disk('public')->delete($special->banner_image);
    }

    // Delete the record
    $special->delete();

    return redirect()->back()->with('success', 'Specialized class deleted successfully.');
}

}
