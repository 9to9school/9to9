@extends('layouts.admin')

@section('title', 'Add UspDetails')
@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add UspDetails</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('usp.detail.list') }}">All UspDetails</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add UspDetails</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('usp.detail.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <!-- Card Start -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add UspDetails</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">
                
                <!-- Upload Image -->
                <div class="col-md-6 mb-3">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/*">
                  @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Heading -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Heading</label>
                  <input type="text" name="heading" class="form-control">
                  @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-3">
                  <label class="form-label">Description</label>
                  <textarea name="description" class="form-control" rows="4"></textarea>
                  @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            <!-- Submit Button -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
          <!-- Card End -->

        </form>
      </div>
    </div>
  </div>
</div>
@endsection
