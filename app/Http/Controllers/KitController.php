<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kit;
use App\Models\Product;
use App\Models\Popular;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class KitController extends Controller
{
   //show kit list
    public function index(){
        $kits = Kit::all();
        return view('admin.kit.list',compact('kits'));        
    }

    // Show create kit form
    public function create(){
        $product = Product::all();
        $age = Popular::all();
       return view('admin.kit.create',compact('product','age'));        
    }

    
    // Handle  the create request 
    public function save(Request $request){
    
        $request->validate([
            'title' => 'required|string|max:255',  
            'discount_price' => 'required|numeric',  
            'final_price' => 'required|numeric', 
            'products' => 'required', 
            'kit_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',  
            'description' => 'required',  
            'age' => 'required',    
  
        ]);

        if ($request->hasFile('kit_image')) {
            $file = $request->file('kit_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = 'assets/images/products/kit/';
            $file->move($destination, $filename);
            $kitimage = 'assets/images/products/kit/' . $filename;
        }

        $kit = new Kit();
        $kit->title = $request->title;
        $kit->discount_price = $request->discount_price;
        $kit->age = $request->age;
        $kit->final_price = $request->final_price;
        $kit->image = $kitimage;
        $kit->desc = $request->description;
        $kit->products = json_encode($request->products,true);

        $kit->save();



        if($kit){
          return redirect()->route('kit.list')->with('success', 'Kit added successfully.');
        }else{
          return redirect()->route('kit.list')->with('error', 'There was an issue adding the kit.');
        }

    }

    // Show edit kit form
    public function edit($id){
        $getdata = Kit::where('id',$id)->first();
        $product = Product::all();
        $age = Popular::all();
       return view('admin.kit.edit',compact('getdata','product','age'));        
    }
    

    // Handle  the update request 
    public function update(Request $request){
          $request->validate([
            'title' => 'required|string|max:255',  
            'discount_price' => 'required|numeric',  
            'final_price' => 'required|numeric', 
            'products' => 'required', 
            'kit_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',  
            'description' => 'required',  
            'age' => 'required',    
  
        ]);
        $id = $request->id;
        $datafind = kit::find($id);


        if ($request->hasFile('kit_image')) {
            $file = $request->file('kit_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $destination = 'assets/images/products/kit/';
            $file->move($destination, $filename);
            $datafind->image = 'assets/images/products/kit/' . $filename;
        }
      

      
        $datafind->title = $request->title;
        $datafind->discount_price = $request->discount_price;
        $datafind->age = $request->age;
        $datafind->final_price = $request->final_price;
        // $datafind->image = $kitimage;
        $datafind->desc = $request->description;
        $datafind->products = json_encode($request->products,true);


        $datafind->save();

        if($datafind){
          return redirect()->route('kit.list')->with('success', 'Kit updated successfully.');
        }else{
          return redirect()->route('kit.list')->with('error', 'There was an issue updating the Kit.');
        }

    }


    
    // Handle the delete request
    public function destroy($id)
    {
        $product = Kit::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Kit not found',
            ]);
        }

        // Delete image if it exists
        if ($product->image && File::exists($product->image)) {
            File::delete($product->image);
        }

        $deleted = $product->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Kit deleted successfully' : 'Kit to delete product',
        ]);
    }
}
