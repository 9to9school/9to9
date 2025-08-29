<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentFee;
use App\Models\Teacher;
use App\Models\Attendance;
use App\Models\StudentWallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Shift;
use App\Models\TeacherWallet;



class AttendanceController extends Controller
{
    // attendance system student
    // public function saveAttendance(Request $request)
    // {
       
    //     $request->validate([
    //         'teacher_id' => 'required|integer',
    //         'shift' => 'required',
    //         'students' => 'required|array',
    //         'students.*.student_id' => 'required|exists:students,id',
    //         'students.*.status' => 'required|in:present,absent',
    //     ]);

    //     $teacherId = $request->teacher_id;
    //     $today = Carbon::now()->toDateString();

    //     $presentCount = 0;
    //     $absentCount = 0;

    //     foreach ($request->students as $record) {
    //         $student = Student::find($record['student_id']);

    //         // if(!$stundent){
    //         //     return response()->json([
    //         //         'status' => False,
    //         //         'message' => 'Data not found',
    //         //     ]);
    //         // }

    //         $status = $record['status'];

    //         // Save attendance
    //         Attendance::create([
    //             'student_id' => $student->id,
    //             'date'       => $today,
    //             'status'     => $status,
    //             'school_id'  => $student->school_id,
    //             'teacher_id' => $teacherId,
    //             'shift'       => $request->shift,
    //             'role'        => 'student'
    //         ]);

    //         if ($status === 'absent') {
            
    //             $absentCount++;
    //         } else {
    //            $presentCount++;

    //             // Calculate per-day fee (assuming 22 working days)
    //             $perDayFee = $student->per_month_fee / 22;

    //             // Get wallet balance
    //             $credits = StudentWallet::where('parent_id', $student->user_id)
    //                 ->where('ladger_status', 'credit')
    //                 ->sum('student_coins');

    //             $debits = StudentWallet::where('parent_id', $student->user_id)
    //                 ->where('ladger_status', 'debit')
    //                 ->sum('student_coins');

    //             $balance = $credits - $debits;

    //             // Only deduct if enough balance exists
    //             if ($balance >= $perDayFee) {
    //                 StudentWallet::create([
    //                     'parent_id'     => $student->user_id,
    //                     'ladger_status'  => 'debit',
    //                     'student_coins'  => $balance - $perDayFee,
    //                     'payment_date'   => $today,
    //                     'status'         => 'active',
    //                     'source' => 'apk',
    //                 ]);


    //                 $studentfeesData = [
    //                     'parent_id' => $student->user_id ,
    //                     'school_id' => $student->school_id,
    //                     'student_id' => $student->id,
    //                     'per_month_fees' => $student->per_month_fee,
    //                     'discount_amount' => $student->discount_fee,
    //                     'paid_amount' => $balance - $perDayFee ?? 0.00,
    //                     'date' => Carbon::now()->format('d-m-Y'),
    //                     'payment_mode' => 'wallet',
    //                     'payment_status' => 'paid',
    //                     'source' => 'apk'
    //                 ];

