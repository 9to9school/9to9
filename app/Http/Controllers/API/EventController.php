<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;

class EventController extends Controller
{
    // public function index()
    // {
    //    $events = Event::select('id', 'event_name', 'event_url', 'image', 'description', 'duration', 'age', 'banner_image', 'banner_heading', 'sub_heading', 'banner_description', 'materials', 'skills')
    // ->where('status', 1)
    // ->get();
    //   return response()->json([
    //         'status' => true,
    //         'data' => $events
    //     ]);
    // }

    public function events()
    {
        $events = \App\Models\Event::where('status', 1)->get();

        $grouped_events = $events->groupBy('age'); // Group events by age
        $age_groups = $grouped_events->keys();     // Extract unique age groups

        return response()->json([
            'status' => true,
            'age_groups' => $age_groups,
            'grouped_events' => $grouped_events
        ]);
    }

    public function event_details($url)
    {
        $event = \App\Models\Event::where('event_url', $url)->first();

        if (!$event) {
            return response()->json([
                'status' => false,
                'message' => 'Event not found',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'event' => $event,
        ]);
    }


}