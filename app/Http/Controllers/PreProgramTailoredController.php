<?php

namespace App\Http\Controllers;

use App\Models\PreProgramTailored;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding

class PreProgramTailoredController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = 'PreWhychoose';
        $data = PreProgramTailored::all();
        return view('admin.PreSchool.program.index', compact( 'data','nav' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'CreateWhychoose';
//        $data = PreProgramTailored::all();
        return view('admin.PreSchool.program.create' , compact( 'nav' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading'       => 'required|string|max:255',
            'description'   => 'required|string',
            'image'         => 'required|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
            'sub_heading'   => 'required|string|max:255',
            'key1'          => 'required|string|max:255',
            'key2'          => 'required|string|max:255',
            'key3'          => 'required|string|max:255',
            'key4'          => 'required|string|max:255',


        ]);

        $data = new PreProgramTailored();
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->sub_heading = $request->sub_heading;
        $data->key1 = $request->key1;
        $data->key2 = $request->key2;
        $data->key3 = $request->key3;
        $data->key4 = $request->key4;

        // Image upload

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/preschool/program/');
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/preschool/program/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->resize(422, 200);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

        $data->save();

        return redirect()->route('pre.program.index')->with('success', 'Pre Program Tailored added successfully.');
    }

    public function edit($id)
    {
        $data = PreProgramTailored::findOrFail($id);
        return view('admin.PreSchool.program.create', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'heading'       => 'required|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
            'sub_heading'   => 'required|string|max:255',
            'key1'          => 'required|string|max:255',
            'key2'          => 'required|string|max:255',
            'key3'          => 'required|string|max:255',
            'key4'          => 'required|string|max:255',
        ]);

//        $data = new PreProgramTailored();
        $data = PreProgramTailored::findOrFail($id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->sub_heading = $request->sub_heading;
        $data->key1 = $request->key1;
        $data->key2 = $request->key2;
        $data->key3 = $request->key3;
        $data->key4 = $request->key4;

        // Image upload
        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/preschool/program/');
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/preschool/program/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->resize(422, 200);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }

        $data->save();

        return redirect()->route('pre.program.index')->with('success', 'Pre Program Tailored added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $data = PreProgramTailored::findOrFail($id);
        /*if ($webbanner->image) {
            Storage::disk('public')->delete($webbanner->image);
        }*/
        if (!empty($data->image) && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }
        $data->delete();

        return redirect()->route('pre.program.index')->with('success', 'Pre Program Tailored deleted successfully.');
    }
}
