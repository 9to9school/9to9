<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
   public function index()
{
    $topics = Topic::select('id', 'topic_name')
        ->where('status', 1)
        ->get();

    return response()->json([
        'status' => true,
        'data' => $topics
    ]);
}
}
