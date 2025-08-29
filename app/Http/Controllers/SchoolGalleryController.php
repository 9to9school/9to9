<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolGallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class SchoolGalleryController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(){
        $gallerydatas = SchoolGallery::where('status','active')->where('type','school')->get();
        return view('school.appcontent.gallery.list',compact('gallerydatas'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
       return view('school.appcontent.gallery.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request){
    
        $request->validate([
            'status' => 'required', 
            'gallery_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',      
        ]);

        if ($request->hasFile('gallery_image')) {
            $file = $request->file('gallery_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/schooldetail/gallery/', $filename);
            $galleryimage = 'assets/images/schooldetail/gallery/' . $filename;
        }
    
        $gallery = new SchoolGallery();
        $gallery->school_id = Auth::id();
        $gallery->image = $galleryimage;
        $gallery->status = $request->status;
        $gallery->type = 'school';
        $gallery->save();

        if($gallery){
          return redirect()->route('school.gallery.list')->with('success', 'Gallery added successfully.');
        }else{
          return redirect()->route('school.gallery.list')->with('error', 'There was an issue adding the gallery.');
        }

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
    public function edit($id){
        $getdata = SchoolGallery::where('id',$id)->first();
       return view('school.appcontent.gallery.edit',compact('getdata'));        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request){
        $request->validate([
            'status' => 'required', 
            'gallery_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',      
        ]);

        $id = $request->id;
        $datafind = SchoolGallery::find($id);


        if($request->hasFile('gallery_image')) {
            $file = $request->file('gallery_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/schooldetail/gallery/', $filename);
            $galleryimage = 'assets/images/schooldetail/gallery/' . $filename;
        }else{
            $galleryimage = $datafind->image;
        }
      

        $datafind->school_id = Auth::id();
        $datafind->image = $galleryimage;
        $datafind->status = $request->status;
        $datafind->type = 'school';
        $datafind->save();

        if($datafind){
          return redirect()->route('school.gallery.list')->with('success', 'Gallery updated successfully.');
        }else{
          return redirect()->route('school.gallery.list')->with('error', 'There was an issue updating the gallery.');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $gallery = SchoolGallery::find($id);

        if (!$gallery) {
            return response()->json([
                'success' => false,
                'message' => 'Gallery not found',
            ]);
        }

        // Delete image if it exists
        if ($gallery->image && File::exists($gallery->image)) {
            File::delete($gallery->image);
        }

        $deleted = $gallery->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Gallery  deleted successfully' : 'Failed to delete gallery',
        ]);
    }
}
