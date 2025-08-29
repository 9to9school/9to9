@extends('layouts.admin')

@section('title', 'Edit Pre-Registration Banner')

@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Edit Pre-Registration Banner</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pre.banner.list') }}">Pre-Registration Banners</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pre.banner.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $getdata->id }}">

                    <!-- Banner Info -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Banner Information</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Heading <span class="text-danger">*</span></label>
                                    <input type="text" name="heading" value="{{ old('heading', $getdata->heading) }}" class="form-control">
                                    @error('heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    @php $image = $getdata->image ?? ''; @endphp
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames position-relative" style="width: 100px; height: 100px;">
                                            <img id="BannerImagePreview" src="{{ $image ? asset($image) : '' }}" alt="Preview"
                                                style="max-height: 100px; {{ $image ? '' : 'display: none;' }}" class="img-fluid">
                                            <i id="placeholderIcon" class="ti ti-photo-plus fs-16 position-absolute top-50 start-50 translate-middle" style="{{ $image ? 'display: none;' : '' }}"></i>
                                        </div>
                                        <div class="profile-upload">
                                            <div class="profile-uploader d-flex align-items-center">
                                                <input type="file" name="banner_image" class="form-control" onchange="previewStudentImage(event)">
                                            </div>
                                            <p class="fs-12 text-danger">Upload image size max 2MB. Allowed: JPG, PNG, WEBP.</p>
                                            @error('banner_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">                             
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="">Select Status</option>
                                        <option value="active" {{ $getdata->status === 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ $getdata->status === 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end mt-3">
                                <a href="{{ route('pre.banner.list') }}" class="btn btn-light me-3">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Banner</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Banner Info -->
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
            if (placeholderIcon) {
                placeholderIcon.style.display = 'none';
            }
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        previewImg.src = '';
        previewImg.style.display = 'none';
        if (placeholderIcon) {
            placeholderIcon.style.display = 'block';
        }
    }
}
</script>
@endsection
