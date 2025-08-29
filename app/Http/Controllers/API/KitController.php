<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kit;
use Illuminate\Support\Facades\Validator;


class KitController extends Controller
{

    // get kit list
    public function getKitList()
    {
        $kits = Kit::all();

        // $kits->each(function ($kit) {
        //     $kit->products = $kit->getProducts(); 
        // });
        $kits->each(function ($kit) {
            $kit->product_details = $kit->products_list;
        });

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => [
                'kits' => $kits,
            ]
        ], 200);
    }

    // get kit details
    public function getDetails(Request $request, $id)
    {
        $kit = Kit::find($id);

        if (! $kit) {
            return response()->json([
                'success' => false,
                'message' => 'Kit data not found',
            ], 422);
        }

        // $kit->products = $kit->getProducts();
        $kit->product_details = $kit->products_list;

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => [
                'kit' => $kit,
            ],
        ], 200);
    }


}
