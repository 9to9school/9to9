@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
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
                    <div class="pe-1 mb-2">
                        <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                           data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                            <i class="ti ti-refresh"></i>
                        </a>
                    </div>
                    <div class="pe-1 mb-2">
                        <button type="button" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                                data-bs-placement="top" aria-label="Print" data-bs-original-title="Print">
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
                        <a href="{{ url('admin/school-category') }}" class="btn btn-primary d-flex align-items-center"><i
                                    class="ti ti-square-rounded-plus me-2"></i>Add School Category</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Students List -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                    <h4 class="mb-3">{{$title}}</h4>
                </div>
                <div class="card-body p-0 py-3">

                    <!-- Student List -->
                    <div class="custom-datatable-filter table-responsive">
                        <table class="table datatable">
                            <thead class="thead-light">
                            <tr>

                                <th>id</th>
                                <th>image</th>
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key=>$category)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{asset($category->image)}}" width="70px" alt="{{$category->category_name}}"/>
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ Str::limit($category->content, 50) }}</td>
                                    <td>
                    <span class="badge {{ $category->status ? 'badge-success' : 'badge-danger' }}">
                      {{ $category->status ? 'Active' : 'Inactive' }}
                    </span>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/school-category', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                            Delete
                                        </button>
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
