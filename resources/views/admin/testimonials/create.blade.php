@extends('layouts.admin')
@section('title', 'Add testimonial')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{$title}}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/testimonial') }}">Testimonials</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row mb-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
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
            <div class="col-md-12">
                <form action="{{ url('admin/testimonial/' . ($testimonial->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <!-- Personal Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                      <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                      <i class="ti ti-info-square-rounded fs-16"></i>
                                      </span>
                                <h4 class="text-dark">{{$title}}</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Testimonial Name</label>
                                    <input type="text" name="name" value="{{$testimonial->name}}" class="form-control" placeholder="Testimonial Name">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <!-- Upload Image -->
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Upload Image</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="4">{{$testimonial->description}}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection