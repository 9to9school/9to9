<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademicYear;

class AcademicYearController extends Controller
{
    public function index()
    {
        $academicYears = AcademicYear::all();
        return view('admin.academic-years.list', compact('academicYears'));
    }

    // Show form to create a new academic year
    public function create()
    {
        return view('admin.academic-years.create');
    }

    // Store a new academic year
    public function store(Request $request)
    {
        $request->validate([
            'academic_number' => 'required|string|max:255',
            'status' => 'required'
            
        ]);

        $academicYear = new AcademicYear();
        $academicYear->academic_number = $request->academic_number;
        $academicYear->status = $request->status;
       
        $academicYear->save();

        return redirect()->route('academic.list')->with('success', 'Academic Year added successfully.');
    }

    // Show form to edit an academic year
   public function edit($id)
    {
        $academic = AcademicYear::findOrFail($id);
        return view('admin.academic-years.edit', compact('academic'));
    }

    // Update academic year
    public function update(Request $request, $id)
    {
        $request->validate([
            'academic_number' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->academic_number = $request->academic_number;
        $academicYear->status = $request->status;
        $academicYear->save();

        return redirect()->route('academic.list')->with('success', 'Academic Year updated successfully.');
    }

    // Delete academic year
    public function destroy($id)
    {
        $academicYear = AcademicYear::findOrFail($id);
        $academicYear->delete();

        return redirect()->route('academic.list')->with('success', 'Academic Year deleted successfully.');
    }
}