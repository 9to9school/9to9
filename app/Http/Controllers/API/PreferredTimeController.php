<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PreferredTime;
use App\Models\Student;
use App\Models\User;


class PreferredTimeController extends Controller
{
   public function store(Request $request)
    {
        

        $request->validate([
            'parent_id'     => 'required',
            'student_id'     => 'required|exists:students,id',
            'preferred_time' => 'required|string|max:255',
            'date_from'      => 'nullable|date',
            'date_to'        => 'nullable|date',
        ]);

        
        $student = Student::where('id', $request->student_id)
                        ->where('user_id', $request->parent_id)
                        ->first();

        if (!$student) {
            return response()->json([
                'status'  => false,
                'message' => 'Student does not belong to the authenticated parent.'
            ], 403);
        }


        $preferred = PreferredTime::create([
            'student_id'     => $student->id,
            'parent_id'      => $request->parent_id,
            'school_id'      => $student->school_id,
            'preferred_time' => $request->preferred_time,
            'date_from'      => $request->date_from,
            'date_to'        => $request->date_to,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Preferred time saved successfully.',
            'data'    => $preferred
        ], 200);
    }
}