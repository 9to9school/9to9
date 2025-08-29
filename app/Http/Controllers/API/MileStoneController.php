<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Milestone;
use App\Models\Topic;
use App\Models\Popular;

class MileStoneController extends Controller
{
  public function index()
{
    // Get all topics as id => name for quick lookup
    $topics = Topic::where('status', 1)->pluck('topic_name', 'id');

    $milestones = Milestone::select(
        'id', 'popular_id', 'goal_month', 'goal_heading',
        'goal_description', 'goal_breaf', 'topics_including',
        'created_at', 'updated_at'
    )
    ->where('status', 1)
    ->get()
    ->map(function ($milestone) use ($topics) {
        $topicIds = json_decode($milestone->topics_including);
        $milestone->topics_including = is_array($topicIds)
            ? collect($topicIds)->map(fn($id) => $topics[$id] ?? null)->filter()->values()
            : [];

        return $milestone;
    });

    return response()->json([
        'status' => true,
        'data' => $milestones
    ]);
}
}
