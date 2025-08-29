<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;use App\Models\WebBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding
use Illuminate\Support\Facades\Validator;
use App\Models\UspDetails;

class UspDetailsController extends Controller
{
    // Show Usp detali list
    public function index()
    {
        $uspdetails = UspDetails::all();
        return view('admin.uspdetails.usp-detail-list', compact('uspdetails'));
    }


    // Show Usp detali create form
    public function create()
    {
        return view('admin.uspdetails.create');
    }
    
    // Handle add logic
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'image'   => 'required|image|mimes:jpg,png,jpeg,gif,webp|max:2048',
            'description'   => 'required',
        ]);

        $data = new UspDetails();
        $data->heading = $request->heading;
        $data->description = $request->description;

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/uspdetails');

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images//uspdetails';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
//                $image->resize(1920, 640);
            $image->encode(new WebpEncoder(quality: 95));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data->image = $path . $filename;
        }
        $data->save();
        return redirect()->route('usp.detail.list')->with('success', 'Usp Detail added successfully.');
    }

    


    // Show the edit form for a USP detail
    public function edit($id)
    {
        $data = UspDetails::findOrFail($id);
        return view('admin.uspdetails.edit', compact('data'));
    }


    // Update USP Details
    public function update(Request $request, $id)
    {
        $request->validate([
         
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
             'status' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $uspdetails = UspDetails::findOrFail($id);

        $uspdetails->heading = $request->heading;
       $uspdetails->description = $request->description;
        $uspdetails->status = $request->status;
         // Update Image if new one is uploaded
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/webbanner/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
//                $image->resize(1920, 640);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $uspdetails->image = $path . $filename;
        }
        $uspdetails->save();

        return redirect()->route('usp.detail.list')->with('success', 'Usp Details updated successfully.');
    }


    public function destroy($id)
    {
        $data = UspDetails::findOrFail($id);
        if ($data->image) {
            Storage::disk('public')->delete($data->image);
        }
        $data->delete();
       return redirect()->route('usp.detail.list')->with('success', 'Usp Details deleted successfully.');
    }


}
