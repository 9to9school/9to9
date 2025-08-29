@extends('layouts.admin')

@section('title', 'Specialized Class List')

@section('content')
<div class="content">
  <div class="page-wrapper">
    <div class="content">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">Specialized Class List</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">Specialized Classes</li>
              <li class="breadcrumb-item active" aria-current="page">All Classes</li>
            </ol>
          </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
          <div class="pe-1 mb-2">
            <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
              data-bs-placement="top" aria-label="Refresh">
              <i class="ti ti-refresh"></i>
            </a>
          </div>
          <div class="pe-1 mb-2">
            <button type="button" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
              data-bs-placement="top" aria-label="Print">
              <i class="ti ti-printer"></i>
            </button>
          </div>
          <div class="dropdown me-2 mb-2">
            <a href="javascript:void(0);" class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center"
              data-bs-toggle="dropdown">
              <i class="ti ti-file-export me-2"></i>Export
            </a>
            <ul class="dropdown-menu dropdown-menu-end p-3">
              <li><a href="#" class="dropdown-item"><i class="ti ti-file-type-pdf me-2"></i>Export as PDF</a></li>
              <li><a href="#" class="dropdown-item"><i class="ti ti-file-type-xls me-2"></i>Export as Excel</a></li>
            </ul>
          </div>
          <div class="mb-2">
            <a href="{{ url('admin/specialized-class') }}" class="btn btn-primary d-flex align-items-center">
              <i class="ti ti-square-rounded-plus me-2"></i>Add Class
            </a>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

      <!-- Class List -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
          <h4 class="mb-3">Specialized Class List</h4>
        </div>

        <div class="card-body p-0 py-3">
          <div class="custom-datatable-filter table-responsive">
            <table class="table datatable">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Class Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($classes as $class)
                <tr>
                  <td>{{ $class->id }}</td>
                  <td>
                    @if($class->image)
                    <img src="{{ asset($class->image) }}" alt="{{ $class->class_name }}" width="100px">
                    @else
                    <span class="text-muted">No image</span>
                    @endif
                  </td>
                  <td>{{ $class->class_name }}</td>
                  <td>{{ Str::limit($class->description, 100) }}</td>
                  <td>
                    <span class="badge {{ $class->status ? 'badge-success' : 'badge-danger' }}">
                      {{ $class->status ? 'Active' : 'Inactive' }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ url('admin/specialized-class', $class->id) }}" class="btn btn-sm btn-warning">Edit</a>
                   <form action="{{ route('specialized.destroy', $class->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this class?');">
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
@endsection
