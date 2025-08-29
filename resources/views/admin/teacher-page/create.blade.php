@extends('layouts.admin')

@section('styles')
    <style>
        .cke_notifications_area {
            pointer-events: none;
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">

            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{ $title }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Alerts -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session('success') }}</div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session('error') }}</div>
        @endif

        <!-- Form Start -->
            <div class="col-md-12">
                <form action="{{ url('admin/add-teacher-page/' . ($teacherPage->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="text-dark">{{ $title }}</h4>
                        </div>

                        <div class="card-body pb-1">
                            <div class="row">
                                <!-- Banner Section -->
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Image</label>
                                    <input type="file" name="banner_image" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Heading</label>
                                    <input type="text" name="banner_heading" value="{{ $teacherPage->banner_heading ?? '' }}" class="form-control" placeholder="Enter banner heading">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Paragraph</label>
                                    <textarea name="banner_para" class="form-control" rows="2" placeholder="Enter banner paragraph">{{ $teacherPage->banner_para ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Name</label>
                                    <input type="text" name="btn_name" value="{{ $teacherPage->btn_name ?? '' }}" class="form-control" placeholder="Enter button name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Link</label>
                                    <input type="text" name="btn_link" value="{{ $teacherPage->btn_link ?? '' }}" class="form-control" placeholder="Enter button link">
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Why Apply Here</h4>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Heading</label>
                                    <input type="text" name="why_apply_heading" value="{{ $teacherPage->why_apply_heading?? '' }}" class="form-control" placeholder="Enter Why Apply heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Paragraph</label>
                                    <textarea name="why_apply_para" class="form-control" rows="2" placeholder="Enter Why Apply Paragraph">{{ $teacherPage->why_apply_para ?? '' }}</textarea>
                                </div>

                                <!-- Works Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">How It Works Section</h4>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Works Heading</label>
                                    <input type="text" name="works_heading" value="{{ $teacherPage->works_heading ?? '' }}" class="form-control" placeholder="Enter works heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Works Paragraph</label>
                                    <textarea name="works_para" class="form-control" rows="2" placeholder="Enter works paragraph">{{ $teacherPage->works_para ?? '' }}</textarea>
                                </div>

                                @foreach ([1, 2, 3] as $i)
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Works Subheading {{ $i }}</label>
                                        <input type="text" name="works_subheading{{ $i }}" value="{{ $teacherPage->{'works_subheading'.$i} ?? '' }}" class="form-control" placeholder="Enter subheading {{ $i }}">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label">Works Paragraph {{ $i }}</label>
                                        <textarea name="works_para{{ $i }}" class="form-control" rows="2" placeholder="Enter paragraph {{ $i }}">{{ $teacherPage->{'works_para'.$i} ?? '' }}</textarea>
                                    </div>
                            @endforeach


                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Open Positions</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Position Heading</label>
                                    <input type="text" name="position_heading" value="{{ $teacherPage->position_heading?? '' }}" class="form-control" placeholder="Enter Position heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Position Para</label>
                                    <textarea name="position_para" class="form-control" rows="2" placeholder="Enter Position Paragraph">{{ $teacherPage->position_para ?? '' }}</textarea>
                                </div>

                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Frequently Asked Questions</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Faq Heading</label>
                                    <input type="text" name="faq_heading" value="{{ $teacherPage->faq_heading?? '' }}" class="form-control" placeholder="Enter FAQ heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Faq Para</label>
                                    <textarea name="faq_para" class="form-control" rows="2" placeholder="Enter FAQ Paragraph">{{ $teacherPage->faq_para ?? '' }}</textarea>
                                </div>
                            <!-- Journey Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Journey Section</h4>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Journey Image</label>
                                    <input type="file" name="journey_image" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Journey Heading</label>
                                    <input type="text" name="journey_heading" class="form-control" value="{{ $teacherPage->journey_heading ?? '' }}" placeholder="Enter journey Heading">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Journey Para</label>
                                    <input type="text" name="journey_para" class="form-control" value="{{ $teacherPage->journey_para ?? '' }}" placeholder="Enter journey paragraph">
                                </div>
                                <!-- Apply Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Apply Section</h4>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Apply Image</label>
                                    <input type="file" name="apply_image" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Apply Heading</label>
                                    <input type="text" name="apply_heading" value="{{ $teacherPage->apply_heading ?? '' }}" class="form-control" placeholder="Enter apply heading">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Apply Paragraph</label>
                                    <textarea name="apply_para" class="form-control" rows="2" placeholder="Enter apply paragraph">{{ $teacherPage->apply_para ?? '' }}</textarea>
                                </div>

                                <!-- Description with CKEditor -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control ckeditor" rows="5" placeholder="Enter description...">{{ $teacherPage->description ?? '' }}</textarea>
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
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.ckeditor').each(function () {
                CKEDITOR.replace(this, {
                    placeholder: 'Enter description...'
                });
            });
        });
    </script>
@endsection
