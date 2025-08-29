<?php

namespace App\Http\Controllers;

use App\Models\daycare_activites;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding

class DaycareActivitesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = 'Preactivites';
        $data = daycare_activites::all();
        return view('admin.daycare.activites.index', compact('data', 'nav' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'Createactivites';

        return view('admin.daycare.activites.create' , compact( 'nav' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $request->validate([
            'heading'       => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'required|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
        ]);

        $data = new daycare_activites();
        $data->heading = $request->heading;
        $data->description = $request->description;

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/daycare/activites/');

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/daycare/activites/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            // $image->resize(60, 60);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

        $data->save();

        return redirect()->route('daycare.activites.index')->with('success', 'Pre Child activites added successfully.');
    }

    public function edit($id)
    {
        $data = daycare_activites::findOrFail($id);
        return view('admin.daycare.activites.create', compact('data'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'heading'       => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
        ]);

        $data = daycare_activites::findOrFail($id);
        $data->heading = $request->heading;
        $data->description = $request->description;

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/daycare/activites/');

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/daycare/activites/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            // $image->resize(60, 60);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

        $data->save();

        return redirect()->route('daycare.activites.index')->with('success', 'Pre Child activites added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $data = daycare_activites::findOrFail($id);
        /*if ($webbanner->image) {
            Storage::disk('public')->delete($webbanner->image);
        }*/
        if (!empty($data->image) && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }
        $data->delete();

        return redirect()->route('daycare.activites.index')->with('success', 'Pre Child activites deleted successfully.');
    }
}
