<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Session;
use App\Models\Payment;
use App\Models\StudentFee;
use App\Models\StudentWallet;
use App\Models\masterPayment;


class FeesController extends Controller
{
    //Show Collect fee Form
    public function collectfeeAdd(){
      $schoolId = Auth::id();
      $student = Student::where('school_id', $schoolId)->get();
      return view('school.collectpayment.create',compact('student'));
    }


    // show list for collected fees
    public function collectfeeList(){
      $schoolId = Auth::id(); 
      $studentfee = StudentFee::with('student') 
                    ->where('school_id', $schoolId) 
                    ->get(); //
      $studentfee = StudentWallet::with('student')->where('ladger_status','credit')->where('school_id',$schoolId)->get();
      return view('school.collectpayment.list',compact('studentfee'));
    }


     // show list for collected fees
    public function invoiceDetails($id){

      $details = StudentWallet::with('student')->where('id',$id)->first();
      $randomNumber = mt_rand(100000, 999999); // 6-digit random number
       $invnum =  'INV' . $randomNumber;

      return view('school.collectpayment.invoice',compact('details','invnum'));
    }

    //collect fee creat order
    public function createOrdercollectfee(Request $request)
    {

      $order_id = $request->rec_number;
      
          
       $request->validate([
        'students' => 'required',
        'stu_acad' => 'required',
        'pay_date' => 'required',
        'pay_amount' => 'required',
        'note' => 'required',
        'trans_id' => $request->payment_mode === 'offline' ? 'required' : 'nullable',
        'ref_id' => $request->payment_mode === 'offline' ? 'required' : 'nullable',
        'payment_mode' => 'required',
       ]);

      $student_id = $request->students;
      $date = $request->pay_date;
      $fullMonth = Carbon::parse($date)->format('F');

       
       $getstudentdata = Student::where('id',$student_id)->first();



        // Generate unique order ID
    
   
    
        $parent_id = $getstudentdata->user_id;        
        $email =    $getstudentdata->email;
        $phone =  $getstudentdata->primary_contact;
        $amount =  $request->pay_amount;
        $month =  $fullMonth;
   
        $studentname = $getstudentdata->first_name.''.$request->last_name;
        $payment_mode = $request->payment_mode;
        $father_name = $getstudentdata->father_name;
        $transaction_id = $request->trans_id;
        $refid = $request->ref_id;

        $paymentdata['transa_id']  = $transaction_id;
        $paymentdata['ref_id']  =  $refid ;
        $paymentdata['customer_id']  = $parent_id;
        $paymentdata['email'] = $email;
        $paymentdata['month'] = $month;
        $paymentdata['payment_mode'] = $payment_mode;
        $paymentdata['date'] = $date;
        $paymentdata['phone'] =  $phone;
        $paymentdata['amount'] =  $amount;
        $paymentdata['student_id'] =  $student_id;
        $paymentdata['order_id'] =  $order_id;
        $paymentdata['stu_acad'] = $request->stu_acad;
        $paymentdata['note'] = $request->note;
        // $mother_name = $request->mother_name;
        
        
        if($payment_mode == 'online'){

        $payMode = "sandbox";        
        $appId = env('CASHFREE_APP_ID');
        $secretKey = env('CASHFREE_SECRET_KEY');
        $APIURL = $payMode === "sandbox"
            ? "https://sandbox.cashfree.com/pg/orders"
            : "https://api.cashfree.com/pg/orders";

        // Define return and notification URLs
        $returnUrl = route('callback.collected.fee'); // Callback after payment
        $notifyUrl = route('payment.success'); // Webhook for payment updates

        // Order and customer details
        // $orderAmount = 11; // Replace with dynamic input if needed
        $studentdetails = [
            "customer_id" => (string) $parent_id, // Unique ID for the customer
            "customer_name" => $father_name ,
            "customer_email" => $email,
            "customer_phone" => $phone,
            "studentname" => $studentname,
        ];
        

        $payload = json_encode([
            "order_id" => $order_id ,
            "Order_amount" => $amount,
            "order_currency" => "INR",            
            "customer_details" => $studentdetails,
            "order_meta" => [
                "return_url" => $returnUrl . "?order_id={$order_id}",
                "notify_url" => $notifyUrl,
                "payment_methods" => "cc,dc,upi",
            ]
        ]);
        
        
        $data['student_id'] = $student_id;
        $data['month'] = $month;
        $data['date'] = $date;
        $data['stu_acad'] = $request->stu_acad;
        $data['note'] = $request->note;
        $data['pay_amount'] = $amount;

        
        // Store in session
        Session::put('studentsession', $data);
        
        // Initialize cURL request
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $APIURL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $payload,
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
        // if($resData->code == 'order_already_exists'){
        //    $errormess  = 'order with same id is already present';
        // }else{
        //     $errormess = 'Payment failed.';
        // }

        if (isset($resData->cf_order_id)) {
            $paymentSessionId = $resData->payment_session_id;
            return $this->confirmpay($paymentSessionId, $studentdetails, $payMode);
        } else {
            // Log or handle error response
            return redirect()->route('school.collect.fee.add')->with('error', $resData->message);
            // return response()->json(['error' => $resData->message ?? 'Unknown error'], 400);
        }

        }else{
            // For offline/counter/cash payment
            return $this->PaymentSave($paymentdata);
        }
    }

