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
use App\Models\PackageService;

class PackageServiceController extends Controller
{
     public function index()
    {
        $services = PackageService::all();
        return view('admin.package_service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.package_service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'image'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'price'  => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $service = new PackageService();
        $service->name = $request->name;
        $service->price = $request->price;
        $service->status = $request->status;

        $manager = new ImageManager(new Driver());
        $path = 'assets/images/package_services/';
        if (!is_dir(public_path($path))) {
            mkdir(public_path($path), 0755, true);
        }

        if ($request->hasFile('image')) {
            $image = $manager->read($request->file('image'));
            $image->encode(new WebpEncoder(quality: 90));
            $filename = uniqid() . '.webp';
            $image->save(public_path($path . $filename));
            $service->image = $path . $filename;
        }

        $service->save();

        return redirect()->route('package-services.index')->with('success', 'Package Service added successfully.');
    }

    public function edit($id)
    {
        $service = PackageService::findOrFail($id);
        return view('admin.package_service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'price'  => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $service = PackageService::findOrFail($id);
        $service->name = $request->name;
        $service->price = $request->price;
        $service->status = $request->status;

        if ($request->hasFile('image')) {
            $manager = new ImageManager(new Driver());
            $path = 'assets/images/package_services/';
            if (!is_dir(public_path($path))) {
                mkdir(public_path($path), 0755, true);
            }

            $image = $manager->read($request->file('image'));
            $image->encode(new WebpEncoder(quality: 90));
            $filename = uniqid() . '.webp';
            $image->save(public_path($path . $filename));
            $service->image = $path . $filename;
        }

        $service->save();

        return redirect()->route('package-services.index')->with('success', 'Package Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = PackageService::findOrFail($id);

        if ($service->image && file_exists(public_path($service->image))) {
            unlink(public_path($service->image));
        }

        $service->delete();

        return redirect()->route('package-services.index')->with('success', 'Package Service deleted successfully.');
    }
}
