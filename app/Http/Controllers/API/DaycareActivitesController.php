<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\daycare_activites;
use App\Models\daycare_banner;
use App\Models\daycare_program;
use App\Models\daycare_schedule;
use App\Models\daycare_skills;
use App\Models\daycare_whychoose;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DaycareActivitesController extends Controller
{
    public function index()
    {
        $daycareActivities = daycare_activites::select('id', 'heading', 'description', 'image')
            ->where('status', 1)
            ->get();

 $daycarebanner = daycare_banner::select('id', 'heading','sub_heading','image','description','button_name1','button_link1','button_name2','button_link2')
            ->where('status', 1)
            ->get();

            $daycareprogram = daycare_program::select('id', 'image','heading','description','sub_heading','key1','key2','key3','key4')
        ->where('status', 1)->get();

         $daycareschedule= daycare_schedule::select('id', 'heading', 'timing' ,'description', 'image')
        ->where('status', 1)->get();

$daycareskills= daycare_skills::select('id', 'heading','description', 'image')
        ->where('status', 1)->get();

         $daycarewhychoose= daycare_whychoose::select('id', 'heading','description', 'image')
        ->get();

        return response()->json([
        'status' => true,
        'data' => [
            'activities' => $daycareActivities,
            'banner' => $daycarebanner,
            'program' => $daycareprogram,
            'schedule' => $daycareschedule,
            'skills' => $daycareskills,
            'why_choose' => $daycarewhychoose
        ]
    ]);
    }
}
