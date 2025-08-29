@extends('layouts.admin')

@section('title', 'Pre-Registration Banner List')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Pre-Registration Banner List</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item">App Content</li>
                        <li class="breadcrumb-item active" aria-current="page">Pre-Registration Banners</li>
                    </ol>
                </nav>
            </div>
            <div class="mb-2">
                <a href="{{ route('pre.banner.add') }}" class="btn btn-primary d-flex align-items-center">
                    <i class="ti ti-square-rounded-plus me-2"></i>Add Pre-Registration Banner
                </a>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
        </div>
        @endif

        <div class="card">
            <div class="card-body p-0 py-3">
                <div class="table-responsive custom-datatable-filter">
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>S.No</th>
                                <th>Heading</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($banners as $index => $banner)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $banner->heading ?? 'N/A' }}</td>
                                <td>
                                    @if($banner->image)
                                    <img src="{{ asset($banner->image) }}" width="80" height="50" alt="Banner" class="img-fluid rounded">
                                    @else
                                    No Image
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $banner->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                                        {{ ucfirst($banner->status) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="{{ route('pre.banner.edit', $banner->id) }}" class="btn btn-icon btn-sm btn-light">
                                            <i class="ti ti-edit-circle"></i>
                                        </a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-light"
                                           data-id="{{ $banner->id }}"
                                           data-url="{{ route('pre.banner.delete', ['id' => $banner->id]) }}"
                                           onclick="deleteConfirmation(this)">
                                            <i class="ti ti-trash-x"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No banners found.</td>
                            </tr>
                            @endforelse
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
    function deleteConfirmation(element) {
        const deleteUrl = element.getAttribute('data-url');

        swal({
            title: "Delete?",
            text: "Are you sure you want to delete this banner?",
            icon: "warning",
            buttons: [true, "Yes, delete it!"],
            dangerMode: true,
        }).then(function (willDelete) {
            if (willDelete) {
                $.ajax({
                    type: 'GET',
                    url: deleteUrl,
                    success: function (response) {
                        if (response.success) {
                            swal("Deleted!", response.message, "success")
                                .then(() => location.reload());
                        } else {
                            swal("Error!", response.message, "error");
                        }
                    },
                    error: function () {
                        swal("Error!", "Something went wrong!", "error");
                    }
                });
            }
        });
    }
</script>
@endsection
