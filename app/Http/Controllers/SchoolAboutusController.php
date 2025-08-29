<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolAboutus;

class SchoolAboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id = null)
    {  
        $data = SchoolAboutus::where('school_id', $id)->first();
        return view('school.appcontent.aboutus.aboutus', compact('data'));
    }

    /**SchoolAboutus
     * Update the specified resource in storage.
     */
     public function update(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $id = $request->id;

        if ($id) {
            $about = SchoolAboutus::find($id);
        } else {
            $about = new SchoolAboutus();
        }
        $plainText = strip_tags($request->description);
        $about->school_id = Auth::id(); // You might want to use school_id from request instead
        $about->description = $plainText;
        $about->type = 'school';
        $save = $about->save();

        if ($save) {
            return redirect()->route('school.about-us.edit', $about->school_id)
                ->with('success', 'About us content updated successfully.');
        } else {
            return redirect()->route('school.about-us.edit', $about->school_id)
                ->with('error', 'There was an issue updating the About us content.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
