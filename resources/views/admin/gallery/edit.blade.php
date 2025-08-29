@extends('layouts.admin')

@section('title', 'Edit Gallery')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Edit Gallery</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('gallery.list') }}">Gallery List</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/gallery/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="id" value="{{ $gallery->id }}">

                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Edit Gallery</h4>
                            </div>
                        </div>

                        <div class="card-body pb-1">
                            <div class="row">

                                <!-- Media Type Select -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Select Media Type</label>
                                    <select id="mediaType" name="media_type" class="form-select">
                                        <option value="">-- Select --</option>
                                        <option value="image" {{ $gallery->type == 'image' ? 'selected' : '' }}>Image</option>
                                        <option value="video" {{ $gallery->type == 'video' ? 'selected' : '' }}>Video</option>
                                    </select>
                                    @error('media_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Image Upload -->
                                <div id="imageUpload" class="profile-upload {{ $gallery->media_type == 'image' ? '' : 'd-none' }}">
                                    <label class="form-label">Upload Image</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                    <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
                                    @if ($gallery->image)
                                        <img src="{{ asset($gallery->image) }}" style="width: 100px; margin-top: 10px;">
                                    @endif
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Video Upload -->
                                <div id="videoUpload" class="profile-upload {{ $gallery->media_type == 'video' ? '' : 'd-none' }}">
                                    <label class="form-label">Upload Video</label>
                                    <input type="file" name="video" class="form-control" accept="video/*">
                                    <p class="fs-12">Upload video size 10MB, Format MP4, AVI</p>
                                    @if ($gallery->video)
                                        <video width="200" controls style="margin-top: 10px;">
                                            <source src="{{ asset($gallery->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                    @error('video')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Heading -->
                                <div class="col-xxl col-xl-3 col-md-6 mt-3">
                                    <label class="form-label">Heading</label>
                                    <input type="text" name="heading" class="form-control" value="{{ $gallery->heading }}">
                                    @error('heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save Gallery</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const mediaTypeSelect = document.getElementById('mediaType');
    const imageUpload = document.getElementById('imageUpload');
    const videoUpload = document.getElementById('videoUpload');

    function toggleMediaUpload() {
        if (mediaTypeSelect.value === 'image') {
            imageUpload.classList.remove('d-none');
            videoUpload.classList.add('d-none');
        } else if (mediaTypeSelect.value === 'video') {
            videoUpload.classList.remove('d-none');
            imageUpload.classList.add('d-none');
        } else {
            imageUpload.classList.add('d-none');
            videoUpload.classList.add('d-none');
        }
    }

    mediaTypeSelect.addEventListener('change', toggleMediaUpload);

    // Initialize on page load
    toggleMediaUpload();
});
</script>


@endsection
