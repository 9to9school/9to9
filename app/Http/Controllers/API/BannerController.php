<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::select('id', 'heading', 'image', 'description', 'button_name', 'button_link')->where('status', 1)->get();
       
        return response()->json([
            'status' => true,
            'data' => $banners
        ]);
    }
}