@extends('layouts.admin')

@section('title', 'Add Topic')
@section('content')

  <div class="page-wrapper">
    <div class="content content-two">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="mb-1">Add Topic</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('topic.list') }}">Topics</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add Topics</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- /Page Header -->

      <div class="row">
        <div class="col-md-12">
         <form action="{{ route('topic.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('POST')

  <!-- Add Topic Card -->
  <div class="card">
    <div class="card-header bg-light">
      <div class="d-flex align-items-center">
        <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
          <i class="ti ti-info-square-rounded fs-16"></i>
        </span>
        <h4 class="text-dark mb-0">Add Topic</h4>
      </div>
    </div>

    <div class="card-body pb-1">
      <div class="row">
        <!-- Topic Name -->
        <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Topic Name</label>
            <input type="text" name="topic_name" class="form-control" value="{{ old('topic_name') }}">
            @error('topic_name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-3">
              <label class="form-label">Age</label>
              <!-- <input type="text" name="popular_id" class="form-control"> -->
                <select name="popular_id" class="form-control">
                  <option value="">Select Topic</option>
                  @foreach($populars as $populars)
                    <option value="{{ $populars->id }}">{{ $populars->title }}</option>
                  @endforeach
                </select>
                
            </div>
          @error('popular_id')
          <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
          
 <!-- Image Upload -->
        <!-- <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Topic Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div> -->
        <!-- Description -->
        <!-- <div class="col-md-12">
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
            @error('description')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div> -->

       
      </div>
    </div>

    <!-- Submit Button -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Save Topic</button>
    </div>
  </div>
</form>

        </div>
      </div>
    </div>
  </div>
@endsection