    // redirect on payment page
    public function confirmpay($paymentSessionId,$studentdetails,$payMode){
      return view('web.confirmpay',compact('paymentSessionId','studentdetails','payMode'));
    }

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

    
        // Retrieve session data
        $sessiondata = Session::get('studentsession');

        $student_id = $sessiondata['student_id'];
        // $month = $sessiondata['month'];
        $date = $sessiondata['date'];
        $note = $sessiondata['note'];
        $stu_acad = $sessiondata['stu_acad'];
        $pay_amount = $sessiondata['pay_amount'];

        $getstudentdata = Student::where('id',$student_id)->first();

        // $monthly_fee = $getstudentdata->per_month_fee;

        // Convert month name + date to Carbon date (YYYY-MM)
        // $monthName = $date ?? null;
        // $dateString = $month ?? null;

        // if (!$monthName || !$dateString) {
        //     return redirect()->route('school.collect.fee.add')
        //         ->with('error', 'Month or date missing.');
        // }

        // $year = Carbon::parse($dateString)->year;
        // $monthNumber = Carbon::parse($monthName)->month;
        // $currentMonth = Carbon::create($year, $monthNumber, 1); // 1st day of payment month

        // // Get last StudentFee record for this student
        // $last_fee = StudentFee::where('student_id', $student_id)
        //     ->orderBy('id', 'desc')
        //     ->first();




        $paid_amount = $pay_amount ?? 0.00;

        // if ($last_fee) {
            
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



