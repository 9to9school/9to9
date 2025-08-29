<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.category-list', compact('categories'));
    }

    // Show form to create a new USP
    public function create()
    {
        return view('admin.category.create');
    }

    // Store a new USP
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
           
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.list')->with('success', 'Category added successfully.');
    }

    // Show the edit form for a USP
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    // Update USP
    public function update(Request $request, $id)
    {
        $request->validate([
           'name' => 'required|string|max:255',
            'description' => 'nullable|string',
          
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;
       
        $category->status = $request->status;

        $category->save();

        return redirect()->route('category.list')->with('success', 'category updated successfully.');
    }

    // Delete USP
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
       
        $category->delete();

        return redirect()->route('category.list')->with('success', 'Category deleted successfully.');
    }
}