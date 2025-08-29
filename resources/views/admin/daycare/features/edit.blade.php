@extends('layouts.admin')

@section('title', 'Edit Daycare Feature')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Daycare Feature</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('daycare.feature.list') }}">Daycare Features</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">

        <!-- Alerts -->
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
          </div>
        @endif

        @if (Session::has('success'))
          <div class="alert alert-success">{{ Session('success') }}</div>
        @endif

        <form action="{{ route('daycare.feature.update', $daycare->id) }}" method="POST">
          @csrf
          @method('POST')

          <!-- Edit Daycare Form -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Daycare Feature</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <!-- Name -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $daycare->name) }}">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <!-- Price -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $daycare->price) }}">
                    @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <!-- Hour -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Hour</label>
                    <select name="hour" class="form-control">
                      <option value="">Select Hour</option>
                      @for ($i = 1; $i <= 15; $i++)
                        <option value="{{ $i }}" {{ old('hour', $daycare->hour) == $i ? 'selected' : '' }}>{{ $i }}</option>
                      @endfor
                    </select>
                    @error('hour') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <!-- Type -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Type</label>
                    <select name="type" class="form-control">
                      <option value="">Select Type</option>
                      <option value="daily" {{ old('type', $daycare->type) == 'daily' ? 'selected' : '' }}>Daily</option>
                      <option value="weekly" {{ old('type', $daycare->type) == 'weekly' ? 'selected' : '' }}>Weekly</option>
                      <option value="monthly" {{ old('type', $daycare->type) == 'monthly' ? 'selected' : '' }}>Monthly</option>
                    </select>
                    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

              </div>

              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>

            </div>
          </div>
        </form>

      </div>
    </div>

  </div>
</div>
@endsection
