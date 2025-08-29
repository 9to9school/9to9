<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;

class GalleryController extends Controller
{
    public function index()
    {
       $gallery = Gallery::select('id','video', 'heading')
        ->where('status', 1)
         ->where('type','video')
        ->get()
        ->map(function ($item) {
            // $item->image = $item->image ? asset($item->image) : null;
            $item->video = $item->video ? asset($item->video) : null;
            return $item;
        });

    return response()->json([
        'status' => true,
        'data' => $gallery
    ]);
}
}
