@extends('layouts.admin')

@section('title', 'Add Blog')
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
                <a href="{{ url('admin/blogs') }}">Blogs</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- /Page Header -->

      <div class="row">
        <div class="col-md-12">
          <!-- Alerts -->
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
          @endif

          @if (Session::has('success'))
            <div class="alert alert-success">{{ Session('success') }}</div>
          @endif

          @if (Session::has('error'))
            <div class="alert alert-danger">{{ Session('error') }}</div>
          @endif

          <form action="{{ url('admin/add-blog/' . ($blog->id ?? '')) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <!-- Blog Form -->
            <div class="card">
              <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                  <h4 class="text-dark">Add Blog</h4>
                </div>
              </div>

              <div class="card-body pb-1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Upload image size max 500KB</label>
                      <input type="file" name="image" class="form-control" value="{{ old('image', $blog->image ?? '') }}">
                      @error('image')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <!-- Heading -->
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Heading</label>
                      <input type="text" name="heading" class="form-control" value="{{ old('heading', $blog->heading ?? '') }}">
                      @error('heading')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <!-- Description -->
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Description</label>
                      <input type="text" name="description" class="form-control" value="{{ old('description', $blog->description ?? '') }}">
                      @error('description')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <!-- Button Name -->
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Button Name</label>
                      <input type="text" name="button_name" class="form-control" value="{{ old('button_name', $blog->button_name ?? '') }}">
                      @error('button_name')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <!-- Short Summary -->
                  <div class="col-md-12">
                    <div class="mb-3">
                      <label class="form-label">Short Summary</label>
                      <textarea name="short_summary" class="form-control" rows="3">{{ old('short_summary', $blog->short_summary ?? '') }}</textarea>
                      @error('short_summary')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <!-- Meta Type -->
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Meta Type</label>
                      <select name="meta_type" class="form-control">
                        <option value="">Select</option>
                        <option value="title" {{ old('meta_type', $blog->meta_type ?? '') == 'title' ? 'selected' : '' }}>Meta Title</option>
                        <option value="description" {{ old('meta_type', $blog->meta_type ?? '') == 'description' ? 'selected' : '' }}>Meta Description</option>
                        <option value="keywords" {{ old('meta_type', $blog->meta_type ?? '') == 'keywords' ? 'selected' : '' }}>Meta Keywords</option>
                      </select>
                      @error('meta_type')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <!-- Button Link -->
{{--                  <div class="col-md-6">--}}
{{--                    <div class="mb-3">--}}
{{--                      <label class="form-label">Button Link</label>--}}
{{--                      <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $blog->button_link ?? '') }}">--}}
{{--                      @error('button_link')--}}
{{--                      <span class="text-danger">{{ $message }}</span>--}}
{{--                      @enderror--}}
{{--                    </div>--}}
{{--                  </div>--}}
                </div>
                <!-- Submit Button -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save Blog</button>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>

@endsection
