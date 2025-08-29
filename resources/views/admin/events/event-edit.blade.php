@extends('layouts.admin')

@section('title', 'Edit Event')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Events</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('event.list') }}">Events</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Event</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

      <div class="col-md-12">

        <form action="{{ route('event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- Personal Information -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Event</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                    <div
                      class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames">
                      <i class="ti ti-photo-plus fs-16"></i>
                    </div>
                    <div class="profile-upload">
                      <div class="profile-uploader d-flex align-items-center">
                        <div class="drag-upload-btn mb-3">
                          Upload
                          <input type="file" name="media" class="form-control image-sign" multiple="">
                        </div>
                        <a href="javascript:void(0);" class="btn btn-primary mb-3">Remove</a>
                      </div>
                      <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
                      @error('media')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>


                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="heading" value="{{old('heading', $event->heading)}}" class="form-control">
                    @error('heading')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Description</label>


                    <input type="text" name="description" value="{{old('description', $event->description)}}" class="
                      form-control">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Button name</label>
                    <input type="text" name="button_name" value="{{old('button_name', $event->button_name)}}" class="
                      form-control">
                    @error('button_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Button link</label>
                    <input type="text" name="button_link" value="{{old('button_link', $event->button_link)}}" class="
                      form-control">
                    @error('button_link')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Short summary</label>
                    <textarea type="text" name="short_summary" class="form-control"
                      value="}">{{ old('short_summary', $event->short_summary) }}</textarea>
                    @error('short_summary')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Media Type</label>
                    <select name="media_type" class="form-control">
                      <option value="">Select</option>
                      <option value="image" {{ old('media_type', $event->media_type) == 'image' ? 'selected' : '' }}>
                        Image
                      </option>
                      <option value="video" {{ old('media_type', $event->media_type) == 'video' ? 'selected' : '' }}>
                        Video
                      </option>

                    </select>

                    @error('media_type')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">From Time</label>
                    <input type="time" name="from_time" value="{{old('from_time', $event->from_time)}}"
                      class=" form-control">
                    @error('from_time')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">To Time</label>
                    <input type="time" name="to_time" value="{{old('to_time', $event->to_time)}}" class=" form-control">
                    @error('to_time')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" value="{{old('date', $event->date)}}" class=" form-control">
                    @error('date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Duration</label>
                    <input type="text" name="duration" value="{{old('duration', $event->duration)}}"
                      class=" form-control">
                    @error('duration')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Location</label>
                    <input type="text" name="location" value="{{old('location', $event->location)}}"
                      class=" form-control">
                    @error('location')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>


                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Materials</label>
                    <input type="text" name="materials" value="{{ old('materials', $event->materials) }}" class="form-control">
                    @error('materials')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Skills</label>
                    <input type="text" name="skills" value="{{ old('skills', $event->skills) }}" class="form-control">
                    @error('skills')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" name="status" value="{{old('status', $event->status)}}" class=" form-control">
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div @endsection
