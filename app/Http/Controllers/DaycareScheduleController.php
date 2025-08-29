<?php

namespace App\Http\Controllers;

use App\Models\daycare_schedule;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding

class DaycareScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nav = 'daycareschedule';
        $data = daycare_schedule::all();
        return view('admin.daycare.schedule.index', compact('data', 'nav' ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nav = 'Createdaycareschedule';
        return view('admin.daycare.schedule.create' , compact( 'nav' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $post=$request->all();
//        echo '<pre>';print_r($post);exit;
        $request->validate([
            'heading'       => 'required|string|max:255',
            'timing'       => 'required|string|max:255',
            'description'   => 'nullable|string',
            'image'         => 'required|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
        ]);

        $data = new daycare_schedule();
        $data->heading = $request->heading;
        $data->timing = $request->timing;
        $data->description = $request->description;

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/daycare/schedule/');

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/daycare/schedule/';
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

        return redirect()->route('daycare.schedule.index')->with('success', 'Daycare  schedule added successfully.');
    }

    public function edit($id)
    {
        $data = daycare_schedule::findOrFail($id);
        return view('admin.daycare.schedule.create', compact('data'));
    }

    public function update(Request $request , $id)
    {
        $request->validate([
            'heading'       => 'required|string|max:255',
            'timing'   => 'nullable|string',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg,webp,gif|max:1000',
        ]);

        $data = daycare_schedule::findOrFail($id);
        $data->heading = $request->heading;
        $data->timing = $request->timing;
        $data->description = $request->description;

        $manager = new ImageManager(new Driver());
        $imagePath = public_path('assets/images/daycare/schedule/');

        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0755, true);
        }
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/daycare/schedule/';
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

        return redirect()->route('daycare.schedule.index')->with('success', 'daycare  schedule us added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function destroy($id)
    {
        $data = daycare_schedule::findOrFail($id);
        /*if ($webbanner->image) {
            Storage::disk('public')->delete($webbanner->image);
        }*/
        if (!empty($data->image) && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }
        $data->delete();

        return redirect()->route('daycare.schedule.index')->with('success', 'daycare  schedule deleted successfully.');
    }
}
