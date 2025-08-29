<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OurProgram;

class OurProgramController extends Controller
{
    public function ourPrograms()
    {
        $programs = OurProgram::where('status', '1')->get()->map(function ($item) {
            $item->high_lights = json_decode($item->high_lights);
            $item->tags = json_decode($item->tags);
            return $item;
        });

        return response()->json([
            'status' => true,
            'data' => $programs
        ]);
    }
    
    
    public function ourProgramsdetails($id)
    {
        $program = OurProgram::where('id', $id)->where('status', '1')->first();
        $program->high_lights = json_decode($program->high_lights);
        $program->tags = json_decode($program->tags);

        if (! $program) {
            return response()->json([
                'success' => false,
                'message' => 'Program data not found',
            ], 422);
        }

        return response()->json([
            'status' => true,
            'data' => $program
        ]);
    } 
}
