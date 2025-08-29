@extends('layouts.admin')

@section('title', 'Gallery List')
@section('content')

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="page-title mb-1">Gallery List</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                Gallery
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">All Gallery</li>
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
                        <button type="button" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                                data-bs-placement="top" aria-label="Print" data-bs-original-title="Print">
                            <i class="ti ti-printer"></i>
                        </button>
                    </div> -->
                    <!-- <div class="dropdown me-2 mb-2">
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
                        <a href="{{ url('admin/gallery/create') }}" class="btn btn-primary d-flex align-items-center"><i
                                    class="ti ti-square-rounded-plus me-2"></i>Add Gallery</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">

                <div class="col-md-12">
                    <!-- Students List -->
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                            <h4 class="mb-3">Gallery List</h4>
                            
                            
                        </div>
                        <div class="card-body p-0 py-3">

                            <!-- Student List -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>
                                        <th>id</th>
                                        <th>Heading</th>
                                        <th>image</th>
{{--                                        <th>Status</th>--}}
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($galleries as $banner)
                                        <tr>
                                            <td>{{ $banner->id }}</td>
                                            <td>{{ $banner->heading }}</td>
                                            <td>
    @if($banner->image)
        <img src="{{ asset($banner->image) }}" width="50" height="50" alt="Banner Image">
    @elseif($banner->video)
        <video width="100" height="60" controls>
            <source src="{{ asset($banner->video) }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @else
        No Media
    @endif
</td>


{{--                                            <td>--}}
{{--                                                <span class="badge {{ $banner->status ? 'badge-success' : 'badge-danger' }}">--}}
{{--                                                  {{ $banner->status ? 'Active' : 'Inactive' }}--}}
{{--                                                </span>--}}
{{--                                            </td>--}}

                                            <td>
                                                <a href="{{ url('admin/gallery/'. $banner->id. '/edit/') }}" class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('gallery.destroy', $banner->id) }}" method="POST" style="display:inline;">

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
                </div>
            </div>
        </div>
    </div>
@endsection
