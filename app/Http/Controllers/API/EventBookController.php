<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventBook;

class EventBookController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id'        => 'required|string|max:50',
            'event_name'      => 'required|string|max:255',
            'child_name'      => 'required|string|max:255',
            'age'      => 'required',
            'preferred_time'  => 'nullable|date_format:H:i',
            'preferred_date'  => 'nullable|date',
            'mode'            => 'required|in:online,offline',
            'notes'           => 'nullable|string'
        ]);

        $event = EventBook::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Book event created successfully',
            'data' => $event
        ], 201);
    }

    // GET: Fetch all book events
    public function index()
    {
        $events = EventBook::all();

        return response()->json([
            'status' => true,
            'message' => 'All book events retrieved successfully',
            'data' => $events
        ]);
    }
}
