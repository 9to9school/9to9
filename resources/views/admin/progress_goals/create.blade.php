@extends('layouts.admin')

@section('title', 'Add Progress Goal')
@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add Progress Goal</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('progress-goals.index') }}">All Progress Goals</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add Progress Goal</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('progress-goals.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <!-- Card Start -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add Progress Goal</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">
                <!-- Title -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" name="title" class="form-control">
                  @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Upload Image -->
                <div class="col-md-6 mb-3">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/*">
                  @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

              

                <!-- Status -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                  @error('status') <span class="text-danger">{{ $message }}</span> @enderror
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
