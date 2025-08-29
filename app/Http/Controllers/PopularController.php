<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolCategory;
use App\Models\Popular;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class PopularController extends Controller
{
    // Display all categories
    public function AllPopular()
    {
        $title ="Popular For You";
        $populars = Popular::where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.popular.index', compact('title','populars'));
    }

    public function AddPopular(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add Popular";
            $popular = new Popular();
            $message = "Popular item added successfully";
        } else {
            $title = "Update Popular";
            $popular = Popular::find($id);
            $message = "Popular item updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title'          => 'required|string|max:255|unique:populars,title,' . $id,
                'url'            => 'required|string|max:255',
                'image'          => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'banner_image'   => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024',
                'banner_heading' => 'nullable|string|max:255',
                'description'    => 'nullable|string',
                'per_month_fee' => 'required',
                'annual_fee'    => 'required',
                'discount_fee'    => 'required',
            ];

            $customMessages = [
                'title.required' => 'The title is required.',
                'title.unique' => 'The title already exists.',
                'url.required' => 'The URL is required.',
                'image.required' => 'The image is required.',
                'annual_fee.required' => 'The annual fees is required.',
                'discount_fee.dis_fees.required' => 'The discount fees is required.',
                'per_month_fee.required' => 'The per month fees is required.',
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
                $image->resize(444, 562)->encode(new WebpEncoder(quality: 65));
                $filename = uniqid() . '.webp';
                $image->save($path . $filename);
                $data['image'] = $path . $filename;
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
            }

            // Save or update
            if ($id == "") {
                Popular::create($data);
            } else {
                $popular->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.popular.create', compact('title', 'popular'));
    }

     // Delete student
    public function destroy($id)
    {
        $popular = Popular::find($id);

        if (!$popular) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ]);
        }

        // Delete image if it exists
        if ($popular->image && File::exists(public_path($popular->image))) {
            File::delete(public_path($popular->image));
        }


        // Delete image if it exists
        if ($popular->banner_image && File::exists(public_path($popular->banner_image))) {
            File::delete(public_path($popular->banner_image));
        }


        $deleted = $popular->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Data deleted successfully' : 'Failed to delete data',
        ]);
    }


}
