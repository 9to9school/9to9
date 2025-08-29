<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usp;
use Illuminate\Support\Facades\Storage;
class USPController extends Controller
{
    public function index()
    {
  
    $usps = Usp::select('id', 'heading', 'description', 'image', 'button_name','button_link')->where('status', '1')->get();
    return response()->json([
        'status' => true,
        'data' => $usps
    ]);
       
}
}