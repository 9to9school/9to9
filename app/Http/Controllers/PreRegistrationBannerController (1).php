<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\PreRegistrationBanner;
use Illuminate\Support\Facades\Storage;


class PreRegistrationBannerController extends Controller
{
    public function index()
    {
        $banners = PreRegistrationBanner::all();
        return view('admin.pre-registeration-banner.list', compact('banners'));
    }

    public function create()
    {
        return view('admin.pre-registeration-banner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'status' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/preregistration/banner/', $filename);
            $imagePath = 'assets/images/preregistration/banner/' . $filename;
        }

        PreRegistrationBanner::create([
            'heading' => $request->heading,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('pre.banner.list')->with('success', 'Pre-registration banner added successfully.');
    }

    public function edit($id)
    {
        $getdata = PreRegistrationBanner::findOrFail($id);
        return view('admin.pre-registeration-banner.edit', compact('getdata'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:pre_registration_banners,id',
            'heading' => 'required|string|max:255',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $banner = PreRegistrationBanner::findOrFail($request->id);

        if ($request->hasFile('banner_image')) {
            if ($banner->image && File::exists($banner->image)) {
                File::delete($banner->image);
            }
            $file = $request->file('banner_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/preregistration/banner/', $filename);
            $banner->image = 'assets/images/preregistration/banner/' . $filename;
        }
        $banner->heading = $request->heading;
        $banner->status = $request->status;
        $banner->save();

        return redirect()->route('pre.banner.list')->with('success', 'Pre-registration banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = PreRegistrationBanner::findOrFail($id);

        if ($banner->image && File::exists($banner->image)) {
            File::delete($banner->image);
        }

        $banner->delete();

        return response()->json([
            'success' => true,
            'message' => 'Banner deleted successfully',
        ]);
    }
}
