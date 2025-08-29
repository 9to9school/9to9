@extends($layout)

@section('title', 'Activity Payment List')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <?php 
        $role = Auth::user()->role;
        if($role == 'admin'){
          $dashrout = 'admin.dashboard';
          $stulistroute = 'student.list';
          $creatorderroute = 'activity.create-order';
          
        }else{
           $dashrout = 'school.dashboard';
          $stulistroute = 'school.student.list';
          $creatorderroute = 'school.create-order'; 
        }
    ?>
    <div class="content">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Activity pay List</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route($dashrout)}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route($stulistroute)}}">Students</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Activity pay List </li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                <!-- <div class="pe-1 mb-2">
                    <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                        data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                        <i class="ti ti-refresh"></i>
                    </a>
                </div> -->
                <!-- <div class="pe-1 mb-2">
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
                </div> -->
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
                <h4 class="mb-3">Activity payment List</h4>
                <!-- <div class="d-flex align-items-center flex-wrap">
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
                </div> -->
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
                                <!-- <th>Status</th> -->
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @if($paylistdata)
                            <?php $i = 1; ?>
                                @foreach($paylistdata as $data)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ $data->student->first_name }} {{ $data->student->last_name }}</td>
                                        <td>₹ {{ $data->fees }} </td>
                                        <?php 
                                        if($data->status == 'paid'){
                                            $status = 'Paid';
                                            $class = 'success';
                                        }else{
                                            $status = 'Failed';
                                            $class = 'danger';
                                        }
                                        ?>
                                        <td><span class="badge badge-{{$class}}">
                                            {{ $status }}
                                        </span> 
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
        <!-- /Students List -->
    </div>
</div>

<!-- sample model -->
<!-- sample modal content -->
<div id="payNowModal" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Activity Fees Pay</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="post"  action="{{route($creatorderroute)}}">
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
                            <label for="field-2" class="form-label">Date</label>
                            <input type="date" class="form-control" id="field-2" name="date"
                                placeholder="Date" required>
                        </div>
                    </div>
                    
                </div>
                @php
                    $role = Auth::user()->role;
                    $baseUrl = $role === 'admin' ? url('/admin/get-event/') : url('/school/get-event/');
                    $prourl = $role === 'admin' ? url('/admin/get-program/') : url('/school/get-program/');
                @endphp
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Activity</label>
                            <select name="activity" class="form-select w-100" id="activity_id" required data-url="{{ $baseUrl }}" >
                                <option>Select</option>
                                @foreach($activity as $data)
                                <option value="{{$data->id}}" >{{$data->event_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Program</label>
                            <select id="ratio_select" class="form-control" name="program" required data-pro="{{ $prourl }}">
                                <option value="">--Select--</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Fees</label>
                            <input type="text" class="form-control" id="pay_fees" name="pay_fees" value=""
                                placeholder="Fees" readonly>
                        </div>
                    </div>
                </div>
                
                
                <div class="row" id="pay_mode_show" style="display:none;">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Transaction Id</label>
                            <input type="text" class="form-control" id="field-6" name="trans_id" value=""
                                placeholder="Transaction Id" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="field-6" class="form-label">Reference Id</label>
                            <input type="text" class="form-control" id="field-6" name="ref_id" value=""
                                placeholder="Reference Id" >
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


  $('#activity_id').on('change', function () {
    var activityId = $(this).val();
    var url = $('#activity_id').data('url') +'/'+ activityId;

    if (activityId) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                console.log(data); // ✅ Check response
                $('#ratio_select').empty().append('<option value="">--Select--</option>');

                data.forEach(function (item) {
                    $('#ratio_select').append( 
                        `<option value="${item.label}">${item.label}</option>`
                    );
                });

                    $('#pay_fees').val('');
            }
        });
    }
});


$('#ratio_select').on('change', function () {


    var programid = $(this).val();
    var url = $('#ratio_select').data('pro') +'/'+ programid;

    if (programid) {
        $.ajax({
            url: url,
            type: 'GET',
            success: function (data) {
                console.log(data); // ✅ Check response
                
                $('#pay_fees').val(data[0].fees);
            }
        });
    }
});
})




  
</script>
@endsection





