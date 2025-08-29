<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usp;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
// use File;
class USPController extends Controller
{
    public function index()
    {
        $usps = Usp::all();
        //return $usps;
        return view('admin.usp.usp-list', compact('usps'));
    }

    // Show form to create a new USP
    public function create()
    {
        return view('admin.usp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'button_name' => 'required|string|max:100'
        ]);

        $usp = new Usp();
        $usp->heading = $request->heading;
        $usp->description = $request->description;
        $usp->button_name = $request->button_name;
        $usp->button_link = $request->button_link;

       if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/app/usp'), $filename);
            $usp->image = 'uploads/app/usp/'.$filename;
        }
        
        $usp->save();

        return redirect()->route('usp.list')->with('success', 'USP added successfully.');
    }


    // Store a new USP
//    public function store(Request $request)
//    {
//        $request->validate([
//            'heading' => 'required|string|max:255',
//            'description' => 'required|string',
//            'button_name' => 'required|string|max:100',
//            'button_link' => 'required|url',
//            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
//        ]);
//
//        $usp = new Usp();
//        $usp->heading = $request->heading;
//        $usp->description = $request->description;
//        $usp->button_name = $request->button_name;
//        $usp->button_link = $request->button_link;
//
//        if ($request->hasFile('image')) {
//
//            $file = $request->file('image');
//            $filename = time().'_'.$file->getClientOriginalName();
//
//            // Move file to public/uploads/usps
//            $file->move(public_path('storage/usps'), $filename);
//
//            // Save path in DB like: uploads/usps/filename.jpg
//            $usp->image = 'storage/usps/' . $filename;
//        }
//
//
//        $usp->save();
//
//        return redirect()->route('usp.list')->with('success', 'USP added successfully.');
//    }

    // Show the edit form for a USP
    public function edit($id)
    {
        $usp = Usp::findOrFail($id);
        return view('admin.usp.edit', compact('usp'));
    }

    // Update USP
    public function update(Request $request, $id)
    {

        $usp = Usp::findOrFail($id);
        // print_r($usp);die;
        $usp->heading = $request->heading;
        $usp->description = $request->description;
        $usp->button_name = $request->button_name;
        $usp->button_link = $request->button_link;
        $usp->status = $request->status;

      if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/app/usp'), $filename);
            $usp->image = 'uploads/app/usp/'.$filename;
        }
        



        $usp->save();

        return redirect()->route('usp.list')->with('success', 'USP updated successfully.');
    }

    // Delete USP
    public function destroy($id)
    {
        $usp = Usp::findOrFail($id);
        if ($usp->image) {
            Storage::disk('public')->delete($usp->image);
        }
        $usp->delete();

        return redirect()->route('admin.usp.list')->with('success', 'USP deleted successfully.');
    }
}
