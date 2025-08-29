<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WhyChooseUs;
use Illuminate\Support\Facades\File;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $records = WhyChooseUs::all();
        return view('whychooseus.index', compact('records'));
    }

    public function create()
    {
        return view('whychooseus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'box_heading1' => 'required|string|max:255',
            'box_content1' => 'required|string|max:255',
            'box_heading2' => 'required|string|max:255',
            'box_content2' => 'required|string|max:255',
            'box_heading3' => 'required|string|max:255',
            'box_content3' => 'required|string|max:255',
            'box_heading4' => 'required|string|max:255',
            'box_content4' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imgName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/whychooseus'), $imgName);
            $data['image'] = 'uploads/whychooseus/' . $imgName;
        }

        WhyChooseUs::create($data);

        return redirect()->route('whychooseus.index')->with('success', 'Record added successfully!');
    }

    public function edit($id)
    {
        $record = WhyChooseUs::findOrFail($id);
        return view('whychooseus.edit', compact('record'));
    }

    public function update(Request $request, $id)
    {
        $record = WhyChooseUs::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'box_heading1' => 'required|string|max:255',
            'box_content1' => 'required|string|max:255',
            'box_heading2' => 'required|string|max:255',
            'box_content2' => 'required|string|max:255',
            'box_heading3' => 'required|string|max:255',
            'box_content3' => 'required|string|max:255',
            'box_heading4' => 'required|string|max:255',
            'box_content4' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // delete old image
            if ($record->image && File::exists(public_path($record->image))) {
                File::delete(public_path($record->image));
            }

            $imgName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/whychooseus'), $imgName);
            $data['image'] = 'uploads/whychooseus/' . $imgName;
        }

        $record->update($data);

        return redirect()->route('whychooseus.index')->with('success', 'Record updated successfully!');
    }

    public function destroy($id)
    {
        $record = WhyChooseUs::findOrFail($id);
        if ($record->image && File::exists(public_path($record->image))) {
            File::delete(public_path($record->image));
        }
        $record->delete();
        return redirect()->route('whychooseus.index')->with('success', 'Record deleted successfully!');
    }
}
