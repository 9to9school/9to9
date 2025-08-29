<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestingPaymentController extends Controller
{

    public function testkit(){
        return view('test.kit');
    }

    public function testEvent(){
        return view('test.event');
    }

    public function testFees(){
        return view('test.fees');
    }
    

    public function dd(Request $request)
    {
        $order_id = 'ORDER_' . uniqid();

        $payload = [
            'order_id' => $order_id,
            'order_amount' => '1000',
            'order_currency' => 'INR',
            'customer_details' => [
                'customer_id' => 'CID_' . uniqid(),
                'customer_email' => 'anandsingh@gmail.com',
                'customer_phone' => '7007680502',
            ],
            'order_meta' => [
                'return_url' => 'https://yourdomain.com/payment/callback',
            ],
        ];
    
            $payMode = "sandbox";        
            $appId = env('CASHFREE_APP_ID');
            // print_r($appId);die;
            $secretKey = env('CASHFREE_SECRET_KEY');
            $APIURL = $payMode === "sandbox"
                ? "https://sandbox.cashfree.com/pg/orders"
                : "https://api.cashfree.com/pg/orders";




        $curl = curl_init();
            curl_setopt_array($curl, [
        CURLOPT_URL => $APIURL,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => [
            'X-Client-Secret: ' . $secretKey,
            'X-Client-Id: ' . $appId,
            'Content-Type: application/json',
            'Accept: application/json',
            'x-api-version: 2023-08-01',
        ],
    ]);

            // Execute cURL request and handle response
            $response = curl_exec($curl);
            curl_close($curl);

            $resData = json_decode($response);

    $resData = json_decode($response);

        $sessionId = $resData->payment_session_id ?? null;


        return view('web.testingconfirmpay',compact('sessionId','payMode'));

    }

}
