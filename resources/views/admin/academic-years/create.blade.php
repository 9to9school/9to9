@extends('layouts.admin')

@section('title', 'Add Academic Year')

@section('content')
<div class="page-wrapper">
<div class="content content-two">

  <!-- Page Header -->
  <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
    <div class="my-auto mb-2">
      <h3 class="mb-1">Add Academic Year</h3>
      <nav>
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ url('academic.list') }}">Academic Year</a></li>
          <li class="breadcrumb-item active">Add Academic Year</li>
        </ol>
      </nav>
    </div>
  </div>
  <!-- /Page Header -->

  <!-- Alerts -->
  <div class="mb-3">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

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
  </div>
  <!-- /Alerts -->

  <!-- Form Start -->
  <form action="{{ route('academic.store') }}" method="POST">
    @csrf

    <div class="card">
      <div class="card-header bg-light">
        <div class="d-flex align-items-center">
          <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
            <i class="ti ti-info-square-rounded fs-16"></i>
          </span>
          <h4 class="text-dark">Add Academic Year</h4>
        </div>
      </div>

      <div class="card-body pb-1">
        <div class="row">
          <!-- Academic Year -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Academic Year</label>
            <input type="text" name="academic_number" class="form-control" placeholder="e.g., June 2025/26" value="{{ old('academic_number', $academicYear->academic_number ?? '') }}">
            @if ($errors->has('academic_number'))
              <span class="text-danger">{{ $errors->first('academic_number') }}</span>
            @endif
          </div>

          <!-- Status -->
          <div class="col-md-6 mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
              <option value="">Select Status</option>
              <option value="active" {{ old('status', $academicYear->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
              <option value="inactive" {{ old('status', $academicYear->status ?? '') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            @if ($errors->has('status'))
              <span class="text-danger">{{ $errors->first('status') }}</span>
            @endif
          </div>
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
  <!-- /Form End -->

</div>
</div>

@endsection
