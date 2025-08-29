@extends('layouts.school')

@section('title', 'School Settings')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">School Settings</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('school.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">School Settings</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->
         @if (Session::has('success'))
         <div
            class="alert alert-success rounded-pill d-flex align-items-center justify-content-between border-success mb-4"
            role="alert">
            <div class="d-flex align-items-center">
            
               <strong class="mx-1">{{ Session('success') }}</strong>
            </div>
            <button type="button" class="btn-close p-0" data-bs-dismiss="alert" aria-label="Close"><span><i
                  class="ti ti-x"></i></span></button>
          </div>
          @endif


    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('update.setting')}}" method="POST" enctype="multipart/form-data">
          <input type="hidden" value="{{$getschool->id}}" name="id">
          @csrf

          <!-- Card 1: School Details -->
          <div class="card mb-4">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">School Information</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <!-- Logo Upload -->
                <div class="col-md-6">
                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">                                                
                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames position-relative" style="width: 100px; height: 100px;">
                            @php
                                $imagePath = !empty($getschool->school_logo) ? asset($getschool->school_logo) : '';
                            @endphp
                            <img 
                                id="studentImagePreview" 
                                src="{{ $imagePath }}" 
                                alt="Student Image" 
                                class="img-fluid position-absolute top-0 start-0 w-100 h-100 object-fit-cover rounded" 
                                style="{{ empty($getschool->school_logo) ? 'display: none;' : '' }}">

                            <i 
                                id="placeholderIcon" 
                                class="ti ti-photo-plus fs-16 position-absolute top-50 start-50 translate-middle"
                                style="{{ !empty($getschool->school_logo) ? 'display: none;' : '' }}">
                            </i>
                        </div>                                          

                        <div class="profile-upload ms-3">
                            <div class="profile-uploader">
                                <input 
                                    type="file" 
                                    name="school_logo" 
                                    class="form-control" 
                                    accept=".jpg,.jpeg,.png,.svg" 
                                    onchange="previewStudentImage(event)">
                            </div>
                            <p class="fs-12 text-danger">Upload image size max 2MB. Allowed formats: JPG, PNG, SVG.</p>
                            @error('school_logo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>


                <!-- Fields -->
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">School Name</label>
                    <input type="text" name="school_name" class="form-control" value="{{ $getschool->school_name }}">
                    @error('school_name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">School Phone 1</label>
                    <input type="text" name="school_phone_1" class="form-control" value="{{ $getschool->school_phone_1 }}">
                    @error('school_phone_1') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">School Phone 2</label>
                    <input type="text" name="school_phone_2" class="form-control" value="{{ $getschool->school_phone_2 }}">
                    @error('school_phone_2') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Principal Name</label>
                    <input type="text" name="principal_name" class="form-control" value="{{ $getschool->principal_name }}">
                    @error('principal_name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Vice Principal Name</label>
                    <input type="text" name="vice_principal_name" class="form-control" value="{{ $getschool->vice_principal_name }}">
                    @error('vice_principal_name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ $getschool->address }}">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="{{ $getschool->city }}">
                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">State</label>
                    <input type="text" name="state" class="form-control" value="{{ $getschool->state }}">
                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Zip Code</label>
                    <input type="text" name="zip" class="form-control" value="{{ $getschool->zip }}">
                    @error('zip') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Card 2: Password Settings -->
          <div class="card mb-4">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-lock fs-16"></i>
                </span>
                <h4 class="text-dark">details</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">School Email</label>
                    <input type="email" name="school_email" class="form-control" value="{{ $getschool->school_email }}">
                    @error('school_email') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Submit Buttons -->
          <div class="text-end">
             <a href="{{route('school.dashboard')}}" class="btn btn-light me-3">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Settings</button>
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
    const previewImg = document.getElementById('studentImagePreview');
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
