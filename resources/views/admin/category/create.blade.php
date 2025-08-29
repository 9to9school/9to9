@extends('layouts.admin')

@section('title', 'Add Category')
@section('content')

  <div class="page-wrapper">
    <div class="content content-two">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="mb-1">Add Category</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('category.list') }}">Categories</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add Categories</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- /Page Header -->

      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('category.store') }}" method="POST">
          @csrf
          @method('POST')

          <!-- Add Category Card -->
            <div class="card">
              <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                  <h4 class="text-dark mb-0">Add Category</h4>
                </div>
              </div>

              <div class="card-body pb-1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Category Name</label>
                      <input type="text" name="name" class="form-control">
                      @error('name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <input type="text" name="description" class="form-control">
                      @error('description')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
              </div>

              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Category</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
