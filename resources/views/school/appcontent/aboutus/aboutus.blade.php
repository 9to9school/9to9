@extends('layouts.school')

@section('title', 'About us')

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

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">About us</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('school.dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">About us</li>
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
        <form action="{{ route('school.about-us.update')}}" method="POST">
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

                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">About Description</label>
                    <textarea name="description" id="editor" class="form-control" rows="6">{!! old('description', $data->description ?? '') !!}</textarea>
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

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.0/classic/ckeditor.js"></script>
<script>
  ClassicEditor
    .create(document.querySelector('#editor'))
    .catch(error => console.error(error));
</script>
@endsection
