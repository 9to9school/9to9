@extends('layouts.admin')

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
                </div>
                <!-- /Page Header -->

                <!-- Hacks List -->
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">{{$title}}</h4>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- Hacks Table -->
                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($teacher_content as $key => $teacher)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <img src="{{ asset($teacher->journey_image) }}" width="70" alt="{{ $teacher->journey_heading }}">
                                        </td>
                                        <td>@php  echo(Str::limit($teacher->journey_content, 70)) @endphp
                                        </td>
                                        <td>
                                            <span class="badge {{ $teacher->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $teacher->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/add-teacher-page', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
