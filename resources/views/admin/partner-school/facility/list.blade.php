@extends('layouts.admin')

@section('title', 'Facility List')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">
        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Facility List</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            Facilities
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Facility</li>
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
                    <a href="{{ route('partner.facility.add')}}" class="btn btn-primary d-flex align-items-center"><i
                            class="ti ti-square-rounded-plus me-2"></i>Add Facility</a>
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

        <!-- Facilitys List -->
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                <h4 class="mb-3">Facility List</h4>
                <div class="d-flex align-items-center flex-wrap">
                    <!-- <div class="input-icon-start mb-3 me-2 position-relative">
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
                            <form action="https://preskool.dreamstechnologies.com/html/template/Facilitys.html">
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
                        <a href="https://preskool.dreamstechnologies.com/html/template/Facilitys.html" class="active btn btn-icon btn-sm me-1 primary-hover"><i
                                class="ti ti-list-tree"></i></a>
                        <a href="https://preskool.dreamstechnologies.com/html/template/Facility-grid.html" class="btn btn-icon btn-sm bg-light primary-hover"><i
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
                    </div> -->
                </div>
            </div>
            <div class="card-body p-0 py-3">

                <!-- Facility List -->
                <div class="custom-datatable-filter table-responsive">
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>
                                
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Status</th>
                                <!-- <th>Status</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($facility)
                            <?php $i = 1; ?>
                                @foreach($facility as $data)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                            {{$data->name}}
                                         </td>
                                        <td>
                                        <?php 
                                        if($data->status == 'active'){
                                            $status = 'Active';
                                            $class = 'badge-success';
                                        }else{
                                             $status = 'Inactive';
                                             $class = 'badge-danger';
                                        }
                                        ?>
                                        <span class="badge {{ $class }}">
                                        {{ $status }}
                                        </span>
                                         </td>
                                        <td>
                                            <div class="hstack gap-2 fs-15">
                                                <a href="{{route('partner.facility.edit', $data->id)}}" class="btn btn-icon btn-sm btn-light"><i class="ti ti-edit-circle"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light" onclick="deleteConfirmation({{$data->id}})"><i class="ti ti-trash-x"></i></a>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++ ; ?>
                                @endforeach
                            @endif
                            
                        </tbody>

                    </table>
                </div>
                <!-- /Facility List -->
            </div>
        </div>
        <!-- /Facilitys List -->

    </div>
</div>
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
            url: "{{url('/admin/partner-school-delete-facility')}}/" + id,
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
</script>
@endsection


