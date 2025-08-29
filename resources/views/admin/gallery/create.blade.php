@extends('layouts.admin')

@section('title', 'Add Gallery')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Add Gallery</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('gallery.list') }}">Gallery List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form action="{{ url('admin/gallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Gallery Form -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Add Gallery</h4>
                            </div>
                        </div>

                        <div class="card-body pb-1">
                            <div class="row">

                                <!-- Select Media Type -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Select Type</label>
                                        <select id="mediaType" name="media_type" class="form-select">
                                            <option value="">-- Select --</option>
                                            <option value="image" {{ old('media_type') == 'image' ? 'selected' : '' }}>Image</option>
                                            <option value="video" {{ old('media_type') == 'video' ? 'selected' : '' }}>Video</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Heading -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Heading</label>
                                        <input type="text" name="heading" class="form-control" value="{{ old('heading') }}">
                                        @error('heading')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Image Upload -->
                                <div class="col-md-12">
                                    <div id="imageUpload" class="profile-uploader d-none">
                                        <label class="form-label">Upload Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        <p class="fs-12">Max 4MB, Format: JPG, PNG, SVG</p>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Video Upload -->
                                <div class="col-md-12">
                                    <div id="videoUpload" class="profile-uploader d-none">
                                        <label class="form-label">Upload Video</label>
                                        <input type="file" name="video" class="form-control" accept="video/*">
                                        <p class="fs-12">Max 10MB, Format: MP4, AVI</p>
                                        @error('video')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save Gallery</button>
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
    document.addEventListener('DOMContentLoaded', function () {
        const mediaTypeSelect = document.getElementById('mediaType');
        const imageUpload = document.getElementById('imageUpload');
        const videoUpload = document.getElementById('videoUpload');

        function toggleUploadSections() {
            const selectedType = mediaTypeSelect.value;

            if (selectedType === 'image') {
                imageUpload.classList.remove('d-none');
                videoUpload.classList.add('d-none');
            } else if (selectedType === 'video') {
                videoUpload.classList.remove('d-none');
                imageUpload.classList.add('d-none');
            } else {
                imageUpload.classList.add('d-none');
                videoUpload.classList.add('d-none');
            }
        }

        // Listen for dropdown changes
        mediaTypeSelect.addEventListener('change', toggleUploadSections);

        // Trigger once on page load to reflect preselected option
        toggleUploadSections();
    });
</script>
@endsection


