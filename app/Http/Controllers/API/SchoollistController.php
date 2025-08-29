<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Teacher;

class SchoollistController extends Controller
{
     public function schoollist()
    {
        $schools = School::where('status', 'active')->get();

        return response()->json([
            'status' => true,
            'data' => $schools
        ]);
    }

    public function schoolpincode(Request $request)
    {
        $zip = $request->input('zip');

    $pincodes = School::where('status', 'active')
            ->where('zip', $zip)
            ->select('school_name', 'address', 'city', 'state', 'zip')
            ->get();


        return response()->json([
            'status' => true,
            'data' => $pincodes
        ]);
    }

    public function schoolDetails($id)
    {
        $school = School::with(['schoolFacility','schoolBanner','schoolAboutus','schoolGallery'
        ])->where('status', 'active')->find($id);

        if (!$school) {
            return response()->json([
                'status' => false,
                'message' => 'School not found .'
            ], 404);
        }
        
        $getteacher = Teacher::where('school_id',$id)->get();

        $school['teacher'] = $getteacher;
 
        return response()->json([
            'status' => true,
            'data' => $school
        ]);
    }
}
