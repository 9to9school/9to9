@extends('layouts.admin')

@section('title', 'Add Pre-Registration Banner')

@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Add Pre-Registration Banner</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pre.banner.list') }}">Banners</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Banner</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('pre.banner.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Banner Information -->
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
                                <div class="col-md-12">
                                    <label class="form-label">Heading <span class="text-danger">*</span></label>
                                    <input type="text" name="heading" class="form-control" value="{{ old('heading') }}" required>
                                    @error('heading')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <label class="form-label">Banner Image <span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center flex-wrap row-gap-3">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 text-dark frames">
                                            <img id="BannerImagePreview" src="" alt="Preview" style="max-height: 100px; display: none;" class="img-fluid">
                                            <i id="placeholderIcon" class="ti ti-photo-plus fs-16"></i>
                                        </div>
                                        <div class="profile-upload">
                                            <input type="file" name="image" class="form-control" onchange="previewBannerImage(event)">
                                            <p class="fs-12 text-danger">Max size 2MB. Formats: JPG, PNG, WEBP, etc.</p>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end mt-3">
                                <a href="{{ route('pre.banner.list') }}" class="btn btn-light me-3">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Banner</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Banner Information -->

                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
function previewBannerImage(event) {
    const input = event.target;
    const previewImg = document.getElementById('BannerImagePreview');
    const placeholderIcon = document.getElementById('placeholderIcon');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
            placeholderIcon.style.display = 'none';
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        previewImg.src = '';
        previewImg.style.display = 'none';
        placeholderIcon.style.display = 'block';
    }
}
</script>
@endsection
