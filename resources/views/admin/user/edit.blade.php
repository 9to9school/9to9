@extends('layouts.admin')

@section('title', 'Edit User')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit User</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('school.list') }}">User</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

      <div class="col-md-12">

        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- Personal Information -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit User</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">
                <div class="row">
                  <div class="mb-3">
                 <label class="form-label d-block">Current Image</label>

                  @if ($user->avtar)
                      <div class="mb-2">
                          <img src="{{ asset($user->avtar) }}" alt="USP Image" style="max-width: 150px; height: auto; border-radius: 8px;">
                      </div>
                  @endif

                  </div>

                  <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                      <div>
                          <label for="image" class="form-label">Upload Image</label>
                          <input type="file" class="form-control" id="image" name="avtar" accept="image/*">

                          @error('avtar')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror

                          <!-- <button type="button" class="btn btn-sm btn-danger mt-2" id="remove-image">Remove</button> -->
                      </div>
                  </div>


                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" name="name" value="{{old('name', $user->name)}}" class="form-control">
                      @error('name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" name="email" value="{{old('email', $user->email)}}" class="form-control">
                      @error('email')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Mobile</label>
                      <input type="number" name="phone_number" value="{{old('phone_number', $user->phone_number)}}" class="form-control">
                      @error('phone_number')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Address</label>
                      <input type="text" name="address" value="{{old('address', $user->address)}}" class="form-control">
                      @error('address')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Status</label>
                      <!-- <input type="text" name="status" value="{{old('status', $user->status)}}" class=" form-control"> -->
                      <select  class="form-control" name="status">
                      <option value="">Select Status</option>
                      <option value="active" {{ old('status', $user->status) == 'active' ? 'selected' : '' }}>Active</option>
                     <option value="inactive" {{ old('status', $user->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                      @error('status')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>
                <!-- Submit Button -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update User</button>
                </div>
              </div>
</div> 
@endsection