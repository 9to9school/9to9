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
use App\Models\EventPackage;
use App\Models\PackageService;

class EventPackageController extends Controller
{
     public function index()
    {
       $packages = EventPackage::all();
    $allServices = \App\Models\PackageService::pluck('name', 'id'); // id => name
    return view('admin.event_package.index', compact('packages', 'allServices'));
    }

    public function create()
    {
       $packageServices = PackageService::where('status', 'active')->get();

    // Pass the variable to the view
    return view('admin.event_package.create', compact('packageServices'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'package_services' => 'required|array',
            'status' => 'required|in:active,inactive',
        ]);

        $package = new EventPackage();
        $package->title = $request->title;
        $package->description = $request->description;
        $package->price = $request->price;
        $package->status = $request->status;
       $package->package_services = json_encode($request->package_services);
        $package->save();

        return redirect()->route('event-packages.index')->with('success', 'Event Package created successfully.');
    }

   public function edit($id)
{
    $package = EventPackage::findOrFail($id);
    $packageServices = PackageService::where('status', 'active')->get(); // renamed to match blade variable
    return view('admin.event_package.edit', compact('package', 'packageServices'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'package_services' => 'required|array',
            'status' => 'required|in:active,inactive',
        ]);

        $package = EventPackage::findOrFail($id);
        $package->title = $request->title;
        $package->description = $request->description;
        $package->price = $request->price;
        $package->status = $request->status;
        $package->package_services = implode(',', $request->package_services);
        $package->save();

        return redirect()->route('event-packages.index')->with('success', 'Event Package updated successfully.');
    }
public function destroy($id)
{
    $package = EventPackage::findOrFail($id);
    $package->delete();

    return redirect()->route('event-packages.index')->with('success', 'Event package deleted successfully.');
}


}
