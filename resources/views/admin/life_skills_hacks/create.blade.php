@extends('layouts.admin')
@section('title', 'Add Life Skills Hacks')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">Add Life Skills Hacks</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin/all-life-skills-hacks') }}">Life Skills Hacks</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add Life Skills Hacks</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Alerts -->
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

            <!-- Form -->
            <div class="col-md-12">
                <form action="{{ url('admin/life-skills-hacks/' . ($lifeHack->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Add Life Skills Hacks</h4>
                            </div>
                        </div>

                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ $lifeHack->title ?? '' }}" class="form-control" placeholder="Title Name">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Url</label>
                                    <input type="text" name="url" value="{{ $lifeHack->url ?? '' }}" class="form-control" placeholder="Title Url">
                                    @error('url') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Upload Image 800*450</label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="4" placeholder="Enter description">{{ $lifeHack->description ?? '' }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Banner Image 1920*400</label>
                                    <input type="file" class="form-control" name="banner_image" accept="image/*">
                                    @error('banner_image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Banner Heading</label>
                                    <input type="text" name="banner_heading" value="{{ $lifeHack->banner_heading ?? '' }}" class="form-control" placeholder="Banner Heading">
                                    @error('banner_heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Banner Description</label>
                                    <textarea name="banner_description" class="form-control" rows="4" placeholder="Enter banner description">{{ $lifeHack->banner_description ?? '' }}</textarea>
                                    @error('banner_description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
