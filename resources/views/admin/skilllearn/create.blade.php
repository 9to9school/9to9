@extends('layouts.admin')

@section('title', 'Add Banner')
@section('content')

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">Add Skill Learn</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('banner.list') }}">Skill Learn</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Skill Learn
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ url('admin/skill-learn/' . ($webbanner->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                    <h4 class="text-dark">Add Skill Learn</h4>
                                </div>
                            </div>

                            <div class="card-body pb-1">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Heading <span class="text-danger">*</span></label>
                                            <input type="text" name="heading" class="form-control" value="{{ old('heading' , $webbanner->heading ?? '') }}">
                                            @error('heading')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Button Name 1 <span class="text-danger">*</span></label>
                                            <input type="text" name="button" class="form-control" value="{{ old('button' , $webbanner->button ?? '') }}">
                                            @error('button')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Button Link 1 <span class="text-danger">*</span></label>
                                            <input type="text" name="url" class="form-control" value="{{ old('url' , $webbanner->url ?? '') }}">
                                            @error('url')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Button Name 2 <span class="text-danger">*</span></label>
                                            <input type="text" name="playbtn" class="form-control" value="{{ old('playbtn' , $webbanner->playbtn ?? '') }}">
                                            @error('playbtn')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Button Link 2 <span class="text-danger">*</span></label>
                                            <input type="text" name="playurl" class="form-control" value="{{ old('playurl' , $webbanner->playurl ?? '') }}">
                                            @error('playurl')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <label class="form-label">Upload Image 1820*1024 <span class="text-danger">*</span></label>
                                            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                                            <small class="text-muted">Image size up to 500kb. Formats: JPG, PNG, SVG.</small>
                                            @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3 mb-3 text-center">
                                        <div class="d-flex justify-content-center">
                                            <img id="preview-image"  src="{{ $webbanner->image ? asset($webbanner->image) : asset('no-image.png') }}" alt="Banner Preview" style="max-height: 200px; border: 1px dashed #ccc; padding:10px;">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Skill Learn</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <div class="row">

                <div class="col-md-12">
                    <!-- Students List -->
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                            <h4 class="mb-3">Banner List</h4>
                        </div>
                        <div class="card-body p-0 py-3">

                            <!-- Student List -->
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                    <tr>

                                        <th>id</th>
                                        <th>Heading</th>
                                        <th>image</th>

                                        <th>button_name</th>
                                        <th>button_link</th>
                                        <th>Status</th>

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($banners as $banner)
                                        <tr>
                                            <td>{{ $banner->id }}</td>
                                            <td>{{ $banner->heading }}</td>
                                            <td>
                                                @if($banner->image)
                                                    <img src="{{ asset($banner->image) }}" width="50" height="50" alt="Banner Image">
                                                @else
                                                    No Image
                                                @endif
                                            </td>

                                            <td>{{ $banner->button}}</td>
                                            <td>
                                                @if($banner->button_link)
                                                    <a href="{{ $banner->button }}" target="_blank">Buuton Link</a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>
                                                <span class="badge {{ $banner->status ? 'badge-success' : 'badge-danger' }}">
                                                  {{ $banner->status ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>

                                            <td>
                                                <a href="{{ url('admin/skill-learn/'.$banner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('preview-image');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