    //                 StudentFee::create($studentfeesData);
    //             }
    //         }
    //     }

    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Attendance saved for ' . $today,
    //         'summary' => [
    //             'present' => $presentCount,
    //             'absent'  => $absentCount,
    //             'date'    => $today,
    //         ],
    //     ]);
    // }
    public function saveAttendance(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|integer',
            'shift' => 'required',
            'students' => 'required|array',
            'students.*.student_id' => 'required|exists:students,id',
            'students.*.status' => 'required|in:present,absent',
        ]);

        $teacherId = $request->teacher_id;
        $today = Carbon::now()->toDateString(); // Format: Y-m-d
        $presentCount = 0;
        $absentCount = 0;

        foreach ($request->students as $record) {
            $student = Student::find($record['student_id']);
            $status = $record['status'];

            // Save attendance
            Attendance::create([
                'student_id' => $student->id,
                'date'       => $today,
                'status'     => $status,
                'school_id'  => $student->school_id,
                'teacher_id' => $teacherId,
                'shift'      => $request->shift,
                'role'       => 'student'
            ]);

            if ($status === 'absent') {
                $absentCount++;
            } else {
                $presentCount++;

                // Calculate per-day fee (assumed 22 working days)
                $perDayFee = round($student->per_month_fee / 22, 2);

                // Wallet Entry (debit)
                StudentWallet::create([
                    'parent_id'     => $student->user_id,
                    'student_id'    => $student->id,
                    'ladger_status' => 'debit',
                    'student_coins' => $perDayFee,
                    'payment_date'  => $today,
                    'status'        => 'active',
                    'source'        => 'apk',
                ]);

                // Student Fee Entry
                StudentFee::create([
                    'parent_id'       => $student->user_id,
                    'school_id'       => $student->school_id,
                    'student_id'      => $student->id,
                    'per_month_fees'  => $student->per_month_fee,
                    'discount_amount' => $student->discount_fee,
                    'paid_amount'     => $perDayFee,
                    'date'            => $today,
                    'payment_mode'    => 'wallet',
                    'payment_status'  => 'paid',
                    'source'          => 'apk'
                ]);
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Attendance saved for ' . $today,
            'summary' => [
                'present' => $presentCount,
                'absent'  => $absentCount,
                'date'    => $today,
            ],
        ]);
    }



    // get attendance
    public function getAttendanceStudents($id){

      $children_ids = Student::where('id',$id)->first();

      if (!$children_ids) {
            return response()->json([
                'success' => false,
                'message' => 'Student Data not found',
                'data'    => [],
            ], 404);
        }

        $totalDays =  Attendance::where('student_id', $id)->where('role','student')
            ->distinct('date')
            ->count('date');

        $absentDays = Attendance::where('student_id', $id)->where('role','student')
            ->where('status', 'absent')
            ->count();

        $presentDays = Attendance::where('student_id', $id)->where('role','student')
        ->where('status', 'present')
        ->count();

        $attendancePercentage = $totalDays > 0 
        ? round(($presentDays / $totalDays) * 100)
        : 0;

        return response()->json([
            'total_days' => $totalDays,
            'present_days' => $presentDays,
            'absent_days' => $absentDays,
            'percentage' => $attendancePercentage
        ]);
    }


    // get attendance
    public function getAttendanceTeacher($id){

      $children_ids = Teacher::where('user_id',$id)->first();

      if (!$children_ids) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data'    => [],
            ], 404);
        }

        $totalDays =  Attendance::where('teacher_id', $id)->where('role','teacher')
            ->distinct('date')
            ->count('date');

        $absentDays = Attendance::where('teacher_id', $id)->where('role','teacher')
            ->where('status', 'absent')
            ->count();

        $presentDays = Attendance::where('teacher_id', $id)->where('role','teacher')
        ->where('status', 'present')
        ->count();



        $attendancePercentage = $totalDays > 0 
        ? round(($presentDays / $totalDays) * 100)
        : 0;

        return response()->json([
            'total_days' => $totalDays,
            'present_days' => $presentDays,
            'absent_days' => $absentDays,
            'percentage' => $attendancePercentage
        ]);
    }

    // attendance system teacher
    public function storeTeacher(Request $request)
    {
        // Validate the overall structure
        $validated = $request->validate([
            'attendance' => 'required|array|min:1',
            'attendance.*.teacher_id' => 'required|exists:teachers,id',
            'attendance.*.school_id'  => 'required|exists:schools,id',
            'attendance.*.status'     => 'required|in:present,absent,halfday',
            'attendance.*.shift_id'   => 'required',
        ]);

         $today = Carbon::now()->toDateString(); // Format: Y-m-d

        foreach ($validated['attendance'] as $data) {
            Attendance::create([
                'student_id' => null,
                'school_id'  => $data['school_id'],
                'teacher_id' => $data['teacher_id'],
                'date'       =>  $today ,
                'status'     => $data['status'],
                'shift'      => $data['shift_id'] ?? null,
            ]);

            if (
                in_array($data['status'], ['present', 'halfday']) &&
                !empty($data['shift_id'])
            ) {
                $teacher = Teacher::find($data['teacher_id']);

                if (!$teacher || !$teacher->basic_salary) {
                    continue;
                }

                $teacherShifts = json_decode($teacher->work_shift ?? '[]', true);

                if (!$teacherShifts || !in_array($data['shift_id'], $teacherShifts)) {
                    continue;
                }

                $date = Carbon::parse($today);
                $month = $date->month;
                $year = $date->year;

                $workingDays = $this->getWorkingDays($month, $year);

                $shiftCount = count($teacherShifts) ?: 1;

                $perDaySalary = $teacher->basic_salary / $workingDays;
                $perShiftSalary = $perDaySalary / $shiftCount;

                if ($data['status'] === 'halfday') {
                    $perShiftSalary /= 2;
                }

                TeacherWallet::create([
                    'teacher_id'     => $teacher->id,
                    'school_id'      =>  $data['school_id'],
                    'teacher_coins'  => $perShiftSalary,
                    'ledger_status'  => 'credit',
                    'payment_date'   => $today,
                    'shift'          => $data['shift_id'],
                    'status'         => 'active',
                    'source'         => 'apk',
                ]);
            }
        }

        return response()->json(['message' => 'Attendance saved successfully']);
    }


    // Workiong days
    public function getWorkingDays($month, $year)
    {
        $workingDays = 0;

        // Get the number of days in the given month/year
        $daysInMonth = Carbon::createFromDate($year, $month, 1)->daysInMonth;

        for ($day = 1; $day <= $daysInMonth; $day++) {
            $date = Carbon::createFromDate($year, $month, $day);

            // Weekdays only (Monday to Friday)
            if (!in_array($date->dayOfWeek, [Carbon::SATURDAY, Carbon::SUNDAY])) {
                $workingDays++;
            }
        }

        return $workingDays;
    }


}
