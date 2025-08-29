@extends('layouts.admin')

@section('title', 'Edit Topic')
@section('content')

<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
          <div class="my-auto mb-2">
            <h3 class="mb-1">Edit Topic</h3>
            <nav>
              <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                  <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="{{ route('topic.list') }}">Topics</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Topic</li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- /Page Header -->
    
        <div class="row">
    
          <div class="col-md-12">
    
           <form action="{{ route('topic.update', $topic->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')

  <div class="card">
    <div class="card-header bg-light">
      <div class="d-flex align-items-center">
        <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
          <i class="ti ti-info-square-rounded fs-16"></i>
        </span>
        <h4 class="text-dark">Edit Topic</h4>
      </div>
    </div>

    <div class="card-body pb-1">
      <div class="row">
        <!-- Topic Name -->
        <div class="col-xxl col-xl-3 col-md-6">
          <div class="mb-3">
            <label class="form-label">Topic Name</label>
            <input type="text" name="topic_name" value="{{ old('topic_name', $topic->topic_name) }}" class="form-control">
            @error('topic_name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>

        <!-- Image Upload -->
         <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Age</label>
                <!-- <input type="text" name="popular_id" class="form-control"> -->
                  <select name="popular_id" class="form-control">
                    <option value="">Select Age</option>
                    @foreach($populars as $populars)
                      <option value="{{ $populars->id }}"  {{ old('popular_id', $topic->age) == $populars->id ? 'selected' : '' }}>{{ $populars->title }}</option>
                    @endforeach
                  </select>
                  
                </div>
              @error('popular_id')
              <span class="text-danger">{{ $message }}</span>
              @enderror
             </div>
          </div>
        <!-- <div class="col-md-6">
          <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @error('image')
              <span class="text-danger">{{ $message }}</span>
            @enderror

            @if($topic->image)
              <div class="mt-2">
                <p class="mb-1">Current Image:</p>
                <img src="{{ asset($topic->image) }}" alt="Topic Image" style="max-width: 150px; height: auto;">
              </div>
            @endif
          </div>
        </div> -->
       

        <!-- Description -->
        <!-- <div class="col-md-12">
          <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" rows="4" class="form-control">{{ old('description', $topic->description) }}</textarea>
            @error('description')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div> -->

        
      </div>
    </div>

    <!-- Submit -->
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
