@extends('layouts.admin')

@section('title', 'Add User')
@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add User</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('school.list') }}">User list</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->
     @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Add User</h4>
              </div>
            </div>
            <div class="card-body pb-1">
              <div class="row">
                <div class="col-md-12">
                  <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                    <!-- <div class="me-3">
                      <div
                        class="preview-box border border-dashed rounded d-flex align-items-center justify-content-center"
                        style="width: 150px; height: 150px; position: relative; overflow: hidden;">
                        <img id="preview-image" src="#" alt="Preview"
                          style="display: none; width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" />
                        <i class="ti ti-photo-plus fs-24 text-muted" id="upload-icon" style="position: absolute;"></i>
                      </div>
                    </div> -->

                    <!-- Input + Remove Button -->
                    <div>
                      <label for="image" class="form-label">Upload Image</label>
                      <input type="file" class="form-control" id="image" name="avtar" accept="image/*">
                      <button type="button" class="btn btn-sm btn-primary mt-2" id="remove-image">Remove</button>
                      @error('avtar') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control">
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control">
                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" class="form-control">
                    @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="number" name="phone_number" class="form-control">
                    @error('phone_number') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Salt Password</label>
                    <input type="password" name="salt_password" class="form-control">
                    @error('salt_password') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Role</label>
                    <select name="role" class="form-control">
                      <option value="">Select</option>
                      <option value="super_admin">Super admin</option>
                      <option value="admin">Admin</option>
                      <option value="teacher">Teacher</option>
                      <option value="school">School</option>
                      <option value="student">Student</option>
                      <option value="marketing">Marketing</option>
                      <option value="coordinator">Coordinator</option>
                    </select>
                    @error('role') <span class="text-danger">{{ $message }}</span> @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select  class="form-control" name="status">
                      <option value="">Select Status</option>
                      <option value="active">Active</option>
                      <option value="inactive">Inactive</option>
                    </select>
                    @error('status')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Save User</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection