<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentWallet;

class TransactionController extends Controller
{
    // Transaction List
    public function transactionList($id){
        $data = StudentWallet::where('student_id',$id)->get();

        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }
        

        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => $data,
        ]);
    }
}
