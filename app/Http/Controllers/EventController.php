<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Programme;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        // Retrieve all events
        $events = Event::all();
        return view('admin.events.event-list', compact('events'));
    }


    public function AddEvent(Request $request, $id = null)
    {
        if ($id == null) {
            $title = "Add Event";
            $event = new Event();
            $message = "Event has been created successfully!";
        } else {
            $title = "Edit Event";
            $event = Event::findOrFail($id);
            $message = "Event has been updated successfully!";
        }

        $progdata = Programme::where('status','active')->get();


        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'event_name' => 'required|string|max:255|unique:events,event_name,' . $id,
                // 'event_url' => 'required|string|max:255',
                'image' => $id ? 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048' : 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
                'banner_image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
                'description' => 'nullable|string',
                'banner_heading' => 'nullable|string|max:255',
                'banner_description' => 'nullable|string',
                'sub_heading' => 'nullable|string|max:255',
                'duration' => 'nullable|string|max:255',
                'age' => 'nullable|string|max:255',
                //  'materials' => 'nullable|string|max:255',
                // 'fees' => 'required',
                //  'no_of_student' => 'required',
                //  'no_of_teacher' => 'required',
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $slug = Str::slug($request->event_name);

            $data['event_url']  = $slug;
            $data['fees']  = $request->fees;
             $data['program']  = json_encode($request->program);
                  


            // Upload image
            if ($request->hasFile('image')) {
                $manager = new ImageManager(new Driver());
                $imagePath = 'assets/images/events/';
                if (!is_dir($imagePath)) mkdir($imagePath, 0755, true);

                $img = $manager->read($request->file('image'));
                $img->resize(302, 200)->encode(new WebpEncoder(quality: 70));
            $filename = uniqid() . '.webp';
            $img->save($imagePath . $filename);
            $data['image'] = $imagePath . $filename;
        }

            // Upload banner image
            if ($request->hasFile('banner_image')) {
                $manager = new ImageManager(new Driver());
                $bannerPath = 'assets/images/events/';
                if (!is_dir($bannerPath)) mkdir($bannerPath, 0755, true);

                $banner = $manager->read($request->file('banner_image'));
                $banner->resize(1920, 1000)->encode(new WebpEncoder(quality: 70));
            $filename = uniqid() . '.webp';
            $banner->save($bannerPath . $filename);
            $data['banner_image'] = $bannerPath . $filename;
        }
            if ($id == null) {
                Event::create($data);
            } else {
                $event->update($data);
            }

            return redirect()->back()->with('success', $message);
        }

        return view('admin.events.create', compact('title', 'event','progdata'));
    }

    public function events() {
        $events = \App\Models\Event::where('status', 1)->get();

        $data['grouped_events'] = $events->groupBy('age'); // Group events by age
        $data['age_groups'] = $data['grouped_events']->keys(); // Extract unique age groups

        return view('web.events', $data);
    }


    public function events_details($url) {
        $data['events'] = \App\Models\Event::where('event_url', $url)->first();
        return view('web.event-details', $data);
    }


    public function destroy($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'data not found',
            ]);
        }


         // Delete image if it exists
        if ($event->image && File::exists(public_path($event->image))) {
            File::delete(public_path($event->image));
        }

        if ($event->banner_image && File::exists(public_path($event->banner_image))) {
            File::delete(public_path($event->banner_image));
        }


    
        $deleted = $event->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Event deleted successfully' : 'Failed to delete Event',
        ]);
    }


    public function getAmount($id)
    {
        $program = Programme::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Program not found.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'fees' => $program->fees,
        ]);
    }




}
