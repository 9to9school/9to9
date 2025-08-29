<?php
// app/Http/Controllers/GalleryController.php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    // Show list
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }
    
    // show Add form
    public function create()
    {
        return view('admin.gallery.create');
    }
    
    // Handle Add request logic
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'media_type' => 'required|in:image,video',
            'image' => 'required_if:media_type,image|mimes:jpeg,png,jpg,svg,webp|max:4096',
            'video' => 'required_if:media_type,video|mimes:mp4,avi,mov|max:10240', // 10MB
            'heading' => 'required',
        ]);

        // Base data
        $data = [
            'media_type' => $request->media_type,
            'heading' => $request->heading,
            'image' => null,
            'video' => null,
            'type' => $request->media_type

        ];

        // Handle image upload
        if ($request->media_type === 'image' && $request->hasFile('image')) {
            $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $path = 'assets/images/gallery/';
            
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->encode(new \Intervention\Image\Encoders\WebpEncoder(quality: 65));
            
            $filename = uniqid() . '.webp';
            $image->save($path . $filename);

            $data['image'] = 'assets/images/gallery/' . $filename;
        }

        // Handle video upload
        if ($request->media_type === 'video' && $request->hasFile('video')) {
            $videoPath = 'assets/videos/gallery/';
            
            if (!file_exists($videoPath)) {
                mkdir($videoPath, 0755, true);
            }

            $uploadedVideo = $request->file('video');
            $videoFilename = uniqid() . '.' . $uploadedVideo->getClientOriginalExtension();
            $uploadedVideo->move($videoPath, $videoFilename);

            $data['video'] = 'assets/videos/gallery/' . $videoFilename;
        }

        // Save to database
        \App\Models\Gallery::create($data);

        // Redirect back with success
        return redirect(url('admin/gallery'))->with('success', 'Gallery added successfully.');
    }
    
    //Show edit Form
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }
   
    // Update data
    public function update(Request $request)
    {
        $id = $request->id;

        // Find the gallery record
        $gallery = Gallery::findOrFail($id);

        // Prepare base data
        $data = [
            'heading' => $request->heading,
            'media_type' => $request->media_type,
            'image' => $gallery->image,
            'video' => $gallery->video,
        ];

        // If media_type is image and new image uploaded
        if ($request->media_type === 'image' && $request->hasFile('image')) {
            $manager = new \Intervention\Image\ImageManager(new \Intervention\Image\Drivers\Gd\Driver());
            $path = 'assets/images/gallery/';

            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $uploadedImage = $request->file('image');
            $image = $manager->read($uploadedImage);
            $image->encode(new \Intervention\Image\Encoders\WebpEncoder(quality: 65));

            $filename = uniqid() . '.webp';
            $image->save($path . $filename);

            // Optional: delete old image file
            // if ($gallery->image && file_exists(public_path($gallery->image))) {
            //     unlink(public_path($gallery->image));
            // }

            $data['image'] = 'assets/images/gallery/' . $filename;
            $data['video'] = null;  // Clear video when image is uploaded
        }

        // If media_type is video and new video uploaded
        if ($request->media_type === 'video' && $request->hasFile('video')){
            $videoPath = 'assets/videos/gallery/';

            if (!file_exists($videoPath)) {
                mkdir($videoPath, 0755, true);
            }

            $uploadedVideo = $request->file('video');
            $videoFilename = uniqid() . '.' . $uploadedVideo->getClientOriginalExtension();
            $uploadedVideo->move($videoPath, $videoFilename);

            // Optional: delete old video file
            // if ($gallery->video && file_exists(public_path($gallery->video))) {
            //     unlink(public_path($gallery->video));
            // }

            $data['video'] = 'assets/videos/gallery/' . $videoFilename;
            $data['image'] = null;  // Clear image when video is uploaded
        }

        // Update the gallery record
        $gallery->update($data);

        return redirect(url('admin/gallery'))->with('success', 'Gallery updated successfully.');
    }


    public function destroy($id)
    {
        $data = Gallery::findOrFail($id);

        if (!empty($data->image) && file_exists(public_path($data->image))) {
            unlink(public_path($data->image));
        }

        $data->delete();

        return redirect(url('admin/gallery'))->with('success', 'Gallery deleted successfully.');
    }
}
