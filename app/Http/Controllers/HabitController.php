<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habit;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $habits = Habit::where('status','active')->get();
        return view('admin.habit.list',compact('habits'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
       return view('admin.habit.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request){
    
        $request->validate([
            'name' => 'required|string|max:255',  
            'status' => 'required',  
            'type' => 'required',    
        ]);

       
        $habit = new Habit();
        $habit->name = $request->name;
        $habit->type = $request->type;
        $habit->status = $request->status;

        $habit->save();



        if($habit){
          return redirect()->route('habit.list')->with('success', 'Habit added successfully.');
        }else{
          return redirect()->route('habit.list')->with('error', 'There was an issue adding the Habit.');
        }

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
    public function edit($id){
       $getdata = Habit::where('id',$id)->first();
       return view('admin.habit.edit',compact('getdata'));        
    }
    

    /**
     * Update the specified resource in storage.
     */
     public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',  
            'status' => 'required', 
            'type' => 'required',    
        ]);
        $id = $request->id;
        $datafind = Habit::find($id);



        $datafind->name = $request->name;
        $datafind->type = $request->type;
        $datafind->status = $request->status;

        $datafind->save();

        if($datafind){
          return redirect()->route('habit.list')->with('success', 'Habit updated successfully.');
        }else{
          return redirect()->route('habit.list')->with('error', 'There was an issue updating the Habit.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $habit = Habit::find($id);

        if (!$habit) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ]);
        }

        

        $deleted = $habit->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Habit deleted successfully' : 'Failed to delete Habit',
        ]);
    }
}
