<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeacherVacancy;
use App\Models\TeacherApplication;


class TeacherVacncyController extends Controller
{
    public function index()
    {
        $vacancies = TeacherVacancy::Pget();

        return response()->json([
            'status' => true,
            'message' => 'Vacancy list fetched successfully',
            'data' => $vacancies
        ]);
    }

    public function apply(Request $request)
    {
        $request->validate([
            'vacancy_id'    => 'required|exists:teacher_vacancies,id',
            'name'          => 'required|string|max:255',
            'email'         => 'required|email',
            'phone'         => 'required|string|max:15',
            'state'         => 'required',
            'city'         => 'required',
            'pin_code'         => 'required',
            'qualification' => 'required|string|max:255',
            'experience'    => 'required|string|max:255',
            'resume'        => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        

        if ($request->hasFile('resume')) {
            $file = $request->file('resume');

            // Generate unique filename
            $filename = uniqid('resume_') . '.' . $file->getClientOriginalExtension();

            // Move to public path
            $file->move(public_path('assets/pdfs/teacher/'), $filename);

            // Save path to variable or database
            $resumePath = 'assets/pdfs/teacher/' . $filename;
        }

        $application = TeacherApplication::create([
            'vacancy_id'    => $request->vacancy_id,
            'fullname'          => $request->name,
            'email'         => $request->email,
            'state'         => $request->state,
            'city'         => $request->city,
            'pin_code'         => $request->pin_code,
            'phone_number	'         => $request->phone,
            'qualification' => $request->qualification,
            'experience'    => $request->experience,
            'resume'        => $resumePath,
            'source' => 'apk'
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Application submitted successfully!',
            'data'    => $application
        ], 201);
    }
}
