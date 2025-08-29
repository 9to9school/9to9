@extends('layouts.school')

@section('title', 'Remark Details')

@section('content')
<div class="content">
  <div class="page-wrapper">
    <div class="content">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">Remark Details</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('school.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ route('school.remarks.index') }}">All Remarks</a></li>
              <li class="breadcrumb-item active">Remark Details</li>
            </ol>
          </nav>
        </div>
        <div>
          <a href="{{ route('school.remarks.index') }}" class="btn btn-sm btn-primary">Back</a>
        </div>
      </div>
      <!-- /Page Header -->

      <!-- Card View Remark Details -->
      <div class="card">
        <div class="card-header">
          <h4 class="mb-0">Remark Information</h4>
        </div>
        <div class="card-body">

          <div class="row mb-3">
            <div class="col-md-4"><strong>School Name:</strong></div>
            <div class="col-md-8">{{ $remark->school->school_name ?? 'N/A' }}</div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4"><strong>Teacher Name:</strong></div>
            <div class="col-md-8">{{ $remark->teacher->first_name ?? 'N/A' }}</div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4"><strong>Student Name:</strong></div>
            <div class="col-md-8">{{ $remark->student->first_name ?? 'N/A' }}</div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4"><strong>Remark:</strong></div>
            <div class="col-md-8">{{ $remark->remark ?? 'N/A' }}</div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4"><strong>Remark Note:</strong></div>
            <div class="col-md-8">{{ $remark->remark_note ?? 'N/A' }}</div>
          </div>

          <div class="row mb-3">
            <div class="col-md-4"><strong>Image:</strong></div>
            <div class="col-md-8">
              @if ($remark->image)
                <img src="{{ asset($remark->image) }}" alt="Remark Image" width="100">
              @else
                N/A
              @endif
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection
