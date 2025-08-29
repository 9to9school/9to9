@extends('layouts.admin')

@section('title', 'Add WebBanner')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add WebBanner</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('webbanner.list') }}">WebBanners</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add WebBanner</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

      <div class="col-md-12">

        <form action="{{ route('webbanner.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <!-- Personal Information -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add WebBanner</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">
                <!-- Upload Image -->
                <div class="col-md-6 mb-3">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/*">
{{--                  <button type="button" class="btn btn-sm btn-primary mt-2" id="remove-image">Remove</button>--}}
                  @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Upload Background Image -->
{{--                <div class="col-md-6 mb-3">--}}
{{--                  <label for="background_image" class="form-label">Upload Background Image</label>--}}
{{--                  <input type="file" class="form-control" id="background_image" name="backgroundimage" accept="image/*">--}}
{{--                  <button type="button" class="btn btn-sm btn-primary mt-2" id="remove-background-image">Remove</button>--}}
{{--                  @error('backgroundimage') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                </div>--}}

{{--                <!-- Subheading -->--}}
{{--                <div class="col-md-6 mb-3">--}}
{{--                  <label class="form-label">Subheading</label>--}}
{{--                  <input type="text" name="subheading" class="form-control">--}}
{{--                  @error('subheading') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                </div>--}}

{{--                <!-- Heading -->--}}
                <div class="col-md-6 mb-3">
                  <label class="form-label">Heading</label>
                  <input type="text" name="heading" class="form-control">
                  @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

{{--                <!-- Description -->--}}
{{--                <div class="col-md-12 mb-3">--}}
{{--                  <label class="form-label">Description</label>--}}
{{--                  <input type="text" name="description" class="form-control">--}}
{{--                  @error('description') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                </div>--}}

{{--                <!-- Button Name 1 -->--}}
{{--                <div class="col-md-3 mb-3">--}}
{{--                  <label class="form-label">Button Name 1</label>--}}
{{--                  <input type="text" name="button_name" class="form-control">--}}
{{--                  @error('button_name') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                </div>--}}

{{--                <!-- Button Link 1 -->--}}
{{--                <div class="col-md-3 mb-3">--}}
{{--                  <label class="form-label">Button Link 1</label>--}}
{{--                  <input type="text" name="button_link" class="form-control">--}}
{{--                  @error('button_link') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                </div>--}}

{{--                <!-- Button Name 2 -->--}}
{{--                <div class="col-md-3 mb-3">--}}
{{--                  <label class="form-label">Button Name 2</label>--}}
{{--                  <input type="text" name="btn_name" class="form-control">--}}
{{--                  @error('btn_name') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                </div>--}}

{{--                <!-- Button Link 2 -->--}}
{{--                <div class="col-md-3 mb-3">--}}
{{--                  <label class="form-label">Button Link 2</label>--}}
{{--                  <input type="text" name="btn_link" class="form-control">--}}
{{--                  @error('btn_link') <span class="text-danger">{{ $message }}</span> @enderror--}}
{{--                </div>--}}
{{--              </div>--}}

              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save WebBanner</button>
              </div>
            </div>

          </div @endsection
