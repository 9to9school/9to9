<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage; 

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::select('id', 'name', 'description')->where('status', 'active')->get();
         return response()->json([
            'status' => true,
            'data' => $categories
        ]);
    }

 
}