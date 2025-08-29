<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Shift;
use App\Models\TeacherWallet;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;


class AttendanceController extends Controller
{
    //Show  student attendance page
    public function ShowStudent(){
        $schoolId = Auth::id();
        $student = Student::where('school_id',$schoolId)->get();
        return view('school.attendance.student_attendance',compact('student'));
    }

    // Strore Attendance
    public function store(Request $request)
    {
        foreach ($request->attendance as $data) {
            // Validate the minimum required fields
            if (
                empty($data['student_id']) ||
                empty($data['date']) ||
                empty($data['status'])
            ) {
                continue; // skip incomplete
            }


            Attendance::create([
                'student_id' => $data['student_id'],
                'school_id' => Auth::id(),
                'teacher_id' => null,
                'date' => $data['date'],
                'status' => $data['status'],
                'note' => $data['note'] ?? null,
                'role'        => 'student'
            ]);            
        }

        return response()->json(['message' => 'Attendance saved successfully']);
    }

    //Show  student attendance page
    public function ShowTeacher() {
        $schoolId = Auth::id();
        $teachers = Teacher::where('school_id', $schoolId)->get();

        $teacherShiftRows = [];

        foreach ($teachers as $teacher) {
            $shifts = json_decode($teacher->work_shift, true);

            foreach ($shifts as $shiftId) {
                $shift = Shift::find($shiftId);

                $teacherShiftRows[] = [
                    'teacher_id'   => $teacher->teacher_id,
                    'id'   => $teacher->id,
                    'image' => $teacher->image,
                    'name'         => $teacher->first_name." ".$teacher->last_name,
                    'shift_id'     => $shiftId,
                    'shift_name'   => $shift ? $shift->time_from.'-'.$shift->time_to : "",
                ];
            }
        }

        return view('school.attendance.teacher_attendance', compact('teacherShiftRows'));
    }


    // Strore Attendance
    // public function storeTeacher(Request $request)
    // {
    //     foreach ($request->attendance as $data) {
    //         // Basic required fields check
    //         if (
    //             empty($data['teacher_id']) ||
    //             empty($data['date']) ||
    //             empty($data['status'])
    //         ) {
    //             continue;
    //         }

    //         // Save attendance record
    //         Attendance::create([
    //             'student_id' => null,
    //             'school_id'  => Auth::id(),
    //             'teacher_id' => $data['teacher_id'],
    //             'date'       => $data['date'],
    //             'status'     => $data['status'],
    //             'note'       => $data['note'] ?? null,
    //             'shift'      => $data['shift_id'] ?? null,
    //         ]);

    //         // Only proceed with wallet credit if status is 'present' or 'halfday',
    //         // shift_id is provided and matches teacher's assigned shifts
    //         if (
    //             in_array($data['status'], ['present', 'halfday']) &&
    //             !empty($data['shift_id'])
    //         ) {
    //             $teacher = Teacher::find($data['teacher_id']);

    //             if (!$teacher || !$teacher->basic_salary) {
    //                 continue;
    //             }

    //             // Decode teacher's assigned shifts (assumed JSON array)
    //             $teacherShifts = json_decode($teacher->work_shift ?? '[]', true);

    //             // Check if shift_id exists in teacher's shifts
    //             if (!$teacherShifts || !in_array($data['shift_id'], $teacherShifts)) {
    //                 // Invalid shift for this teacher, skip wallet credit
    //                 continue;
    //             }

    //             // Calculate salary
    //             $date = Carbon::parse($data['date']);
    //             $month = $date->month;
    //             $year = $date->year;

    //             $workingDays = $this->getWorkingDays($month, $year);

    //             $shiftCount = count($teacherShifts);
    //             $shiftCount = $shiftCount > 0 ? $shiftCount : 1;

    //             $perDaySalary = $teacher->basic_salary / $workingDays;
    //             $perShiftSalary = $perDaySalary / $shiftCount;

