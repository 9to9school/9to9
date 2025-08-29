@extends('layouts.admin')

@section('title', 'Edit AcademicYear')
@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Academic Year</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('academic.list') }}">Academic Year</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Academic Year</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('academic.update', $academic->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Academic Year</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">
                <!-- Academic Year -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Academic Year</label>
                  <input type="text" name="academic_number" value="{{ old('academic_number', $academic->academic_number ?? '') }}" placeholder="e.g., June 2025/26" class="form-control">
                  @error('academic_number')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="active" {{ old('status', $academic->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $academic->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                  @error('status')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>

          </div>
        </form>
      </div>
    </div>

  </div>
</div>

 @endsection
