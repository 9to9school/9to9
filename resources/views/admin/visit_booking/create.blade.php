@extends('layouts.admin')
@section('title', 'Add Visit Booking')
@section('content')
    <div class="page-wrapper">
        <div class="content content-two">
            <!-- Page Header -->
            <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                <div class="my-auto mb-2">
                    <h3 class="mb-1">{{ $title }}</h3>
                    <nav>
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Alerts -->
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
            </div>

            <!-- Form -->
            <div class="col-md-12">
                <form action="{{ url('admin/visit-booking/' . ($visitBooking->id ?? '')) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header bg-light">
                            <h4 class="text-dark">{{ $title }}</h4>
                        </div>

                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" value="{{ old('title', $visitBooking->title ?? '') }}" class="form-control" placeholder="Title">
                                    @error('title') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Button Name</label>
                                    <input type="text" name="btn_name" value="{{ old('btn_name', $visitBooking->btn_name ?? '') }}" class="form-control" placeholder="Button Name">
                                    @error('btn_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Button Link</label>
                                    <input type="text" name="btn_link" value="{{ old('btn_link', $visitBooking->btn_link ?? '') }}" class="form-control" placeholder="Button Link">
                                    @error('btn_link') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" rows="4" placeholder="Enter description">{{ old('description', $visitBooking->description ?? '') }}</textarea>
                                    @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
