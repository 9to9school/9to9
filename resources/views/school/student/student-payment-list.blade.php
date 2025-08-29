@extends('layouts.school')

@section('title', 'Student Payment List')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Students pay List</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('school.dashboard')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('school.student.list')}}">Students</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Students pay List </li>
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
                                    class="ti ti-file-type-pdf me-2"></i>Export as PDF</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-xls me-2"></i>Export as Excel </a>
                        </li>
                    </ul>
                </div>
                <div class="mb-2">
                    <a href="#"  data-bs-toggle="modal"  data-bs-target="#payNowModal" class="btn btn-primary d-flex align-items-center"><i
                            class="ti ti-square-rounded-plus me-2"></i>Add</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session('success') }}</strong>
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ Session('error') }}</strong>
            </div>
        @endif

        <!-- Students List -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                <h4 class="mb-3">Students List</h4>
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
                            <form action="https://preskool.dreamstechnologies.com/html/template/students.html">
                                <div class="d-flex align-items-center border-bottom p-3">
                                    <h4>Filter</h4>
                                </div>
                                <div class="p-3 pb-0 border-bottom">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Class</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>I</option>
                                                    <option>II</option>
                                                    <option>III</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Section</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>A</option>
                                                    <option>B</option>
                                                    <option>C</option>
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
                                            <div class="mb-3">
                                                <label class="form-label">Gender</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <select class="select">
                                                    <option>Select</option>
                                                    <option>Active</option>
                                                    <option>Inactive</option>
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
                    <div class="d-flex align-items-center bg-white border rounded-2 p-1 mb-3 me-2">
                        <a href="https://preskool.dreamstechnologies.com/html/template/students.html" class="active btn btn-icon btn-sm me-1 primary-hover"><i
                                class="ti ti-list-tree"></i></a>
                        <a href="https://preskool.dreamstechnologies.com/html/template/student-grid.html" class="btn btn-icon btn-sm bg-light primary-hover"><i
                                class="ti ti-grid-dots"></i></a>
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
                                
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>payment Status</th>         
                                <th>payment Date</th>                         
                                <!-- <th>Status</th> -->
   
                            </tr>
                        </thead>
                        <tbody>
                            @if($paylistdata)
                            <?php $i = 1; ?>
                                @foreach($paylistdata as $data)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ $data->student->father_name ?? '' }}</td>

                                        <td>{{ $data->student_coins }} </td>
             
                                        <td><span class="badge badge-success">
                                            {{ $data->ladger_status }}
                                        </span> 
                                        </td>
                                        <td>
                                            {{ $data->payment_date }}
                                        </td>
                                    </tr>
                                    <?php $i++ ; ?>
                                @endforeach
                            @else
                                <span>
                                    No data Found
                                </span> 
                            @endif
                        </tbody>

                    </table>
                </div>
                <!-- /Student List -->
            </div>
        </div>
        <!-- /Students List -->

    </div>
</div>

<!-- sample model -->
 <?php 
// $id =  request()->route('id');
//  use App\Models\StudentFee;
//  $get = StudentFee::where('student_id',$id)->first();
 ?>
<!-- sample modal content -->
<div id="payNowModal" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Fees Pay</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="post"  action="{{route('school.student.create-order')}}">
            @csrf
            <div class="modal-body p-4">              
                <input type="hidden" value="{{ $paydata->id }}" name="student_id">
                <input type="hidden" value="{{ $paydata->user_id }}" name="parent_id">
                <input type="hidden" value="{{ $paydata->primary_contact }}" name="primary_contact">
                <input type="hidden" value="{{ $paydata->email }}" name="email">
                <input type="hidden" name="father_name" class="form-control" id="field-1" value="{{ $paydata->father_name }}">
                <input type="hidden"  name="mother_name" class="form-control" id="field-1"  value="{{ $paydata->mother_name }}">
              
                 <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">Student Name</label>
                            <input type="text"  name="student_name" class="form-control" id="field-2" value="{{ $paydata->first_name }}"
                                placeholder="Student Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">Age</label>
                            <input type="text" name="age" class="form-control" id="field-2" value="{{ $paydata->ages->title }}"
                                placeholder="Age">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">Month</label>
                            <select class="form-control" id="month" name="month">
                                <option value="">Select Month</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>
                    </div> -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-2" class="form-label">Date</label>
                            <input type="date" class="form-control" id="field-2" name="date"
                                placeholder="Date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Fees</label>
                            <input type="text" class="form-control" id="field-6" name="pay_fees" 
                                placeholder="Fees">
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Payment Mode</label>
                            <select name="payment_mode" class="form-select w-100" id="pay_mode">
                                <option>Select</option>
                                <option value="online" >Online</option>
                                <option value="offline" >Offline</option>
                                <option value="cash">Cash</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row" id="pay_mode_show" style="display:none;">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Transaction Id</label>
                            <input type="text" class="form-control" id="field-6" name="trans_id" value=""
                                placeholder="Transaction Id">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Reference Id</label>
                            <input type="text" class="form-control" id="field-6" name="ref_id" value=""
                                placeholder="Reference Id">
                        </div>
                    </div>
                </div>
            </div>           
            <div class="modal-footer">
                <button type="button" class="btn btn-light me-2 waves-effect"
                    data-bs-dismiss="modal">Close</button>
                <button type="submit"
                    class="btn btn-primary waves-effect waves-light">Submit
                </button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /Modal -->
<!-- /Page Wrapper -->

@endsection



@section('scripts')
<script>
function deleteConfirmation(id) {
swal({
    title: "Delete?",
    text: "Please ensure and then confirm!",
    type: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    reverseButtons: !0
}).then(function (e) {

    if (e.value === true) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'get',
            url: "{{url('/school/delete-student')}}/" + id,
            data: {_token: CSRF_TOKEN},
            dataType: 'JSON',
            success: function (results) {

                if (results.success === true) {
                    swal("Done!", results.message, "success");
                    location.reload();
                } else {
                    swal("Error!", results.message, "error");
                    location.reload();
                }
            }
        });

    } else {
        e.dismiss;
    }

}, function (dismiss) {
    return false;
})
}


$(document).ready(function () {
    $('#pay_mode').change(function () {
      var selectedValue = $(this).val();

      if (selectedValue === 'offline') {
        $('#pay_mode_show').show();  // Show the section
      } else if (selectedValue === 'online') {
        $('#pay_mode_show').hide();  // Hide the section
      } else {
        $('#pay_mode_show').hide();  // Default hide if nothing selected
      }
    });

    // Optionally, hide the section initially
    $('#pay_mode_show').hide();
  })


  
</script>
@endsection


