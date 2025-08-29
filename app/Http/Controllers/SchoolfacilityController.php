<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Schoolfacility;
use Illuminate\Http\Request;

class SchoolfacilityController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(){
        $facility = Schoolfacility::where('status','active')->where('type','school')->get();
        return view('school.appcontent.facility.list',compact('facility'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
       return view('school.appcontent.facility.create');        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request){
    
        $request->validate([
            'status' => 'required', 
            'name' => 'required',      
        ]);

        

        $facility = new Schoolfacility();
        $facility->school_id = Auth::id();;
        $facility->name = $request->name;
        $facility->status = $request->status;
        $facility->type = 'school';
        $facility->save();

        if($facility){
          return redirect()->route('school.facility.list')->with('success', 'Facility added successfully.');
        }else{
          return redirect()->route('school.facility.list')->with('error', 'There was an issue adding the Facility.');
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
        $getdata = Schoolfacility::where('id',$id)->where('type','school')->first();
       return view('school.appcontent.facility.edit',compact('getdata'));        
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request){
        $request->validate([
            'status' => 'required', 
            'name' => 'required',      
        ]);

        $id = $request->id;
        $datafind = Schoolfacility::find($id);


        
      
        $datafind->school_id = Auth::id();;
        $datafind->name = $request->name;
        $datafind->status = $request->status;
        $datafind->type = 'school';

        $datafind->save();

        if($datafind){
          return redirect()->route('school.facility.list')->with('success', 'Facility updated successfully.');
        }else{
          return redirect()->route('school.facility.list')->with('error', 'There was an issue updating the Facility.');
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $facility = Schoolfacility::find($id);

        if (!$facility) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ]);
        }

    

        $deleted = $facility->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Facility deleted successfully' : 'Failed to delete Facility',
        ]);
    }
}
