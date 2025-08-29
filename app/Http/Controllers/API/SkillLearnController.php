<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SkillLearn;

class SkillLearnController extends Controller
{
    public function skill()
{
    $skill = SkillLearn::all();

    return response()->json([
        'status' => true,
        'message' => 'Skill learn data retrieved successfully',
        'data' => $skill
    ]);
}
}
