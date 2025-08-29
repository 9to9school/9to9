@extends('layouts.admin')

@section('title', 'Edit Usp')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Usp</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('usp.list') }}">Usp</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Usp</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

      <div class="col-md-12">

        <form action="{{ route('usp.update', $usp->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- Personal Information -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Usp</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">
                <div class="row">
                  <div class="mb-3">
                    <label class="form-label d-block">Current Image</label>

                    @if ($usp->image)
                        <div class="mb-2">
                            <img src="{{ Storage::url($usp->image) }}" alt="USP Image" style="max-width: 150px; height: auto; border-radius: 8px;">
                        </div>
                    @endif

                  </div>

                  <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                      <div>
                          <label for="image" class="form-label">Upload Image</label>
                          <input type="file" class="form-control" id="image" name="image" accept="image/*">

                          @error('image')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror

                          <button type="button" class="btn btn-sm btn-danger mt-2" id="remove-image">Remove</button>
                      </div>
                  </div>


                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Heading</label>
                      <input type="text" name="heading" value="{{old('heading', $usp->heading)}}" class="form-control">
                      @error('heading')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <input type="text" name="description" value="{{old('description', $usp->description)}}" class="
                      form-control">
                      @error('description')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Button name</label>
                      <input type="text" name="button_name" value="{{old('button_name', $usp->button_name)}}" class="
                      form-control">
                      @error('button_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Button link</label>
                      <input type="text" name="button_link" value="{{old('button_link', $usp->button_link)}}" class="
                      form-control">
                      @error('button_link')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Status</label>
                      <input type="text" name="status" value="{{old('status', $usp->status)}}" class=" form-control">
                      @error('status')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- Submit Button -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Usp</button>
                </div>
              </div>
            </div @endsection