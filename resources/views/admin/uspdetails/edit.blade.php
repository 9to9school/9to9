@extends('layouts.admin')

@section('title', 'Edit UspDetails')
@section('content')
<div class="page-wrapper">
  <div class="content content-two">
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit UspDetails</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('usp.detail.list') }}">UspDetails List</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit UspDetails</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{route('usp.detail.update',$data->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
   
          
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Usp Details</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <!-- Image Upload + Preview -->
                
                <div class="col-md-6">
                  <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">                                                
                      <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames position-relative" style="width: 100px; height: 100px;">
                          @php
                              $imagePath = !empty($data->image) ? asset($data->image) : '';
                          @endphp
                          <img 
                              id="studentImagePreview" 
                              src="{{asset($data->image)}}" 
                              alt="Student Image" 
                              class="img-fluid position-absolute top-0 start-0 w-100 h-100 object-fit-cover rounded" 
                              style="{{ empty($data->image) ? 'display: none;' : '' }}">

                          <i 
                              id="placeholderIcon" 
                              class="ti ti-photo-plus fs-16 position-absolute top-50 start-50 translate-middle"
                              style="{{ !empty($data->image) ? 'display: none;' : '' }}">
                          </i>
                      </div>                                          

                      <div class="profile-upload ms-3">
                          <div class="profile-uploader">
                              <input 
                                  type="file" 
                                  name="image" 
                                  class="form-control" 
                                  accept=".jpg,.jpeg,.png,.svg" 
                                  onchange="previewStudentImage(event)">
                          </div>
                          <p class="fs-12 text-danger">Upload image size max 2MB. Allowed formats: JPG, PNG, SVG.</p>
                          @error('student_image')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                  </div>
              </div>


                <!-- Heading -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Heading</label>
                  <input type="text" name="heading" value="{{ old('heading', $data->heading) }}" class="form-control">
                  @error('heading')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                

                <!-- Status -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Status</label>
                  <input type="text" name="status" value="{{ old('status', $data->status) }}" class="form-control">
                  @error('status')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Description -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Description</label>
                  <textarea name="description" rows="4" class="form-control">{{ old('description', $data->description) }}</textarea>
                  @error('description')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>

              </div>

              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
