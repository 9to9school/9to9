<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddProgress;
use App\Models\Topic;
use App\Models\SubTopic;
use App\Models\School;
use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;



class ProgressReportController extends Controller
{
    public function index($id)
    {
        $progressReports = AddProgress::where('student_id',$id)->with('school', 'teacher', 'student', 'topic')->get();
        return view('admin.progress_report.index', compact('progressReports'));
    }

    public function destroy($id)
    {
        $progress = AddProgress::find($id);

        if (!$progress) {
            return redirect()->route('progress-reports.list')->with('error', 'Progress report not found.');
        }

        $progress->delete();

        return redirect()->route('progress-reports.list')->with('success', 'Progress report deleted successfully.');
    }

    public function progressdetails($id)
    {
         
        $report = AddProgress::with('school', 'teacher', 'student')->where('student_id',$id)->get()->groupBy('topic');
        $student = Student::with('ages')->find($id);
        $reportlatest = AddProgress::with('school', 'teacher', 'student')->where('student_id',$id)->orderByDesc('id')->first();
        return view('admin.progress_report.details', compact('report','student','reportlatest'));
    }

    public function progresslist($id)
    {

        $schoolId = Auth::id();

        $progressReports = AddProgress::with('school', 'teacher', 'student', 'topic')
            ->where('school_id', $schoolId)->where('student_id',$id)->get()
            ->get();

        // dd($progressReports);
        return view('school.progress_report.index', compact('progressReports'));
    }


    public function details($id)
    {
        $schoolId = Auth::id();

        $report = AddProgress::with('school', 'teacher', 'student')
                    ->where('school_id', $schoolId)
                    ->where('student_id', $id)
                    ->orderByDesc('id')
                    ->get()
                    ->groupBy('topic'); 
    //  print_r($report);die;

        $student = Student::with('ages')->find($id);
        $reportlatest = AddProgress::with(['school', 'teacher', 'student'])
            ->where('student_id', $id)
            ->where('school_id', $schoolId)
            ->orderByDesc('id')
            ->first(); // ✅ this works

        return view('school.progress_report.details', compact('report', 'student', 'reportlatest'));
    }


    public function progressdestroy($id)
    {
        $schoolId = 1;

        $progress = AddProgress::where('school_id', $schoolId)->find($id);

        if (!$progress) {
            return redirect()->route('school.progress-reports.list')->with('error', 'Progress report not found.');
        }

        $progress->delete();

        return redirect()->route('school.progress-reports.list')->with('success', 'Progress report deleted successfully.');
    }

    public function savePdf(Request $request)
    {
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $filename = 'progress-report-' . time() . '.pdf';

            // Save directly to public/reports folder
            $destinationPath = public_path('reports');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true); // create folder if not exists
            }

            $pdf->move($destinationPath, $filename);

            return response()->json([
                'success' => true,
                'message' => 'PDF uploaded successfully',
                'file_path' => url('reports/' . $filename) // public URL
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No PDF file received.'
        ], 400);
    }
}
