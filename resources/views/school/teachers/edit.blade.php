@extends('layouts.school')

@section('title', 'Edit Teacher')

@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Edit Teacher</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('school.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('school.teacher.list') }}">Teachers</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Edit Teachers</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">

            <div class="col-md-12">

                  <form action="{{ route('school.teacher.update',$teacher->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Personal Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Personal Information</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                             
                                @php
                                $imageUrl = isset($teacher->image) && $teacher->image ? asset($teacher->image) : null;
                                @endphp

                                <div class="col-md-12">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                        <div class="me-3">
                                            <div class="preview-box border border-dashed rounded d-flex align-items-center justify-content-center"
                                                style="width: 150px; height: 150px; position: relative; overflow: hidden;">
                                                <img 
                                                    id="preview-image" 
                                                    src="{{ $imageUrl ?? '#' }}" 
                                                    alt="Preview" 
                                                    style="{{ $imageUrl ? 'display: block;' : 'display: none;' }} width: 100%; height: 100%; object-fit: cover; border-radius: 10px;" 
                                                />
                                                <i class="ti ti-photo-plus fs-24 text-muted" id="upload-icon" style="position: absolute; {{ $imageUrl ? 'display: none;' : '' }}"></i>
                                            </div>
                                        </div>
                                        <div class="profile-upload">
                                            <div class="profile-uploader d-flex align-items-center">
                                                <div class="drag-upload-btn mb-3">
                                                    Upload
                                                    <input type="file" name="image" class="form-control image-sign" id="image" name="image">
                                                </div>
                                                <a href="javascript:void(0);" class="btn btn-primary mb-3" id="remove-image">Remove</a>
                                            </div>
                                            <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
                                        </div>
                                    </div>
                                    @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Teacher ID</label>
                                        <input type="text" name="teacher_id" class="form-control" value="{{ old('teacher_id',$teacher->teacher_id) }}" readonly>
                                        @error('teacher_id') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name', $teacher->first_name) }}">
                                        @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name', $teacher->last_name) }}">
                                        @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Class</label>
                                        <select class="select" name="class">
                                            <option>Select</option>
                                            <option >III A</option>
                                            <option>II (A)</option>
                                            <option>VI (A)</option>
                                            <option>VIII</option>
                                        </select>
                                    </div>
                                      @error('class') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-xxl col-xl-3 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Subject</label>
                                        <select name="subject[]" class="form-control select2" multiple placeholder="Subject">
                                             @php
                                                $selectedSubjects = old('subject', json_decode($teacher->subject ?? '[]'));
                                            @endphp
                                            <option value="">-- Select Subjects --</option>
                                            @foreach ($topics as $data)
                                                <option value="{{ $data->id }}" {{ in_array($data->id, $selectedSubjects) ? 'selected' : '' }}>{{ $data->topic_name }}- {{ isset( $data->popular?->title ) ?  $data->popular?->title  : 'N/A' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6">
                                    @php
                                        $selectedShifts = old('work_shift', json_decode($teacher->work_shift ?? '[]'));
                                        @endphp
                                    <div class="mb-3">
                                        <label class="form-label">Work Shift</label>
                                        <select name="work_shift[]" class="form-control select2"  multiple>
                                            <option value="">-- Select Work Shift --</option>
                                            @foreach ($shifts as $shift)
                                                <option value="{{ $shift->id }}" {{ in_array($shift->id, $selectedShifts) ? 'selected' : '' }}>{{ $shift->time_from }} - {{ $shift->time_to }}</option>
                                            @endforeach
                                        </select> 
                                        
                                    </div>
                                     @error('work_shift') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="">Select Gender</option>
                                            <option value="Male" {{ old('gender', $teacher->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                            <option value="Female" {{ old('gender', $teacher->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                        </select>
                                        @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Primary Contact Number 1</label>
                                        <input type="number" class="form-control" name="primary_contact_number1" value="{{ old('primary_contact_number1', $teacher->primary_contact_number1) }}">
                                         @error('primary_contact_number1') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Primary Contact Number 2</label>
                                        <input type="number" class="form-control" name="primary_contact_number2" value="{{ old('primary_contact_number2', $teacher->primary_contact_number2) }}">
                                         @error('primary_contact_number2') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email', $teacher->email) }}"> 
                                         @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Date of Joining</label>
                                        <div class="input-icon position-relative">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control datetimepicker" name="date_of_joining" value="{{ old('date_of_joining', $teacher->date_of_joining	) }}">
                                        </div>
                                    </div>
                                       @error('date_of_joining') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <div class="input-icon position-relative">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control datetimepicker" name="dob"  value="{{ old('dob', $teacher->dob	) }}">
                                        </div>
                                    </div>
                                    @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Marital Status</label>
                                        <select class="select" name="marital_status">
                                            <option>--Select--</option>
                                            <option value="single" {{ old('marital_status', $teacher->marital_status) == 'single' ? 'selected' : '' }}>Single</option>
                                            <option value="married" {{ old('marital_status  ', $teacher->marital_status) == 'married' ? 'selected' : '' }}>Married</option>
                                        </select>
                                          @error('marital_status') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Language Known</label>
                                        <input class="input-tags form-control" type="text" data-role="tagsinput"
                                            name="language_known"  value="{{ old('language_known', $teacher->language_known) }}">
                                             @error('language_known') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Qualification</label>
                                        <input type="text" class="form-control"  name="qualification"   value="{{ old('qualification', $teacher->qualification) }}">
                                          @error('qualification') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Work Experience</label>
                                        <input type="text" class="form-control" name="work_experience"  value="{{ old('work_experience', $teacher->work_experience) }}">
                                          @error('work_experience') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Previous School 1</label>
                                        <input type="text" class="form-control" name="previous_school1" value="{{ old('previous_school1', $teacher->previous_school1) }}">
                                         @error('previous_school1') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                 <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Previous School 2</label>
                                        <input type="text" class="form-control" name="previous_school2" value="{{ old('previous_school2', $teacher->previous_school2) }}">
                                         @error('previous_school2') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                              
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Previous School Phone No</label>
                                        <input type="text" class="form-control" name="previous_school_number" value="{{ old('previous_school_number', $teacher->previous_school_number) }}">
                                         @error('previous_school_number') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" class="form-control"  name="address" value="{{ old('address',$teacher->address) }}">
                                         @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Permanent Address</label>
                                        <input type="text" class="form-control"  name="permanent_address" value="{{ old('permanent_address',$teacher->permanent_address) }}">
                                         @error('permanent_address') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City</label>
                                        <input type="text" class="form-control"  name="city" value="{{ old('city',$teacher->city) }}">
                                         @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">State</label>
                                        <input type="text" class="form-control"  name="state" value="{{ old('state',$teacher->state) }}">
                                         @error('state') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Zip</label>
                                        <input type="text" class="form-control"  name="zip" value="{{ old('zip',$teacher->zip) }}">
                                         @error('zip') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">PAN Number / ID Number</label>
                                        <input type="text" class="form-control" name="id_number" value="{{ old('id_number',$teacher->id_number) }}">
                                         @error('id_number') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <select class="select" name="status">
                                            <option>--Select--</option>
                                            <option value="active" {{ old('status', $teacher->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $teacher->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                             @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                                        </select>
                                    </div>
                                </div>
                                @php
                                    $coordinatorValue = old('coordinator', $teacher->is_coordinator ?? ''); // Replace $yourModel with your actual model variable
                                @endphp

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label d-block">Is Coordinator</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="coordinator" id="coordinatorYes" value="yes" {{ $coordinatorValue == 'yes' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="coordinatorYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="coordinator" id="coordinatorNo" value="no" {{ $coordinatorValue == 'no' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="coordinatorNo">No</label>
                                        </div>
                                        @error('coordinator') 
                                            <small class="text-danger">{{ $message }}</small> 
                                        @enderror
                                    </div>  
                                </div>
                                <div class="col-xxl-12 col-xl-12">
                                    <div class="mb-3">
                                        <label class="form-label">Notes</label>
                                        <textarea name="notes" class="form-control" placeholder="Other Information"
                                            rows="4" >{{ old('notes',$teacher->notes) }}</textarea>
                                    </div>
                                    @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /Personal Information -->

                    <!-- Payroll -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-user-shield fs-16"></i>
                                </span>
                                <h4 class="text-dark">Payroll</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">EPF No</label>
                                        <input type="text" class="form-control" name="epf_no"  value="{{ old('epf_no',$teacher->epf_no) }}">
                                        
                                    </div>
                                      @error('epf_no') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Basic Salary</label>
                                        <input type="text" class="form-control" name="basic_salary"  value="{{ old('basic_salary',$teacher->basic_salary) }}">
                                    </div>
                                      @error('basic_salary') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Contract Type</label>
                                        <select class="select" name="contract_type">
                                            <option>Select</option>
                                            <option value="permanent" {{ old('contract_type', $teacher->contract_type) == 'permanent' ? 'selected' : '' }}>Permanent</option>
                                            <option value="temporary" {{ old('contract_type', $teacher->contract_type) == 'temporary' ? 'selected' : '' }}>Temporary</option>
                                        </select>
                                    </div>
                                    @error('contract_type') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                
                                
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Date of Leaving</label>
                                        <div class="input-icon position-relative">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control datetimepicker" name="date_leaving" value="{{ old('date_leaving',$teacher->date_leaving) }}">
                                             @error('date_leaving') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Payroll -->

                    <!-- Leaves -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-users fs-16"></i>
                                </span>
                                <h4 class="text-dark">Leaves</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Medical Leaves</label>
                                        <input type="text" class="form-control" name="medical_leaves" value="{{ old('medical_leaves',$teacher->medical_leaves) }}">
                                          @error('medical_leaves') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Casual Leaves</label>
                                        <input type="text" class="form-control" name="casual_leaves" value="{{ old('casual_leaves',$teacher->casual_leaves) }}">
                                    </div>
                                      @error('casual_leaves') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Maternity Leaves</label>
                                        <input type="text" class="form-control" name="maternity_leaves" value="{{ old('maternity_leaves',$teacher->maternity_leaves) }}">
                                    </div>
                                     @error('maternity_leaves') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Sick Leaves</label>
                                        <input type="text" class="form-control" name="sick_leaves" value="{{ old('sick_leaves',$teacher->sick_leaves) }}">
                                    </div>
                                     @error('sick_leaves') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Leaves -->

                    <!-- Bank Details -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-map fs-16"></i>
                                </span>
                                <h4 class="text-dark">Bank Account Detail</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Account Name</label>
                                        <input type="text" class="form-control" name="account_name"  value="{{ old('account_name',$teacher->account_name) }}">
                                    </div>
                                    @error('account_name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Account Number</label>
                                        <input type="text" class="form-control"  name="account_number"  value="{{ old('account_number',$teacher->account_number) }}">
                                    </div>
                                    @error('account_number') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bank Name</label>
                                        <input type="text" class="form-control" name="bank_name"  value="{{ old('bank_name',$teacher->bank_name) }}">
                                    </div>
                                     @error('bank_name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">IFSC Code</label>
                                        <input type="text" class="form-control" name="ifsc_code"  value="{{ old('ifsc_code',$teacher->ifsc_code) }}">
                                    </div>
                                     @error('ifsc_code') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Branch Name</label>
                                        <input type="text" class="form-control" name="branch_name"  value="{{ old('branch_name',$teacher->branch_name) }}">
                                    </div>
                                     @error('branch_name') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Bank Details -->


                    <!-- Documents -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-file fs-16"></i>
                                </span>
                                <h4 class="text-dark">Documents</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <div class="mb-3">
                                            <label class="form-label">Upload Resume</label>
                                            <p>Upload image size of 4MB, Accepted Format PDF</p>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="btn btn-primary drag-upload-btn mb-2 me-2">
                                                <i class="ti ti-file-upload me-1"></i>Upload Resume
                                                <input type="file" id="ResumeInput" class="form-control image_sign" name="resume" accept="application/pdf">
                                            </div>
                                            <p class="mb-2" id="fileName"></p>
                                        </div>
                                        <!-- @error('resume') <small class="text-danger">{{ $message }}</small> @enderror -->
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <div class="mb-3">
                                            <label class="form-label">Upload Joining Letter</label>
                                            <p>Upload image size of 4MB, Accepted Format PDF</p>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="btn btn-primary drag-upload-btn mb-2 me-2">
                                                <i class="ti ti-file-upload me-1"></i>Upload Document
                                                <input type="file"  id="letterInput" name="letter" accept="application/pdf" class="form-control image_sign" multiple="">
                                            </div>
                                            <p class="mb-2" id="fileName1"></p>
                                        </div>
                                         <!-- @error('letter') <small class="text-danger">{{ $message }}</small> @enderror -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Documents -->

                    <!-- Password -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-file fs-16"></i>
                                </span>
                                <h4 class="text-dark">Password</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control"  name="password">
                                    </div>
                                      <!-- @error('password') <small class="text-danger">{{ $message }}</small> @enderror -->
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation"  class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Password -->

                    <div class="text-end">
                        <a href="{{route('school.teacher.list')}}" class="btn btn-light me-3">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Teacher</button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('image').addEventListener('change', function (event) {
    const [file] = event.target.files;
    if (file) {
        const preview = document.getElementById('preview-image');
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
        document.getElementById('upload-icon').style.display = 'none';
    }
});

document.getElementById('remove-image').addEventListener('click', function () {
    const preview = document.getElementById('preview-image');
    preview.src = '#';
    preview.style.display = 'none';
    document.getElementById('image').value = '';
    document.getElementById('upload-icon').style.display = 'block';
});


document.getElementById('ResumeInput').addEventListener('change', function (e) {
    const file = e.target.files[0];
    const fileNameElement = document.getElementById('fileName');

    if (file && file.type === "application/pdf") {
        fileNameElement.textContent = file.name;
    } else {
        fileNameElement.textContent = "Invalid file format. Only PDF allowed.";
    }
});

</script>
@endsection