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
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Alerts -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
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
                <form action="{{ url('admin/add-franchise/' . ($franchise->id ?? '')) }}" method="POST" enctype="multipart/form-data">
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
                                    <input type="text" name="banner_heading" value="{{ $franchise->banner_heading ?? '' }}" class="form-control" placeholder="Enter banner heading">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Banner Paragraph</label>
                                    <textarea name="banner_para" class="form-control" rows="2" placeholder="Enter banner paragraph">{{ $franchise->banner_para ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Name</label>
                                    <input type="text" name="btn_name" value="{{ $franchise->btn_name ?? '' }}" class="form-control" placeholder="Enter button name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Button Link</label>
                                    <input type="text" name="btn_link" value="{{ $franchise->btn_link ?? '' }}" class="form-control" placeholder="Enter button link">
                                </div>

                                <!-- Why Choose Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Why Choose Section</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Why Choose Heading</label>
                                    <input type="text" name="why_choose_heading" value="{{ $franchise->why_choose_heading ?? '' }}" class="form-control" placeholder="Enter Why Choose heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Why Choose Paragraph</label>
                                    <textarea name="why_choose_para" class="form-control" rows="2" placeholder="Enter Why Choose Paragraph">{{ $franchise->why_choose_para ?? '' }}</textarea>
                                </div>

                                <!-- Requirement Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Requirement Section</h4>
                                    </div>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Requirement Heading</label>
                                    <input type="text" name="requirement_heading" value="{{ $franchise->requirement_heading ?? '' }}" class="form-control" placeholder="Enter Requirement heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Requirement Paragraph</label>
                                    <textarea name="requirement_para" class="form-control" rows="2" placeholder="Enter Requirement Paragraph">{{ $franchise->requirement_para ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Requirement Image 1</label>
                                    <input type="file" name="requirement_image1" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Requirement Title 1</label>
                                    <input type="text" name="requirement_title1" value="{{ $franchise->requirement_title1 ?? '' }}" class="form-control" placeholder="Enter Requirement Title 1">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Requirement Image 2</label>
                                    <input type="file" name="requirement_image2" class="form-control" accept="image/*">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Requirement Title 2</label>
                                    <input type="text" name="requirement_title2" value="{{ $franchise->requirement_title2 ?? '' }}" class="form-control" placeholder="Enter Requirement Title 2">
                                </div>

                                <!-- Investment Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Investment Section</h4>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Investment Heading</label>
                                    <input type="text" name="investment_heading" value="{{ $franchise->investment_heading ?? '' }}" class="form-control" placeholder="Enter Investment Heading">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Investment Image</label>
                                    <input type="file" name="investment_image" value="{{ $franchise->investment_image ?? '' }}" class="form-control" placeholder="Enter Investment Heading">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Investment Paragraph</label>
                                    <textarea name="investment_para" class="form-control" rows="2" placeholder="Enter Investment Paragraph">{{ $franchise->investment_para ?? '' }}</textarea>
                                </div>

                                <!-- Steps Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Steps Section</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Steps Heading</label>
                                    <input type="text" name="steps_heading" value="{{ $franchise->steps_heading ?? '' }}" class="form-control" placeholder="Enter Steps Heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Steps Paragraph</label>
                                    <textarea name="steps_para" class="form-control" rows="2" placeholder="Enter Steps Paragraph">{{ $franchise->steps_para ?? '' }}</textarea>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Step 1</label>
                                    <input type="text" name="step1" value="{{ $franchise->step1 ?? '' }}" class="form-control" placeholder="Step 1">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Step 2</label>
                                    <input type="text" name="step2" value="{{ $franchise->step2 ?? '' }}" class="form-control" placeholder="Step 2">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Step 3</label>
                                    <input type="text" name="step3" value="{{ $franchise->step3 ?? '' }}" class="form-control" placeholder="Step 3">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Step 4</label>
                                    <input type="text" name="step4" value="{{ $franchise->step4 ?? '' }}" class="form-control" placeholder="Step 4">
                                </div>

                                <!-- Location Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Location Section</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Location Heading</label>
                                    <input type="text" name="location_heading" value="{{ $franchise->location_heading ?? '' }}" class="form-control" placeholder="Enter Location Heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Location Paragraph</label>
                                    <textarea name="location_para" class="form-control" rows="2" placeholder="Enter Location Paragraph">{{ $franchise->location_para ?? '' }}</textarea>
                                </div>

                                <!-- Blog Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Blog Section</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Blog Heading</label>
                                    <input type="text" name="blog_heading" value="{{ $franchise->blog_heading ?? '' }}" class="form-control" placeholder="Enter Blog Heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Blog Paragraph</label>
                                    <textarea name="blog_para" class="form-control" rows="2" placeholder="Enter Blog Paragraph">{{ $franchise->blog_para ?? '' }}</textarea>
                                </div>

                                <!-- Get Started Section -->
                                <div class="col-md-12 mt-4">
                                    <div class="card bg-dark p-2">
                                        <h4 class="text-white">Get Started Section</h4>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Get Started Heading</label>
                                    <input type="text" name="get_start_heading" value="{{ $franchise->get_start_heading ?? '' }}" class="form-control" placeholder="Enter Get Started Heading">
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label">Get Started Paragraph</label>
                                    <textarea name="get_start_para" class="form-control" rows="2" placeholder="Enter Get Started Paragraph">{{ $franchise->get_start_para ?? '' }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Get Started Button Name</label>
                                    <input type="text" name="get_start_btn_name" value="{{ $franchise->get_start_btn_name ?? '' }}" class="form-control" placeholder="Enter Get Started Button Name">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Get Started Link</label>
                                    <input type="text" name="get_start_link" value="{{ $franchise->get_start_link ?? '' }}" class="form-control" placeholder="Enter Get Started Link">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