        if (isset($resData->order_status) && $resData->order_status === 'PAID') {
            // Successful payment processing
            $transactionId = $resData->cf_order_id;
        
            $payment = new Payment();
            $payment->order_id = $resData->order_id;
            $payment->online_tranc_id = $transactionId;
            $payment->payment_session_id = $resData->payment_session_id;
            $payment->customer_id = $resData->customer_details->customer_id ?? null;
            $payment->email = $resData->customer_details->customer_email ?? null;
            $payment->phone = $resData->customer_details->customer_phone ?? null;
            $payment->amount = $paid_to_save ?? $resData->order_amount;
            $payment->currency = $resData->order_currency;
            $payment->date         = $date;
            $payment->payment_mode = 'online';
            $payment->status = $resData->order_status;
            $payment->note = $note;
            $payment->stu_academy = $stu_acad;
            $payment->due_amount = $due_to_save ?? 0.00;
            $payment->purpose = 'wallet recharge';
            $payment->save();

            
            masterPayment::create([
                // 'student_id' => $getstudentdata->student_id,
                'parent_id' => $getstudentdata->user_id ?? null,
                'school_id' =>  $getstudentdata->school_id ?? null,
                'order_id' => $resData->order_id ?? null,
                'total' => $resData->order_amount ?? null,
                'source' => 'admin' ?? null,             
                'purpose' => 'wallet recharge',
            ]);

            // Calculate payment status
            // $amount = $getstudentdata->per_month_fee - $resData->order_amount;
           

            // if($amount == 0 || $amount <= 0){
            //     $status = 'paid';
            // }else if($amount > 0 ){
            //     $status = 'partial';
            // }else{
            //     $status = 'pending';
            // }

            // $studentfeesData = [
            //     'parent_id' => $getstudentdata->user_id,
            //     'school_id' => $getstudentdata->school_id,
            //     'student_id' => $student_id,
            //     'order_id' => $resData->order_id,
            //     'per_month_fees' => $getstudentdata->per_month_fee,
            //     'discount_amount' => $getstudentdata->discount_fee,
            //     'paid_amount' =>  $paid_to_save ?? 0.00,
            //     'month' => $month,
            //     'date' => $date,
            //     'payment_mode' => 'online',
            //     'payment_status' => $status,
            //     'note' => $note,
            //     'due_amount' => $due_to_save,
            //     'stu_academy' => $stu_acad
            // ];

            // StudentFee::create($studentfeesData);

            $walletdata['student_id'] = $student_id;
            $walletdata['student_coins'] = $paid_amount;
            $walletdata['date'] =  $date;
            $walletdata['ledger_status'] =  'credit';
            $walletdata['parent_id'] = $getstudentdata->user_id;
            $walletdata['school_id'] = $getstudentdata->school_id;

            // Save data Student Wallet
            $this->WalletPaymentSave($walletdata);

            // Clear session and redirect
            Session::forget('studentsession');

            return redirect()->route('school.collect.fee.add')->with('success', 'Payment successfully processed.');
        } else {
           
            // Failed payment processing
            $payment = new Payment();
            $payment->order_id = $resData->order_id ?? null;
            $payment->online_tranc_id = $resData->cf_order_id ?? null;
            $payment->payment_session_id = $resData->payment_session_id ?? null;
            $payment->customer_id = $resData->customer_details->customer_id ?? null;
            $payment->email = $resData->customer_details->customer_email ?? null;
            $payment->phone = $resData->customer_details->customer_phone ?? null;
            $payment->amount =   0.00;
            $payment->currency = $resData->order_currency ?? null;
            $payment->status = $resData->order_status ?? 'failed'; 
            $payment->date         = $date;
            $payment->payment_mode = 'online';
            $payment->response = json_encode($resData);
            $payment->note = $note;
            $payment->stu_academy = $stu_acad;
            $payment->save();

            $status = 'failed';

            
            // $studentfeesData = [
            //     'parent_id' => $getstudentdata->user_id,
            //     'school_id' => $getstudentdata->school_id,
            //     'student_id' => $student_id,
            //     'order_id' => $resData->order_id,
            //     'per_month_fees' => $getstudentdata->school_id,
            //     'discount_amount' => $getstudentdata->school_id,
            //     'paid_amount' => $paid_to_save ?? 0.00,
            //     'month' => $month,
            //     'date' => $date,
            //     'payment_mode' => 'online',
            //     'payment_status' => $status,
            //     'note' => $note,
            //     'stu_academy' => $stu_acad,
            //     'due_amount' => $due_to_save
            // ];

            // StudentFee::create($studentfeesData);
            // Clear session and redirect
            Session::forget('studentsession');
            return redirect()->route('school.collect.fee.add')->with('error', 'Payment failed.');
        }
    }

     //for offline paymnet
    public function PaymentSave($paymentdata)
    {
        $student_id = $paymentdata['student_id'] ?? null;

        if (!$student_id) {
            return redirect()->route('school.collect.fee.add')
                ->with('error', 'Payment failed: Student ID is missing.');
        }

        // Update Student Fee record
        $data = Student::where('id', $student_id)->orderBy('id','DESC')->first();

        // $monthly_fee = $data->per_month_fee;

        // // Convert month name + date to Carbon date (YYYY-MM)
        // $monthName = $paymentdata['month'] ?? null;
        // $dateString = $paymentdata['date'] ?? null;

        // if (!$monthName || !$dateString) {
        //     return redirect()->route('school.collect.fee.add')
        //         ->with('error', 'Month or date missing.');
        // }

        // $year = Carbon::parse($dateString)->year;
        // $monthNumber = Carbon::parse($monthName)->month;
        // $currentMonth = Carbon::create($year, $monthNumber, 1); // 1st day of payment month

        // // Get last StudentFee record for this student
        // $last_fee = StudentFee::where('student_id', $student_id)
        //     ->orderBy('id', 'desc')
        //     ->first();

        $paid_amount = $paymentdata['amount'] ?? 0.00;

        // if ($last_fee) {
            
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
        
        // Initialize payment details
        $payment = new Payment();
        $payment->order_id = $paymentdata['order_id'] ?? null;
        $payment->customer_id = $paymentdata['customer_id'] ?? null;
        $payment->email = $paymentdata['email'] ?? null;
        $payment->phone = $paymentdata['phone'] ?? null;
        $payment->amount = $paid_amount ?? 0.00;
        $payment->status = 'paid'; // Conditional status
        $payment->date = $paymentdata['date'] ?? null;
        $payment->payment_mode = $paymentdata['payment_mode'] ?? null;
        $payment->reference_id = $paymentdata['ref_id'] ?? null;
        $payment->transaction_id = $paymentdata['transa_id'] ?? null;
        $payment->due_amount =  0.00;
        $payment->save();
        
        // if ($data){          
        // $studentfeesData = [
        //         'parent_id' => $data->user_id,
        //         'school_id' => $data->school_id,
        //         'student_id' => $student_id,
        //         'order_id' => $paymentdata['order_id'],
        //         'per_month_fees' => $data->per_month_fee,
        //         'discount_amount' => $data->discount_fee,
        //         'paid_amount' =>  $paid_to_save ?? 0.00,
        //         'due_amount' =>  $due_to_save ?? 0.00,
        //         'month' => $paymentdata['month'],
        //         'date' => $paymentdata['date'] ,
        //         'payment_mode' => $paymentdata['payment_mode'],
        //         'payment_status' => $status,
        //         'transaction_id' =>  $paymentdata['transa_id'] ?? null,
        //         'reference_id' => $paymentdata['ref_id'] ?? null,
        //     ];

        //     StudentFee::create($studentfeesData);         
        // }
        masterPayment::create([
        // 'student_id' => $getstudentdata->student_id,
        'parent_id' => $data->user_id ?? null,
        'school_id' =>  $data->school_id ?? null,
        'order_id' => $resData->order_id ?? null,
        'total' => $resData->order_amount ?? null,
        'source' => 'admin' ?? null,             
        'purpose' => 'wallet recharge',
       ]);

        // Save Wallet Data
        $walletData = [
            'student_id' => $student_id,
            'parent_id' => $data->user_id,
            'school_id' => $data->school_id,
            'student_coins' => $paid_amount  ?? 0.00,
            'date' => $paymentdata['date'] ?? null,
            'ledger_status' => 'credit',
        ];

        $this->WalletPaymentSave($walletData);

        return redirect()->route('school.collect.fee.add')
            ->with('success', 'Payment successfully processed.');
    }

    // Add data in wallet data
    public function WalletPaymentSave($walletdata){
        $student_id = $walletdata['student_id'];
        if($student_id){
        $savedata = new StudentWallet();
         $savedata->student_id = $walletdata['student_id'];
        $savedata->parent_id = $walletdata['parent_id'];
        $savedata->school_id = $walletdata['school_id'];
        $savedata->student_coins = $walletdata['student_coins'];
        $savedata->payment_date = $walletdata['date'];
        $savedata->ladger_status = $walletdata['ledger_status'];
        $savedata->status = 'active';
        $savedata->purpose = 'wallet recharge';
        $savedata->save();       
        }     
    }



    
}
