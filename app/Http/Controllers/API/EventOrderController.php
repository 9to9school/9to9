<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Payment;
use App\Models\activityPay;
use App\Models\Event;
use App\Models\StudentWallet;
use App\Models\masterPayment;
use Carbon\Carbon;

class EventOrderController extends Controller
{
    public function eventPayment(Request $request){

            $request->validate([
                'event_id'       => 'required',
                'event_name' => 'required',
                'age' => 'required',
                'student_id'   => 'nullable', 
                'school_id'   =>  'nullable', 
                'parent_id'   =>  'nullable',
                'session_type' => 'required',
                'name'         => 'required|string|max:255',
                'address'      => 'required|string|max:255',
                'city'         => 'required|string|max:255',
                'state'        => 'required|string|max:255',
                'pincode'      => 'required|string|max:10',
                'phone'        => 'required|string|max:15',
                'email'        => 'required|email',
                'amount'        => 'required',
            ]);

            
            $event = Event::find($request->event_id);

             if (! $event) {
                return response()->json([
                    'success' => false,
                    'message' => 'The event with the provided ID does not exist.',
                ], 422);
            }

            $delivery_charge = 40;

            $total = $request->amount;

            if($request->parent_id){
                $userid = $request->parent_id;
            }else{
                $userid = 'CID_' . random_int(100000, 999999);
            }

            $prefix = 'EORDER_';

            $randomString = random_int(100000, 999999);

            $genrate_order_id = $prefix . $randomString;

            $order = activityPay::create([
                'order_id'       => $genrate_order_id,
                'user_id'        => $userid, // FK to users table
                'activity_id'    => $event->id,
                'student_id'     =>  $request->student_id ?? "",
                'parent_id'     =>  $request->parent_id ?? "",
                'school_id'     =>  $request->school_id ?? "",
                'name'           => $request->name,
                'address'        => $request->address,
                'email'          => $request->email,
                'city'           => $request->city,
                'state'          => $request->state,
                'pincode'        => $request->pincode,
                'phone'          => $request->phone,
                'fees'           => $request->amount,
                'age'            =>   $request->age,
                'session_type'  =>    $request->session_type,
                'date'            =>   Carbon::now()->format('d-m-Y'),
                'total'          => $total,
                'status'         => 'pending',
                'source'         => 'apk',
            ]);


            $payMode = "sandbox";        
            $appId = env('CASHFREE_APP_ID');
            $secretKey = env('CASHFREE_SECRET_KEY');
            $APIURL = $payMode === "sandbox"
                ? "https://sandbox.cashfree.com/pg/orders"
                : "https://api.cashfree.com/pg/orders";



            $payload = [
                'order_id' =>  $genrate_order_id,
                'order_amount' => $total,
                'order_currency' => 'INR',
                'customer_details' => [
                    'customer_id' => (string)$userid,
                    'customer_email' => $request->email,
                    'customer_phone' => $request->phone,
                ],
                'order_meta' => [
                    'return_url' => route('payment.event.callback') . '?order_id=' . $genrate_order_id,
                ],
            ];


        // Initialize cURL request
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
        // dd($resData);
        if (isset($resData->cf_order_id)) {
            $paymentSessionId = $resData->payment_session_id;
             return view('payments.eventconfirm',compact('paymentSessionId','payMode'));
          
        } else {
             return response()->json([
            'message' => $resData->message,
             ], 408);
            // return response()->json(['error' => $resData->message ?? 'Unknown error'], 400);
        }

    }

     //  Handle payment status
    public function callback(Request $request)
    {
        $orderId = $request->get('order_id');

        // Verify the transaction with Cashfree
        $APIURL = "https://sandbox.cashfree.com/pg/orders/{$orderId}"; // Correct endpoint for order retrieval
        $appId = env('CASHFREE_APP_ID');
        $secretKey = env('CASHFREE_SECRET_KEY');

        // Initialize cURL
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $APIURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => [
                'X-Client-Secret: ' . $secretKey,
                'X-Client-Id: ' . $appId,
                'Accept: application/json',
                'x-api-version: 2023-08-01',
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $resData = json_decode($response);

        // Check if it's a kit order first
        $event = activityPay::where('order_id', $orderId)->first();


     
        if ($event) {

        if(isset($resData->order_status) && $resData->order_status === 'PAID'){
            // Successful payment processing
            $transactionId = $resData->cf_order_id;
        
            $payment = new Payment();
            $payment->order_id = $resData->order_id;
            $payment->online_tranc_id = $transactionId;
            $payment->payment_session_id = $resData->payment_session_id;
            $payment->customer_id = $resData->customer_details->customer_id ?? null;
            $payment->email = $resData->customer_details->customer_email ?? null;
            $payment->phone = $resData->customer_details->customer_phone ?? null;
            $payment->amount = $resData->order_amount  ?? 0.00;
            $payment->currency = $resData->order_currency;
            $payment->date         = Carbon::now()->format('d-m-Y');
            $payment->payment_mode = 'online';
            $payment->status = $resData->order_status;
            $payment->response = json_encode($resData);
            $payment->source = 'apk';
             $payment->purpose = 'Event order';
            $payment->save();

            masterPayment::create([
                'student_id' => $event->student_id,
                'parent_id' => $event->parent_id ?? null,
                'school_id' =>  $event->school_id ?? null,
                'order_id' => $event->order_id ?? null,
                'total' => $resData->order_amount ?? null,
                'source' => 'apk' ?? null,             
                'purpose' => 'Event order',
            ]);

            $event->status = 'PAID';
            $event->save();

            return response()->json([
            'success' => true,
            'message' => 'Payment successfully processed.',
                // 'data' => [
                //     'kits' => $kits,
                // ]
            ], 200);
 
           
        } else {
           
            // Failed payment processing
            $payment = new Payment();
            $payment->order_id = $resData->order_id ?? null;
            $payment->online_tranc_id = $resData->cf_order_id ?? null;
            $payment->payment_session_id = $resData->payment_session_id ?? null;
            $payment->customer_id = $resData->customer_details->customer_id ?? null;
            $payment->email = $resData->customer_details->customer_email ?? null;
            $payment->phone = $resData->customer_details->customer_phone ?? null;
            $payment->amount = $resData->order_amount ?? 0;
            $payment->currency = $resData->order_currency ?? null;
            $payment->status = $resData->order_status ?? 'failed';
            $payment->date         = Carbon::now()->format('d-m-Y');
            $payment->payment_mode = 'online';
            $payment->response = json_encode($resData);
            $payment->purpose = 'Event order';
            $payment->save();




            $event->status = 'failed';
            $event->save();

            return response()->json([
            'success' => false,
            'message' => 'Payment Failed.',
                // 'data' => [
                //     'kits' => $kits,
                // ]
            ], 200);
        }

      }
    }


    //fees list
    public function EventfeesList($id){
        $data =  activityPay::where('parent_id',$id)->get();

         if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Event order Data not found',
            ]);
        }

        return response()->json([
            'status' => 'true',
            'message' => 'Event order list fetched successfully',
            'data' => $data,
         ]);
    }

   
    // details fees
   public function EventfeesDetails($id)
    {
        $fees = activityPay::find($id);

        if (! $fees) {
            return response()->json([
                'success' => false,
                'message' => 'Event order data not found',
            ], 422);
        }

 

        return response()->json([
            'success' => true,
            'message' => 'Event order details fetched successfully',
            'data' => [
                'fees' => $fees,
            ]
        ]);
    }
}
