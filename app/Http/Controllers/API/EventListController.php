<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Programme;


class EventListController extends Controller
{

    public function eventlist()
    {
        $events = Event::where('status', 1)->get();

        $events = $events->map(function ($event) {
            $programIds = json_decode($event->program, true);

            // Ensure it's an array
            if (!is_array($programIds)) {
                $programIds = [];
            }

            // Fetch related program data
            $programmes = Programme::whereIn('id', $programIds)->get(['id', 'title', 'fees']);

            // Attach enriched data
            $event->programmes = $programmes;

            // Optionally remove original raw program field
            unset($event->program);

            return $event;
        });

        return response()->json([
            'status' => true,
            'data' => $events
        ]);
    }

    public function eventDetails($id)
    {
        $event = Event::select([
            'id', 'event_name', 'event_url', 'image', 'description',
            'duration', 'age', 'materials', 'skills',
            'banner_image', 'banner_heading', 'sub_heading', 'banner_description',
            'created_at', 'updated_at', 'program'
        ])->find($id);

        if (!$event) {
            return response()->json([
                'status' => false,
                'message' => 'Event not found'
            ], 404);
        }

        // Decode program field and fetch details
        $programIds = json_decode($event->program, true);

        if (!is_array($programIds)) {
            $programIds = [];
        }

        $programmes = \App\Models\Programme::whereIn('id', $programIds)
            ->get(['id', 'title', 'fees']);

        // Attach program data and optionally remove raw ID list
        $event->programmes = $programmes;
        unset($event->program); // optional

        return response()->json([
            'status' => true,
            'data' => $event
        ]);
    }

}
