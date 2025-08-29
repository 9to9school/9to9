@extends('layouts.school')

@section('title', 'Student Attendance')

@section('content')
<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Student Attendance</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="">Dashboard</a>
                        </li>
                        <!-- <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Report</a>
                        </li> -->
                        <li class="breadcrumb-item active" aria-current="page">Student
                            Attendance</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                <div class="pe-1 mb-2">
                    <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                        data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                        <i class="ti ti-refresh"></i>
                    </a>
                </div>
                <div class="pe-1 mb-2">
                    <button type="button" class="btn btn-outline-light bg-white btn-icon me-1"
                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print"
                        data-bs-original-title="Print">
                        <i class="ti ti-printer"></i>
                    </button>
                </div>
                <div class="dropdown me-2 mb-2">
                    <a href="javascript:void(0);"
                        class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center"
                        data-bs-toggle="dropdown">
                        <i class="ti ti-file-export me-2"></i>Export
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                        </li>

                    </ul>
                </div>
                <div class="mb-2">
                <a href="#" id="save-attendance"  class="btn btn-primary d-flex align-items-center"><i
                        class="ti ti-square-rounded-plus me-2"></i>Add attendance</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Student List -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                <h4 class="mb-3">Student Attendance List</h4>
                <div class="d-flex align-items-center flex-wrap">
                    <div class="input-icon-start mb-3 me-2 position-relative">
                        <span class="icon-addon">
                            <i class="ti ti-calendar"></i>
                        </span>
                        <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                        value="Academic Year : 2024 / 2025">
                    </div>
                    <div class="dropdown mb-3 me-2">
                        <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                            data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                class="ti ti-filter me-2"></i>Filter</a>
                        <div class="dropdown-menu drop-width">
                            <form action="https://preskool.dreamstechnologies.com/html/template/student-attendance.html">
                                <div class="d-flex align-items-center border-bottom p-3">
                                    <h4>Filter</h4>
                                </div>
                                <div class="p-3 border-bottom">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Admission No</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>AD9892424</option>
                                                    <option>AD9892425</option>
                                                    <option>AD9892426</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Roll No</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>35004</option>
                                                    <option>35005</option>
                                                    <option>35006</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Janet</option>
                                                    <option>Joann</option>
                                                    <option>Kathleen</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-0">
                                                <label class="form-label">Class</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>XI</option>
                                                    <option>VII</option>
                                                    <option>VIII</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-0">
                                                <label class="form-label">Section</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
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
                    <div class="dropdown mb-3">
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
                    </div>
                </div>
            </div>
            <div class="card-body p-0 py-3">
                <!-- Student List -->
                <div class="custom-datatable-filter table-responsive">
                 
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>
                                <th class="no-sort">
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input" type="checkbox" id="select-all">
                                    </div>
                                </th>
                                 <th>S.no</th>
                                <th>Admission No</th>
                                <!-- <th>Roll No</th> -->
                                <th>Name</th>
                                <!-- <th>Class </th>
                                <th>Section</th> -->
                                <th>Attendance</th>
                                <th>Date</th>
                                <th style="min-width: 200px;">Notes</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php $i = 1 ;?>
                            @if($student)
                            @foreach($student as $data)
                            <tr>
                                <td>
                                    <div class="form-check form-check-md">
                                        <input class="form-check-input row-checkbox" type="checkbox"   value="{{ $data->id }}">
                                    </div>
                                </td>
                                <td>{{$i}}</td>
                                <td>
                                     <input type="hidden" name="attendance[{{ $data->id }}][student_id]" value="{{ $data->id }}">
                                    <a href="#" class="link-primary">{{$data ->admission_number}}</a>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <a href="javascript:void(0);" class="avatar avatar-md"><img
                                                src="{{ asset($data->student_image) }}"
                                                class="img-fluid rounded-circle" alt="img"></a>
                                        <div class="ms-2">
                                            <p class="text-dark mb-0"><a href="javascript:void(0);">{{$data ->first_name}}  {{$data ->last_name}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center check-radio-group flex-nowrap">
                                        <label class="custom-radio">
                                            <input type="radio" name="attendance[{{ $data->id }}][status]" value="present">
                                            <span class="checkmark"></span>
                                            Present
                                        </label>
                                        <!-- <label class="custom-radio">
                                            <input type="radio" name="student1">
                                            <span class="checkmark"></span>
                                            Late
                                        </label> -->
                                        <label class="custom-radio">
                                            <input type="radio" name="attendance[{{ $data->id }}][status]" value="absent">
                                            <span class="checkmark"></span>
                                            Absent
                                        </label>
                                        <label class="custom-radio">
                                            <input type="radio" name="attendance[{{ $data->id }}][status]" value="holiday">
                                            <span class="checkmark"></span>
                                            Holiday
                                        </label>
                                        <label class="custom-radio">
                                            <input type="radio" name="attendance[{{ $data->id }}][status]" value="halfday">
                                            <span class="checkmark"></span>
                                            Halfday
                                        </label>
                                    </div>
                                </td>
                                <td>
                                  <input type="date" name="attendance[{{ $data->id }}][date]" class="form-control" required  data-id="{{ $data->id }}">                             
                               </td>
                                <td>
                                    <input type="text" class="form-control" placeholder="Enter note" name="attendance[{{ $data->id }}][note]"  data-id="{{ $data->id }}"/>
                                </td>
                            </tr> 
                            <?php $i++ ; ?>
                            @endforeach 
                            @endif                           
                        </tbody>
                    </table>
                </div>
                <!-- /Student List -->
            </div>
        </div>
        <!-- /Student List -->

    </div>
    </div>
@endsection

@section('scripts')
<script>
$('#save-attendance').click(function() {
    let attendanceData = [];
    let hasError = false;

    $('.row-checkbox:checked').each(function() {
        let teacherId = $(this).val();

        // pick the radio by its name using teacher id
        let status = $(`input[name="attendance[${teacherId}][status]"]:checked`).val();
        let date = $(`input[name="attendance[${teacherId}][date]"]`).val();
        let note = $(`input[name="attendance[${teacherId}][note]"]`).val();
 console.log(status); 
     console.log(date); 
     console.log(note); 

        if (!status || !date || note === undefined || note.trim() === "") {
            swal("Error", `Please fill status, date, and note for teacher ID ${teacherId}.`, "error");
            hasError = true;
            return false;  // break .each
        }

        attendanceData.push({
            student_id: teacherId,
            status: status,
            date: date,
            note: note
        });
    });

    if (hasError) {
        return;
    }

    if (attendanceData.length === 0) {
        swal("Error", "Select at least one student", "error");
        return;
    }

    $.ajax({
        url: "{{ route('attendance.store') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            attendance: attendanceData
        },
        success: function(response) {
            swal("Success", "Attendance saved successfully", "success");
            location.reload();
        },
        error: function(xhr) {
            console.log(xhr.responseText);
            swal("Error", "Something went wrong", "error");
        }
    });
});
</script>
@endsection