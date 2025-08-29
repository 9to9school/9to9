@extends('layouts.admin')

@section('title', 'Edit CommonSetting')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <style>
      .common_setting img{
        width:100px;
      }
    </style>
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit commonsetting</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('common.list') }}">CommonSetting</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit CommonSetting</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">

      <div class="col-md-12">

        <form action="{{ route('common.update', $commonsetting->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <!-- Personal Information -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit commonsetting</h4>
              </div>
            </div>
            <div class="card-body pb-1 common_setting">
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Logo Header</label>
                    <input type="file" name="logo_header" class="form-control">
                    @if($commonsetting->logo_header)
                      <img src="{{asset('public/'.$commonsetting->logo_header)}}">
                    @endif
                    @error('logo_header')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Logo Footer</label>
                    <input type="file" name="logo_footer" class="form-control">
                    @if($commonsetting->logo_footer)
                      <img src="{{asset('public/'.$commonsetting->logo_footer)}}">
                    @endif
                    @error('logo_footer')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Mobile Logo</label>
                    <input type="file" name="mobile_logo" class="form-control">
                    @if($commonsetting->mobile_logo)
                      <img src="{{asset('public/'.$commonsetting->mobile_logo)}}">
                    @endif
                    @error('mobile_logo')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Favicon</label>
                    <input type="file" name="favicon" class="form-control">
                    @if($commonsetting->favicon)
                      <img src="{{asset('public/'.$commonsetting->favicon)}}">
                    @endif
                    @error('favicon')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Site Title</label>
                    <input type="text" name="site_title" class="form-control" value="{{ old('site_title', $commonsetting->site_title) }}">
                    @error('site_title') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Site Description</label>
                    <textarea name="site_desc" class="form-control" rows="2">{{ old('site_desc', $commonsetting->site_desc) }}</textarea>
                    @error('site_desc') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>


                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $commonsetting->address) }}">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Mobile Number</label>
                    <input type="text" name="mobile_number" class="form-control" value="{{ old('mobile_number', $commonsetting->mobile_number) }}">
                    @error('mobile_number') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Email ID</label>
                    <input type="email" name="email_id" class="form-control" value="{{ old('email_id', $commonsetting->email_id) }}">
                    @error('email_id') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Facebook</label>
                    <input type="text" name="facebook" class="form-control" value="{{ old('facebook', $commonsetting->facebook) }}">
                    @error('facebook') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Instagram</label>
                    <input type="text" name="insta" class="form-control" value="{{ old('insta', $commonsetting->insta) }}">
                    @error('insta') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">Twitter</label>
                    <input type="text" name="twitter" class="form-control" value="{{ old('twitter', $commonsetting->twitter) }}">
                    @error('twitter') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label">LinkedIn</label>
                    <input type="text" name="linkedin" class="form-control" value="{{ old('linkedin', $commonsetting->linkedin) }}">
                    @error('linkedin') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label">Copyright Content</label>
                    <input type="text" name="copyright_content" class="form-control" value="{{ old('copyright_content', $commonsetting->copyright_content) }}">
                    @error('copyright_content') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>


                <div class="col-xl-6">
                  <div class="mb-3">
                    <label class="form-label">Privacy Policy</label>
                    <textarea name="privacy_policy" class="form-control" rows="2">{{ old('privacy_policy', $commonsetting->privacy_policy) }}</textarea>
                    @error('privacy_policy') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-xl-6">
                  <div class="mb-3">
                    <label class="form-label">Terms and Conditions</label>
                    <textarea name="terms_and_conditions" class="form-control" rows="2">{{ old('terms_and_conditions', $commonsetting->terms_and_conditions) }}</textarea>
                    @error('terms_and_conditions') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-xl-6">
                  <div class="mb-3">
                    <label class="form-label">Refund Policy</label>
                    <textarea name="refund_policy" class="form-control" rows="2">{{ old('refund_policy', $commonsetting->refund_policy) }}</textarea>
                    @error('refund_policy') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-xl-6">
                  <div class="mb-3">
                    <label class="form-label">Shipping Policy</label>
                    <textarea name="shipping_policy" class="form-control" rows="2">{{ old('shipping_policy', $commonsetting->shipping_policy) }}</textarea>
                    @error('shipping_policy') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>

@endsection
