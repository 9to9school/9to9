<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommonSetting;

class CommonSettingController extends Controller
{
    public function index()
    {
        $commonsetting = CommonSetting::all();
        return response()->json([
            'status' => true,
            'data' => $commonsetting
        ]);
    }


}