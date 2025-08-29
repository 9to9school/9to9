@extends('layouts.admin')

@section('title', 'WebBanner List')
@section('content')

<div class="content">
  <!-- Page Header -->
  <!-- Page Wrapper -->
  <div class="page-wrapper">
    <div class="content">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">WebBanner List</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                WebBanners
              </li>
              <li class="breadcrumb-item active" aria-current="page">All WebBanners</li>
            </ol>
          </nav>
        </div>
        <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
          <div class="pe-1 mb-2">
            <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
              data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
              <i class="ti ti-refresh"></i>
            </a>
          </div>
          <div class="pe-1 mb-2">
            <button type="button" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
              data-bs-placement="top" aria-label="Print" data-bs-original-title="Print">
              <i class="ti ti-printer"></i>
            </button>
          </div>
          <div class="dropdown me-2 mb-2">
            <a href="javascript:void(0);"
              class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center"
              data-bs-toggle="dropdown">
              <i class="ti ti-file-export me-2"></i>Export
            </a>
            <ul class="dropdown-menu  dropdown-menu-end p-3">
              <li>
                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                    class="ti ti-file-type-pdf me-2"></i>Export as PDF</a>
              </li>
              <li>
                <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                    class="ti ti-file-type-xls me-2"></i>Export as Excel </a>
              </li>
            </ul>
          </div>
          <div class="mb-2">
            <a href="{{ route('webbanner.create') }}" class="btn btn-primary d-flex align-items-center"><i
                class="ti ti-square-rounded-plus me-2"></i>Add WebBanners</a>
          </div>
        </div>
      </div>
      <!-- /Page Header -->

      <!-- Students List -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
          <h4 class="mb-3">WebBanner List</h4>
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
                  <th>image</th>
{{--                  <th>Background Image</th>--}}
{{--                  <th>SubHeading</th>--}}
                  <th>Heading</th>
{{--                  <th>Description</th>--}}
{{--                  <th>button_name</th>--}}
{{--                  <th>button_link</th>--}}
{{--                  <th>button_name2</th>--}}
{{--                  <th>button_link2</th>--}}
                  <th>Status</th>

                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($webbanners as $webbanner)
                <tr>
                  <td>{{ $webbanner->id }}</td>

                  <td>
                    @if($webbanner->image)

                    <img src="{{ asset($webbanner->image) }}" width="50" height="50" alt="WebBanner Image">
                    @else
                    No Image
                    @endif
                  </td>
{{--                  <td>--}}
{{--                    @if($webbanner->backgroundimage)--}}
{{--                    <img src="{{ Storage::url($webbanner->backgroundimage) }}" width="50" height="50"--}}
{{--                      alt="WebBanner Background">--}}
{{--                    @else--}}
{{--                    No Image--}}
{{--                    @endif--}}
{{--                  </td>--}}
{{--                  <td>{{ $webbanner->subheading }}</td>--}}
                  <td>{{ $webbanner->heading }}</td>
{{--                  <td>{{ Str::limit($webbanner->description, 50) }}</td>--}}
{{--                  <td>{{ $webbanner->button_name }}</td>--}}
{{--                  <td>--}}
{{--                    @if($webbanner->button_link)--}}
{{--                    <a href="{{ $webbanner->button_link }}" target="_blank">Buuton Link</a>--}}
{{--                    @else--}}
{{--                    N/A--}}
{{--                    @endif--}}
{{--                  </td>--}}
{{--                  <td>{{ $webbanner->btn_name }}</td>--}}
{{--                  <td>--}}
{{--                    @if($webbanner->btn_link)--}}
{{--                    <a href="{{ $webbanner->btn_link }}" target="_blank">Buuton Link</a>--}}
{{--                    @else--}}
{{--                    N/A--}}
{{--                    @endif--}}
{{--                  </td>--}}
                  <td>
                    <span class="badge {{ $webbanner->status ? 'badge-success' : 'badge-danger' }}">
                      {{ $webbanner->status ? 'Active' : 'Inactive' }}
                    </span>
                  </td>


                  <td>
                    <a href="{{ route('webbanner.edit', $webbanner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('webbanner.destroy', $webbanner->id) }}" method="POST"
                      style="display:inline;">
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
      @endsection
