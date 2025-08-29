<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolCategory;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class SchoolCategoryController extends Controller
{
    // Display all categories
    public function AllSchoolCategory()
    {
        $title ="All School Category";
        $categories = SchoolCategory::latest()->get();
        return view('admin.school_categories.index', compact('title','categories'));
    }

    public function AddCategory(Request $request, $id = null)
    {
        if ($id == "") {
            $title = "Add Category";
            $category = new SchoolCategory();
            $message = "Category added successfully";
        } else {
            $title = "Update Category";
            $category = SchoolCategory::find($id);
            $message = "Category updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'category_name'     => 'required|string|max:255|unique:school_category,category_name,' . $id,
                'category_url'      => 'required|string|max:255',
                'image'             => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'banner_image'      => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024',
                'mobile_banner'     => 'nullable|image|mimes:jpeg,jpg,png,webp|max:1024', // if needed
                'meta_title'        => 'nullable|string|max:255',
                'meta_description'  => 'nullable|string|max:1000',
                'meta_keyword'      => 'nullable|string|max:1000',
                'content'           => 'nullable|string',
            ];

            $customMessages = [
                'category_name.required' => 'The category name is required.',
                'category_name.unique' => 'The category name already exists. Please choose a different name.',
                'category_url.required' => 'The category URL is required.',
                'image.required' => 'The category image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpeg, jpg, png, webp.',
                'image.max' => 'The image size must not exceed 2MB.',
                'banner_image.image' => 'The banner image must be an image.',
                'banner_image.mimes' => 'The banner must be a file of type: jpeg, jpg, png, webp.',
                'banner_image.max' => 'The banner image size must not exceed 1MB.',
            ];

            $validator = Validator::make($data, $rules, $customMessages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle category image upload
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $path = 'assets/images/category/';
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }

                $uploadedImage = $request->file('image');
                $image = $manager->read($uploadedImage);
                $image->resize(480, 320);
                $image->encode(new WebpEncoder(quality: 65));
                $filename = uniqid() . '.webp';
                $image->save($path . $filename);
                $data['image'] = $path . $filename;
            }

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                $manager = new ImageManager(new Driver());
                $path = 'assets/images/category/banner/';
                if (!is_dir($path)) {
                    mkdir($path, 0755, true);
                }

                $uploadedBanner = $request->file('banner_image');
                $banner = $manager->read($uploadedBanner);
                $banner->resize(1920, 1100);
                $banner->encode(new WebpEncoder(quality: 65));
                $filename = uniqid() . '.webp';
                $banner->save($path . $filename);
                $data['banner_image'] = $path . $filename;
            }

            // Save or update category
            if ($id == "") {
                SchoolCategory::create($data);
            } else {
                $category->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.school_categories.create', compact('title', 'category'));
    }
}
