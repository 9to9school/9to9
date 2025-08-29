<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\AddRemark;
use App\Models\AddProgress;

class RemarkController extends Controller
{
    public function index($id=null)
    {
        $progress = AddProgress::find($id);

        $query = AddRemark::with(['school', 'teacher', 'student']);


        if ($id) {
            $query->where('student_id', $progress->student_id)
            ->where('topic_id', $progress->topic)
            ->whereBetween('date', [$progress->date_start, $progress->date_end]);
        }

        $remarks = $query->get();

        return view('admin.remark.index', compact('remarks'));
    }

    public function destroy($id)
    {
        $remark = AddRemark::findOrFail($id);

        if ($remark->image && file_exists(public_path($remark->image))) {
            unlink(public_path($remark->image));
        }

        $remark->delete();

        return redirect()->route('remarks.index')->with('success', 'Remark deleted successfully.');
    }

    public function show($id)
    {
        $remark = AddRemark::with(['school', 'teacher', 'student'])->findOrFail($id);
        return view('admin.remarks.details', compact('remark'));
    }

    public function remarklist($id)
    {
        $progress = AddProgress::find($id);

        $query = AddRemark::with(['school', 'teacher', 'student']);


        if ($id) {
            $query->where('student_id', $progress->student_id)
            ->where('topic_id', $progress->topic)
            ->whereBetween('date', [$progress->date_start, $progress->date_end]);
        }

        $remarks = $query->get();

        return view('school.remark.index', compact('remarks'));
    }

   
    public function details($id)
    {
        $schoolId = 1;

        $remark = AddRemark::with(['school', 'teacher', 'student'])
            ->where('school_id', $schoolId)
            ->findOrFail($id);

        return view('school.remarks.details', compact('remark'));
    }

    
    public function remarkdestroy($id)
    {
        $schoolId = 1;

        $remark = AddRemark::where('school_id', $schoolId)->find($id);

        if (!$remark) {
            return response()->json(['message' => 'Remark not found.'], 404);
        }

        if ($remark->image && file_exists(public_path($remark->image))) {
            unlink(public_path($remark->image));
        }

        $remark->delete();
        return redirect()->route('school.remarks.index')->with('success', 'Remark deleted successfully.');

    }
}
