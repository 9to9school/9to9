@extends('layouts.admin')

@section('title', 'Life Skills Hacks List')
@section('content')

    <div class="content">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content">

                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                    <div class="my-auto mb-2">
                        <h3 class="page-title mb-1">Life Skills Hacks List</h3>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">Life Skills Hacks</li>
                                <li class="breadcrumb-item active" aria-current="page">All Life Skills Hacks</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                        <div class="pe-1 mb-2">
                            <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                               data-bs-placement="top" aria-label="Refresh" title="Refresh">
                                <i class="ti ti-refresh"></i>
                            </a>
                        </div>
                        <div class="pe-1 mb-2">
                            <button type="button" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                                    data-bs-placement="top" aria-label="Print" title="Print">
                                <i class="ti ti-printer"></i>
                            </button>
                        </div>
                        <div class="dropdown me-2 mb-2">
                            <a href="javascript:void(0);" class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center"
                               data-bs-toggle="dropdown">
                                <i class="ti ti-file-export me-2"></i>Export
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end p-3">
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                        <i class="ti ti-file-type-pdf me-2"></i>Export as PDF
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                        <i class="ti ti-file-type-xls me-2"></i>Export as Excel
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-2">
                            <a href="{{ url('admin/life-skills-hacks') }}" class="btn btn-primary d-flex align-items-center">
                                <i class="ti ti-square-rounded-plus me-2"></i>Add Life Skills Hacks
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Hacks List -->
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">Life Skills Hacks List</h4>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- Hacks Table -->
                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($life_skills_hacks as $key => $hacks)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($hacks->image) }}" width="70" alt="{{ $hacks->title }}">
                                        </td>
                                        <td>{{ $hacks->title }}</td>
                                        <td>{{ Str::limit($hacks->description, 50) }}</td>
                                        <td>
                                            <span class="badge {{ $hacks->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $hacks->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>

                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{ url('admin/add-content-list', $hacks->id) }}" class="btn btn-sm btn-warning">Add Content</a>
                                            <a href="{{ url('admin/life-skills-hacks', $hacks->id) }}" class="btn btn-icon btn-sm btn-light"><i class="ti ti-edit-circle"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light" onclick="deleteConfirmation({{$hacks->id}})"><i class="ti ti-trash-x"></i></a>                                            
                                        </div>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /Hacks List -->

            </div>
        </div>
    </div>

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
            url: "{{url('/admin/delete-testilife-skills-hacks')}}/" + id,
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
