<?php

namespace App\Http\Controllers;

use App\Models\PreExplore;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding

class PreExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = 'PreExplore';
        $data = PreExplore::all();
        return view('admin.PreSchool.explore.index', compact('data', 'nav' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'CreatePreExploret';
        $banners = PreExplore::all();
        return view('admin.PreSchool.explore.create' , compact( 'banners', 'nav' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'description' => 'required|string',
            'button_name' => 'required|string|max:100',
            'button_link' => 'required|url',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
        ]);

        $data = new PreExplore();
        $data->sub_heading = $request->sub_heading;
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->button_name = $request->button_name;
        $data->button_link = $request->button_link;

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/preschool/explore/');
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/preschool/explore/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->resize(660, 620);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

        $data->save();

        return redirect()->route('pre.explore.index')->with('success', 'Pre Explore added successfully.');
    }
    
    public function edit($id)
    {
        $data = PreExplore::findOrFail($id);
        return view('admin.PreSchool.explore.create', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'sub_heading' => 'required|string|max:255',
            'description' => 'required|string',
            'button_name' => 'required|string|max:100',
            'button_link' => 'required|url',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
        ]);
        $data = PreExplore::findOrFail($id);
        $data->heading = $request->heading;
        $data->sub_heading = $request->sub_heading;
        $data->description = $request->description;
        $data->button_name = $request->button_name;
        $data->button_link = $request->button_link;
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/preschool/explore/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->resize(660, 620);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data->image = $path . $filename;
        }
        $data->save();
        return redirect()->route('pre.explore.index')->with('success', 'Pre Explore updated successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $data = PreExplore::findOrFail($id);
        /*if ($webbanner->image) {
            Storage::disk('public')->delete($webbanner->image);
        }*/
        if (!empty($data->image) && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }
        $data->delete();

        return redirect()->route('pre.explore.index')->with('success', 'Pre Explore deleted successfully.');
    }
}
