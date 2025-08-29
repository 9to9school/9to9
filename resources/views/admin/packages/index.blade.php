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
                            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                    <div class="mb-2">
                        <a href="{{ url('admin/package') }}" class="btn btn-primary d-flex align-items-center"><i
                                    class="ti ti-square-rounded-plus me-2"></i>Add Package</a>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Students List -->
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                    <h4 class="mb-3">Package List</h4>
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
                            @foreach($package as $key=>$data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{asset($data->image)}}" width="70px" alt="{{$data->title}}"/>
                                    </td>
                                    <td>{{ $data->title }}</td>
                                    <td>{{ Str::limit($data->description, 50) }}</td>
                                    <td>
                                        <span class="badge {{ $data->status ? 'badge-success' : 'badge-danger' }}">
                                        {{ $data->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/package', $data->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
