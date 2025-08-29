@extends('layouts.admin')

@section('title', 'Add Web Content')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add Web Content</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('webcontent.list') }}">Web Contents</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add Web Content</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">

        <form action="{{ route('webcontent.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add Web Content</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <!-- Image -->
                <div class="col-md-6 mb-3">
                  <label for="image" class="form-label">Image</label>
                  <input type="file" class="form-control" id="image" name="image" accept="image/*">
                  @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Background Image -->
                <div class="col-md-6 mb-3">
                  <label for="background_image" class="form-label">Background Image</label>
                  <input type="file" class="form-control" id="background_image" name="background_image" accept="image/*">
                  @error('background_image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Subheading -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Subheading</label>
                  <input type="text" name="subheading" class="form-control" value="{{ old('subheading') }}">
                  @error('subheading') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Heading -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Heading</label>
                  <input type="text" name="heading" class="form-control" value="{{ old('heading') }}">
                  @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                  @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Description -->
                <div class="col-md-12 mb-3">
                  <label class="form-label">Description</label>
                  <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                  @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Button Name 1 -->
                <div class="col-md-3 mb-3">
                  <label class="form-label">Button Name 1</label>
                  <input type="text" name="button_name" class="form-control" value="{{ old('button_name') }}">
                  @error('button_name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Button Link 1 -->
                <div class="col-md-3 mb-3">
                  <label class="form-label">Button Link 1</label>
                  <input type="text" name="button_link" class="form-control" value="{{ old('button_link') }}">
                  @error('button_link') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Button Name 2 -->
                <div class="col-md-3 mb-3">
                  <label class="form-label">Button Name 2</label>
                  <input type="text" name="button_name2" class="form-control" value="{{ old('button_name2') }}">
                  @error('button_name2') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Button Link 2 -->
                <div class="col-md-3 mb-3">
                  <label class="form-label">Button Link 2</label>
                  <input type="text" name="button_link2" class="form-control" value="{{ old('button_link2') }}">
                  @error('button_link2') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Status -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                  </select>
                  @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save Web Content</button>
            </div>
          </div>

        </form>

      </div>
    </div>

  </div>
</div>

@endsection
