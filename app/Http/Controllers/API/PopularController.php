<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Popular;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Helpers\ImageHelper;
use Illuminate\Support\Facades\Validator;
use App\Models\Milestone;
use App\Models\Topic;

class PopularController extends Controller
{
    public function index()
    {
        $populars = Popular::select('id', 'title', 'url', 'image', 'banner_image', 'banner_heading', 'description')
            ->where('status', 1)
            ->get();

        return response()->json([
            'status' => true,
            'data' => $populars
        ]);
    }

    public function getPopularData()
    {
       
        $populars = Popular::select('id', 'title', 'url', 'image', 'banner_image', 'banner_heading', 'description','per_month_fee','annual_fee','discount_fee')
            ->where('status', 1)
            ->orderBy('id', 'ASC')
            ->with(['milestones'])  
            ->get();

       
        foreach ($populars as $popular) {
            foreach ($popular->milestones as $milestone) {
              
                $milestone->topics =   $milestone->topics;
                 
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => [
                'populars' => $populars,
            ]
        ], 200);
    }

         

}
