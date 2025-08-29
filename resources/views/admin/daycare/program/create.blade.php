@extends('layouts.admin')

@section('title', 'Add Banner')
@section('content')

    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">Add Pre Program</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('daycare.program.index') }}">Pre Program</a></li>
                            {{--                            <li class="breadcrumb-item active" aria-current="page">Add Pre Explore</li>--}}
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->
            <!-- /Page Header -->

            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                @endif
                @if (Session::has('success')) <div class="alert alert-success">{{ Session('success') }}</div> @endif
                @if (Session::has('error')) <div class="alert alert-danger">{{ Session('error') }}</div> @endif
                <div class="col-md-12">


                        @php
                            $isEdit = isset($data);
                            $action = $isEdit ? route('daycare.program.update', $data->id) : route('daycare.program.store');
                        @endphp
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header bg-light">
                                <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                    <h4 class="text-dark">Add Pre Program</h4>
                                </div>
                            </div>

                            <div class="card-body pb-1">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Heading <span class="text-danger">*</span></label>
                                            <input type="text" name="heading" class="form-control" value="{{ old('heading', $data->heading ?? '') }}">
                                            @error('heading')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Description <span class="text-danger">*</span></label>
                                            <textarea name="description" rows="3" class="form-control">{{ old('description', $data->description ?? '') }}</textarea>
                                            @error('description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Sub heading Keys <span class="text-danger">*</span></label>
                                            <input type="text" name="sub_heading" class="form-control" value="{{ old('sub_heading', $data->sub_heading ?? '') }}">
                                            @error('sub_heading')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Key 1 <span class="text-danger">*</span></label>
                                            <input type="text" name="key1" class="form-control" value="{{ old('key1', $data->key1 ?? '') }}">
                                            @error('key1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Key 2 <span class="text-danger">*</span></label>
                                            <input type="text" name="key2" class="form-control" value="{{ old('key2', $data->key2 ?? '') }}">
                                            @error('key2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Key 3 <span class="text-danger">*</span></label>
                                            <input type="text" name="key3" class="form-control" value="{{ old('key3', $data->key3 ?? '') }}">
                                            @error('key3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Key 4 <span class="text-danger">*</span></label>
                                            <input type="text" name="key4" class="form-control" value="{{ old('key4', $data->key4 ?? '') }}">
                                            @error('key4')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Upload Image 558*805<span class="text-danger">*</span></label>
                                            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                                            <small class="text-muted">size up to 500kb. Formats: jpg, png, webp.</small>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3 text-center">
                                        <div class="d-flex justify-content-center">
                                            <img id="preview-image" src="{{ $isEdit && $data->image ? asset($data->image) : asset('no-image.png') }}" alt="Preview" style="max-height: 200px; border: 1px dashed #ccc; padding: 10px;">

                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Pre Program</button>
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
