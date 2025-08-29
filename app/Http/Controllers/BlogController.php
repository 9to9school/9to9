<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.Blog.blog-list', compact('blogs'));
    }

    public function addBlog(Request $request, $id = null)
    {
        if ($id === null) {
            $title = "Add Blog";
            $blog = new Blog();
            $message = "Blog has been created successfully!";
        } else {
            $title = "Edit Blog";
            $blog = Blog::findOrFail($id);
            $message = "Blog has been updated successfully!";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'heading' => 'required|string|max:255',
                'image' => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description' => 'nullable|string',
                'button_name' => 'nullable|string|max:255',
                'short_summary' => 'nullable|string',
                'meta_type' => 'required|in:title,description,keywords',
            ];

            $validator = Validator::make($data, $rules);

            $slug = Str::slug($request->heading);
            $originalSlug = $slug;
            $counter = 1;
            while (Blog::where('button_link', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            $data['button_link'] = $slug;
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Upload image
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/blogs/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->resize(378, 280)->encode(new WebpEncoder(quality: 70));
                $filename = uniqid() . '.webp';
                $img->save($imagePath . $filename);
                $data['image'] = $imagePath . $filename;
            }

            if ($id === null) {
                Blog::create($data);
            } else {
                $blog->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.Blog.create', compact('title', 'blog'));
    }

    // Delete USP
//    public function destroy($id)
//    {
//        $blog = Blog::findOrFail($id);
//        if ($blog->image) {
//            Storage::disk('public')->delete($blog->image);
//        }
//        $blog->delete();
//
//        return redirect()->route('blog.list')->with('success', 'Blog deleted successfully.');
//    }
}
