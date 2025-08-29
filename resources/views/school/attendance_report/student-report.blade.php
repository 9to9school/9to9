@extends('layouts.school')

@section('title', 'Student Attendance')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Attendance Report</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Report</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Attendance
                            Report</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                <div class="pe-1 mb-2">
                    <!-- <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                        data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                        <i class="ti ti-refresh"></i>
                    </a> -->
                </div>
                <div class="pe-1 mb-2">
                    <!-- <button type="button" class="btn btn-outline-light bg-white btn-icon me-1"
                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print"
                        data-bs-original-title="Print">
                        <i class="ti ti-printer"></i>
                    </button> -->
                </div>
                <div class="dropdown me-2 mb-2">
                    <!-- <a href="javascript:void(0);"
                        class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center"
                        data-bs-toggle="dropdown">
                        <i class="ti ti-file-export me-2"></i>Export
                    </a> -->
                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <!-- <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Filter Section -->
        <div class="filter-wrapper">
            <!-- List Tab -->
            <!-- <div class="list-tab">
                <ul>
                    <li>
                        <a href="https://preskool.dreamstechnologies.com/html/template/attendance-report.html" class="active">Attendance Report</a>
                    </li>
                    <li>
                        <a href="https://preskool.dreamstechnologies.com/html/template/student-attendance-type.html">Students Attendance Type</a>
                    </li>
                    <li>
                        <a href="https://preskool.dreamstechnologies.com/html/template/daily-attendance.html">Daily Attendance</a>
                    </li>
                    <li>
                        <a href="https://preskool.dreamstechnologies.com/html/template/student-day-wise.html">Student Day Wise</a>
                    </li>
                    <li>
                        <a href="https://preskool.dreamstechnologies.com/html/template/teacher-day-wise.html">Teacher Day Wise</a>
                    </li>
                    <li>
                        <a href="https://preskool.dreamstechnologies.com/html/template/teacher-report.html">Teacher Report</a>
                    </li>
                    <li>
                        <a href="https://preskool.dreamstechnologies.com/html/template/staff-day-wise.html">Staff Day Wise</a>
                    </li>
                    <li>
                        <a href="https://preskool.dreamstechnologies.com/html/template/staff-report.html">Staff Report</a>
                    </li>
                </ul>
            </div> -->
            <!-- /List Tab -->
        </div>
        <!-- /Filter Section -->

        <div class="attendance-types page-header justify-content-end">
            <ul class="attendance-type-list">
                <li>
                    <span class="attendance-icon bg-success"><i class="ti ti-checks"></i></span>
                    Present
                </li>
                <li>
                    <span class="attendance-icon bg-danger"><i class="ti ti-x"></i></span>
                    Absent
                </li>
                <li>
                    <span class="attendance-icon bg-pending"><i class="ti ti-clock-x"></i></span>
                    Late
                </li>
                <li>
                    <span class="attendance-icon bg-dark"><i class="ti ti-calendar-event"></i></span>
                    Halfday
                </li>
                <li>
                    <span class="attendance-icon bg-info"><i class="ti ti-clock-up"></i></span>
                    Holiday
                </li>
            </ul>
        </div>

        <!-- Attendance List -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                <h4 class="mb-3">Attendance Report</h4>
                <div class="d-flex align-items-center flex-wrap">
                    <!-- <div class="input-icon-start mb-3 me-2 position-relative">
                        <span class="icon-addon">
                            <i class="ti ti-calendar"></i>
                        </span>
                        <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                        value="Academic Year : 2024 / 2025">
                    </div> -->
                    <div class="dropdown mb-3 me-2">
                        <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                class="ti ti-filter me-2"></i>Filter</a>
                        <div class="dropdown-menu drop-width">
                            <form action="{{ route('student.attendance.report') }}" method="GET">
                                <div class="d-flex align-items-center border-bottom p-3">
                                    <h4>Filter</h4>
                                </div>
                                <div class="p-3 border-bottom">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Month</label>
                                                <select name="month" class="select">
                                                    @for ($m = 1; $m <= 12; $m++)
                                                        <option value="{{ $m }}" {{ $m == $month ? 'selected' : '' }}>
                                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Year</label>
                                                <select name="year" class="select">
                                                    @for ($y = 2020; $y <= now()->year; $y++)
                                                        <option value="{{ $y }}" {{ $y == $year ? 'selected' : '' }}>{{ $y }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        
                                       
                                        
                                       
                                    </div>
                                </div>
                                <div class="p-3 d-flex align-items-center justify-content-end">
                                    <a href="#" class="btn btn-light me-3">Reset</a>
                                    <button type="submit" class="btn btn-primary">Apply</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- <div class="dropdown mb-3">
                        <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                            data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by A-Z
                        </a>
                        <ul class="dropdown-menu p-3">
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1 active">
                                    Ascending
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                    Descending
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                    Recently Viewed
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                    Recently Added
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
            </div>
            <div class="card-body p-0 py-3">

                <!-- Student List -->
                <div class="custom-datatable-filter table-responsive">
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>Student / Date</th>
                                <th>%</th>
                                <th class="no-sort">P</th>
                                <th class="no-sort">L</th>
                                <th class="no-sort">A</th>
                                <th class="no-sort">H</th>
                                <th class="no-sort">F</th>
                               @php
                                    use Carbon\Carbon;
                                    $startDate = Carbon::create($year, $month, 1);
                                    $daysInMonth = $startDate->daysInMonth;
                                @endphp
                                @for ($day = 1; $day <= $daysInMonth; $day++)
                                    @php
                                        $date = Carbon::create($year, $month, $day);
                                        $weekday = $date->format('D');
                                        $dayNumber = $date->format('d');
                                    @endphp
                                    <th class="no-sort">
                                        <div class="text-center">
                                            <span class="day-num d-block">{{ $dayNumber }}</span>
                                            <span>{{ $weekday }}</span>
                                        </div>
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($students as $student)
                                    @php
                                        $attendances = $student->attendances->keyBy('date');
                                        $present = $attendances->where('status', 'present')->count();
                                        $leave = $attendances->where('status', 'leave')->count();
                                        $absent = $attendances->where('status', 'absent')->count();
                                        $holiday = $attendances->where('status', 'holiday')->count();
                                        $halfday = $attendances->where('status', 'halfday')->count();

                                        // Exclude Sundays from total count
                                        $totalDays = collect(range(1, $daysInMonth))
                                            ->map(fn($d) => Carbon::create($year, $month, $d))
                                            ->reject(fn($date) => $date->isSunday())
                                            ->count();

                                        $percentage = $totalDays > 0 ? round(($present / $totalDays) * 100) : 0;
                                    @endphp
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="#" class="avatar avatar-md">
                                                    <img src="{{ asset($student->student_image) }}" class="img-fluid rounded-circle" alt="img">
                                                </a>
                                                <div class="ms-2">
                                                    <p class="text-dark mb-0"><a href="#">{{ $student->first_name }} {{ $student->last_name }}</a></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-soft-success">{{ $percentage }}%</span></td>
                                        <td>{{ $present }}</td>
                                        <td>{{ $leave }}</td>
                                        <td>{{ $absent }}</td>
                                        <td>{{ $holiday }}</td>
                                        <td>{{ $halfday }}</td>

                                        @for ($day = 1; $day <= $daysInMonth; $day++)
                                            @php
                                                $dateObj = Carbon::create($year, $month, $day);
                                                $date = $dateObj->format('Y-m-d');
                                                $weekday = $dateObj->format('D');

                                                if ($weekday === 'Sun') {
                                                    $class = 'bg-secondary'; // Sunday = holiday
                                                } else {
                                                    $status = $attendances[$date]->status ?? null;
                                                    $class = match($status) {
                                                        'present' => 'bg-success',
                                                        'leave' => 'bg-warning',
                                                        'absent' => 'bg-danger',
                                                        'holiday' => 'bg-info',
                                                        'halfday' => 'bg-dark',
                                                        default => 'bg-light'
                                                    };
                                                }
                                            @endphp
                                            <td><span class="attendance-range {{ $class }}"></span></td>
                                        @endfor
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /Student List -->
            </div>
        </div>
        <!-- /Attendance List -->

    </div>
</div>
<!-- /Page Wrapper -->
@endsection

@section('scripts')

@endsection

