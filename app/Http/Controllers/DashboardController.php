<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\School;
use App\Models\StudentWallet;
use App\Models\masterPayment; 
use App\Models\KitOrder;
use App\Models\daycarePay;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $totalStudents = User::where('role', 'student')->count();

        // Active students
        $activeStudents = User::where('role', 'student')->where('status', 'active')->count();

        // Inactive students
        $inactiveStudents = $totalStudents - $activeStudents;

            // Teachers
        $totalTeachers = User::where('role', 'teacher')->count();
        $activeTeachers = User::where('role', 'teacher')->where('status', 'active')->count();
        $inactiveTeachers = $totalTeachers - $activeTeachers;

        $totalSchools = User::where('role', 'school')->count();
        $activeSchools = School::where('status', 'active')->count();
        $inactiveSchools = $totalSchools - $activeSchools;

        $totalfees = StudentWallet::where('ladger_status','debit')->sum('student_coins');

        $totalcredit = StudentWallet::where('ladger_status','credit')->sum('student_coins');


        $totalkitamount = KitOrder::sum('total');

        $totaldaycareamount = daycarePay::sum('fees');

        $totalrevenue = $totalfees + $totalcredit +  $totalkitamount + $totaldaycareamount ;

        
        return view('dashboard', compact('totalStudents', 'activeStudents', 'inactiveStudents', 'totalTeachers' ,
        'activeTeachers' , 'inactiveTeachers' , 'totalSchools' ,'activeSchools' ,'inactiveSchools','totalfees','totalcredit','totalkitamount','totaldaycareamount','totalrevenue'));
    }

    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
