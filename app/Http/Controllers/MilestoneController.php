<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\Topic;
use App\Models\Popular;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::all();
        return view('admin.milestone.milestone-list', compact('milestones'));
    }

    // Show form to create a new USP
    public function create()
    {
        $topics = Topic::all(); 
        $populars = Popular::where('status', 1)->get();
        return view('admin.milestone.create', compact('topics','populars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'popular_id' => 'required|string|max:255',
            'goal_month' => 'required|string|max:255',
            'goal_heading' => 'required|string|max:255',
            'goal_description' => 'required|string|max:255',
            'goal_breaf' => 'required|string|max:255',
            'topics_including' => 'required|array'
           
        ]);

        if ($request->hasFile('image')) {
        $manager = new ImageManager(new Driver());
        $folderPath = public_path('assets/images/milestone/');

        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0755, true);
        }

        $uploadedImage = $request->file('image');
        $image = $manager->read($uploadedImage);
        $image->resize(60, 60);
        $image->encode(new WebpEncoder(quality: 65));
        $filename = uniqid() . '.webp';
        $image->save($folderPath . $filename);

        $milestone->image = 'assets/images/milestone/' . $filename;
        }
    
        $milestone = new Milestone();
        $milestone->popular_id = $request->popular_id;
        $milestone->goal_month = $request->goal_month;
        $milestone->goal_heading = $request->goal_heading;
        $milestone->goal_description = $request->goal_description;
        $milestone->goal_breaf = $request->goal_breaf;
        $milestone->topics_including = json_encode($request->topics_including); // Save as JSON
        $milestone->save();
    
        return redirect()->route('milestone.list')->with('success', 'Milestone Created successfully.');
    }
    

    // Show the edit form for a USP
    public function edit($id)
    {
        $milestone = Milestone::findOrFail($id);
        $topics = Topic::all(); // Include topics here too
        $populars = Popular::where('status', 1)->get();
        return view('admin.milestone.edit', compact('milestone', 'topics','populars'));
    }

    // Update USP
    public function update(Request $request, $id)
    {
        $request->validate([
           'goal_month' => 'required|string|max:255',
            'goal_heading' => 'required|string|max:255',
            'goal_description' => 'required|string|max:255',
            'goal_breaf' => 'required|string|max:255',
            'topics_including' => 'required|array'
        ]);

        $milestone = Milestone::findOrFail($id);
        $milestone->popular_id = $request->popular_id;
        $milestone->goal_month = $request->goal_month;
        $milestone->goal_heading = $request->goal_heading;
        $milestone->goal_description = $request->goal_description;
        $milestone->goal_breaf = $request->goal_breaf;
        $milestone->topics_including = $request->topics_including;
     
       
        $milestone->status = $request->status;

        $milestone->save();

        return redirect()->route('milestone.list')->with('success', 'Milestone updated successfully.');
    }

    // Delete USP
    public function destroy($id)
    {
        $milestone = Milestone::findOrFail($id);
       
        $milestone->delete();

        return redirect()->route('milestone.list')->with('success', 'Milestone deleted successfully.');
    }

}
