@extends('layouts.admin')

@section('title', 'student List')
@section('content')

<div class="content">
  <!-- Page Header -->

  <div class="page-wrapper">
    <div class="content">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">Student List</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                Usps
              </li>
              <li class="breadcrumb-item active" aria-current="page">All Student</li>
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
            <a href="{{ route('student.create') }}" class="btn btn-primary d-flex align-items-center"><i
                      class="ti ti-square-rounded-plus me-2"></i>Add student</a>
          </div>
        </div>
      </div>
      <!-- /Page Header -->


      <!-- Students List -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
          <h4 class="mb-3">student List</h4>
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
                  <th>Image</th>
                  <th>User_id</th>
                  <th>Academic Year</th>
                  <th>Admission Number</th>
                  <th>Admission Date</th>
                  <th>Roll Number</th>
                  <th>Class</th>
                  <th>Gender</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Dob</th>
                  <th>Primary Contact</th>
                  <th>Mother Tongue</th>
                  <th>Languages known</th>
                  <th>Father Name</th>
                  <th>Email</th>
                  <th>Phone Number 1</th>
                  <th>Phone Number 2</th>
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Zip</th>
                  <th>Medical Condition</th>
                  <th>Allergies</th>
                  <th>Medications</th>


            <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($students as $student)
                <tr>
                   <td>{{ $student->id }}</td>
                   <!-- Image -->
            <td>
                @if($student->student_image)
                    <img src="{{ asset($student->student_image) }}" width="50" height="50" alt="student Image">
                @else
                    No Image
                @endif
            </td>
            <td>{{ $student->user_id }}</td>
            <td>{{ $student->academic_year }}</td>
            <td>{{ $student->admission_number }}</td>
            <td>{{ $student->admission_date }}</td>
            <td>{{ $student->roll_number }}</td>
            <td>{{ $student->class }}</td>
            <td>{{ $student->gender }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->dob }}</td>
                <td>{{ $student->primary_contact}}</td>
                <td>{{ $student->mother_tongue}}</td>
                <td>{{ $student->language_known}}</td>
                <td>{{ $student->father_name}}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone_number_1 ?? 'NA'}}</td>
                <td>{{ $student->phone_number_2 ?? 'N/A' }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->city }}</td>
                <td>{{ $student->state }}</td>
                <td>{{ $student->zip }}</td>

                <td>{{ $student->medical_condition }}</td>
                <td>{{ $student->allergies  ?? 'NA'}}</td>
                <td>{{ $student->medications ?? 'NA' }}</td>

            

                  <td>
                  <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                  <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline;">
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
          <!-- /Student List -->
        </div>
      </div>
    </div>
  </div>
  </div>
  @endsection
