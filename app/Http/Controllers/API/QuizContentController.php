<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QuizContent;

class QuizContentController extends Controller
{
    public function AllQuizContent()
{
    $quizContents = QuizContent::latest()->get();

    return response()->json([
        'success' => true,
        'message' => 'Quiz content retrieved successfully',
        'data' => $quizContents
    ], 200);
}
}
