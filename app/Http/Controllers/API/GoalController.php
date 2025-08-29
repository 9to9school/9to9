<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProgressGoal;

class GoalController extends Controller
{
   public function goalslist()
    {
        $goals = ProgressGoal::where('status', 'active')->get();

       
        return response()->json([
            'status' => true,
            'data' => $goals
        ]);
    } 
}
