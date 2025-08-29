@extends('layouts.admin')

@section('title', 'Add Shift')

@section('content')
  <div class="page-wrapper">
    <div class="content content-two">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="mb-1">Add Shift</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('shift.list') }}">Shifts</a></li>
              <li class="breadcrumb-item active">Add Shift</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- /Page Header -->

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
      <form action="{{ route('shift.store') }}" method="POST" >
        @csrf

        <div class="card">
          <div class="card-header bg-light">
            <div class="d-flex align-items-center">
            <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
              <i class="ti ti-info-square-rounded fs-16"></i>
            </span>
              <h4 class="text-dark">Add Shift</h4>
            </div>
          </div>

          <div class="card-body pb-1">
            <div class="row">

            
              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Time From</label>
                  <input type="text" name="time_from" class="form-control timepicker" placeholder="Time from" >
                  @error('time_from')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

               <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Time To</label>
                  <input type="text" name="time_to" class="form-control timepicker" placeholder="Time to" >
                  @error('time_to')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>




            </div>
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

      </form>
    </div>
  </div>
@endsection
