<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ChildLearning;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class ChildLearningController extends Controller
{
    // Display all categories
    public function AllChildLearning()
    {
        $title = "Child Learning Application";
        $child_learning = ChildLearning::latest()->get();
        return view('admin.child_learning.index', compact('child_learning', 'title'));
    }

    public function AddChildLearning(Request $request, $id = null)
    {
        if ($id == null) {
            $title = "Add Child Learning";
            $childLearning = new ChildLearning();
            $message = "Child Learning added successfully";
        } else {
            $title = "Update Child Learning";
            $childLearning = ChildLearning::findOrFail($id);
            $message = "Child Learning updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'heading'            => 'required|string|max:255|unique:child_learning_applications,heading,' . $id,
                'description'        => 'nullable|string',
                'image'              => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'app_image1'         => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'app_link1'          => 'nullable|string|max:255',
                'app_image2'         => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'app_link2'          => 'nullable|string|max:255',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Upload image
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/child_learning/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->resize(1419, 869)->encode(new WebpEncoder(quality: 70));
            $filename = uniqid() . '.webp';
            $img->save($imagePath . $filename);
            $data['image'] = $imagePath . $filename;
        }

            // Upload app_image1
            if ($request->hasFile('app_image1')) {
                $manager = new ImageManager(new Driver());
                $appImage1Path = 'assets/images/child_learning/';
                if (!is_dir($appImage1Path)) mkdir($appImage1Path, 0755, true);

                $appImage1 = $manager->read($request->file('app_image1'));
                $appImage1->resize(157, 53)->encode(new WebpEncoder(quality: 70));
            $filename = uniqid() . '.webp';
            $appImage1->save($appImage1Path . $filename);
            $data['app_image1'] = $appImage1Path . $filename;
        }

            // Upload app_image2
            if ($request->hasFile('app_image2')) {
                $manager = new ImageManager(new Driver());
                $appImage2Path = 'assets/images/child_learning/';
                if (!is_dir($appImage2Path)) mkdir($appImage2Path, 0755, true);

                $appImage2 = $manager->read($request->file('app_image2'));
                $appImage2->resize(157, 53)->encode(new WebpEncoder(quality: 70));
            $filename = uniqid() . '.webp';
            $appImage2->save($appImage2Path . $filename);
            $data['app_image2'] = $appImage2Path . $filename;
        }

            if ($id == null) {
                ChildLearning::create($data);
            } else {
                $childLearning->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.child_learning.create', compact('title', 'childLearning'));
    }
}
