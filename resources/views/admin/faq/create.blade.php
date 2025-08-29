@extends('layouts.admin')

@section('title', 'Add Faq')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add Faq</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('faq.list') }}">Faqs List</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add Faq</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

      <div class="col-md-12">

        <form action="{{ route('faq.store') }}" method="POST">
          @csrf
          @method('POST')
          <!-- Personal Information -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add Faq</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-control">
                      <option value="">Select</option>
                      @foreach($category as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>

                    @error('category_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Faq Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Description</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description') }}">
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Faq</button>
              </div>
            </div>
          </div @endsection