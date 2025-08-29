@extends('layouts.admin')

@section('title', 'Daycare List')
@section('content')

<div class="content">
  <div class="page-wrapper">
    <div class="content">
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">Daycare Feature List</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">Daycare</li>
              <li class="breadcrumb-item active" aria-current="page">All Daycare Features</li>
            </ol>
          </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
          <div class="mb-2">
            <a href="{{ route('daycare.feature.create') }}" class="btn btn-primary d-flex align-items-center">
              <i class="ti ti-square-rounded-plus me-2"></i>Add Daycare Feature
            </a>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
          <h4 class="mb-3">Daycare Entries</h4>
        </div>
        <div class="card-body p-0 py-3">
          <div class="custom-datatable-filter table-responsive">
            <table class="table datatable">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Hours</th>
                  <th>Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($daycares as $daycare)
                <tr>
                  <td>{{ $daycare->id }}</td>
                  <td>{{ $daycare->name }}</td>
                  <td>${{ number_format($daycare->price, 2) }}</td>
                  <td>{{ $daycare->hour }} hrs</td>
                  <td><span class="badge bg-info text-dark text-capitalize">{{ $daycare->type }}</span></td>
                  <td>
                    <a href="{{ route('daycare.feature.edit', $daycare->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('daycare.feature.destroy', $daycare->id) }}" method="POST"
                      style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
