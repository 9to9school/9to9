<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplyLeave;
use Illuminate\Support\Facades\Auth;

class TeacherAttendanceController extends Controller
{
    public function teacherleave()
    {
        $school_id = Auth::user()->school_id;
        $leaves = ApplyLeave::where('school_id', $school_id)->get();

        return view('school.leaves.teacher_leaves', compact('leaves', 'school_id'));
    }

    public function managestatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,reject',
        ]);

        $leave = ApplyLeave::findOrFail($id);
        $leave->status = $request->status;
        $leave->save();

        return redirect()->back()->with('success', 'Leave status updated to ' . ucfirst($request->status));
    }
}
