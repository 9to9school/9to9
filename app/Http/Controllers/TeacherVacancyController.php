<?php

namespace App\Http\Controllers;
use App\Models\TeacherVacancy;
use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class TeacherVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $vacancy = TeacherVacancy::all();
        return view('school.teacher_vacancy.list',compact('vacancy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::with('popular')->get();
        $shifts  = Shift::all();
        return view('school.teacher_vacancy.create',compact('topics','shifts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subject'       => 'required|array',
            'qualification' => 'required|string|max:255',
            'shift'         => 'required|array',
            'salary'        => 'required|string|max:255',
            'opening'       => 'required|numeric',
            'experience'    => 'required|string|max:255',
            'student'       => 'required|numeric',
            'status'        => 'required|in:open,closed',
            'description'   => 'required|string',
        ]);

        $vacancy = new TeacherVacancy();
        $vacancy->title         = $request->title;
        $vacancy->syllabus       = json_encode($request->subject);   // store as JSON
        $vacancy->qualification = $request->qualification;
        $vacancy->shift         = json_encode($request->shift);     // store as JSON
        $vacancy->fee        = $request->salary;
        $vacancy->openings       = $request->opening;
        $vacancy->school_id = Auth::id();
        $vacancy->experience    = $request->experience;
        $vacancy->students       = $request->student;
        $vacancy->status        = $request->status;
        $vacancy->job_description   = $request->description;
        $vacancy->save();

        return redirect()->route('teacher.vacancy.list')
                         ->with('success', 'Vacancy added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vacancy = TeacherVacancy::find($id);
        $topics  = Topic::all();
        $shifts  = Shift::all();

        return view('school.teacher_vacancy.edit', compact('vacancy', 'topics', 'shifts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'subject'       => 'required|array',
            'qualification' => 'required|string|max:255',
            'shift'         => 'required|array',
            'salary'        => 'required|string|max:255',
            'opening'       => 'required|numeric',
            'experience'    => 'required|string|max:255',
            'student'       => 'required|numeric',
            'status'        => 'required|in:open,closed',
            'description'   => 'required|string',
        ]);

        $id = $request->id;

        $vacancy = TeacherVacancy::findOrFail($id);
        $vacancy->title         = $request->title;
        $vacancy->syllabus       = json_encode($request->subject);   // store as JSON
        $vacancy->qualification = $request->qualification;
        $vacancy->shift         = json_encode($request->shift);     // store as JSON
        $vacancy->fee        = $request->salary;
        $vacancy->openings       = $request->opening;
        $vacancy->experience    = $request->experience;
        $vacancy->students       = $request->student;
        $vacancy->school_id = Auth::id();
        $vacancy->status        = $request->status;
        $vacancy->job_description   = $request->description;
        $vacancy->save();

        return redirect()->route('teacher.vacancy.list')
                         ->with('success', 'Vacancy updated successfully.');
    }
   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $vacancy = TeacherVacancy::find($id);

        if (!$vacancy) {
            return response()->json([
                'success' => false,
                'message' => 'Vacancy not found',
            ]);
        }

       
        $deleted = $vacancy->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Vacancy  deleted successfully' : 'Failed to delete Vacancy',
        ]);
    }
}
