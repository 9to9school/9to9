<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Product;
use App\Models\KitOrder;
use App\Models\Kit;
use App\Models\KitOrderPayment;
use App\Models\StudentWallet;
use App\Models\masterPayment;
use App\Models\Student; // If student table is used for wallet
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\KitOrderConfirmed;
use App\Mail\EnquiryNotification;

class KitOrderController extends Controller
{
    // Kit order using wallet
    public function store(Request $request)
    {
        $request->validate([
                'kit_id'       => 'required|exists:kits,id',
                'school_id'       => 'required|exists:kits,id',
                'payment_mode' => 'required',
                'user_id'      => 'required|exists:users,id',  
                'student_id'   => 'required|exists:student_wallet,student_id', 
                'name'         => 'required|string|max:255',
                'address'      => 'required|string|max:255',
                'city'         => 'required|string|max:255',
                'state'        => 'required|string|max:255',
                'pincode'      => 'required|string|max:10',
                'phone'        => 'required|string|max:15',
            ]);

        $kit = Kit::findOrFail($request->kit_id);
        $delivery_charge = 40;
        $total = $kit->final_price + $delivery_charge;

        $order = KitOrder::create([
            'order_id'       => 'ORD' . strtoupper(Str::random(8)),
            'user_id'        => $request->user_id, // FK to users table
            'kit_id'         => $kit->id,
            'name'           => $request->name,
            'address'        => $request->address,
            'city'           => $request->city,
            'state'          => $request->state,
            'pincode'        => $request->pincode,
            'phone'          => $request->phone,
            'item_price'     => $kit->final_price,
            'delivery_charge'=> $delivery_charge,
            'total'          => $total,
            'payment_date' => Carbon::now()->format('d-m-Y'),
            'status'         => 'pending',
        ]);

        if ($request->payment_mode === 'wallet') {
            $studentId = $request->student_id;

            $credit = StudentWallet::where('student_id', $studentId)
                ->where('ladger_status', 'credit')
                ->where('status', 'active')
                ->sum('student_coins');

            $debit = StudentWallet::where('student_id', $studentId)
                ->where('ladger_status', 'debit')
                ->where('status', 'active')
                ->sum('student_coins');

            $balance = $credit - $debit;

            if ($balance < $total) {
                return response()->json([
                    'message' => 'Insufficient wallet balance.',
                    'available_balance' => $balance
                ], 400);
            }

            StudentWallet::create([
                'student_id'     => $studentId,
                'student_coins'  => $total,
                'payment_date'   => now()->toDateString(),
                'ladger_status'  => 'debit',
                'status'         => 'active',
            ]);

            $order->update(['status' => 'paid']);
        }

        return response()->json([
            'message' => 'Order placed successfully',
            'order'   => $order
        ], 201);
    }


