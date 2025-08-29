<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;


class ProgrammeController extends Controller
{
    //show programme list
    public function index(){
        $programmes = Programme::all();
        return view('admin.events.programme.list',compact('programmes'));        
    }

    // Show create programme form
    public function create(){
        
       return view('admin.events.programme.create');        
    }


    // Handle  the create request 
    public function save(Request $request){
    
        $request->validate([
            'no_of_student' => 'nullable|string|max:255',  
            'no_of_teacher' => 'nullable|string|max:255',  
            'fees' => 'required|numeric',  
            'status' => 'required',  
            'title' => 'required', 
        ]);


        $program = new Programme();
        $program->no_of_student = $request->no_of_student;
        $program->no_of_teacher = $request->no_of_teacher;
        $program->fees = $request->fees;
        $program->status = $request->status;
        $program->title = $request->title;
        $program->save();



        if($program){
          return redirect()->route('programme.list')->with('success', 'Programme added successfully.');
        }else{
          return redirect()->route('programme.list')->with('error', 'There was an issue adding the Programme.');
        }

    }

    // Show edit programme form
    public function edit($id){
        $getdata = Programme::where('id',$id)->first();
       return view('admin.events.programme.edit',compact('getdata'));        
    }

    // Handle  the update request 
    public function update(Request $request){
          $request->validate([
            'no_of_student' => 'nullable|string|max:255',  
            'no_of_teacher' => 'nullable|string|max:255',  
            'fees' => 'required|numeric',  
            'status' => 'required',    
            'title' => 'required',   
        ]);

        $id = $request->id;
        $datafind = Programme::find($id);
    //   dd($id);
        $datafind->no_of_student = $request->no_of_student;
        $datafind->no_of_teacher = $request->no_of_teacher;
        $datafind->fees = $request->fees;
        $datafind->status = $request->status;
        $datafind->title = $request->title;

        $datafind->save();

        if($datafind){
          return redirect()->route('programme.list')->with('success', 'Programme updated successfully.');
        }else{
          return redirect()->route('programme.list')->with('error', 'There was an issue updating the Programme.');
        }

    }


    // Handle the delete request
    public function destroy($id)
    {
        $program = Programme::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Programme not found',
            ]);
        }


        $deleted = $program->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Programme deleted successfully' : '',
        ]);
    }
}
