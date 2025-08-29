<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Webcontent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver; // Make sure you use the correct Driver
use Intervention\Image\Encoders\WebpEncoder; // If you are using WebP encoding
use Illuminate\Support\Facades\Validator;

class WebcontentController extends Controller
{
    public function index()
    {
      $webcontents = Webcontent::all(); 
    return view('admin.web-content.web-content-list', compact('webcontents'));
    }


    public function create()
    {
        return view('admin.web-content.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'heading'           => 'required|string|max:255',
        'title'           => 'required|string|max:255',
        'subheading'        => 'nullable|string|max:255',
        'description'       => 'nullable|string',
        'button_name'       => 'nullable|string|max:255',
        'button_link'       => 'nullable|url|max:255',
        'button_name2'      => 'nullable|string|max:255',
        'button_link2'      => 'nullable|url|max:255',
        'status'            => 'nullable|boolean',
        'image'             => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        'background_image'  => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
    ]);

    $webContent = new WebContent();
    $webContent->heading         = $request->heading;
    $webContent->title         = $request->title;
    $webContent->subheading      = $request->subheading;
    $webContent->description     = $request->description;
    $webContent->button_name     = $request->button_name;
    $webContent->button_link     = $request->button_link;
    $webContent->button_name2    = $request->button_name2;
    $webContent->button_link2    = $request->button_link2;
    $webContent->status          = $request->status ?? 1;

    $manager = new ImageManager(new Driver());
    $imagePath = public_path('assets/images/webcontent/');

    if (!is_dir($imagePath)) {
        mkdir($imagePath, 0755, true);
    }

    // Upload main image
    if ($request->hasFile('image')) {
        $uploadedImage = $request->file('image');
        $image = $manager->read($uploadedImage);
        $image->encode(new WebpEncoder(quality: 95));
        $filename = uniqid() . '_image.webp';
        $image->save($imagePath . $filename);
        $webContent->image = 'assets/images/webcontent/' . $filename;
    }

    // Upload background image
    if ($request->hasFile('background_image')) {
        $uploadedBg = $request->file('background_image');
        $bgImage = $manager->read($uploadedBg);
        $bgImage->encode(new WebpEncoder(quality: 95));
        $bgFilename = uniqid() . '_bg.webp';
        $bgImage->save($imagePath . $bgFilename);
        $webContent->background_image = 'assets/images/webcontent/' . $bgFilename;
    }

    $webContent->save();

    return redirect()->route('webcontent.list')->with('success', 'Web Content added successfully.');
}
}
