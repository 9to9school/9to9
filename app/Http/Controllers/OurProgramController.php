<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OurProgram;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OurProgramController extends Controller
{
    public function index()
    {
        $data = OurProgram::latest()->get();
        return view('admin.our_programs.index', compact('data'));
    }

    public function create()
    {
        return view('admin.our_programs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading'            => 'required|string|max:255',
            'short_description'  => 'nullable|string',
            'long_description'   => 'nullable|string',
            'image'              => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'time_from'          => 'required',
            'time_to'            => 'required',
            'fees'               => 'required|numeric',
            'week'               => 'nullable|string|max:100',
            'student'            => 'nullable|integer',
            'age_group'          => 'nullable|string|max:100',
            'status'             => 'required|boolean',
            'high_lights'        => 'required|array',
            'tags'               => 'required|array',
            
        ]);

        $program = new OurProgram();
        $program->fill($request->except('image'));

        // Handle image
        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/our_programs/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->encode(new WebpEncoder(quality: 75));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);

            $program->image = $path . $filename;
        }
        $program->high_lights = json_encode($request->high_lights);
        $program->tags = json_encode($request->tags);

        $program->save();

        return redirect()->route('our-program.list')->with('success', 'Program added successfully.');
    }

    public function edit($id)
    {
        $program = OurProgram::findOrFail($id);
        return view('admin.our_programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'heading'            => 'required|string|max:255',
            'short_description'  => 'nullable|string',
            'long_description'   => 'nullable|string',
            'image'              => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'time_from'          => 'required',
            'time_to'            => 'required',
            'fees'               => 'required|numeric',
            'week'               => 'nullable|string|max:100',
            'student'            => 'nullable|integer',
            'age_group'          => 'nullable|string|max:100',
            'status'             => 'required|boolean',
            'high_lights'        => 'required|array',
            'tags'               => 'required|array',
        ]);

        $program = OurProgram::findOrFail($id);
        $program->fill($request->except('image'));

        // Handle new image
        if ($request->hasFile('image')) {
            // Delete old image
            if ($program->image && file_exists(public_path($program->image))) {
                unlink($program->image);
            }

            $manager = new ImageManager(new Driver());
            $path = 'assets/images/our_programs/';
            if (!is_dir(public_path($path))) {
                mkdir($path, 0755, true);
            }

            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->encode(new WebpEncoder(quality: 75));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);

            $program->image = $path . $filename;
        }

        $program->high_lights = json_encode($request->high_lights);
        $program->tags = json_encode($request->tags);
        $program->save();

        return redirect()->route('our-program.list')->with('success', 'Program updated successfully.');
    }

    public function destroy($id)
    {
        $program = OurProgram::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Program not found',
            ]);
        }

        // Optional: delete the image file
        if ($program->image && File::exists(public_path($program->image))) {
            File::delete(public_path($program->image));
        }

        $deleted = $program->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Program deleted successfully' : 'Failed to delete program',
        ]);
    }
}
