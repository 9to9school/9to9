<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;

class ShiftsController extends Controller
{
    public function index()
    {
        $shifts=Shift::all();

        return view('admin.time-shifts.shift-list', compact('shifts'));
    }

    // Show form to create a new USP
    public function create()
    {
       
        return view('admin.time-shifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'time_from' => 'required|string|max:255',
            'time_to' => 'required|string|max:255',
           
        ]);


        $shift = new Shift();
        $shift->time_from = $request->time_from;
        $shift->time_to = $request->time_to;
       
        $shift->save();

        return redirect()->route('shift.list')->with('success', 'Shift added successfully.');
    }

    // Show the edit form for a USP
    public function edit($id)
    {
        $shift = Shift::findOrFail($id); 
      
        return view('admin.time-shifts.edit', compact('shift'));
    }

    // Update USP
    public function update(Request $request, $id)
    {
        $request->validate([
            'time_from' => 'required|string|max:255',
            'time_to' => 'required|string|max:255',
          
          
        ]);

        $shift = Shift::findOrFail($id);
        $shift->time_from = $request->time_from;
        $shift->time_to = $request->time_to;
        $shift->save();

        return redirect()->route('shift.list')->with('success', 'Shift updated successfully.');
    }

    // Delete USP
    public function destroy($id)
    {
        $shift = Shift::findOrFail($id);
       
        $shift->delete();

        return redirect()->route('shift.list')->with('success', 'Sfift deleted successfully.');
    }

}
