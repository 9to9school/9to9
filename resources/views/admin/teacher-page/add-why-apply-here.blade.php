@extends('layouts.admin')
@section('title', $title)
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{ $title }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Alerts -->
            <div class="row mb-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session('success') }}</strong>
                    </div>
                @endif

                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session('error') }}</strong>
                    </div>
                @endif
            </div>
            <!-- /Alerts -->

            <div class="col-md-12">
                <form action="{{ url('admin/teacher-why-apply-here/' . ($teacherWhyApplyHere->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                    <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                        <i class="ti ti-info-square-rounded fs-16"></i>
                    </span>
                                <h4 class="text-dark">Add Why Apply Here</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <!-- Type -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Type</label>
                                    <select name="type" class="form-control">
                                        <option value="teacher" {{ old('type', $teacherWhyApplyHere->type ?? '') == 'teacher' ? 'selected' : '' }}>Teacher</option>
                                        <option value="franchise" {{ old('type', $teacherWhyApplyHere->type ?? '') == 'franchise' ? 'selected' : '' }}>Franchise</option>
                                    </select>
                                    @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- Title -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title', $teacherWhyApplyHere->title ?? '') }}" class="form-control" placeholder="Enter Title">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                    <small class="text-muted d-block">Size 500x500px Max 2MB</small>

                                    @if (!empty($teacherWhyApplyHere->image))
                                        <img src="{{ asset($teacherWhyApplyHere->image) }}" alt="Image" style="max-width: 100px; margin-top:10px;">
                                    @endif
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" rows="4" class="form-control" placeholder="Enter Description">{{ old('description', $teacherWhyApplyHere->description ?? '') }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
