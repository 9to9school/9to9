<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SubTopic;
use App\Models\Topic;
use App\Models\Popular;

class SubTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $subtopics = SubTopic::where('status','active')->get();
        return view('admin.subtopic.list',compact('subtopics'));        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $populars = Popular::where('status', 1)->get();
        $topic = Topic::where('status',1)->get();
        return view('admin.subtopic.create',compact('topic','populars')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    // Handle  the create request 
    public function save(Request $request){
    
        $request->validate([
            'topic' => 'required|string',  
            'name' => 'required|string',  
            'status' => 'required', 
            'popular_id' => 'required',    
            'quarters' => 'required',  
        ]);


        $subtopic = new SubTopic();
        $subtopic->topic_name = $request->topic;
        $subtopic->name = $request->name;
        $subtopic->status = $request->status;
        $subtopic->age = $request->popular_id;
        $subtopic->quarters = $request->quarters;
        $subtopic->save();

        if($subtopic){
          return redirect()->route('sub.topic.list')->with('success', 'Sub Topic added successfully.');
        }else{
          return redirect()->route('sub.topic.list')->with('error', 'There was an issue adding the Sub Topic.');
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $populars = Popular::where('status', 1)->get();
       $topic = Topic::where('status',1)->get();
       $getdata = SubTopic::where('id',$id)->first();
       return view('admin.subtopic.edit',compact('getdata','topic','populars')); 
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request){
        $request->validate([
            'topic' => 'required|string',  
            'name' => 'required|string',  
            'status' => 'required', 
            'popular_id' => 'required',    
            'quarters' => 'required'
         
        ]);
        $id = $request->id;
        $datafind = SubTopic::find($id);

        $datafind->topic_name = $request->topic;
        $datafind->name = $request->name;
        $datafind->status = $request->status;
        $datafind->age = $request->popular_id;
        $datafind->quarters = $request->quarters;

        $datafind->save();

        if($datafind){
          return redirect()->route('sub.topic.list')->with('success', 'Sub Topic updated successfully.');
        }else{
          return redirect()->route('sub.topic.list')->with('error', 'There was an issue updating the Sub Topic.');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = SubTopic::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Sub Topic not found',
            ]);
        }


        

        $deleted = $product->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Sub Topic deleted successfully' : 'Failed to delete sub topic',
        ]);
    }

    // Get topic 
    public function getTopicsByAge($popular_id)
    {
       
        $topics = Topic::where('age', $popular_id)->where('status',1)->get(['id', 'topic_name']);
        return response()->json($topics);
    }

    // Get topic 
    public function getSubTopicsByTopic($id)
    {
        $subtopics = SubTopic::where('age', $id)->where('status','active')->get(['id', 'name']);
        return response()->json($subtopics);
    }
}
