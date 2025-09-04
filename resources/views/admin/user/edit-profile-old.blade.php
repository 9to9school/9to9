@extends('layouts.admin')

@section('title', 'Edit profile')
@section('content')
<div class="page-wrapper">
  <div class="content">
    <div class="d-md-flex d-block align-items-center justify-content-between border-bottom pb-3">
      <div class="my-auto mb-2">
        <h3 class="page-title mb-1">Edit Profile</h3>
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
          <a href="#" class="btn btn-outline-light bg-white btn-icon" data-bs-toggle="tooltip" data-bs-placement="top"
            aria-label="Refresh" data-bs-original-title="Refresh">
            <i class="ti ti-refresh"></i>
          </a>
        </div>
      </div>
    </div>
    <?php 
    if(auth()->user()->role == 'admin' ){
        $updateroute = url('admin/edit/'. Auth::User()->id);
    
      
      }else{
        $updateroute = url('marketing/edit/' . Auth::User()->id);

      }
      ?>
    <form action="{{ $updateroute }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="d-md-flex d-block mt-3">
        <div class="settings-right-sidebar me-md-3 border-0">
          <div class="card">
            <div class="card-header">
              <h5>Personal Information</h5>

            </div>

            <div class="card-body">
              <div class="settings-profile-upload">
                <span class="profile-pic">
        
                  @if(Auth::user()->avtar) <!-- corrected field name -->
                  <?php $image = Auth::user()->avtar; ?>
                    <img src="{{ asset(Auth::user()->avtar) }}" alt="Profile"
                      id="profilePreview"
                      style="width: 100px; height: 100px; border-radius: 50%;">
                  @else
                    <img src="{{ asset('assets/admin/img/profiles/avatar-27.jpg') }}" alt="Profile"
                      id="profilePreview"
                      style="width: 100px; height: 100px; border-radius: 50%;">
                  @endif
                </span>
                <div class="title-upload">
                  <!-- Optional titles/links here -->
                </div>
              </div>

              <div class="profile-uploader profile-uploader-two mb-4">
                <span class="upload-icon"><i class="ti ti-upload"></i></span>
                <div class="drag-upload-btn bg-transparent me-0 border-0">
                  <p class="upload-btn"><span>Click to Upload</span> or drag and drop</p>
                  <h6>JPG or PNG</h6>
                  <h6>(Max 450 x 450 px)</h6>
                </div>
                <input type="file" class="form-control" name="avatar" id="image_sign" accept="image/png, image/jpeg">

                <div id="frames"></div>
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
                  <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#edit_personal_information"><i class="ti ti-edit me-2"></i>Edit</a>
                </div>
                <div class="card-body">
                  <div class="d-block d-xl-flex">
                    <div class="mb-3 flex-fill me-xl-3 me-0">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" name="name" value="{{ old('name', Auth::user()->name) }}"
                        placeholder="Enter  Name">
                    </div>
                    <div class="mb-3 flex-fill">
                      <label class="form-label">Date of Birth</label>
                      <input type="date" class="form-control" name="dob" value="{{ old('dob', Auth::user()->dob) }}"
                        placeholder="Enter Dob">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" name="email"
                      value="{{ old('email', Auth::user()->email) }}" placeholder="Enter Email">
                  </div>
                  <div class="d-block d-xl-flex">
                    <div class="mb-3 flex-fill me-xl-3 me-0">
                      <label class="form-label">Address</label>
                      <input type="text" class="form-control" name="address"
                        value="{{ old('address', Auth::user()->address) }}" placeholder="Enter Address">
                    </div>
                    <div class="mb-3 flex-fill">
                      <label class="form-label">Phone Number</label>
                      <input type="number" class="form-control" name="phone_number"
                        value="{{ old('phone_numbe', Auth::user()->phone_number) }}" placeholder="Enter Phone Number">
                    </div>
                  </div>
                  <div class="text-end">
                    <button type="submit" class="btn btn-success">
                      <i class="ti ti-check"></i> Save Changes
                    </button>
                  </div>
                </div>
              </div>
            @endsection

@section('scripts')
<script>
  document.getElementById('image_sign').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (!file) return;

    const allowedTypes = ['image/jpeg', 'image/png'];
    if (!allowedTypes.includes(file.type)) {
      alert('Please select a JPG or PNG image.');
      event.target.value = ''; // Reset input
      return;
    }

    const reader = new FileReader();
    reader.onload = function(e) {
      // Update the existing profile image preview
      const preview = document.getElementById('profilePreview');
      preview.src = e.target.result;

      // Optionally, show preview inside #frames div as well
      const frames = document.getElementById('frames');
      // frames.innerHTML = `<img src="${e.target.result}" alt="Image Preview" style="width:100px; height:100px; border-radius:50%;">`;
    }
    reader.readAsDataURL(file);
  });
</script>
@endsection
