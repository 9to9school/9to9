@extends('layouts.admin')

@section('title', 'Edit About us')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit About us</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('partner.aboutus.list') }}">About us List</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit About us</li>
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
        <form action="{{ route('partner.aboutus.update')}}" method="POST">
          <input type="hidden" value="{{$data->id ?? ''}}" name="id">
          @csrf

          <!-- Card 1: About us Details -->
          <div class="card mb-4">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">About us Information</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="school_id" class="form-label">Select School <span style="color: red">*</span></label>
                  <select
                      name="school_id"
                      id="school_id"
                      class="form-select @error('school_id') is-invalid @enderror select-school"
                  >
                      <option value="">-- Select School --</option>
                      @foreach($schools as $school)
                          <option
                              value="{{ $school->id }}" {{ $data->school_id == $school->id ? 'selected' : '' }}
                              >
                              {{ $school->school_name }}
                          </option>
                      @endforeach
                  </select>
                  @if ($errors->has('school_id'))
                      <span class="text-danger">{{ $errors->first('school_id') }}</span>
                  @endif
                  
              </div> 

                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">About Description</label>
                    <textarea name="description" id="aboutEditor" class="form-control" rows="6">{!! old('description', $data->description ?? '') !!}</textarea>
                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>

          

          <!-- Submit Buttons -->
          <div class="text-end">
            <a href="" class="btn btn-light me-3">Cancel</a>
            <button type="submit" class="btn btn-primary">Update About us</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('scripts')

<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>

  CKEDITOR.replace('aboutEditor', {
    height: 300,
    toolbar: [
      { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline'] },
      { name: 'paragraph', items: ['NumberedList', 'BulletedList'] },
      { name: 'links', items: ['Link', 'Unlink'] },
      { name: 'insert', items: ['Image', 'Table'] },
      { name: 'tools', items: ['Maximize'] }
    ],
    removePlugins: 'elementspath',
    resize_enabled: false
  });
</script>
@endsection
