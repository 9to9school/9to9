@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{$title}}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/admin/all-popular')}}">Popular For You</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->
            <div class="row mb-3">
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
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ Session('success') }}</strong>
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ Session('error') }}</strong>
                    </div>
                @endif
            </div>
            <div class="col-md-12">
                <form action="{{ url('admin/popular/' . ($popular->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <!-- Personal Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <h4 class="text-dark">{{$title}}</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" value="{{$popular->title}}" class="form-control" placeholder="Title Name">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Url <span class="text-danger">*</span></label>
                                    <input type="text" name="url" value="{{$popular->url}}" class="form-control" placeholder="Title Url">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- Upload Image -->
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Upload Image (444 * 562px Max=500KB) <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Banner Image</label>
                                    <input type="file" class="form-control" id="banner_image" name="banner_image" accept="image/*">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Banner Heading</label>
                                    <input type="text" name="banner_heading" value="{{$popular->banner_heading}}" class="form-control" placeholder="Banner Heading">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="description" class="form-control" rows="3">{{$popular->description}}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Per Month Fees <span class="text-danger">*</span></label>
                                    <input type="text" name="per_month_fee" value="{{ isset($package->per_month_fee) ? (int)$package->per_month_fee : '' }}" class="form-control" placeholder="Per Month Fees">
                                    @error('per_month_fee') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Annual Fees <span class="text-danger">*</span></label>
                                    <input type="text" name="annual_fee" value="{{ isset($package->annual_fee) ? (int)$package->annual_fee : '' }}" class="form-control" placeholder="Annual Fess">
                                    @error('annual_fee') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Discount Fees <span class="text-danger">*</span></label>
                                    <input type="text" name="discount_fee" value="{{ isset($package->discount_fee) ? (int)$package->discount_fee : '' }}" class="form-control" placeholder="Discount Fees">
                                    @error('discount_fee') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- Description -->
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection