<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\partnerSchool;
use App\Models\PartnerSchoolReview;
use Illuminate\Support\Facades\Http;

class PartnerSchoolController extends Controller
{
    public function partnerschoollist1(Request $request)
    {
        // Validate query parameters
        $request->validate([
            'pincode' => 'nullable|digits:6', // sirf 6 digit allowed
            'state' => 'nullable|string|max:100',
            'page'    => 'nullable|integer|min:1',
             'per_page'=> 'nullable|integer|min:1|max:100'
        ]);

        $pincode = $request->query('pincode');
        $state = $request->query('state');
         $perPage  = $request->query('per_page', 50); // default 50 if not given

        if ($pincode) {
        // Agar pincode diya hai
        $schools = PartnerSchool::where('zip', $pincode)->where('status','active')->get();
        } elseif ($state) {
        // Agar pincode diya hai
        $schools = PartnerSchool::where('state', $state)->where('status','active')->get();
        } else {
            // Agar pincode nahi diya
        $schools = partnerSchool::where('status','active')->get();  
        }
        
        
        if ($schools->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No schools found',
                'data' => []
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $schools
        ]);
    }

    public function partnerschoollist(Request $request)
    {
        // Input validation
        $request->validate([
            'pincode' => 'nullable|digits:6',
            'state'   => 'nullable|string|max:100',
            'page'    => 'nullable|integer|min:1',
            'per_page'=> 'nullable|integer|min:1|max:100'
        ]);

        // Inputs from APK
        $pincode  = $request->query('pincode');
        $state    = $request->query('state');
        $perPage  = $request->query('per_page'); // default 50 if not given

        // Build query dynamically
        $query = PartnerSchool::where('status', 'active');

        if ($pincode) {
            $query->where('zip', $pincode);
        } elseif ($state) {
            $query->where('state', $state);
        }

        // Paginate results
        $schools = $query->paginate($perPage);

        // Agar koi record nahi mila
        if ($schools->isEmpty()) {
            return response()->json([
                'status'  => false,
                'message' => 'No schools found',
                'data'    => [],
                'pagination' => null
            ]);
        }

        // Successful response with pagination meta
        return response()->json([
            'status' => true,
            'data'   => $schools->items(),
            'pagination' => [
                'current_page'  => $schools->currentPage(),
                'last_page'     => $schools->lastPage(),
                'per_page'      => $schools->perPage(),
                'total'         => $schools->total(),
                'next_page_url' => $schools->nextPageUrl(),
                'prev_page_url' => $schools->previousPageUrl(),
            ]
        ]);
    }

    public function partnerschoolDetails($id)
    {
        $school = partnerSchool::with(['schoolFacility','schoolBanner','schoolGallery','schoolAboutus','review'
        ])->where('status', 'active')->find($id);
        



        if (!$school) {
            return response()->json([
                'status' => false,
                'message' => 'Partner School not found .'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $school
        ]);
    }


    public function getNearbySchoolsGoogle1(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $userLat = $request->latitude;
        $userLng = $request->longitude;

        $apiKey = 'AIzaSyDMtBK-d6Vb-ePgYQdOURRTUQ00aUHKDZU'; // store API key securely in .env

        // Fetch only schools with valid lat/long
        $schools = PartnerSchool::where('status', 'active')
            ->whereNotNull('lat')
            ->whereNotNull('long')
            ->get();

        if ($schools->isEmpty()) {
            return response()->json(['error' => 'No schools with valid lat/long'], 400);
        }

        // Prepare destinations for Distance Matrix API
        $destinations = $schools->map(fn($school) => $school->lat . ',' . $school->long)->toArray();
        $origin = $userLat . ',' . $userLng;
        $destinationsStr = implode('|', $destinations);

        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'origins' => $origin,
            'destinations' => $destinationsStr,
            'key' => $apiKey,
            'units' => 'metric'
        ]);

        $data = $response->json();

        if (($data['status'] ?? '') !== 'OK') {
            return response()->json(['error' => 'Google API error', 'details' => $data], 500);
        }

        $distances = $data['rows'][0]['elements'] ?? [];

        $result = [];
        foreach ($schools as $index => $school) {
            // Only include if distance data exists
            $distanceText = $distances[$index]['status'] === 'OK' ? $distances[$index]['distance']['text'] : null;
            $distanceValue = $distances[$index]['status'] === 'OK' ? $distances[$index]['distance']['value'] : null;

            $result[] = [
                'id' => $school->id,
                'school_name' => $school->school_name,
                'address' => $school->address,
                'lat' => $school->lat,
                'long' => $school->long,
                'city' => $school->city,
                'state' => $school->state,
                'zip' => $school->zip,
                'image' => $school->school_logo,
                'phone' => $school->school_phone_1,
                'email' => $school->school_email,
                'distance_text' => $distanceText,
                'distance_km' => $distanceValue ? $distanceValue / 1000 : null,
            ];
        }

        return response()->json($result);
    }

    public function getNearbySchoolsGoogle(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $userLat = $request->latitude;
        $userLng = $request->longitude;

        // Load from .env
        $apiKey = 'AIzaSyDMtBK-d6Vb-ePgYQdOURRTUQ00aUHKDZU'; // store API key securely in .env
        // STEP 1: Pre-filter schools using Haversine (within 5 km rough range)
        $preFilteredSchools = PartnerSchool::select('*')
            ->selectRaw(
                "(6371 * acos(cos(radians(?)) * cos(radians(lat)) * cos(radians(`long`) - radians(?)) + sin(radians(?)) * sin(radians(lat)))) as distance_km",
                [$userLat, $userLng, $userLat]
            )
            ->where('status', 'active')
            ->having('distance_km', '<=', 5) // only 5 km directly
            ->orderBy('distance_km')
            ->get();

        if ($preFilteredSchools->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'No schools found within 5 km range'
            ], 404);
        }

        $results = [];
        $origin = $userLat . ',' . $userLng;

        // STEP 2: Call Google Distance Matrix API in chunks of 100
        foreach ($preFilteredSchools->chunk(25) as $chunk) {
            $destinationsStr = $chunk->map(fn($s) => $s->lat . ',' . $s->long)->implode('|');

            $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
                'origins' => $origin,
                'destinations' => $destinationsStr,
                'key' => $apiKey,
                'units' => 'metric'
            ]);

            $data = $response->json();

            if (($data['status'] ?? '') !== 'OK') {
                return response()->json([
                    'status' => false,
                    'message' => 'Google API error',
                    'details' => $data
                ], 500);
            }

            $distances = $data['rows'][0]['elements'] ?? [];

            foreach ($chunk as $index => $school) {
                // dd($distances);
            $distanceText = $distanceValue = null;

                if (isset($distances[$index]) && ($distances[$index]['status'] ?? '') === 'OK') {
                    $distanceText = $distances[$index]['distance']['text'];
                    $distanceValue = $distances[$index]['distance']['value'];
                }

                $results[] = [
                    'school_name' => $school->school_name,
                    'address' => $school->address,
                    'lat' => $school->lat,
                    'long' => $school->long,
                    'city' => $school->city,
                    'state' => $school->state,
                    'zip' => $school->zip,
                    'image' => $school->school_logo,
                    'phone' => $school->school_phone_1,
                    'email' => $school->school_email,
                    'distance_text' => $distanceText,
                    'distance_km' => $distanceValue ? $distanceValue / 1000 : null,
                ];
            }
        }

        // STEP 3: Filter final results (<= 5 km road distance)
        $results = array_filter($results, fn($s) => $s['distance_km'] !== null && $s['distance_km'] <= 5);

        if (empty($results)) {
            return response()->json([
                'status' => false,
                'message' => 'No schools found within 5 km road distance'
            ], 404);
        }

        // STEP 4: Sort by nearest first
        usort($results, fn($a, $b) => $a['distance_km'] <=> $b['distance_km']);

        return response()->json([
            'status' => true,
            'schools' => array_values($results)
        ]);
    }






}
