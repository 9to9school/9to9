<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
    $blogs=Blog::select('id', 'heading', 'image', 'description', 'short_summary', 'button_name', 'button_link')->where('status', 1)->get();
    return response()->json([
        'status' => true,
        'data' => $blogs
    ]);
}

}