    //             if ($data['status'] === 'halfday') {
    //                 $perShiftSalary /= 2;
    //             }

    //             // Create wallet credit
    //             TeacherWallet::create([
    //                 'teacher_id' => $teacher->id,
    //                 'school_id'  => Auth::id(),
    //                 'teacher_coins'     => $perShiftSalary,
    //                 'ledger_status	'       => 'credit',
    //                 'payment_date'       => $data['date'],
    //                 'shift'       => $data['shift_id'],
    //                 'status' => 'active'
    //             ]);
    //         }
    //     }

    //     return response()->json(['message' => 'Attendance saved successfully']);
    // }
    public function storeTeacher(Request $request)
    {

        // dd($request->attendance);
        foreach ($request->attendance as $data) {
            // Basic validation
            if (
                empty($data['teacher_id']) ||
                empty($data['date']) ||
                empty($data['status'])
            ) {
                continue;
            }

            // Save attendance
            Attendance::create([
                'student_id' => null,
                'school_id'  =>  Auth::id(),
                'teacher_id' => $data['teacher_id'],
                'date'       => $data['date'],
                'status'     => $data['status'],
                'shift'      => $data['shift_id'] ?? null,
            ]);

            // Wallet logic only for present or halfday and valid shift
            if (
                in_array($data['status'], ['present', 'halfday']) &&
                !empty($data['shift_id'])
            ) {
                $teacher = Teacher::find($data['teacher_id']);

                if (!$teacher || !$teacher->basic_salary) {
                    continue;
                }

                $teacherShifts = json_decode($teacher->work_shift ?? '[]', true);

                // Validate shift_id belongs to teacher
                if (!$teacherShifts || !in_array($data['shift_id'], $teacherShifts)) {
                    continue;
                }

                $date = Carbon::parse($data['date']);
                $month = $date->month;
                $year = $date->year;

                $workingDays = $this->getWorkingDays($month, $year);

                $shiftCount = count($teacherShifts);
                $shiftCount = $shiftCount > 0 ? $shiftCount : 1;

                $perDaySalary = $teacher->basic_salary / $workingDays;
                $perShiftSalary = $perDaySalary / $shiftCount;

                if ($data['status'] === 'halfday') {
                    $perShiftSalary /= 2;
                }

                // Credit teacher wallet
                TeacherWallet::create([
                    'teacher_id'     => $teacher->id,
                    'school_id'      => Auth::id(),
                    'teacher_coins'  => $perShiftSalary,
                    'ledger_status'  => 'credit', // FIXED key name
                    'payment_date'   => $data['date'],
                    'shift'          => $data['shift_id'],
                    'status'         => 'active',
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


    // attendance report
    public function studentattReport(Request $request){
        $year = $request->input('year', now()->year);
        $month = $request->input('month', now()->month);

        $startDate = Carbon::create($year, $month, 1)->format('Y-m-d');
        $endDate =  Carbon::create($year, $month, 1)->endOfMonth()->format('Y-m-d');
       $schoolId = Auth::id();
// dd($endDate);
        $students = Student::where('school_id',$schoolId)->with(['attendances' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }])->get();
        // dd($students);
        return view('school.attendance_report.student-report',compact('students', 'month', 'year'));
    }

    public function teacherattReport(Request $request){
        $year = $request->input('year', now()->year);
        $month = $request->input('month', now()->month);

        $startDate = Carbon::create($year, $month, 1)->format('Y-m-d');
        $endDate =  Carbon::create($year, $month, 1)->endOfMonth()->format('Y-m-d');
        $schoolId = Auth::id();

        $students = Teacher::where('school_id',$schoolId)->with(['attendances' => function ($query) use ($startDate, $endDate) {
            $query->whereBetween('date', [$startDate, $endDate]);
        }])->get();
        return view('school.attendance_report.teacher-report',compact('students', 'month', 'year'));
    }



   

}
