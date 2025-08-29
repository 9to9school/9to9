<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Cashfree\Cashfree;
use App\Models\Payment;
use Session;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\StudentWallet;
use App\Models\activityPay;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class activityPayController extends Controller
{
     

    // Offline payment
    public function createOrder(Request $request)
    {
        $student_id = $request->student_id ?? null;
        $activity_id = $request->activity;
        $program = $request->program;
        $paid_amount = $request->pay_fees;
        $date = $request->date ?? now(); // Use current date if not provided
        $role = auth()->user();

        // Define default route
        // $route = 'student.pay.fee.list'; // Default fallback route

        // Role based route override
        if ($role->role == 'admin') {
            $route = 'activity.pay.list';
        }else{
            $route = 'school.activity.pay.list';
        }

        // Check for missing student ID
        if (!$student_id) {
            return redirect()->route($route, ['id' => $student_id])
                ->with('error', 'Payment failed.');
        }

        // Check wallet balance first
        $creditamount = StudentWallet::where('student_id', $student_id)
            ->where('ladger_status', 'credit')
            ->sum('student_coins');

        $debit = StudentWallet::where('student_id', $student_id)
            ->where('ladger_status', 'debit')
            ->sum('student_coins');

        $walletBalance = $creditamount - $debit;

        if ($walletBalance < $paid_amount) {
            return redirect()->route($route, ['id' => $student_id])
                ->with('error', 'Insufficient wallet balance.');
        }

        // Save daycare payment
        $daydata = new activityPay();
        $daydata->activity_id = $activity_id;
        $daydata->student_id = $student_id;
        $daydata->program = $program;
        $daydata->date = $date;
        $daydata->fees = $paid_amount;
        $daydata->status = 'paid';

        if ($daydata->save()) {
            // Save Wallet Debit Entry
            $walletData = [
                'student_id' => $student_id,
                'student_coins' => $paid_amount,
                'date' => $date,
                'ladger_status' => 'debit',
            ];

            $this->WalletPaymentSave($walletData);

            return redirect()->route($route, ['id' => $student_id])
                ->with('success', 'Payment successfully processed.');
        }

        return redirect()->route($route, ['id' => $student_id])
            ->with('error', 'Payment failed.');
    }



    // wallet entry
    public function WalletPaymentSave($walletdata){
        $student_id = $walletdata['student_id'];
        if($student_id){
        $savedata = new StudentWallet();
        $savedata->student_id = $walletdata['student_id'];
        $savedata->student_coins = $walletdata['student_coins'];
        $savedata->payment_date = $walletdata['date'];
        $savedata->ladger_status = $walletdata['ladger_status'];
        $savedata->status = 'active';
        $savedata->save();       
        }     
    }
}
