<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KitOrder;
use App\Models\activityPay;
use App\Models\StudentFee;

class TransactionController extends Controller
{
    public function getkitorder(){
        $kitdata =  KitOrder::get();
        return view('admin.transactions.kit_transaction',compact('kitdata'));
    }


    public function kitinvoice($id){
        $kitdata =  KitOrder::where('id',$id)->first();
        return view('admin.transactions.kit-invoice',compact('kitdata'));
    }
    
    public function getEventorder(){
        $eventdata =  activityPay::get();
        return view('admin.transactions.event-transaction',compact('eventdata'));
    }

    public function Eventinvoice($id){
        $eventdata =  activityPay::where('id',$id)->first();
        return view('admin.transactions.event-invoice',compact('eventdata'));
    }


    public function getStudentFee(){
        $studentdata =  StudentFee::get();
        return view('admin.transactions.fees-transaction',compact('studentdata'));
    }

    public function Feetinvoice($id){
        $feedata =  StudentFee::where('id',$id)->first();
        return view('admin.transactions.fee-invoice',compact('feedata'));
    }
}
