<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    //show product list
    public function index(){
        $products = Product::where('status','active')->get();
        return view('admin.product.list',compact('products'));        
    }

    // Show create product form
    public function create(){
       return view('admin.product.create');        
    }

    
    // Handle  the create request 
    public function save(Request $request){
    
        $request->validate([
            'product_name' => 'required|string|max:255',  
            'price' => 'required|numeric',  
            'mrp' => 'required|numeric', 
            'status' => 'required', 
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',  
            'description' => 'required',    
        ]);

        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/products/product/', $filename);
            $productimage = 'assets/images/products/product/' . $filename;
        }

        $product = new Product();
        $product->name = $request->product_name;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->mrp = $request->mrp;
        $product->image = $productimage;
        $product->desc = $request->description;
        $product->save();



        if($product){
          return redirect()->route('product.list')->with('success', 'Product added successfully.');
        }else{
          return redirect()->route('product.list')->with('error', 'There was an issue adding the Product.');
        }

    }

    // Show edit product form
    public function edit($id){
        $getdata = Product::where('id',$id)->first();
       return view('admin.product.edit',compact('getdata'));        
    }
    

    // Handle  the create request 
    public function update(Request $request){
        $request->validate([
            'product_name' => 'required|string|max:255',  
            'price' => 'required|numeric',  
            'mrp' => 'required|numeric', 
            'status' => 'required', 
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',  
            'description' => 'required',    
        ]);
        $id = $request->id;
        $datafind = Product::find($id);


        if ($request->hasFile('product_image')) {
            $file = $request->file('product_image');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move('assets/images/products/product/', $filename);
            $datafind->image = 'assets/images/products/product/' . $filename;
        }else{
            $datafind->image =  $datafind->image;
        }
      

        $product = new Product();
        $datafind->name = $request->product_name;
        $datafind->price = $request->price;
        $datafind->status = $request->status;
        $datafind->mrp = $request->mrp;
        $datafind->desc = $request->description;

        $datafind->save();

        if($datafind){
          return redirect()->route('product.list')->with('success', 'Product updated successfully.');
        }else{
          return redirect()->route('product.list')->with('error', 'There was an issue updating the Product.');
        }

    }


    
    // Handle the delete request
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found',
            ]);
        }

        // Delete image if it exists
        if ($product->product_image && File::exists($product->product_image)) {
            File::delete($product->product_image);
        }

        $deleted = $product->delete();

        return response()->json([
            'success' => $deleted,
            'message' => $deleted ? 'Product deleted successfully' : 'Failed to delete product',
        ]);
    }


}
