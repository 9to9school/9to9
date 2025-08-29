<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.banner-list', compact('banners'));
    }

    // Show form to create a new USP
    public function create()
    {
        return view('admin.banner.create');
    }

    // Store a new USP
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'button_name' => 'required|string|max:100',
            'button_link' => 'required|url',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $banner = new Banner();
        $banner->heading = $request->heading;
        $banner->description = $request->description;
        $banner->button_name = $request->button_name;
        $banner->button_link = $request->button_link;

        if ($request->hasFile('image')) {
            $banner->image = ImageHelper::uploadImage($request->file('image'), 'banners');
        }
        $banner->save();

        return redirect()->route('banner.list')->with('success', 'Banner added successfully.');
    }

    // Show the edit form for a USP
    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banner'));
    }

    // Update USP
    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'button_name' => 'nullable|string|max:100',
            'button_link' => 'nullable|url',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $banner = Banner::findOrFail($id);
        $banner->heading = $request->heading;
        $banner->description = $request->description;
        $banner->button_name = $request->button_name;
        $banner->button_link = $request->button_link;
        $banner->status = $request->status;

        if ($request->hasFile('image')) {
            // Delete Old Image
            if ($banner->image && File::exists(public_path($banner->image))) {
                File::delete(public_path($banner->image));
            }

            // Upload New Image Using Helper
            $banner->image = ImageHelper::uploadImage($request->file('image'), 'banners');
        }


        $banner->save();

        return redirect()->route('banner.list')->with('success', 'Banner updated successfully.');
    }

    // Delete USP
    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }
        $banner->delete();

        return redirect()->route('banner.list')->with('success', 'Banner deleted successfully.');
    }

}
