@extends('layouts.admin')

@section('title', 'List Banner')
@section('content')

  <div class="page-wrapper">
    <div class="content content-two">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="mb-1">Add Banner</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('banner.list') }}">Banners</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add Banner</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- /Page Header -->

      <div class="row">

        <div class="col-md-12">
          <!-- Students List -->
          <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
              <h4 class="mb-3">Banner List</h4>
              <div class="d-flex align-items-center flex-wrap">
                <div class="input-icon-start mb-3 me-2 position-relative">
                  <span class="icon-addon">
                    <i class="ti ti-calendar"></i>
                  </span>
                  <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                    value="Academic Year : 2024 / 2025">
                </div>
                <div class="dropdown mb-3 me-2">
                  <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="ti ti-filter me-2"></i>Filter</a>
                  <div class="dropdown-menu drop-width">
                    <form action="students.html">
                      <div class="d-flex align-items-center border-bottom p-3">
                        <h4>Filter</h4>
                      </div>
                      <div class="p-3 pb-0 border-bottom">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label">Class</label>
                              <select class="select">
                                <option>Select</option>
                                <option>I</option>
                                <option>II</option>
                                <option>III</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label">Section</label>
                              <select class="select">
                                <option>Select</option>
                                <option>A</option>
                                <option>B</option>
                                <option>C</option>
                              </select>

                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label">Gender</label>
                              <select class="select">
                                <option>Select</option>
                                <option>Male</option>
                                <option>Female</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="mb-3">
                              <label class="form-label">Status</label>
                              <select class="select">
                                <option>Select</option>
                                <option>Active</option>
                                <option>Inactive</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="p-3 d-flex align-items-center justify-content-end">
                        <a href="#" class="btn btn-light me-3">Reset</a>
                        <button type="submit" class="btn btn-primary">Apply</button>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="d-flex align-items-center bg-white border rounded-2 p-1 mb-3 me-2">
                  <a href="students.html" class="active btn btn-icon btn-sm me-1 primary-hover"><i
                      class="ti ti-list-tree"></i></a>
                  <a href="student-grid.html" class="btn btn-icon btn-sm bg-light primary-hover"><i
                      class="ti ti-grid-dots"></i></a>
                </div>
                <div class="dropdown mb-3">
                  <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                    data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by A-Z
                  </a>
                  <ul class="dropdown-menu p-3">
                    <li>
                      <a href="javascript:void(0);" class="dropdown-item rounded-1 active">
                        Ascending
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="dropdown-item rounded-1">
                        Descending
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="dropdown-item rounded-1">
                        Recently Viewed
                      </a>
                    </li>
                    <li>
                      <a href="javascript:void(0);" class="dropdown-item rounded-1">
                        Recently Added
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body p-0 py-3">

              <!-- Student List -->
              <div class="custom-datatable-filter table-responsive">
                <table class="table datatable">
                  <thead class="thead-light">
                    <tr>

                      <th>id</th>
                      <th>Heading</th>
                      <th>image</th>
                      <th>Description</th>
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
                        <img src="{{ Storage::url($banner->image) }}" width="50" height="50" alt="Banner Image">
                        @else
                        No Image
                        @endif
                      </td>
                      <td>{{ Str::limit($banner->description, 50) }}</td>
                      <td>{{ $banner->button_name }}</td>
                      <td>
                        @if($banner->button_link)
                        <a href="{{ $banner->button_link }}" target="_blank">Buuton Link</a>
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
                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('banner.destroy', $banner->id) }}" method="POST" style="display:inline;">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                            Delete
                          </button>
                        </form>
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