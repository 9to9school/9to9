@extends('layouts.admin')

@section('title', 'Edit Event Package')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Event Package</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('event-packages.index') }}">All Event Packages</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Event Package</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('event-packages.update', $package->id) }}" method="POST">
          @csrf
      
          <div class="card">
            <div class="card-header bg-light">
              <h4 class="text-dark">Edit Event Package</h4>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <!-- Title -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" value="{{ old('title', $package->title) }}">
                  @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Price -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Price</label>
                  <input type="number" name="price" class="form-control" step="0.01" value="{{ old('price', $package->price) }}">
                  @error('price') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-3">
                  <label class="form-label">Description</label>
                  <textarea name="description" class="form-control" rows="4">{{ old('description', $package->description) }}</textarea>
                  @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Package Services -->
                <div class="col-md-12 mb-3">
                  <label class="form-label">Select Package Services</label>
                  <select id="package_services" name="package_services[]" class="select2" multiple="multiple"  style="width: 100%;">
                    @php
                      $selectedServices = old('package_services', explode(',', $package->package_services));
                    @endphp
                    @foreach($packageServices as $service)
                      <option value="{{ $service->id }}" {{ in_array($service->id, $selectedServices) ? 'selected' : '' }}>
                        {{ $service->name }}
                      </option>
                    @endforeach
                  </select>
                  @error('package_services') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-control">
                    <option value="active" {{ old('status', $package->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ old('status', $package->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
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
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('styles')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
<!-- jQuery (make sure it's loaded before Select2) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  $(document).ready(function() {
    $('#package_services').select2({
      placeholder: "Select Package Services",
      width: '100%'
    });
  });
</script>
@endpush
