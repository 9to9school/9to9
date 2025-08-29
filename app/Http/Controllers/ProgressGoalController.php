<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; 
use Intervention\Image\Encoders\WebpEncoder; 
use Illuminate\Support\Facades\Validator;
use App\Models\ProgressGoal;
class ProgressGoalController extends Controller
{
    public function index()
    {
        
         $progressGoals = ProgressGoal::all();
        return view('admin.progress_goals.index', compact('progressGoals'));
    }

    // Show create form
    public function create()
    {
        return view('admin.progress_goals.create');
    }

    // Store progress goal
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:active,inactive',
        ]);

        $goal = new ProgressGoal();
        $goal->title = $request->title;
        $goal->status = $request->status;
        $goal->description = $request->description;

        $manager = new ImageManager(new Driver());
        $path = 'assets/images/progress_goals/';

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        if ($request->hasFile('image')) {
            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->encode(new WebpEncoder(quality: 90));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $goal->image = $path . $filename;
        }

        $goal->save();

        return redirect()->route('progress-goals.index')->with('success', 'Progress goal added successfully.');
    }

    // Show edit form
    public function edit($id)
    {
        $goal = ProgressGoal::findOrFail($id);
        return view('admin.progress_goals.edit', compact('goal'));
    }

    // Update progress goal
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
        ]);

        $goal = ProgressGoal::findOrFail($id);
        $goal->title = $request->title;
        $goal->status = $request->status;
        $goal->description = $request->description;

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/progress_goals/';
            if (!is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->encode(new WebpEncoder(quality: 90));
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);
            $goal->image = $path . $filename;
        }

        $goal->save();

        return redirect()->route('progress-goals.index')->with('success', 'Progress goal updated successfully.');
    }

    // Delete progress goal
    public function destroy($id)
    {
        $goal = ProgressGoal::findOrFail($id);

        if ($goal->image && file_exists(public_path($goal->image))) {
            unlink($goal->image);
        }

        $goal->delete();

        return redirect()->route('progress-goals.index')->with('success', 'Progress goal deleted successfully.');
    }
}
