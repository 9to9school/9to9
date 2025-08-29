<?php
// app/Http/Controllers/ChildSafetyController.php

namespace App\Http\Controllers;

use App\Models\ChildSafety;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChildSafetyController extends Controller
{
    public function index()
    {
        $safeties = ChildSafety::latest()->get();
        return view('childsafety.index', compact('safeties'));
    }

    public function create()
    {
        return view('childsafety.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->only(['title', 'description', 'status']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/childsafety'), $filename);
            $data['image'] = 'uploads/childsafety/'.$filename;
        }

        ChildSafety::create($data);

        return redirect()->route('childsafety.index')->with('success', 'Child Safety added successfully.');
    }

    public function edit($id)
    {
        $safety = ChildSafety::findOrFail($id);
        return view('childsafety.edit', compact('safety'));
    }

    public function update(Request $request, $id)
    {
        $safety = ChildSafety::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $data = $request->only(['title', 'description', 'status']);

        if ($request->hasFile('image')) {
            if ($safety->image && File::exists(public_path($safety->image))) {
                File::delete(public_path($safety->image));
            }

            $image = $request->file('image');
            $filename = time().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads/childsafety'), $filename);
            $data['image'] = 'uploads/childsafety/'.$filename;
        }

        $safety->update($data);

        return redirect()->route('childsafety.index')->with('success', 'Child Safety updated.');
    }

    public function destroy($id)
    {
        $safety = ChildSafety::findOrFail($id);

        if ($safety->image && File::exists(public_path($safety->image))) {
            File::delete(public_path($safety->image));
        }

        $safety->delete();
        return redirect()->route('childsafety.index')->with('success', 'Child Safety deleted.');
    }
}
