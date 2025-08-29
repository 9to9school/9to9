<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    public function AllTestimonial()
    {
        $title ="All Testimonial";
        $testimonials = Testimonial::latest()->get();
        return view('admin.testimonials.index', compact('title','testimonials'));
    }

    public function AddTestimonial(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add Testimonial";
            $testimonial = new Testimonial();
            $message = "Testimonial added successfully";
        } else {
            $title = "Update Testimonial";
            $testimonial = Testimonial::find($id);
            $message = "Testimonial updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name'         => 'required|string|max:255|unique:testimonials,name,' . $id,
                'image'        => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description'  => 'nullable|string',
            ];

            $customMessages = [
                'name.required' => 'The Testimonial name is required.',
                'name.unique'   => 'The Testimonial name already exists. Please choose a different name.',
                'image.required' => 'The Testimonial image is required.',
                'image.image'    => 'The file must be an image.',
                'image.mimes'    => 'The image must be a file of type: jpeg, jpg, png, webp.',
                'image.max'      => 'The image size must not exceed 2MB.',
            ];

            $validator = Validator::make($data, $rules, $customMessages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $path = 'assets/images/Testimonial/';
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }

                $uploadedImage = $request->file('image');
                $image = $manager->read($uploadedImage);
                $image->resize(100, 100);
                $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

            // Save or update testimonial
            if ($id == "") {
                Testimonial::create($data);
            } else {
                $testimonial->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.testimonials.create', compact('title', 'testimonial'));
    }


    public function show(Testimonial $testimonial)
    {
        return response()->json($testimonial);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $testimonial->update($request->all());

        return response()->json($testimonial);
    }

    // public function destroy(Testimonial $testimonial)
    // {
    //     $testimonial->delete();

    //     return response()->json(null, 204);
    // }


     // Delete data
    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ]);
        }

        // Delete image if it exists
        if ($testimonial->image && File::exists(public_path($testimonial->image))) {
            File::delete(public_path($testimonial->image));
        }


        $deleted = $testimonial->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Data deleted successfully' : 'Failed to delete data',
        ]);
    }
}
