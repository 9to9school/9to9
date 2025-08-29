<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Cashfree\Cashfree;
use App\Models\Payment;
use Session;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\StudentWallet;
use App\Models\daycarePay;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class daycarePayController extends Controller
{
    // Offline payment
    public function createOrder(Request $request)
    {
        $student_id = $request->student_id ?? null;
        $daycare = $request->daycare;
        $hours = $request->hours;
        $type = $request->type;
        $paid_amount = $request->pay_fees;
        $date = $request->date ?? now(); // Use current date if not provided
        $role = auth()->user();

        // Define default route
        // $route = 'student.pay.fee.list'; // Default fallback route

        // Role based route override
        if ($role->role == 'admin') {
            $route = 'daycare.pay.list';
        }else{
            $route = 'school.daycare.pay.list';
        }

        // Check for missing student ID
        if (!$student_id) {
            return redirect()->route($route, ['id' => $student_id])
                ->with('error', 'Student ID missing. Payment failed.');
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
        $daydata = new daycarePay();
        $daydata->daycare_id = $daycare;
        $daydata->student_id = $student_id;
        $daydata->type = $type;
        $daydata->hours = $hours;
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
