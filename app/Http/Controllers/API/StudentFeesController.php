<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\StudentFee;
use App\Models\Kit;
use App\Models\KitOrderPayment;
use App\Models\StudentWallet;
use App\Models\masterPayment;
use App\Models\Student; // If student table is used for wallet
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class StudentFeesController extends Controller
{
    public function createOrder(Request $request)
    {
              
        $request->validate([
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
            'amount'       =>  'required',
        ]);
       
        $payMode = "sandbox";        
        $appId = env('CASHFREE_APP_ID');
        $secretKey = env('CASHFREE_SECRET_KEY');
        $APIURL = $payMode === "sandbox"
            ? "https://sandbox.cashfree.com/pg/orders"
            : "https://api.cashfree.com/pg/orders";

        $prefix = 'SFORDER_';

        // Generate a random string using Laravel's Str helper
        $randomString = random_int(100000, 999999);

        // Concatenate the prefix with the random string
        $genrate_order_id = $prefix . $randomString;

        // Generate unique order ID
        $student_id = $request->student_id;
        $order_id = $genrate_order_id;
        $parent_id = $request->parent_id;
        $email = $request->email;
        $phone = $request->primary_contact;
        $amount = $request->amount;
        $studentname = $request->student_name;
        $payment_mode = 'online';
        $father_name = $request->name;


        // Get student data
        // $getstudentdata = Student::find($student_id);

        // if (!$getstudentdata) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Student data not found'
        //     ], 404);
        // }


        // $studentfeesData = [
        //     'parent_id' => $parent_id ,
        //     'school_id' => $getstudentdata->school_id,
        //     'student_id' => $student_id,
        //     'order_id' => $order_id,
        //     'per_month_fees' => $getstudentdata->per_month_fee,
        //     'discount_amount' => $getstudentdata->discount_fee,
        //     'paid_amount' => $amount?? 0.00,
        //     'date' => Carbon::now()->format('d-m-Y'),
        //     'payment_mode' => 'online',
        //     'payment_status' => 'pending',
        //     'source' => 'apk'
        // ];

        // StudentFee::create($studentfeesData);
         // Order and customer details
        // $orderAmount = 11; // Replace with dynamic input if needed
        // $studentdetails = [
        //     "customer_id" => $parent_id, // Unique ID for the customer
        //     "customer_name" => $father_name ,
        //     "customer_email" => $request->email,
        //     "customer_phone" => $request->phone,
        //     "studentname" => $studentname,
        // ];

         $payload = [
            'order_id' =>  $order_id ,
            'order_amount' => $amount,
            'order_currency' => 'INR',
            'customer_details' => [
                'customer_id' =>(string) $parent_id,
                'customer_email' => $request->email,
                'customer_phone' => $request->phone,
            ],
            'order_meta' => [
                'return_url' => route('payment.fees.callback') . '?order_id=' . $genrate_order_id,
            ],
        ];

        

        // $payload = json_encode([
        //     "order_id" => $order_id ,
        //     "order_amount" => $amount,
        //     "order_currency" => "INR",            
        //     "customer_details" => $studentdetails,
        //     "order_meta" => [
        //         "return_url" => route('payment.fees.callback') . '?order_id=' . $genrate_order_id,
        //     ]
        // ]);
        

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
            return view('payments.feesconfirm',compact('paymentSessionId','payMode'));   
        } else {
            
            return response()->json(['error' => $resData->message ?? 'Unknown error'], 400);
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


        

        // $monthly_fee = $getstudentdata->per_month_fees;

        // Convert month name + date to Carbon date (YYYY-MM)
        // $monthName = $date ?? null;
        // $dateString = $month ?? null;

        // if (!$monthName || !$dateString) {
        //     return redirect()->route('school.collect.fee.add')
        //         ->with('error', 'Month or date missing.');
        // }

        // $year = Carbon::parse($dateString)->year;
        // $monthNumber = Carbon::parse($dateString)->month;
        // $currentMonth = Carbon::create($year, $monthNumber, 1); // 1st day of payment month

        // // Get last StudentFee record for this student
        // $last_fee = StudentFee::where('student_id', $getstudentdata->student_id)
        //     ->orderBy('id', 'desc')
        //     ->first();

        // $paid_amount = $getstudentdata->paid_amount ?? 0.00;

        // if($last_fee){
            
        //     // Last fee month as Carbon date
        //     $lastFeeMonth = Carbon::parse($last_fee->month . '-01');

        //     // Calculate months difference (missed months between last paid month and current month)
        //     $months_diff = $lastFeeMonth->diffInMonths($currentMonth) - 1;
        //     if ($months_diff < 0) $months_diff = 0;

        //     // Total due = last due + missed months * monthly fee + current month fee
        //     $total_due = $last_fee->due_amount + ($months_diff * $monthly_fee) + $monthly_fee;

        //     // Calculate new due after current payment
        //     $new_due = $total_due - $paid_amount;

        //     // Determine payment status
        //     if ($new_due <= 0) {
        //         $status = 'paid';
        //         $due_to_save = 0;
        //         $paid_to_save = $total_due;
        //     } elseif ($new_due < $monthly_fee) {
        //         $status = 'partial';
        //         $due_to_save = $new_due;
        //         $paid_to_save = $paid_amount;
        //     } else {
        //         $status = 'pending';
        //         $due_to_save = $new_due;
        //         $paid_to_save = $paid_amount;
        //     }
        // } else {
        //     // No previous record, simple calculation
        //     $new_due = $monthly_fee - $paid_amount;
        //     $status = ($new_due <= 0) ? 'paid' : 'partial';
        //     $due_to_save = $new_due > 0 ? $new_due : 0;
        //     $paid_to_save = $paid_amount;
        // }

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
            $payment->amount = $resData->order_amount ?? 0.00;
            $payment->due_amount =  0.00;
            $payment->currency = $resData->order_currency;
            $payment->date         = Carbon::now()->format('d-m-Y');
            $payment->payment_mode = 'online';
            $payment->status = $resData->order_status;
            $payment->response = json_encode($resData);
            $payment->purpose = 'wallet recharge';
            $payment->save();

           $getstudentdata = Student::where('user_id',$resData->customer_details->customer_id)->first();

            masterPayment::create([
                // 'student_id' => $getstudentdata->student_id,
                'parent_id' => $resData->customer_details->customer_id ?? null,
                'school_id' =>  $getstudentdata->school_id ?? null,
                'order_id' => $resData->order_id ?? null,
                'total' => $resData->order_amount ?? null,
                'source' => 'apk' ?? null,             
                'purpose' => 'wallet recharge',
            ]);


            
            // $getstudentdata->status = 'paid';
            // $getstudentdata->save();

         

            $walletdata['parent_id'] = $resData->customer_details->customer_id ;
            $walletdata['student_coins'] =  $resData->order_amount;
            $walletdata['date'] =  Carbon::now()->format('d-m-Y');
            $walletdata['ledger_status'] =  'credit';
            $walletdata['school_id'] = $getstudentdata->school_id;

            // Save data Student Wallet
            $this->WalletPaymentSave($walletdata);


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
             $payment->purpose = 'wallet recharge';
            $payment->save();

            // $getstudentdata->status = 'failed';
            // $getstudentdata->save();



           
            return response()->json([
            'success' => false,
            'message' => 'Payment failed.',
                // 'data' => [
                //     'kits' => $kits,
                // ]
            ], 200);
        }
    }


     public function WalletPaymentSave($walletdata){
        $parent_id = $walletdata['parent_id'];
        if($parent_id){
            $savedata = new StudentWallet();
            $savedata->school_id = $walletdata['school_id'];
            $savedata->parent_id = $walletdata['parent_id'];
            $savedata->student_coins = $walletdata['student_coins'];
            $savedata->payment_date = $walletdata['date'];
            $savedata->ladger_status = $walletdata['ledger_status'];
            $savedata->status = 'active';
            $savedata->source = 'apk';
            $savedata->purpose = 'wallet recharge';
            $savedata->save();       
        }     
    }


    
    //fees list
    public function studenfeesList($id)
    {
        $data = StudentFee::with(['student:id,first_name,last_name']) // only select needed columns
            ->where('parent_id', $id)
            // ->where('source', 'apk')
            ->get();

        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Student fees data not found',
            ]);
        }

        // Optionally format the output
        $formatted = $data->map(function ($fee) {
            return [
                'fee_id'     => $fee->id,
                'student_id' => $fee->student_id,
                'student_name' => optional($fee->student)->first_name && optional($fee->student)->last_name
                                    ? optional($fee->student)->first_name . ' ' . optional($fee->student)->last_name
                                    : null,
                'amount'     => $fee->paid_amount,
                'date'       => $fee->date,
                'month'      => $fee->month,
                'year'       => $fee->year,
                'status'     => $fee->status,
                'source'     => $fee->source,
            ];
        });

        return response()->json([
            'status' => true,
            'message' => 'Student fees list fetched successfully',
            'data' => $formatted,
        ]);
    }


   
    // details fees
    public function studentfeesDetails($id)
    {
        $fees = StudentFee::find($id);

        if (! $fees) {
            return response()->json([
                'success' => false,
                'message' => 'student fees data not found',
            ], 422);
        }

 

        return response()->json([
            'success' => true,
            'message' => 'fees details fetched successfully',
            'data' => [
                'fees' => $fees,
            ]
        ]);
    }


    //wallet balance
    public function totalWalletBalance($id)
    {
        // Calculate total credits
        $credits = StudentWallet::where('parent_id', $id)
            ->where('ladger_status', 'credit') 
            ->sum('student_coins');
    
        // Calculate total debits
        $debits = StudentWallet::where('parent_id', $id)
            ->where('ladger_status', 'debit')
            ->sum('student_coins');
    
        // Calculate net balance
        $balance = $credits - $debits;
    
        // Get latest transaction (assuming created_at timestamp exists)
        $lastTransaction = StudentWallet::where('parent_id', $id)
            ->latest('created_at') 
            ->first();
    
        if (!$lastTransaction) {
            return response()->json([
                'success' => false,
                'message' => 'No wallet transactions found for this parent.',
            ], 404);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Wallet balance and last transaction fetched successfully.',
            'balance' => round($balance, 2), 
            'last_transaction' => [
                'amount' => $lastTransaction->student_coins,
                'type' => $lastTransaction->ladger_status,
                'date' => $lastTransaction->payment_date,
            ]
        ]);
    }


}
