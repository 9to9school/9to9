@extends('layouts.admin')

@section('title', 'Child Learning App')
@section('content')

    <div class="content">
        <!-- Page Wrapper -->
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
                                <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
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
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- child List -->
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3" {{$title}}</h4>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- child Table -->
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
                                @foreach($child_learning as $key => $child)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($child->image) }}" width="70" alt="{{ $child->heading }}">
                                        </td>
                                        <td>{{ $child->heading }}</td>
                                        <td>{{ Str::limit($child->description, 50) }}</td>
                                        <td>
                                            <span class="badge {{ $child->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $child->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/child-learning', $child->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            <form action="{{ url('admin/life-skills-child/'.$child->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /child List -->

            </div>
        </div>
    </div>

@endsection
