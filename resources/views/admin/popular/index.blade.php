@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="page-title mb-1">{{$title}}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                Web Content
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                    <div class="mb-2">
                        <a href="{{ url('admin/popular') }}" class="btn btn-primary d-flex align-items-center"><i
                                    class="ti ti-square-rounded-plus me-2"></i>Add Popular</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Students List -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                    <h4 class="mb-3">Popular For You List</h4>
                </div>
                <div class="card-body p-0 py-3">

                    <!-- Student List -->
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                            <tr>

                                <th>id</th>
                                <th>image</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($populars as $key=>$popular)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{asset($popular->image)}}" width="70px" alt="{{$popular->title}}"/>
                                    </td>
                                    <td>{{ $popular->title }}</td>
                                    <td>{{ Str::limit($popular->description, 50) }}</td>
                                    <td>
                                        <span class="badge {{ $popular->status ? 'badge-success' : 'badge-danger' }}">
                                        {{ $popular->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="hstack gap-2 fs-15">
                                            <a href="{{ url('admin/popular', $popular->id) }}" class="btn btn-icon btn-sm btn-light"><i class="ti ti-edit-circle"></i></a>
                                            <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light" onclick="deleteConfirmation({{$popular->id}})"><i class="ti ti-trash-x"></i></a>
                                               
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
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
            url: "{{url('/admin/delete-popular')}}/" + id,
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