    public function onlinepayment(Request $request){

            $request->validate([
                'kit_id'       => 'required|exists:kits,id',
                'payment_mode' => 'required',
                'student_id'   => 'nullable', 
                'school_id'   =>  'nullable', 
                'parent_id'   =>  'nullable',
                'name'         => 'required|string|max:255',
                'address'      => 'required|string|max:255',
                'city'         => 'required|string|max:255',
                'state'        => 'required|string|max:255',
                'pincode'      => 'required|string|max:10',
                'phone' => 'required|digits_between:10,15',
                'email'        => 'required',
                'delivery_charge' => 'required',
            ]);
//    dd($request);
            
            $kit = Kit::findOrFail($request->kit_id);
              
            $delivery_charge = $request->delivery_charge ?? 0.00;
            $total = $kit->final_price + $delivery_charge;

            if($request->parent_id){
                $userid = $request->parent_id;
            }
            // else{
            //     $userid = 'CID_' . random_int(100000, 999999);
            // }

            

            $prefix = 'KORDER_';

            $randomString = random_int(100000, 999999);

            $genrate_order_id = $prefix . $randomString;

            $order = KitOrder::create([
                'order_id'       => $genrate_order_id,
                'kit_id'         => $kit->id,
                'student_id'     =>  $request->student_id ?? "",
                'parent_id'     =>  $request->parent_id ?? "",
                'school_id'     =>  $request->school_id ?? "",
                'name'           => $request->name,
                'address'        => $request->address,
                'email'           => $request->email,
                'city'           => $request->city,
                'state'          => $request->state,
                'pincode'        => $request->pincode,
                'phone'          => $request->phone,
                'item_price'     => $kit->final_price,
                'delivery_charge'=> $delivery_charge,
                'payment_date' =>   Carbon::now()->format('d-m-Y'),
                'total'          => $total,
                'status'         => 'pending',
                'source'         => 'apk',
                'type'           => 'post-reg'
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
                    'customer_id' => (string) $userid,
                    'customer_email' => $request->email,
                    'customer_phone' => $request->phone,
                ],
                'order_meta' => [
                    'return_url' => route('payment.callback') . '?order_id=' . $genrate_order_id,
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

        if (isset($resData->cf_order_id)) {
            $paymentSessionId = $resData->payment_session_id;
            return view('payments.kitconfirm',compact('paymentSessionId','payMode'));         
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
        $kitOrder = KitOrder::where('order_id', $orderId)->first();


     
        if ($kitOrder) {

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
            $payment->purpose = 'kit order';
            $payment->save();

            masterPayment::create([
                'student_id' => $kitOrder->student_id,
                'parent_id' => $kitOrder->parent_id ?? null,
                'school_id' =>  $kitOrder->school_id ?? null,
                'order_id' => $resData->order_id ?? null,
                'total' => $resData->order_amount ?? null,
                'source' => 'apk' ?? null,             
                'purpose' => 'kit order',
            ]);

            $kitOrder->status = 'PAID';
            $kitOrder->save();

  


            // ✅ Prepare data for email
            $userkitdata = [
                'student_name'      =>(optional($kitOrder->student)->first_name ?? '') . ' ' . (optional($kitOrder->student)->last_name ?? ''),
                'order_id'          => $kitOrder->order_id,
                'kit_name'          => $kitOrder->kit->title ?? '',
                'total_amount'      => $kitOrder->total,
                'order_date'        => $kitOrder->payment_date,
                'school_name'       => $kitOrder->school->school_name ?? '',
            ]; 

            $admRecipient = 'anandsingh678970@gmail.com';
            $userRecipient = $kitOrder->email;
            // dd($userRecipient);
            // $userName = $data['name'];

            // ✅ Try sending emails
            try {
                Mail::to($userRecipient)->send(new KitOrderConfirmed($userkitdata));
                // Mail::to($userRecipient)->send(new AdmissionMail($userName));
            } catch (\Exception $e) {
                \Log::error('Email sending failed: ' . $e->getMessage());
                return redirect()->back()->with('error', 'There was a problem sending your email.');
            }

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
            $payment->purpose = 'kit order';
            $payment->save();



            $kitOrder->status = 'failed';
            $kitOrder->save();

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

    // pre registration order
    public function PreregOnlinePayment(Request $request){
   
            $request->validate([
                'kit_id'       => 'required|exists:kits,id',
                'payment_mode' => 'required',
                'student_id'   => 'nullable', 
                'school_id'   =>  'nullable', 
                'parent_id'   =>  'nullable',
                'name'         => 'required|string|max:255',
                'address'      => 'required|string|max:255',
                'city'         => 'required|string|max:255',
                'state'        => 'required|string|max:255',
                'pincode'      => 'required|string|max:10',
                'phone'        => 'required|string|max:15',
                'email'        => 'required',
                'delivery_charge' => 'required',
            ]);

            
            $kit = Kit::findOrFail($request->kit_id);
              
            $delivery_charge = $request->delivery_charge;
            $total = $kit->final_price + $delivery_charge;

            if($request->parent_id){
                $userid = $request->parent_id;
            }
            // else{
            //     $userid = 'CID_' . random_int(100000, 999999);
            // }

            

            $prefix = 'KORDER_';

            $randomString = random_int(100000, 999999);

            $genrate_order_id = $prefix . $randomString;

            $order = KitOrder::create([
                'order_id'       => $genrate_order_id,
                'kit_id'         => $kit->id,
                'student_id'     =>  $request->student_id ?? "",
                'parent_id'     =>  $request->parent_id ?? "",
                'school_id'     =>  $request->school_id ?? "",
                'name'           => $request->name,
                'address'        => $request->address,
                'email'        => $request->email,
                'city'           => $request->city,
                'state'          => $request->state,
                'pincode'        => $request->pincode,
                'phone'          => $request->phone,
                'item_price'     => $kit->final_price,
                'delivery_charge'=> $delivery_charge,
                'payment_date' =>   Carbon::now()->format('d-m-Y'),
                'total'          => $total,
                'status'         => 'pending',
                'source'         => 'apk',
                'type'          => 'pre-reg'
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
                    'customer_id' => (string) $userid,
                    'customer_email' => $request->email,
                    'customer_phone' => $request->phone,
                ],
                'order_meta' => [
                    'return_url' => route('pre.payment.callback') . '?order_id=' . $genrate_order_id,
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

        if (isset($resData->cf_order_id)) {
            $paymentSessionId = $resData->payment_session_id;
            return view('payments.kitconfirm',compact('paymentSessionId','payMode'));         
        } else {
             return response()->json([
            'message' => $resData->message,
             ], 408);
            // return response()->json(['error' => $resData->message ?? 'Unknown error'], 400);
        }

    }

    //  Handle payment status
    public function preregCallback(Request $request)
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
        $kitOrder = KitOrder::where('order_id', $orderId)->first();


     
        if ($kitOrder) {

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
            $payment->purpose = 'kit order';
            $payment->save();

            masterPayment::create([
                'student_id' => $kitOrder->student_id,
                'parent_id' => $kitOrder->parent_id ?? null,
                'school_id' =>  $kitOrder->school_id ?? null,
                'order_id' => $resData->order_id ?? null,
                'total' => $resData->order_amount ?? null,
                'source' => 'apk' ?? null,             
                'purpose' => 'kit order',
            ]);

            $kitOrder->status = 'PAID';
            $kitOrder->save();


             // ✅ Prepare data for email
            $userkitdata = [
                'student_name'      => (optional($kitOrder->student)->first_name ?? '') . ' ' . (optional($kitOrder->student)->last_name ?? ''),
                'order_id'          => $kitOrder->order_id,
                'kit_name'          => $kitOrder->kit->title ?? '',
                'total_amount'      => $kitOrder->total,
                'order_date'        => $kitOrder->payment_date,
                'school_name'       => $kitOrder->school->school_name ?? '',
            ]; 

            $admRecipient = 'anandsingh678970@gmail.com';
            $userRecipient = $kitOrder->email;
            // dd($userRecipient);
            // $userName = $data['name'];

            // ✅ Try sending emails
            try {
                Mail::to($userRecipient)->send(new KitOrderConfirmed($userkitdata));
                // Mail::to($userRecipient)->send(new AdmissionMail($userName));
            } catch (\Exception $e) {
                \Log::error('Email sending failed: ' . $e->getMessage());
                return redirect()->back()->with('error', 'There was a problem sending your email.');
            }


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
            $payment->purpose = 'kit order';
            $payment->save();




            $kitOrder->status = 'failed';
            $kitOrder->save();

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


    public function paymentSuccess(Request $request)
    {
        $apiKey = $request->header('X-API-KEY');
        if ($apiKey !== env('KIT_ORDER_API_KEY')) {
            return response()->json(['message' => 'Unauthorized. Invalid API key.'], 401);
        }

        $request->validate([
            'order_id' => 'required|string|exists:kit_orders,order_id',
            'payment_method' => 'nullable|string',
        ]);

        // Find by order_id, not numeric ID
        $order = KitOrder::where('order_id', $request->order_id)->firstOrFail();

        // Generate transaction ID
        $transactionId = 'TXN-' . strtoupper(Str::random(10));

        // Save payment
        $payment = KitOrderPayment::create([
            'kit_order_id' => $order->id, // internal reference
            'transaction_id' => $transactionId,
            'payment_method' => $request->payment_method ?? 'UPI',
            'payment_status' => 'success',
            'paid_at' => now(),
        ]);

        // Update order status
        $order->update(['status' => 'paid']);

        return response()->json([
            'message' => 'Payment recorded successfully',
            'transaction_id' => $transactionId,
            'payment' => $payment,
            'order_status' => $order->status,
        ]);
    }

    // kit order list
    public function kitOrderList($id){
        $data =  KitOrder::where('parent_id',$id)->where('source','apk')->get();

         if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Kit List Data not found',
            ]);
        }

        return response()->json([
            'status' => 'true',
            'message' => 'Kit list fetched successfully',
            'data' => $data,
        ]);
    }

   
    // details order
   public function kitOrderDetails($id)
    {
        $kitOrder = KitOrder::find($id);

        if (! $kitOrder) {
            return response()->json([
                'success' => false,
                'message' => 'Kit order data not found',
            ], 422);
        }

        // Get the kit data
        $kit = Kit::find($kitOrder->kit_id);

        // Decode the products array from kit (if kit exists)
        $products = [];
        if ($kit && $kit->products) {
            $productIds = json_decode($kit->products, true);
            $products = Product::whereIn('id', $productIds)->get();
        }

        return response()->json([
            'success' => true,
            'message' => 'Kit order details fetched successfully',
            'data' => [
                'kit_order' => $kitOrder,
                'kit'       => $kit,
                'products'  => $products,
            ]
        ]);
    }



}