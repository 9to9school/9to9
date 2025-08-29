<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SchoolBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class SchoolBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $banners = SchoolBanner::where('status','active')->where('type','school')->get();
        return view('school.appcontent.banner.list',compact('banners'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
       return view('school.appcontent.banner.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request){
    
        $request->validate([
            'status' => 'required', 
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',      
        ]);

        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/schooldetail/banner/', $filename);
            $bannerimage = 'assets/images/schooldetail/banner/' . $filename;
        }

        $banner = new SchoolBanner();
        $banner->school_id = Auth::id();
        $banner->image = $bannerimage;
        $banner->status = $request->status;
        $banner->type = 'school';
        $banner->save();

        if($banner){
          return redirect()->route('school.banner.list')->with('success', 'Banner added successfully.');
        }else{
          return redirect()->route('school.banner.list')->with('error', 'There was an issue adding the Banner.');
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
        $getdata = SchoolBanner::where('id',$id)->first();
       return view('school.appcontent.banner.edit',compact('getdata'));        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request){
        $request->validate([
            'status' => 'required', 
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',      
        ]);

        $id = $request->id;
        $datafind = SchoolBanner::find($id);


        if ($request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/schooldetail/banner/', $filename);
            $bannerimage = 'assets/images/schooldetail/banner/' . $filename;
        }else{
            $bannerimage = $datafind->image;
        }
      
        $datafind->school_id = Auth::id();
        $datafind->image = $bannerimage;
        $datafind->type = 'school';
        $datafind->status = $request->status;

        $datafind->save();

        if($datafind){
          return redirect()->route('school.banner.list')->with('success', 'Banner updated successfully.');
        }else{
          return redirect()->route('school.banner.list')->with('error', 'There was an issue updating the Banner.');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = SchoolBanner::find($id);

        if (!$banner) {
            return response()->json([
                'success' => false,
                'message' => 'Banner not found',
            ]);
        }

        // Delete image if it exists
        if ($banner->image && File::exists($banner->image)) {
            File::delete($banner->image);
        }

        $deleted = $banner->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Banner deleted successfully' : 'Failed to delete Banner',
        ]);
    }
}
