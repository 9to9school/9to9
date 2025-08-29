@extends('layouts.admin')

@section('title', 'Edit SEO')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">
@php
    $role = auth()->user()->role;

    if($role == 'admin' ){
      $dashbaord = 'admin.dashboard';
      $update = 'seo.update';
      $list = 'seo.list';

    }else{
      $dashbaord = 'marketing.dashboard';
      $update = 'marketing.seo.update';
      $list = 'marketing.seo.list';
    }

    @endphp
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit SEO</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route($dashbaord)}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route($list) }}">SEO List</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit SEO</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route($update, $seo->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit SEO</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <div class="col-md-4 mb-3">
                  <label class="form-label">URL <span class="text-danger">*</span></label>
                  <input type="text" name="url" class="form-control" value="{{ old('url', $seo->url) }}">
                  @error('url')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-md-8 mb-3">
                  <label class="form-label">Title <span class="text-danger">*</span></label>
                  <input type="text" name="title" class="form-control" value="{{ old('title', $seo->title) }}">
                  @error('title')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-md-12 mb-3">
                  <label class="form-label">Meta Description</label>
                  <textarea name="description" class="form-control">{{ old('description', $seo->description) }}</textarea>
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <div class="col-md-12 mb-3">
                  <label class="form-label">Meta Keywords</label>
                  <textarea name="keyword" class="form-control">{{ old('keyword', $seo->keyword) }}</textarea>
                  @error('keyword')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>


                <div class="col-md-12">
                    @php
                        $image = $seo->image ?? '';
                    @endphp

                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames">
                            @if($image)
                                <img id="BannerImagePreview" src="{{ asset($image) }}" alt="Preview" style="max-height: 100px;" class="img-fluid">
                                <i id="placeholderIcon" class="ti ti-photo-plus fs-16" style="display: none;"></i>
                            @else
                                <img id="BannerImagePreview" src="" alt="Preview" style="max-height: 100px; display: none;" class="img-fluid">
                                <i id="placeholderIcon" class="ti ti-photo-plus fs-16"></i>
                            @endif
                        </div>

                        <div class="profile-upload">
                            <div class="profile-uploader d-flex align-items-center">
                                <input type="file" name="image" class="form-control" onchange="previewStudentImage(event)">
                            </div>
                            <p class="fs-12 text-danger">Upload image size max 4MB. Allowed formats: JPG, PNG, SVG.</p>
                            @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                    </div>
               </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update SEO</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
@endsection
@section('scripts')
<script>



function previewStudentImage(event) {
    const input = event.target;
    const previewImg = document.getElementById('BannerImagePreview');
    const placeholderIcon = document.getElementById('placeholderIcon');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
            placeholderIcon.style.display = 'none';
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        previewImg.src = '';
        previewImg.style.display = 'none';
        placeholderIcon.style.display = 'block';
    }
}

</script>
@endsection
