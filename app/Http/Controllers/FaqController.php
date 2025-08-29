<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs=Faq::select('id', 'name', 'description', 'category_id','status')->where('status', '1')->get();

        return view('admin.faq.faq-list', compact('faqs'));
    }

    // Show form to create a new USP
    public function create()
    {
        $category=Category::all();
        return view('admin.faq.create',compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|string',
           
        ]);

        $faq = new Faq();
        $faq->name = $request->name;
        $faq->description = $request->description;
        $faq->category_id = $request->category_id;
        $faq->save();

        return redirect()->route('faq.list')->with('success', 'Faq added successfully.');
    }

    // Show the edit form for a USP
    public function edit($id)
    {
        $faq = Faq::findOrFail($id); 
        $category = Category::all();
        return view('admin.faq.edit', compact('faq', 'category'));
    }

    // Update USP
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|string',
          
        ]);

        $faq = Faq::findOrFail($id);
        $faq->name = $request->name;
        $faq->description = $request->description;
        $faq->category_id = $request->category_id;
        $faq->status = $request->status;
        $faq->save();

        return redirect()->route('faq.list')->with('success', 'faq updated successfully.');
    }

    // Delete USP
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
       
        $faq->delete();

        return redirect()->route('faq.list')->with('success', 'Faq deleted successfully.');
    }
}