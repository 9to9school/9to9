@extends('layouts.admin')

@section('title', 'Edit Category')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Category</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('category.list') }}">Categories</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

      <div class="col-md-12">

        <form action="{{ route('category.update', $category->id) }}" method="POST">
          @csrf
          @method('PUT')
          <!-- Personal Information -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Category</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">

                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Category Name</label>
                    <input type="text" name="name" value="{{old('name', $category->name)}}" class="form-control">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Description</label>


                    <input type="text" name="description" value="{{old('description', $category->description)}}" class="
                      form-control">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>


                <div class="col-xxl col-xl-3 col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" name="status" value="{{old('status', $category->status)}}" class=" form-control">
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