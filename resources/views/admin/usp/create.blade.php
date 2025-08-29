@extends('layouts.admin')

@section('title', 'Add Usp')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add Usp</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('usp.list') }}">Usp</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Usps</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('usp.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add Usp</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-6">
                  <div class= "mb-3">
                    <!-- <div class="me-3">
                      <div
                        class="preview-box border border-dashed rounded d-flex align-items-center justify-content-center"
                        style="width: 150px; height: 150px; position: relative; overflow: hidden;">
                        <img id="preview-image" src="#" alt="Preview"
                          style="display: none; width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" />
                        <i class="ti ti-photo-plus fs-24 text-muted" id="upload-icon" style="position: absolute;"></i>
                      </div>
                    </div> -->

                    <!-- Input + Remove Button -->
                    <div>
                      <label for="image" class="form-label">Upload Image</label>
                      <input type="file" class="form-control" id="image" name="image" accept="image/*">
                      <!-- <button type="button" class="btn btn-sm btn-primary mt-2" id="remove-image">Remove</button> -->
                      @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" class="form-control">
                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control">
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Button name</label>
                    <input type="text" name="button_name" class="form-control">
                    @error('button_name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Button link</label>
                    <input type="text" name="button_link" class="form-control">
                    @error('button_link') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save USP</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection