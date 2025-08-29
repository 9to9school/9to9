@extends('layouts.admin')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{$title}}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{url('/admin/all-school-category')}}">School Category</a>
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
                <form action="{{ url('admin/school-category/' . ($category->id ?? '')) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <!-- Personal Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <h4 class="text-dark">Add School Category</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Category Name <span class="text-danger">*</span></label>
                                    <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" placeholder="Category Name">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Category Url <span class="text-danger">*</span></label>
                                    <input type="text" name="category_url" value="{{$category->category_url}}" class="form-control" placeholder="Category Url">
                                    @error('heading') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- Upload Image -->
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Upload Image <span class="text-danger">*</span> (Size:480*320px Max=500KB)</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Banner Image</label>
                                    <input type="file" class="form-control" id="banner_image" name="banner_image">
                                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description <span class="text-danger">*</span></label>
                                    <textarea name="content" class="form-control" rows="3">{{ $category->content }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
