@extends('layouts.admin')

@section('title', 'Package Service List')
@section('content')

<div class="content">
<!-- Page Wrapper -->
<div class="page-wrapper">
<div class="content">

<!-- Page Header -->
<div class="d-md-flex d-block align-items-center justify-content-between mb-3">
  <div class="my-auto mb-2">
    <h3 class="page-title mb-1">Package Service List</h3>
    <nav>
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">Package Services</li>
        <li class="breadcrumb-item active" aria-current="page">All Package Services</li>
      </ol>
    </nav>
  </div>
  <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
    <div class="pe-1 mb-2">
      <a href="#" class="btn btn-outline-light bg-white btn-icon me-1">
        <i class="ti ti-refresh"></i>
      </a>
    </div>
    <div class="pe-1 mb-2">
      <button type="button" class="btn btn-outline-light bg-white btn-icon me-1">
        <i class="ti ti-printer"></i>
      </button>
    </div>
    <div class="dropdown me-2 mb-2">
      <a href="javascript:void(0);" class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center" data-bs-toggle="dropdown">
        <i class="ti ti-file-export me-2"></i>Export
      </a>
      <ul class="dropdown-menu dropdown-menu-end p-3">
        <li><a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-file-type-pdf me-2"></i>Export as PDF</a></li>
        <li><a href="javascript:void(0);" class="dropdown-item"><i class="ti ti-file-type-xls me-2"></i>Export as Excel</a></li>
      </ul>
    </div>
    <div class="mb-2">
      <a href="{{ route('package-services.create') }}" class="btn btn-primary d-flex align-items-center">
        <i class="ti ti-square-rounded-plus me-2"></i>Add Package Service
      </a>
    </div>
  </div>
</div>
<!-- /Page Header -->

<!-- Package Service List -->
<div class="card">
  <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
    <h4 class="mb-3">Package Service List</h4>
  </div>

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

  <div class="card-body p-0 py-3">
    <div class="custom-datatable-filter table-responsive">
      <table class="table datatable">
        <thead class="thead-light">
          <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($services as $service)
            <tr>
              <td>{{ $service->id }}</td>
              <td>
                @if($service->image)
                  <img src="{{ asset($service->image) }}" width="50" height="50" alt="Package Service Image">
                @else
                  No Image
                @endif
              </td>
              <td>{{ $service->name }}</td>
              <td>${{ number_format($service->price, 2) }}</td>
              <td>
                <span class="badge {{ $service->status == 'active' ? 'badge-success' : 'badge-danger' }}">
                  {{ ucfirst($service->status) }}
                </span>
              </td>
              <td>
                <a href="{{ route('package-services.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('package-services.destroy', $service->id) }}" method="POST" style="display:inline;">
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

@endsection
