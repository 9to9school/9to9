@extends('layouts.admin')
@section('title', 'About Us')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{$title}}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin/popular') }}">{{$title}}</a></li>
                            <li class="breadcrumb-item active">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Alerts -->
            @if ($errors->any())
                <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            @if (Session::has('success')) <div class="alert alert-success">{{ Session('success') }}</div> @endif
            @if (Session::has('error')) <div class="alert alert-danger">{{ Session('error') }}</div> @endif

        <!-- Form -->
            <div class="col-md-12">
                <form action="{{ url('admin/add-about/' . ($about->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="text-dark">{{$title}}</h4>
                        </div>

                        <div class="card-body pb-1">
                            <div class="row align-items-center">
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Banner Section</h4>
                                    </div>
                                </div>
                                <!-- Banner -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Image</label>
                                    <input type="file" class="form-control" name="banner_image"/>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Heading</label>
                                    <input type="text" name="banner_heading" value="{{ $about->banner_heading ?? '' }}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Sub Heading</label>
                                    <input type="text" name="banner_sub_heading" value="{{ $about->banner_sub_heading ?? '' }}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Paragraph</label>
                                    <input type="text" name="banner_para" value="{{ $about->banner_para ?? '' }}" class="form-control">
                                </div>
                               {{-- <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Button Name</label>
                                    <input type="text" name="banner_btn_name" value="{{ $about->banner_btn_name ?? '' }}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Button Link</label>
                                    <input type="text" name="banner_btn_link" value="{{ $about->banner_btn_link ?? '' }}" class="form-control">
                                </div>--}}

                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Section 1 Welcome Details</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Section 2 Heading</label>
                                    <input type="text" name="heading_sec2" value="{{ $about->heading_sec2 ?? '' }}" class="form-control">
                                </div>
                                <!-- Section 2 -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Section 2 Sub Heading</label>
                                    <input type="text" name="sub_heaading_sec2" value="{{ $about->sub_heaading_sec2 ?? '' }}" class="form-control">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Section 2 Paragraph</label>
                                    <textarea name="para_sec2" class="form-control" rows="3">{{ $about->para_sec2 ?? '' }}</textarea>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Section 2  About us</h4>
                                    </div>
                                </div>
                                <!-- Section 1 -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Image Section 1</label>
                                    <input type="file" class="form-control" name="image_sec1" accept="image/*">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Main Sub Heading</label>
                                    <input type="text" name="main_sub_heading" value="{{ $about->main_sub_heading ?? '' }}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Main Heading</label>
                                    <input type="text" name="main_heading" value="{{ $about->main_heading ?? '' }}" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Main Paragraph</label>
                                    <textarea name="main_para" class="form-control" rows="3">{{ $about->main_para ?? '' }}</textarea>
                                </div>

                                <!-- Icons Section -->
                                @foreach ([1, 2, 3, 4] as $i)
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Icon Image {{ $i }}  <span class="text-danger">*</span> 100*100</label>
                                        <div class="d-flex align-items-center">
                                            <input type="file" class="form-control me-3" name="icon_image{{ $i }}" accept="image/*" onchange="previewImage(event, 'preview{{ $i }}')" style="max-width: 70%;">

                                            <img id="preview{{ $i }}"
                                                 src="{{ !empty($about->{'icon_image'.$i}) ? asset($about->{'icon_image'.$i}) : '' }}"
                                                 alt="Icon {{ $i }}"
                                                 style="max-width: 60px; display: {{ !empty($about->{'icon_image'.$i}) ? 'block' : 'none' }};">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Sub Heading {{ $i }}  <span class="text-danger">*</span></label>
                                        <input type="text" name="sub_heading{{ $i }}" value="{{ $about->{'sub_heading'.$i} ?? '' }}" class="form-control">
                                    </div>
                                    {{--<div class="col-md-4 mb-3">
                                        <label class="form-label">Paragraph {{ $i }}</label>
                                        <textarea name="para{{ $i }}" class="form-control" rows="2">{{ $about->{'para'.$i} ?? '' }}</textarea>
                                    </div>--}}
                            @endforeach

                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Section Why Choose</h4>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Why Choose Heading <span class="text-danger">*</span></label>
                                    <div class="d-flex align-items-center">
                                        <input type="text" required class="form-control me-3" value="{{ $about->choose_heading ?? '' }}"  name="choose_heading">

                                    </div>
                                </div>
                                @foreach ([1, 2, 3, 4, 5, 6] as $k)
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Icon Image {{ $k }}  <span class="text-danger">*</span> 292* 187 </label>
                                        <div class="d-flex align-items-center">
                                            <input type="file" class="form-control me-3" name="choose_icon{{ $k }}" accept="image/*" onchange="previewImage(event, 'preview{{ $k }}')" style="max-width: 70%;">

                                            <img id="preview{{ $k }}"
                                                 src="{{ !empty($about->{'choose_icon'.$k}) ? asset($about->{'choose_icon'.$k}) : '' }}"
                                                 alt="Icon {{ $k }}"
                                                 style="max-width: 60px; display: {{ !empty($about->{'icon_image'.$i}) ? 'block' : 'none' }};">
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"> title {{ $k }} <span class="text-danger">*</span></label>
                                        <input type="text" required name="choose_title{{ $k }}" value="{{ $about->{'choose_title'.$k} ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label">Paragraph {{ $k }}  <span class="text-danger">*</span></label>
                                        <input name="choose_para{{ $k }}" value="{{ $about->{'choose_para'.$k} ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label"> link {{ $i }}</label>
                                        <input name="choose_link{{ $k }}" value="{{ $about->{'choose_link'.$k} ?? '' }}" class="form-control">
                                    </div>
                                @endforeach
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Section News letters</h4>
                                    </div>
                                </div>

                                <!-- Newsletter -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Newsletter Heading</label>
                                    <input type="text" name="heading_newsletter" value="{{ $about->heading_newsletter ?? '' }}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Newsletter Paragraph</label>
                                    <input type="text" name="para_newsletter" value="{{ $about->para_newsletter ?? '' }}" class="form-control">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Newsletter Image 500*333</label>
                                    <input type="file" class="form-control" name="image_newsletter" accept="image/*">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function previewImage(event, previewId) {
            const input = event.target;
            const preview = document.getElementById(previewId);

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
