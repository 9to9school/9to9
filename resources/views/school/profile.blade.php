@extends('layouts.school')

@section('title', 'Edit Profile')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="d-md-flex d-block align-items-center justify-content-between border-bottom pb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Profile</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="index.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Settings</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                <div class="pe-1 mb-2">
                    <a href="#" class="btn btn-outline-light bg-white btn-icon" data-bs-toggle="tooltip"
                        data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                        <i class="ti ti-refresh"></i>
                    </a>
                </div>
            </div>
        </div>
        <form action="{{ route('update.profile', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                 @csrf
        <div class="d-md-flex d-block mt-3">
            <div class="settings-right-sidebar me-md-3 border-0">
                <div class="card">
                    <div class="card-header">
                        <h5>Personal Information</h5>

                    </div>
                    <div class="card-body">
                        @php
                            $avatarUrl = Auth::user()->avtar ? asset(Auth::user()->avtar) : '';
                          
                        @endphp

                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                            <div id="imagePreviewContainer" class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames" style="position: relative;">
                                <i class="ti ti-photo-plus fs-16" id="placeholderIcon" style="{{ $avatarUrl ? 'display: none;' : '' }}"></i>
                                <img id="imagePreview" src="{{ $avatarUrl }}" alt="Preview"
                                    style="{{ $avatarUrl ? '' : 'display:none;' }} max-width: 100%; max-height: 100%; border-radius: 10px;" />
                            </div>

                            <div class="profile-upload">
                                <div class="profile-uploader d-flex align-items-center">
                                    <div class="drag-upload-btn mb-3">
                                        Upload
                                        <input type="file" class="form-control image-sign" name="avatar" id="imageInput">
                                    </div>
                                    <a href="javascript:void(0);" class="btn btn-primary mb-3" id="removeBtn">Remove</a>
                                </div>
                                <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
                                <small id="editTime" class="text-muted fs-12">
                                    
                                </small>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="flex-fill ps-0 border-0">
                 
                    <div class="d-md-flex">
                        <div class="flex-fill">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5>Personal Information</h5>
                                    <!-- <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit_personal_information"><i
                                            class="ti ti-edit me-2"></i>Edit</a> -->
                                </div>
                                <div class="card-body">
                                    <div class="d-block d-xl-flex">
                                        <div class="mb-3 flex-fill me-xl-3 me-0">
                                            <label class="form-label">School Name</label>
                                            <input type="text" class="form-control"
                                                placeholder="Enter School Name" value="{{ old('name', Auth::user()->name) }}" name="name">
                                        </div>
                                        <div class="mb-3 flex-fill">
                                            <label class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" name="phone_number" value="{{ old('phone_number', Auth::user()->phone_number) }}" placeholder="Enter Phone Number">
                                        </div>
                                        
                                    </div>
                                    
                                    <div class="d-block d-xl-flex">
                                        <div class="mb-3 flex-fill me-xl-3 me-0">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Enter Email">
                                        </div>
                                        <div class="mb-3 flex-fill me-xl-3 me-0">
                                            <label class="form-label">Date Of Birth</label>
                                            <input type="date" class="form-control" name="dob" value="{{ old('dob', Auth::user()->dob) }}" placeholder="Enter DOB">
                                        </div>
                                    </div>
                                        <div class="mb-3">
                                            <label class="form-label"> Address</label>
                                            <input type="text" class="form-control" name="address" value="{{ old('address', Auth::user()->address) }}" placeholder="Enter Address">
                                        </div>
                                        
                                    
                                </div>
                            </div>
                            <!-- <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5>Address Information</h5>
                                    <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#edit_address_information"><i
                                            class="ti ti-edit me-2"></i>Edit</a>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control" placeholder="Enter Address">
                                    </div>
                                    <div class="d-block d-xl-flex">
                                        <div class="mb-3 flex-fill me-xl-3 me-0">
                                            <label class="form-label">Country</label>
                                            <input type="text" class="form-control" placeholder="Enter Country">
                                        </div>
                                        <div class="mb-3 flex-fill">
                                            <label class="form-label">State / Province</label>
                                            <input type="email" class="form-control" placeholder="Enter State">
                                        </div>
                                    </div>
                                    <div class="d-block d-xl-flex">
                                        <div class="mb-3 flex-fill me-xl-3 me-0">
                                            <label class="form-label">City</label>
                                            <input type="email" class="form-control" placeholder="City">
                                        </div>
                                        <div class="mb-3 flex-fill">
                                            <label class="form-label">Postal Code</label>
                                            <input type="email" class="form-control"
                                                placeholder="Enter Postal Code">
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5>Password</h5>
                                    <!-- <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#change_password">Change</a> -->
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="pass-group d-flex">
                                            <input type="password" name="password" class="pass-input form-control">
                                            <!-- <span class="ti toggle-password ti-eye-off"></span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="btn btn btn-primary">
                                <i class="ti ti-check"></i> Save Changes
                                </button>
                            </div>
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
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const placeholderIcon = document.getElementById('placeholderIcon');
    const removeBtn = document.getElementById('removeBtn');
    const editTime = document.getElementById('editTime');

    imageInput.addEventListener('change', function () {
        const file = this.files[0];
        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
                placeholderIcon.style.display = 'none';
                const now = new Date();
                const formatted = now.toLocaleString('en-IN', {
                    day: '2-digit', month: '2-digit', year: 'numeric',
                    hour: '2-digit', minute: '2-digit', hour12: true
                });
                editTime.textContent = `Edited on: ${formatted}`;
            };
            reader.readAsDataURL(file);
        }
    });

    removeBtn.addEventListener('click', function () {
        imageInput.value = '';
        imagePreview.src = '#';
        imagePreview.style.display = 'none';
        placeholderIcon.style.display = 'block';
        editTime.textContent = '';
    });
</script>
@endsection