<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CustomGoal;
use Illuminate\Support\Facades\Validator;

class CustomGoalController extends Controller
{
    public function list($parent_id,$student_id)
    {
        $goals = CustomGoal::with(['goal'])->where('parent_id',$parent_id)->where('student_id',$student_id)->get();

        if ($goals->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'custom goal list Data not found',
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $goals
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'parent_id'  => 'required|integer|exists:users,id',
            'goals_id'   => 'required|array|min:1',
            'goals_id.*' => 'required|integer|exists:progress_goals,id',
        ]);

    $createdGoals = [];

    foreach ($validated['goals_id'] as $goalId) {
        $goal = CustomGoal::create([
            'student_id' => $validated['student_id'],
            'parent_id'  => $validated['parent_id'],
            'goals_id'   => $goalId,
        ]);

        $createdGoals[] = $goal; // <-- this appends each goal
    }

    return response()->json([
        'status' => true,
        'message' => 'Custom goals created successfully.',
        'data' => $createdGoals, // return all created goals
    ]);

    }

    public function edit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'       => 'required|exists:custom_goals,id',
            'student_id' => 'required|integer',
            'parent_id' => 'required|integer',
            'goals_id'   => 'required|array',
            'goals_id.*' => 'required|integer|exists:progress_goals,id',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        CustomGoal::where('student_id', $validated['student_id'])
              ->where('parent_id', $validated['parent_id'])
              ->delete();

    // Create new goals
    $newGoals = [];
    foreach ($validated['goals_id'] as $goalId) {
        $newGoals[] = CustomGoal::create([
            'student_id' => $validated['student_id'],
            'parent_id'  => $validated['parent_id'],
            'goals_id'   => $goalId,
        ]);
    }

        return response()->json([
            'status' => true,
            'message' => 'Custom goals updated successfully.',
            'data' => $newGoals,
        ]);
    }


    public function destroy(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'id' => 'required',
        ]);
        

        // Use the validated ID
        $goal = CustomGoal::find($validated['id']);

        if (!$goal) {
            return response()->json([
                'status' => false,
                'message' => 'Custom goal not found.',
            ], 404);
        }

        $goal->delete();

        return response()->json([
            'status' => true,
            'message' => 'Custom goal deleted successfully.',
        ]);
    }
}
