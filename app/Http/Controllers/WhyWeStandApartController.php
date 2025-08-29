<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyWeStandApart;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class WhyWeStandApartController extends Controller
{
    // Display all categories
    public function AllWhyWeStandApart()
    {
        $standApart = WhyWeStandApart::latest()->get();
        return view('admin.WhyWeStandApart.index', compact('standApart'));
    }


    public function AddWhyWeStandApart(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add WhyWeStandApart";
            $standApart = new WhyWeStandApart();
            $message = "WhyWeStandApart item added successfully";
        } else {
            $title = "Update WhyWeStandApart";
            $standApart = WhyWeStandApart::findOrFail($id); // Use findOrFail for better error handling
            $message = "WhyWeStandApart item updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title'          => 'required|string|max:255|unique:why_we_stand_aparts,title,' . $id,
                'url'            => 'required|string|max:255',
                'image'          => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'banner_image'   => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024',
                'banner_heading' => 'nullable|string|max:255',
                'description'    => 'nullable|string',
            ];

            $customMessages = [
                'title.required' => 'The title is required.',
                'title.unique'   => 'The title already exists.',
                'url.required'   => 'The URL is required.',
                'image.required' => 'The image is required.',
            ];

            $validator = Validator::make($data, $rules, $customMessages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $path = 'assets/images/popular/';
                if (!is_dir($path)) mkdir($path, 0755, true);

                $image = $manager->read($request->file('image'));
                $image->resize(358, 471)->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;

            // Optionally delete old image when updating
            if ($id && $standApart->image && file_exists($standApart->image)) {
                unlink($standApart->image);
            }
        }

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                $manager = new ImageManager(new Driver());
                $path = 'assets/images/popular/banner/';
                if (!is_dir($path)) mkdir($path, 0755, true);

                $banner = $manager->read($request->file('banner_image'));
                $banner->resize(1920, 1100)->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $banner->save($path . $filename);
            $data['banner_image'] = $path . $filename;

            // Optionally delete old banner image when updating
            if ($id && $standApart->banner_image && file_exists($standApart->banner_image)) {
                unlink($standApart->banner_image);
            }
        }
            // Save or update
            if ($id == "") {
                WhyWeStandApart::create($data);
            } else {
                $standApart->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.WhyWeStandApart.create', compact('title', 'standApart'));
    }


     // Delete data
    public function destroy($id)
    {
        $standApart = WhyWeStandApart::find($id);

        if (!$standApart) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ]);
        }

        // Delete image if it exists
        if ($standApart->image && File::exists(public_path($standApart->image))) {
            File::delete(public_path($standApart->image));
        }


        // Delete image if it exists
        if ($standApart->banner_image && File::exists(public_path($standApart->banner_image))) {
            File::delete(public_path($standApart->banner_image));
        }


        $deleted = $standApart->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Data deleted successfully' : 'Failed to delete data',
        ]);
    }
}
