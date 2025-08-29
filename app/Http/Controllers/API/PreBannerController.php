<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PreBanner;
use App\Models\PreChildSafety;
use App\Models\PreExplore;
use App\Models\PreProgramTailored;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;

class PreBannerController extends Controller
{
   public function index()
    {
$prebanners = PreBanner::select('id','page','topbar','heading','sub_heading','image','description','button_name1','button_link1','button_name2','button_link2')->where('status', 1)->get();

    $prechildsafety = PreChildSafety::select('id','heading','image','color','description')->where('status', 1)->get();

    $preexplore = PreExplore::select('id','sub_heading','button_name','button_link','description')->where('status', 1)->get();

    $preprogramtailroad = PreProgramTailored::select('id', 'page', 'image', 'heading', 'description', 'sub_heading', 'key1', 'key2', 'key3', 'key4')->where('status', 1)->get();

    return response()->json([
        'status' => true,
        'data' => [
            'prebanners' => $prebanners,
            'prechildsafety' => $prechildsafety,
            'preexplore' => $preexplore,
            'preprogramtailroad' => $preprogramtailroad
        ]
    ]);
}
}