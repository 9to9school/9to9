<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LifeSkillsHack;
use App\Models\lifehackDetails;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LifeSkillsHackController extends Controller
{
    // Display all categories
    public function AllLifeSkillsHack()
    {
        $life_skills_hacks = LifeSkillsHack::latest()->get();
        return view('admin.life_skills_hacks.index', compact('life_skills_hacks'));
    }
    
    // Add life skill hack blog
    public function AddLifeSkillsHack(Request $request, $id = null)
    {
        $title = $id ? "Update Life Skills Hack" : "Add Life Skills Hack";
        $lifeHack = $id ? LifeSkillsHack::findOrFail($id) : new LifeSkillsHack();
        $message = $id ? "Life Skills Hack updated successfully" : "Life Skills Hack added successfully";

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title'              => 'required|string|max:255|unique:life_skills_hacks,title,' . $id,
                'image'              => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'banner_image'       => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description'        => 'nullable|string',
                'banner_heading'     => 'nullable|string|max:255',
                'banner_description' => 'nullable|string',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Generate unique slug only if new or title changed
            $slug = Str::slug($request->title);
            $originalSlug = $slug;
            $counter = 1;

            while (
            LifeSkillsHack::where('url', $slug)
                ->when($id, fn($q) => $q->where('id', '!=', $id))
                ->exists()
            ) {
                $slug = $originalSlug . '-' . $counter++;
            }

            $data['url'] = $slug;

            // Handle image upload
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/life_skills/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->resize(800, 450)->encode(new WebpEncoder(quality: 90));
                $filename = uniqid() . '.webp';
                $img->save($imagePath . $filename);
                $data['image'] = $imagePath . $filename;
            }

            // Handle banner image upload
            if ($request->hasFile('banner_image')) {
                $manager = new ImageManager(new Driver());
                $bannerPath = 'assets/images/life_skills/banner/';
                if (!is_dir($bannerPath)) mkdir($bannerPath, 0755, true);

                $banner = $manager->read($request->file('banner_image'));
                $banner->resize(1920, 400)->encode(new WebpEncoder(quality:90));
                $filename = uniqid() . '.webp';
                $banner->save($bannerPath . $filename);
                $data['banner_image'] = $bannerPath . $filename;
            }

            if ($id == null) {
                LifeSkillsHack::create($data);
            } else {
                $lifeHack->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.life_skills_hacks.create', compact('title', 'lifeHack'));
    }

    // show details
    public function life_hacks_details($url)
    {
        $lifeHack = LifeSkillsHack::where('url', $url)->first();
    

        $other5blogs = LifeSkillsHack::where('id', '!=', $lifeHack->id)
            ->latest()
            ->limit(5)
            ->get();

        $next3blogs = LifeSkillsHack::where('id', '!=', $lifeHack->id)
            ->latest()
            ->limit(3)
            ->get();

        return view('web.life-skills-details', compact('lifeHack', 'other5blogs', 'next3blogs'));
    }


    // Show Add Content List
    public function addcontentList($id)
    {
        $content = lifehackDetails::where('life_hack_id', $id)->get(); // Get actual record or null
        return view('admin.life_skills_hacks.add-content-list', compact('content'));
    }


    // Show Add Content
    public function AddContent($id)
    {
        $data = null;

        if ($id) {
          $data = lifehackDetails::where('life_hack_id', $id)->first(); // Get actual record or null
        }

        return view('admin.life_skills_hacks.add-content', compact('data'));
    }


    // Update Content
    public function saveContents(Request $request, $id)
    {
       

        if ($request->isMethod('post')) {
            $requestData = $request->all();

            $rules = [
                'title'       => 'nullable|string|max:255',
                'image'       => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description' => 'required|string',
                // 'status'      => 'required',
            ];

            $validator = Validator::make($requestData, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/life_skills/add-content/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->resize(800, 450)->encode(new WebpEncoder(quality: 90));
                $filename = uniqid() . '.webp';
                $img->save($imagePath . $filename);
                $requestData['image'] = $imagePath . $filename;
            }
                $requestData['status'] = 'active';   
                $requestData['life_hack_id'] = $id;
                // $plainText = strip_tags($request->description);
                $requestData['description'] = $request->description;
                lifehackDetails::create($requestData);
            
            return redirect('/admin/add-content-list/' . $id)->with('success', 'Content added successfully');
        }

    }

    // Show edit Content
    public function editContent($id)
    {
        $data = null;
        if ($id) {
          $data = lifehackDetails::where('id', $id)->first(); 
        }
        return view('admin.life_skills_hacks.edit-content', compact('data'));
    }


    // Update Content
    public function updateContents(Request $request, $id = null)
    {
     
        $lifeHack =  lifehackDetails::where('id', $id)->first();
        $message = "Content updated successfully";

        if ($request->isMethod('post')) {
            $requestData = $request->all();

            $rules = [
                'title'       => 'nullable|string|max:255|unique:life_hack_details,id,' . ($id ?? 'null') . ',id',
                'image'       => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description' => 'nullable|string',
                
            ];

            $validator = Validator::make($requestData, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Handle image upload
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/life_skills/add-content/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->resize(800, 450)->encode(new WebpEncoder(quality: 90));
                $filename = uniqid() . '.webp';
                $img->save($imagePath . $filename);
                $requestData['image'] = $imagePath . $filename;
            }
                $requestData['status'] = 'active';               
                $plainText = strip_tags($request->description);
                $requestData['description'] = $request->description;
                $lifeHack->update($requestData);
            

            return redirect('/admin/add-content-list/' . $lifeHack->life_hack_id)->with('success', $message);
        }

        return view('admin.life_skills_hacks.add-content', ['data' => $lifeHack]);
    }


     // Delete Logic handle
    public function destroyContent($id)
    {
        $data = lifehackDetails::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ]);
        }

        

        $data->delete();
        // $siblings = ChildModel::where('student_id',$id)->delete();;

        return response()->json([
            'success' => true,
            'message' => 'Content  deleted successfully',
        ]);
    }


     // Delete data
    public function destroy($id)
    {
        $data = LifeSkillsHack::find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ]);
        }

        // Delete image if it exists
        if ($data->image && File::exists(public_path($data->image))) {
            File::delete(public_path($data->image));
        }

         // Delete image if it exists
        if ($data->banner_image && File::exists(public_path($data->banner_image))) {
            File::delete(public_path($data->banner_image));
        }


        $deleted = $data->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Data deleted successfully' : 'Failed to delete data',
        ]);
    }



}
