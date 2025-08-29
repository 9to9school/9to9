<?php

namespace App\Http\Controllers;

use App\Models\PreChildSafety;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding

class PreChildSafetyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = 'Presafety';
        $data = PreChildSafety::all();
        return view('admin.PreSchool.safety.index', compact('data', 'nav' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'Createsafety';
        return view('admin.PreSchool.safety.create' , compact( 'nav' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $request->validate([
            'heading'       => 'required|string|max:255',
            'color'   => 'nullable|string',
            'description'   => 'nullable|string',
            'image'         => 'required|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
        ]);

        $data = new PreChildSafety();
        $data->heading = $request->heading;
        $data->color = $request->color;
        $data->description = $request->description;
        
        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/preschool/safety/');

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/preschool/safety/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->resize(60, 60);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

        $data->save();

        return redirect()->route('pre.safety.index')->with('success', 'Pre Child Safety added successfully.');
    }

    public function edit($id)
    {
        $nav = 'Editsafety';
        $data = PreChildSafety::findOrFail($id);
        return view('admin.PreSchool.safety.create', compact('data', 'nav'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'heading'       => 'required|string|max:255',
            'description'   => 'nullable|string',
            'color'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
        ]);

        $data = PreChildSafety::findOrFail($id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->color = $request->color;

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/preschool/safety/');

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/preschool/safety/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->resize(60, 60);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

        $data->save();

        return redirect()->route('pre.safety.index')->with('success', 'Pre Child Safety added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $data = PreChildSafety::findOrFail($id);
        /*if ($webbanner->image) {
            Storage::disk('public')->delete($webbanner->image);
        }*/
        if (!empty($data->image) && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }
        $data->delete();

        return redirect()->route('pre.safety.index')->with('success', 'Pre Child Safety deleted successfully.');
    }
}
