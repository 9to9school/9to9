<?php

namespace App\Http\Controllers;

use App\Models\PreWhychoose;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding

class PreWhychooseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = 'PreWhychoose';
        $data = PreWhychoose::all();
        return view('admin.PreSchool.whychoose.index', compact('data', 'nav' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'CreateWhychoose';
        $data = PreWhychoose::all();
        return view('admin.PreSchool.whychoose.create' , compact( 'data', 'nav' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
            'title' => 'required|string|max:255',
            'paragraph' => 'required|string',
            'title2' => 'required|string|max:255',
            'paragraph2' => 'required|string',
            'title3' => 'required|string|max:255',
            'paragraph3' => 'required|string',
            'title4' => 'required|string|max:255',
            'paragraph4' => 'required|string',


        ]);

        $data = new PreWhychoose();
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->title = $request->title;
        $data->paragraph = $request->paragraph;
        $data->title2 = $request->title2;
        $data->paragraph2 = $request->paragraph2;
        $data->title3 = $request->title3;
        $data->paragraph3 = $request->paragraph3;
        $data->title4 = $request->title4;
        $data->paragraph4 = $request->paragraph4;


        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/preschool/whychoose/');
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/preschool/whychoose/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->resize(558, 805);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data['image'] = $path . $filename;
        }


        $data->save();

        return redirect()->route('pre.choose.index')->with('success', 'Pre Why Choose Us added successfully.');
    }
    public function edit($id)
    {
        $data = PreWhychoose::findOrFail($id);
        return view('admin.PreSchool.whychoose.create', compact('data'));
    }
    public function update(Request $request , $id)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
            'title' => 'required|string|max:255',
            'paragraph' => 'required|string',
            'title2' => 'required|string|max:255',
            'paragraph2' => 'required|string',
            'title3' => 'required|string|max:255',
            'paragraph3' => 'required|string',
            'title4' => 'required|string|max:255',
            'paragraph4' => 'required|string',


        ]);
        $data = PreWhychoose::findOrFail($id);
        $data->heading = $request->heading;
        $data->description = $request->description;
        $data->title = $request->title;
        $data->paragraph = $request->paragraph;
        $data->title2 = $request->title2;
        $data->paragraph2 = $request->paragraph2;
        $data->title3 = $request->title3;
        $data->paragraph3 = $request->paragraph3;
        $data->title4 = $request->title4;
        $data->paragraph4 = $request->paragraph4;

        // Image upload
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/preschool/whychoose/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
//            $image->resize(425, 672);
            $image->encode(new WebpEncoder(quality: 65));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $data->image = $path . $filename;
        }

        $data->save();

        return redirect()->route('pre.choose.index')->with('success', 'Pre Why Choose Us added successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $data = PreWhychoose::findOrFail($id);
        /*if ($webbanner->image) {
            Storage::disk('public')->delete($webbanner->image);
        }*/
        if (!empty($data->image) && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }
        $data->delete();

        return redirect()->route('pre.choose.index')->with('success', 'Pre Why Choose Us deleted successfully.');
    }
}
