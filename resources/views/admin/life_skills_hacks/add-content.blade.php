@extends('layouts.admin')

@section('title', 'Add Content')

@section('content')
<style>
    .ck-editor__editable {
        min-height: 300px;
        max-height: 500px;
        height: 300px;
    }

    .ck-editor {
        max-width: 81000px;
        width: 100%; /* or set fixed width like 600px */
    }
    span.ck.ck-powered-by__label{
      display:none;
    }
    .ck.ck-balloon-panel.ck-powered-by-balloon .ck.ck-powered-by .ck-icon {
    cursor: pointer;
    display: none;
    }
</style>
<div class="page-wrapper">
  <div class="content content-two">
         @php
            $lifeHackId = request()->route('id');           
        @endphp
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add Content</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ url('/admin/add-content-list/'. $lifeHackId) }}">All Contents</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Add Content</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">

        <!-- Alerts -->
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
          </div>
        @endif


        <form action="{{ url('/admin/save-content/' . ($lifeHackId ?? '')) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <!-- Blog Form -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add Life Skill Hack Contents  Content</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">

              <div class="col-md-12">
                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                      <div class="me-3">
                        <div class="preview-box border border-dashed rounded d-flex align-items-center justify-content-center" style="width: 150px; height: 150px; position: relative; overflow: hidden;">
                          <img
                              id="preview-image"
                              src="#"
                              alt="Preview"
                              style="display:none; width: 100%; height: 100%; object-fit: cover; border-radius: 10px;"
                            />
                          <i class="ti ti-photo-plus fs-24 text-muted" id="upload-icon" style="position: absolute;"></i>
                        </div>
                      </div>
                      <div>
                        <label for="image" class="form-label">Upload Image 800*450</label>
                         <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}" accept="image/*">
                        <button type="button" class="btn btn-sm btn-primary mt-2" id="remove-image">Remove</button>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>
                </div>
                


                <!-- Title -->
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Heading</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                    @error('title')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <!-- Status -->
                

                <!-- Description with CKEditor -->
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea id="editor" rows="5" name="description">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

              </div>

              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Content</button>
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
<!-- CKEditor Script (Latest CDN) -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>

<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => console.error(error));


   const imageInput = document.getElementById('image');
  const previewImage = document.getElementById('preview-image');
  const uploadIcon = document.getElementById('upload-icon');
  const removeBtn = document.getElementById('remove-image');

  imageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
        uploadIcon.style.display = 'none';
      };
      reader.readAsDataURL(file);
    }
  });

  removeBtn.addEventListener('click', function () {
    imageInput.value = '';
    previewImage.src = '#';
    previewImage.style.display = 'none';
    uploadIcon.style.display = 'block';
  });

</script>
@endsection
