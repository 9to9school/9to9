<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\activityPay;
use App\Models\School;
use App\Models\StudentWallet;
use App\Models\masterPayment; 
use App\Models\KitOrder;
use App\Models\daycarePay;
use App\Models\StudentFee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FinancialReportController extends Controller
{
    public function show(Request $request)
    {
        $schoolId = Auth::id();

        // Total revenue components
        $totalfees = StudentWallet::where('ladger_status', 'debit')
            ->where('school_id', $schoolId)
            ->sum('student_coins');

        $totalcredit = StudentWallet::where('ladger_status', 'credit')
            ->where('school_id', $schoolId)
            ->sum('student_coins');

        $totaleventamount = activityPay::where('school_id', $schoolId)->sum('fees');
        $totalkitamount = KitOrder::where('school_id', $schoolId)->sum('total');
        $totaldaycareamount = daycarePay::where('school_id', $schoolId)->sum('fees');

        $totalrevenue = $totalfees + $totalcredit + $totaleventamount + $totalkitamount + $totaldaycareamount;

        // Date filters
        $feesStart = $request->fees_start_date ? Carbon::parse($request->fees_start_date)->format('Y-m-d') : null;
        $feesEnd = $request->fees_end_date ? Carbon::parse($request->fees_end_date)->format('Y-m-d') : null;

        $walletStart = $request->wallet_start_date ? Carbon::parse($request->wallet_start_date)->format('Y-m-d') : null;
        $walletEnd = $request->wallet_end_date ? Carbon::parse($request->wallet_end_date)->format('Y-m-d') : null;


        $EventStart = $request->wallet_start_date ? Carbon::parse($request->event_start_date)->format('Y-m-d') : null;
        $EventEnd = $request->wallet_end_date ? Carbon::parse($request->event_end_date)->format('Y-m-d') : null;

        $KitStart = $request->kit_start_date ? Carbon::parse($request->kit_start_date)->format('Y-m-d') : null;
        $KitEnd = $request->kit_end_date ? Carbon::parse($request->kit_end_date)->format('Y-m-d') : null;

        // Fees Query
        $feesquery = StudentFee::with('student')->where('school_id', $schoolId);

        if ($feesStart) {
            $feesquery->whereDate('date', '>=', $feesStart);
        }
        if ($feesEnd) {
            $feesquery->whereDate('date', '<=', $feesEnd);
        }

        $feesdata = $feesquery->get();
        $totalPaid = $feesdata->where('payment_status', 'paid')->sum('paid_amount');

        // Wallet Query
        $walletquery = StudentWallet::with('parent')
            ->where('school_id', $schoolId)
            ->where('ladger_status', 'credit');

        if ($walletStart) {
            $walletquery->whereDate('payment_date', '>=', $walletStart);
        }
        if ($walletEnd) {
            $walletquery->whereDate('payment_date', '<=', $walletEnd);
        }

        $walletdata = $walletquery->get();
        $totalwalletPaid = $walletdata->sum('student_coins'); // already filtered by 'credit'


        // event Query
        $eventquery = activityPay::with('activity')->where('school_id', $schoolId);

        if ($EventStart) {
            $eventquery->whereDate('date', '>=', $EventStart);
        }
        if ($EventEnd) {
            $eventquery->whereDate('date', '<=', $EventEnd);
        }

        $eventdata = $eventquery->get();
        $totaleventPaid = $eventdata->sum('fees'); // already filtered by 'credit'

         // event Query
        $kitquery =  KitOrder::with('kit')->where('school_id', $schoolId);

        if ($KitStart) {
            $kitquery->whereDate('date', '>=', $KitStart);
        }
        if ($KitEnd) {
            $kitquery->whereDate('date', '<=', $KitEnd);
        }

        $kitdata = $kitquery->get();
        $totalkitPaid = $kitdata->sum('fees'); // already filtered by 'credit'

        
        $kitdata = KitOrder::with('kit')->where('school_id', $schoolId)->get();

        return view('school.financial_report.report', compact(
            'totaleventamount',
            'totalfees',
            'totalcredit',
            'totalkitamount',
            'totaldaycareamount',
            'totalrevenue',
            'feesdata',
            'walletdata',
            'eventdata',
            'kitdata',
            'totalPaid',
            'totalwalletPaid','totaleventPaid','totalkitPaid'
        ));
    }

}
