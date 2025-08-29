@extends('layouts.admin')
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
                                <a href="{{route('admin.dashboard')}}">Dashboard</a>
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
                <form action="{{ url('admin/why-we-stand-apart/' . ($standApart->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <!-- Personal Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <h4 class="text-dark">{{$title}}</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{$standApart->title}}" class="form-control" placeholder="Title Name">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Url <span class="text-danger">*</span></label>
                                    <input type="text" name="url" value="{{$standApart->url}}" class="form-control" placeholder="Title Url">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- Upload Image -->
                                <div class="col-md-4 mb-3">
                                    <label for="image" class="form-label">Upload Image (Size 358 * 471px  Max=500KB) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="2">{{ old('description', $standApart->description) }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Banner Image (Size 1920 * 1100px  Max=500KB) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="banner_image" name="banner_image" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Banner Heading</label>
                                    <input type="text" name="banner_heading" value="{{$standApart->banner_heading}}" class="form-control" placeholder="Banner Heading">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Banner Description</label>
                                    <textarea name="banner_description" class="form-control" rows="2">{{ old('banner_description', $standApart->banner_description) }}</textarea>
                                    @error('banner_description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection