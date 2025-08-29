<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Popular;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\File;

class TopicController extends Controller
{
    public function index()
    {
        $topics = Topic::all();
        return view('admin.topic.topic-list', compact('topics'));
    }

    // Show form to create a new USP
    public function create()
    {
         $populars = Popular::where('status', 1)->get();
        return view('admin.topic.create',compact('populars'));
    }

    // Store a new USP
    public function store(Request $request)
{
    $request->validate([
        'topic_name' => 'required|string|max:255',
        'popular_id' => 'required|string|max:255',
        // 'description' => 'nullable|string',
        // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $topic = new Topic();
    $topic->topic_name = $request->topic_name;
    $topic->age = $request->popular_id;
    // $topic->description = $request->description;

    // $manager = new ImageManager(new Driver());
    //     $imagePath = public_path('assets/images/topic/');

    //     if (!is_dir($imagePath)) {
    //         mkdir($imagePath, 0755, true);
    //     }
    //     if ($request->hasFile('image')) {
    //         $manager = new ImageManager(new Driver());
    //         $path = 'assets/images/topic/';
    //         if (!is_dir($path)) {
    //             mkdir($path, 0755, true);
    //         }
    //         $uploadedImage = $request->file('image');
    //         $image = $manager->read($uploadedImage);
    //         // $image->resize(60, 60);
    //         $image->encode(new WebpEncoder(quality: 65));
    //         $filename = uniqid() . '.webp';
    //         $image->save($path . $filename);
    //         $topic->image = $path . $filename;
    //     }

    $topic->save();

    return redirect()->route('topic.list')->with('success', 'Topic created successfully.');
}

    // Show the edit form for a USP
    public function edit($id)
    {
        $populars = Popular::where('status', 1)->get();
        $topic = Topic::findOrFail($id);
        return view('admin.topic.edit', compact('topic','populars'));
    }


public function update(Request $request, $id)
{
    $request->validate([
        'topic_name' => 'required|string|max:255',
         'popular_id' => 'required|string|max:255',
        // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // 'status' => 'nullable|in:0,1',
    ]);

    $topic = Topic::findOrFail($id);
    $topic->topic_name = $request->topic_name;
    $topic->age = $request->popular_id;
    $topic->status = 1;
    
    //   $manager = new ImageManager(new Driver());
    //     $imagePath = public_path('assets/images/topic/');

    //  if ($request->hasFile('image')) {
    //         $manager = new ImageManager(new Driver());
    //         $path = 'assets/images/topic/';
    //         if (!is_dir($path)) {
    //             mkdir($path, 0755, true);
    //         }
    //         $uploadedImage = $request->file('image');
    //         $image = $manager->read($uploadedImage);
    //         // $image->resize(60, 60);
    //         $image->encode(new WebpEncoder(quality: 65));
    //         $filename = uniqid() . '.webp';
    //         $image->save($path . $filename);
    //         $topic->image = $path . $filename;
    //     }


    $topic->save();

    return redirect()->route('topic.list')->with('success', 'Topic updated successfully.');
}


    // Delete USP
    public function destroy($id)
    {
        $topic = Topic::findOrFail($id);
       
        $topic->delete();

        return redirect()->route('topic.list')->with('success', 'Topic deleted successfully.');
    }

}
