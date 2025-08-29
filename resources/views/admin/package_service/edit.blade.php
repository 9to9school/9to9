@extends('layouts.admin')

@section('title', 'Edit Package Service')
@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Package Service</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('package-services.index') }}">All Package Services</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Package Service</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('package-services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
         

          <!-- Card Start -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Package Service</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <!-- Name -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name', $service->name) }}">
                  @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Price -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Price</label>
                  <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $service->price) }}">
                  @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Upload Image -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Upload Image</label>
                  <input type="file" class="form-control" name="image" accept="image/*">
                  @if($service->image)
                    <div class="mt-2">
                      <img src="{{ asset($service->image) }}" alt="Package Service Image" width="100">
                    </div>
                  @endif
                  @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-control">
                    <option value="active" {{ old('status', $service->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $service->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                  @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

              </div>
            </div>

            <!-- Submit Button -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          <!-- Card End -->

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
