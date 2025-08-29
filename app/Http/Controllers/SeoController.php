<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seo;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;

use Illuminate\Validation\Rule;
class SeoController extends Controller
{
    public function index()
    {
       $seos = Seo::all();
   
    return view('admin.seo.seo-list', compact('seos'));
    }

    public function create()
    {
     

    // Pass the variable to the view
    return view('admin.seo.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'url' => 'required|string|max:255|unique:tbl_seos,url',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'keyword' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        
        ]);

        $user = auth()->user();

        if($user->role == 'admin'){
            $route = 'seo.list';
        }else{
            $route = 'marketing.seo.list';
        }

        $seo = new Seo();
        $seo->url = $request->url;
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keyword = $request->keyword;


        // Handle image upload
        // if ($request->hasFile('image')) {
        //     $fileName = time().'_'.$request->file('image')->getClientOriginalName();
        //     $path = $request->file('image')->storeAs('seo_images', $fileName, 'public');
        //     $seo->image = $path;
        // }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/seo_images/'), $filename);
            $seo->image = 'assets/images/seo_images/' . $filename;
        }

        $seo->save();

        return redirect()->route($route)->with('success', 'SEO entry added successfully.');
    }

    public function edit($id)
    {
        $seo = Seo::findOrFail($id);
        return view('admin.seo.edit', compact('seo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'url' => 'required|string|max:255|unique:tbl_seos,url,' . $id,
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'keyword' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',

        ]);

         $user = auth()->user();

        if($user->role == 'admin'){
            $route = 'seo.list';
        }else{
            $route = 'marketing.seo.list';
        }

        $seo = Seo::findOrFail($id);
        $seo->url = $request->url;
        $seo->title = $request->title;
        $seo->description = $request->description;
        $seo->keyword = $request->keyword;


        // if ($request->hasFile('image')) {
        //     // Delete old image if exists
        //     if ($seo->image && Storage::disk('public')->exists($seo->image)) {
        //         Storage::disk('public')->delete($seo->image);
        //     }

        //     $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
        //     $path = $request->file('image')->storeAs('seo_images', $fileName, 'public');
        //     $seo->image = $path;
        // }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/seo_images/'), $filename);
            $seo->image = 'assets/images/seo_images/' . $filename;
        }

        $seo->save();

        return redirect()->route($route)->with('success', 'SEO entry updated successfully.');
    }

    public function destroy($id)
    {
        $user = auth()->user();

        if($user->role == 'admin'){
            $route = 'seo.list';
        }else{
            $route = 'marketing.seo.list';
        }
        $seo = Seo::findOrFail($id);
        $seo->delete();

        return redirect()->route($route)->with('success', 'Seo deleted successfully.');
    }



}
