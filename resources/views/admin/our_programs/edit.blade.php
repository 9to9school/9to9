@extends('layouts.admin')

@section('title', 'Edit Program')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Program</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('our-program.list') }}">Our Programs</a></li>
            <li class="breadcrumb-item active">Edit Program</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('our-program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="card">
            <div class="card-header bg-light">
              <h4 class="text-dark">Program Details</h4>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <!-- Image Upload Preview -->
                <div class="col-md-12">
                  <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                    <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames position-relative">
                      <img id="programImagePreview" src="{{ asset($program->image) }}" alt="Preview" style="max-height: 100px;" class="img-fluid" />
                      <i id="programPlaceholderIcon" class="ti ti-photo-plus fs-16 position-absolute" style="display: none;"></i>
                    </div>
                    <div class="profile-upload">
                      <div class="profile-uploader d-flex align-items-center">
                        <input type="file" name="image" class="form-control" onchange="previewProgramImage(event)" accept="image/*">
                      </div>
                      <p class="fs-12 text-danger">Upload image size max 4MB. Allowed formats: JPG, PNG, SVG.</p>
                      @error('image')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>

                <!-- Heading -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Heading</label>
                  <input type="text" name="heading" class="form-control" value="{{ old('heading', $program->heading) }}">
                  @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Short Description -->
                <div class="col-md-6 mb-3">
                  <label class="form-label">Short Description</label>
                  <input type="text" name="short_description" class="form-control" value="{{ old('short_description', $program->short_description) }}">
                  @error('short_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Long Description -->
                <div class="col-md-12 mb-3">
                  <label class="form-label">Long Description</label>
                  <textarea name="long_description" class="form-control" rows="4">{{ old('long_description', $program->long_description) }}</textarea>
                  @error('long_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Long Description -->
                <?php $program->high_lights = json_decode($program->high_lights); ?>
                <div class="col-md-12 mb-3">
                  <label class="form-label">Highlights</label>
                	<input class="input-tags form-control" type="text" data-role="tagsinput"  name="high_lights[]" value="{{ is_array($program->high_lights) ? implode(',', $program->high_lights) : '' }}">
                  @error('high_lights') <span class="text-danger">{{ $message }}</span> @enderror
                </div>


                <!-- Long Description -->
                  <?php $program->tags = json_decode($program->tags); ?>
                <div class="col-md-12 mb-3">
                  <label class="form-label">Tags</label>
                	<input class="input-tags form-control" type="text" data-role="tagsinput"  name="tags[]" value="{{ is_array($program->tags) ? implode(',', $program->tags) : '' }}">
                  @error('tags') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Time From -->
                <div class="col-md-4 mb-3">
                  <label class="form-label">Time From</label>
                  <input type="text" name="time_from" class="form-control timepicker" value="{{ old('time_from', $program->time_from) }}">
                  @error('time_from') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Time To -->
                <div class="col-md-4 mb-3">
                  <label class="form-label">Time To</label>
                  <input type="text" name="time_to" class="form-control timepicker" value="{{ old('time_to', $program->time_to) }}">
                  @error('time_to') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Fees -->
                <div class="col-md-4 mb-3">
                  <label class="form-label">Fees (₹)</label>
                  <input type="number" name="fees" class="form-control" value="{{ old('fees', $program->fees) }}">
                  @error('fees') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Week -->
                <div class="col-md-4 mb-3">
                  <label class="form-label">Week</label>
                  <input type="text" name="week" class="form-control" value="{{ old('week', $program->week) }}">
                  @error('week') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Student Count -->
                <div class="col-md-4 mb-3">
                  <label class="form-label">Students</label>
                  <input type="number" name="student" class="form-control" value="{{ old('student', $program->student) }}">
                  @error('student') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Age Group -->
                <div class="col-md-4 mb-3">
                  <label class="form-label">Age Group</label>
                  <input type="text" name="age_group" class="form-control" value="{{ old('age_group', $program->age_group) }}">
                  @error('age_group') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <!-- Status -->
                <div class="col-md-4 mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <option value="1" {{ old('status', $program->status) == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $program->status) == '0' ? 'selected' : '' }}>Inactive</option>
                  </select>
                  @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

              </div>
            </div>

            <div class="card-footer text-end">
              <a href="{{ route('our-program.list') }}" class="btn btn-light me-2">Cancel</a>
              <button type="submit" class="btn btn-primary">Update Program</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
function previewProgramImage(event) {
    const input = event.target;
    const preview = document.getElementById('programImagePreview');
    const icon = document.getElementById('programPlaceholderIcon');

    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            if(icon) icon.style.display = 'none';
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = "#";
        preview.style.display = "none";
        if(icon) icon.style.display = "block";
    }
}
</script>
@endpush
