@extends('layouts.school')

@section('title', 'teacher List')
@section('content')

<div class="content">
  <!-- Page Header -->

  <div class="page-wrapper">
    <div class="content">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">Teacher List</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('school.dashboard') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                Teachers
              </li>
              <li class="breadcrumb-item active" aria-current="page">All Teacher</li>
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
            <ul class="dropdown-menu dropdown-menu-end p-3">
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
            <a href="{{ route('school.teacher.create') }}" class="btn btn-primary d-flex align-items-center"><i
                      class="ti ti-square-rounded-plus me-2"></i>Add teacher</a>
          </div>
        </div>
      </div>
      <!-- /Page Header -->
       
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


      <!-- Students List -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
          <h4 class="mb-3">Teacher List</h4>
          <!-- <div class="d-flex align-items-center flex-wrap">
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
          </div> -->
        </div>
        <div class="card-body p-0 py-3">

          <!-- Student List -->
          <div class="custom-datatable-filter table-responsive">
            <table class="table datatable">
              <thead class="thead-light">
                <tr>

                  <th>S.No</th>
                  <th>Teacher Id</th>                  
                  <th>Name</th>
                  <th>School Name</th>
                  <th>Gender</th>
                  <th>Phone</th>
                  <th>City</th>
                  <th>ZIP</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @if($teachers)
                <?php $i = 1 ;?>
                @foreach($teachers as $teacher)
                <tr>
                <td>{{ $i }}</td>  
                <td>{{ $teacher->teacher_id }}</td>   
                <td>
                  <div class="d-flex align-items-center">
                    <a href="teacher-details.html" class="avatar avatar-md"><img src="{{ $teacher->image
                                                            ? asset($teacher->image)
                                                            : asset('assets/images/no-image.png') }}" class="img-fluid rounded-circle" alt="img"></a>
                    <div class="ms-2">
                      <p class="text-dark mb-0"><a href="teacher-details.html">{{ $teacher->first_name }} {{ $teacher->last_name }}</a>
                      </p>
                    </div>
                  </div>
                </td>                    
                <td>{{ $teacher->school->name ?? 'N/A' }}</td>
                <td>{{ $teacher->gender }}</td>
                <td>{{ $teacher->primary_contact_number1 }}</td>
                <td>{{ $teacher->city }}</td>
                <td>{{ $teacher->zip }}</td>
                <?php if($teacher->status  == 'active'){
                $status = 'Active';
                $class = 'badge-success';
                }else{
                    $status = 'Inactive';
                    $class = 'badge-danger';
                      
                }
                ?>
                <td><span class="badge {{ $class}}">
                    {{$status}}
                </span>
                </td> 
                  <td>
                  <a href="{{ route('school.teacher.edit', $teacher->id) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form action="{{ route('school.teacher.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
                <?php $i++ ;?>
                @endforeach
                @endif

              </tbody>
            </table>
          </div>
          <!-- /Student List -->
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection
