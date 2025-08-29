@extends('layouts.school')

@section('title', 'Edit Student')

@section('content')
@php
    use App\Models\Popular;

    $agedata = Popular::all(); $agedata = Popular::all();
@endphp
<style>
.d-none{
    display: none;
}
</style>
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Edit Student</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('school.dashboard')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('school.student.list')}}">Students</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Student</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">

            <div class="col-md-12">

                <form action="{{route('school.student.update')}}" method="Post" enctype="multipart/form-data">
                      <input type="hidden" name="id" value="{{ $student->id }}">
                 @csrf
                    

                    <!-- Parents  Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-user-shield fs-16"></i>
                                </span>
                                <h4 class="text-dark">Parents Information</h4>
                            </div>
                        </div>
                        <div class="card-body pb-0">
                            <div class="border-bottom mb-3">
                                <h5 class="mb-3">Father’s Info</h5>
                                <div class="row">
                                    @php
                                        $fatherImage = isset($student) && $student->father_image ? asset($student->father_image) : '';
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames1 position-relative">
                                                <i class="ti ti-photo-plus fs-16 icon-placeholder {{ $fatherImage ? 'd-none' : '' }}"></i>
                                                <img src="{{ $fatherImage }}" class="img-preview1 {{ $fatherImage ? '' : 'd-none' }}" style="width: 100%; height: 100%; object-fit: cover;" />
                                            </div>
                                            <div class="profile-upload">
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn mb-3">
                                                        Upload
                                                        <input type="file" class="form-control image-sign1" name="father_image" accept="image/*">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-primary mb-3 custom-file-container__image-clear">Remove</a>
                                                </div>
                                                <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
                                            </div>
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Father Name <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="father_name" value="{{ old('father_name', $student->father_name) }}">
                                            @if ($errors->has('father_name'))
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span style="color: red">*</span></label>
                                            <input type="number" class="form-control" name="phone_number_1" value="{{ old('phone_number_1', $student->phone_number_1) }}">
                                            @if ($errors->has('phone_number_1'))
                                                <span class="text-danger">{{ $errors->first('phone_number_1') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Father Occupation <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="father_occ" value="{{ old('father_occup', $student->father_occup) }}">
                                            @if ($errors->has('father_occ'))
                                                <span class="text-danger">{{ $errors->first('father_occ') }}</span>
                                            @endif                     
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="border-bottom mb-3">
                                <h5 class="mb-3">Mother’s Info</h5>
                                <div class="row">
                                    @php
                                        $motherImage = isset($student) && $student->mother_image ? asset($student->mother_image) : '';
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames3 position-relative">
                                                <i class="ti ti-photo-plus fs-16 icon-placeholder3 {{ $motherImage ? 'd-none' : '' }}"></i>
                                                <img src="{{ $motherImage }}" class="img-preview3 {{ $motherImage ? '' : 'd-none' }}" style="width: 100%; height: 100%; object-fit: cover;" />
                                            </div>
                                            <div class="profile-upload">
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn mb-3">
                                                        Upload
                                                        <input type="file" class="form-control image-sign3" name="mother_image" accept="image/*">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-primary mb-3 custom-file-container__image-clear3">Remove</a>
                                                </div>
                                                <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mother Name  <span style="color: red">*</span></label>
                                            <input type="text" class="form-control"  name="mother_name" value="{{ old('mother_name', $student->mother_name) }}">
                                            @if ($errors->has('mother_name'))
                                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                            @endif  
                                        </div>
                                    </div>
                                    <!-- <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div> -->
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="phone_number_2" value="{{ old('phone_number_2', $student->phone_number_2) }}">
                                            @if ($errors->has('phone_number_2'))
                                                <span class="text-danger">{{ $errors->first('phone_number_2') }}</span>
                                            @endif  
                                        </div>
                                       
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mother Occupation <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="mother_occ"  value="{{ old('mother_occ', $student->mother_occup) }}">
                                            @if ($errors->has('mother_occ'))
                                                <span class="text-danger">{{ $errors->first('mother_occ') }}</span>
                                            @endif  
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div>
                                <h5 class="mb-3">Guardian Details</h5>
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address <span style="color: red">*</span></label>
                                            <textarea name="address" class="form-control" rows="3" >{{ old('address', $student->address) }}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">City <span style="color: red">*</span></label>
                                            <input type="text" name="city" class="form-control" id="city" value="{{ old('city', $student->city) }}">
                                             @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">State <span style="color: red">*</span></label>
                                            <input type="text" name="state" class="form-control" id="state" value="{{ old('state', $student->state) }}">
                                             @if ($errors->has('state'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Zip Code <span style="color: red">*</span></label>
                                            <input type="number" name="zip" class="form-control" id="zip"  value="{{ old('zip', $student->zip) }}">
                                            @if ($errors->has('zip'))
                                                <span class="text-danger">{{ $errors->first('zip') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Religion <span style="color: red">*</span></label>
                                            <input type="text" name="religion" class="form-control" id="religion" value="{{ old('religion', $student->religion) }}">
                                             @if ($errors->has('religion'))
                                                <span class="text-danger">{{ $errors->first('religion') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mother Tongue <span style="color: red">*</span></label>
                                            <input type="text" name="mother_tongue" class="form-control" id ="mother_tongue" value="{{ old('mother_tongue', $student->mother_tongue) }}">
                                            @if ($errors->has('mother_tongue'))
                                                <span class="text-danger">{{ $errors->first('mother_tongue') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Language Known <span style="color: red">*</span></label>
                                            <input class="input-tags form-control" type="text" data-role="tagsinput"  name="lang_known" value="{{ old('lang_known', $student->language_known) }}">
                                            @if ($errors->has('lang_known'))
                                                <span class="text-danger">{{ $errors->first('lang_known') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Status <span style="color: red">*</span></label>
                                            <select  class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="active" {{ (isset($student) && $student->status == 'active') ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ (isset($student) && $student->status == 'inactive') ? 'selected' : '' }}>Inactive</option>
                                            </select> 
                                            @if ($errors->has('status'))
                                                <span class="text-danger">{{ $errors->first('status') }}</span>
                                            @endif
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Parents & Guardian Information -->

                    <!-- Sibilings -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-users fs-16"></i>
                                </span>
                                <h4 class="text-dark">Sibilings</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="addsibling-info">
                                <div class="row sibling-cont mb3" data-count="0">
                                    <div class="col-md-12">
                                        <h5 class="sibling-title mb-3">Sibling 1</h5>
                                    </div>
                                    @php
                                        $studentImage = isset($student) && $student->student_image ? asset($student->student_image) : '';
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames" data-index="0">
                                                <i class="ti ti-photo-plus fs-16 default-icon {{ $studentImage ? 'd-none' : '' }}"></i>
                                                <img src="{{ $studentImage }}" class="img-preview {{ $studentImage ? '' : 'd-none' }}" style="width: 100%; height: 100%; object-fit: cover;" />
                                            </div>
                                            <div class="profile-upload">
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn mb-3">
                                                        Upload
                                                        <input type="file" class="form-control image-sign2" name="student_image" data-index="0" accept="image/*">
                                                    </div>
                                                    <a href="javascript:void(0);" class="btn btn-primary mb-3 remove-image" data-index="0">Remove</a>
                                                </div>
                                                <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Student ID<span style="color: red">*</span></label>
                                            <input type="text" name="student_id" class="form-control student_id" readonly value="{{old('student_id', $student->student_id)}}">
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Academic Year <span style="color: red">*</span></label>
                                        <select
                                            name="academic_year"
                                            id="academic_year"
                                            class="form-select @error('academic_year') is-invalid @enderror"
                                        >
                                            <option value="">-- Select Academic Year --</option>
                                            @foreach($acyear as $year)
                                                <option
                                                    value="{{ $year->academic_number }}"
                                                      {{ (isset($student->academic_year) && $student->academic_year == $year->academic_number) ? 'selected' : '' }}>
                                                    {{ $year->academic_number }}
                                                </option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Admission Number <span style="color: red">*</span></label>
                                            <input type="text" name="admission_number" class="form-control admission_number_0" value="{{old('admission_number', $student->admission_number)}}" readonly>
                                            
                                        </div>
                                    </div>

                                      <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Admission Date <span style="color: red">*</span></label>
                                            <div class="input-icon position-relative">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                                <input type="text"  name="admission_date" class="form-control datetimepicker" id ="admission_date"  value="{{old('admission_date', $student->admission_date)}}">                        
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name <span style="color: red">*</span></label>
                                            <input type="text" name="sib_first_name" class="form-control" value="{{old('sib_first_name', $student->first_name)}}">
                                           @if ($errors->has("sib_first_name"))
                                                <span class="text-danger">{{ $errors->first("sib_first_name") }}</span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name <span style="color: red">*</span></label>
                                             <input type="text" name="sib_last_name" class="form-control" value="{{old('sib_last_name', $student->last_name)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Age <span style="color: red">*</span></label>
                                            <select class="age-select form-select" name="sib_age">
                                                <option>Select</option>
                                                @foreach($agedata as $age)
                                                
                                                <option value="{{$age->id}}" data-id="{{$age->id}}" {{ $student->age == $age->id ? 'selected' : '' }}>{{$age->title}}</option>

                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Topic <span style="color: red">*</span></label>
                                        <input type="hidden" class="selected-topics" value='@json(json_decode($student->topic))'>

                                        <select name="topic[]" class="topic-select select2" multiple>
                                            <option value="">--Select Topic--</option>                                            
                                        </select>
                                        
                                       
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Sub Topic <span style="color: red">*</span></label>
                                         <input type="hidden" class="selected-sub-subtopic" value='@json(json_decode($student->subtopic))'>
                                         <input type="hidden" class="topic-select1" value='{{$topic}}'>
                                        <input type="hidden" class="sub-topic-select1" value='{{$subtopic}}'>

                                        <select name="sub_topic[]" class="select2 sub-topic-select"  multiple>
                                            <option value="">--Select Sub Topic--</option>
                                            
                                        </select>
                                       
                                    </div>
                                     
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Per Month Amount <span style="color: red">*</span></label>
                                            <input type="text" name="sib_per_mo_amount" class="form-control" id="per_month_0"  value="{{old('sib_per_mo_amount', $student->per_month_fee)}}">  
                                            <input type="hidden" name="sib_dis_amount" class="form-control" id="dis_amount_0">  
                                            <input type="hidden" name="sib_ann_amount" class="form-control" id="ann_amount_0">                                            
                                        </div>
                                    </div>
                                    

                                  
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="w-100">
                                                    <label class="form-label">Gender <span style="color: red">*</span></label>
                                                    <select name="gender_1" class="form-select w-100">
                                                        <option>Select</option>
                                                        <option value="Male" {{ $student->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                        <option value="Female" {{ $student->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                        <option value="Other" {{ $student->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="school_id" class="form-label">Select Time Shift</label>
                                        <select name="time_shift" id="time_shift" class="form-select @error('school_id') is-invalid @enderror">
                                            <option value="">-- Select Time Shift --</option>
                                            @foreach($shifts as $data)
                                                <option
                                                    value="{{ $data->id }}" {{ $student->time_shift == $data->id ? 'selected' : '' }}
                                                   >
                                                    {{ $data->time_from }}-{{ $data->time_to }}
                                                </option>
                                            @endforeach
                                        </select>
                                       
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="school_id" class="form-label">Good Habits</label>
                                        <select name="good_habit" id="good_habit" class="form-select @error('school_id') is-invalid @enderror select-good">
                                            <option value="">-- Select Time Shift --</option>
                                            @foreach($good_habits as $good_habit)
                                                <option
                                                    value="{{ $good_habit->id }}" {{ $student->good_habit == $good_habit->id ? 'selected' : '' }}
                                                    >
                                                    {{  $good_habit->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('good_habit')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="school_id" class="form-label">Bad Habits</label>
                                        <select name="bad_habit" id="bad_habit" class="form-select @error('school_id') is-invalid @enderror select-bad">
                                            <option value="">-- Select Time Shift --</option>
                                            @foreach($bad_habits as $bad_habit)
                                                <option
                                                    value="{{ $bad_habit->id }}"  {{ $student->bad_habit == $bad_habit->id ? 'selected' : '' }}
                                                   >
                                                    {{  $bad_habit->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <div class="mb-3">
                                                <label class="form-label mb-1">Upload Birth Certificate <span style="color: red">*</span> </label>
                                                <p class="text-danger">Upload image size of 4MB, Accepted Format PDF</p>
                                            </div>
                                            <div class="d-flex align-items-center flex-wrap">
                                                <div class="btn btn-primary drag-upload-btn mb-2 me-2">
                                                    <i class="ti ti-file-upload me-1"></i>Change
                                                    <input type="file" name="birthcer[0]" class="form-control image_sign">
                                                </div>
                                                <p class="mb-2">BirthCertificate.pdf</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-2">
                                            <div class="mb-3">
                                                <label class="form-label mb-1">Upload Transfer Certificate <span style="color: red">*</span></label>
                                                <p class="text-danger">Upload image size of 4MB, Accepted Format PDF</p>
                                            </div>
                                            <div class="d-flex align-items-center flex-wrap">
                                                <div class="btn btn-primary drag-upload-btn mb-2">
                                                    <i class="ti ti-file-upload me-1"></i>Upload Document
                                                    <input type="file"  name="trancer[0]" class="form-control image_sign">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
										<div class="col-md-12">
											<div class="mb-2">
												<label class="form-label">Medical History <span style="color: red"></label>
												<div class="d-flex align-items-center flex-wrap">
													<label class="form-label text-dark fw-normal me-2">Medical Condition of a Student</label>
													<div class="form-check me-3 mb-2">
														<input class="form-check-input medical-radio" type="radio" name="condition_0"  value="yes" id="condition_yes_0" 
                                                         onclick="toggleExtraFields(true)"
                                                           {{ (isset($student->medical_condition) && $student->medical_condition == 'yes') ? 'checked' : '' }}>
														<label class="form-check-label" for="yes">
															yes
														</label>
													</div>
													<div class="form-check me-3 mb-2">
                                                        
														<input class="form-check-input medical-radio" type="radio" name="condition_0"  value="no" id="condition_no_0" 
                                                         onclick="toggleExtraFields(false)"
                                                        {{ (isset($student->medical_condition) && $student->medical_condition == 'no') ? 'checked' : '' }}>
														<label class="form-check-label" for="no">
															no
														</label>
													</div>
												</div>
											</div>
										</div>
                                        <div class="extraFields"  style="display: none;">
                                            <div class="mb-3">
                                                <label class="form-label">description</label>
                                                <textarea name="description" class="form-control medical-desc" rows="3" placeholder="Enter description here...">{{old('description', $student->description)}}</textarea>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">image</label>
                                                <input class="input-tags form-control medical_image"  name="medical_image" type="file" data-role="tagsinput">
                                            </div>
                                        </div>
									</div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">misc1</label>
                                            <input type="text" name="misc1" class="form-control" id="misc1" value="{{old('misc1', $student->misc1)}}">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">misc2</label>
                                            <input type="text" name="misc2" class="form-control" id="misc2" value="{{old('misc2', $student->misc2)}}">
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- <div class="border-top pt-3"> 
                                <a href="javascript:void(0);" class="add-child btn btn-primary d-inline-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                            </div> -->
                        </div>
                    </div>
                    <!-- /Sibilings -->

                    <!-- Address -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-map fs-16"></i>
                                </span>
                                <h4 class="text-dark">Account</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                         <input type="email" name="email" class="form-control"   value="{{old('email', $student->email)}}">
                                         @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>  
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Address -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Update Student</button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>
<!-- /Page Wrapper -->
@endsection

@section('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>








const allTopics = @json($topic); // Laravel to JS safely
console.log(allTopics);

$('.addsibling-info .sibling-cont').each(function () {
    let $row = $(this);
    let topicSelect = $row.find('.topic-select');

    // Get selected topic IDs from hidden input (or use empty array if none)
    let selectedRaw = $row.find('.selected-topics').val();
    let selectedTopics = [];

    try {
        selectedTopics = JSON.parse(selectedRaw || '[]').map(Number);
    } catch (e) {
        console.warn('Invalid JSON in selected-topics:', selectedRaw);
        selectedTopics = [];
    }

    // Clear existing options except default empty one
    topicSelect.find('option:not([value=""])').remove();

    // Add options from allTopics
    allTopics.forEach(topic => {
        let isSelected = selectedTopics.includes(topic.id);
        let $option = $('<option>', {
            value: topic.id,
            text: topic.topic_name,
            selected: isSelected
        });

        topicSelect.append($option);
    });

    // Re-initialize select2 (or trigger change if already initialized)
    topicSelect.trigger('change.select2');
});



const allTopics1 = @json($subtopic); // Laravel to JS safely
console.log(allTopics1); // Corrected to log `allTopics1`

$('.addsibling-info .sibling-cont').each(function () {
    let $row = $(this);
    let topicSelect1 = $row.find('.sub-topic-select');

    // Safely parse selected subtopics, fallback to empty array if invalid
    let selectedRaw = $row.find('.selected-sub-subtopic').val();
    let selectedTopics1 = [];

    try {
        selectedTopics1 = JSON.parse(selectedRaw || '[]').map(Number);
    } catch (e) {
        console.warn('Invalid JSON in selected-sub-subtopic:', selectedRaw);
        selectedTopics1 = [];
    }

    // Clear existing options except default empty option (if exists)
    topicSelect1.find('option').not('[value=""]').remove();

    // Append new options from allTopics1
    allTopics1.forEach(topic => {
        let isSelected1 = selectedTopics1.includes(topic.id);
        let $option = $('<option>', {
            value: topic.id,
            text: topic.name,
            selected: isSelected1
        });

        topicSelect1.append($option);
    });

    // Trigger change to refresh select2
    topicSelect1.trigger('change.select2');
});





// Event delegation: when any .age-select changes inside .addsibling-info container
$(document).ready(function () {
    // Use jQuery properly with event delegation
    $('.addsibling-info').on('change', '.age-select', function () {

        
        let $this = $(this);
        let popular_id = $this.val();
        let selectedDataId = $this.find('option:selected').data('id');
        let parentRow = $this.closest('.sibling-cont');
        let dataCount = parentRow.data('count');

        if (!selectedDataId) {
            $('#per_month_' + dataCount).val('');
            $('#dis_amount_' + dataCount).val('');
            $('#ann_amount_' + dataCount).val('');
            updateTotalPerMonthAmount();
            return;
        }

        // Find selects in the same sibling container
        let $topicSelect = parentRow.find('.topic-select').addClass('select2');
        let $subTopicSelect = parentRow.find('.sub-topic-select');

        console.log(popular_id);

        // Fetch topics by age
        if (popular_id) {
            $.ajax({
                url: '/school/get-topics-by-age/' + popular_id,
                type: 'GET',
                success: function (data) {
                    $topicSelect.empty().append('<option value="">--Select Topic--</option>');
                    $.each(data, function (key, value) {
                        $topicSelect.append('<option value="' + value.id + '" selected>' + value.topic_name + '</option>');
                    });

                    $subTopicSelect.empty().append('<option value="">--Select Sub Topic--</option>');
                },
                error: function () {
                    $topicSelect.empty().append('<option value="">--Select Topic--</option>');
                }
            });
        } else {
            $topicSelect.empty().append('<option value="">--Select Topic--</option>');
        }

        // Fetch subtopics by topic
        if (popular_id) {
            $.ajax({
                url: '{{ url("school/get-subtopics-by-topic") }}/' + popular_id,
                type: 'GET',
                success: function (data) {
                    $subTopicSelect.empty().append('<option value="">--Select Sub Topic--</option>');
                    $.each(data, function (key, value) {
                        $subTopicSelect.append('<option value="' + value.id + '" selected>' + value.name + '</option>');
                    });
                },
                error: function () {
                    console.error("Error loading sub topics.");
                }
            });
        } else {
            $subTopicSelect.html('<option value="">--Select Sub Topic--</option>');
        }

        // Fetch fee details
        $.ajax({
            url: '{{ route('student.getamount') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                id: selectedDataId,
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                console.log(response);
                if (response && response.amount) {
                    $('#per_month_' + dataCount).val(response.amount.per_month_fee);
                    $('#dis_amount_' + dataCount).val(response.amount.discount_fee);
                    $('#ann_amount_' + dataCount).val(response.amount.annual_fee);
                    updateTotalPerMonthAmount();
                }
            },
            error: function (xhr) {
                console.error("Error fetching data:", xhr.responseText);
            }
        });
    });
});



$('.addsibling-info').on('change', '.select-school', function () {
    let $this = $(this);
    let school_id_raw = $this.val();
    let parentRow = $this.closest('.sibling-cont');
    let dataCount = parseInt(parentRow.data('count'));

    if (school_id_raw) {
        // Pad school ID to 2 digits
        let schoolIdStr = school_id_raw.toString().padStart(2, '0');

        if (dataCount === 0) {
            // First sibling → AJAX generate both IDs from backend
            $.ajax({
                url: '/admin/generate-admission-id/' + schoolIdStr,
                type: 'GET',
                success: function (res) {
                    let admissionNumber = res.admission_id;
                    parentRow.find(`input[name="admission_number"]`).val(admissionNumber);
                },
                error: function () {
                    alert('Failed to generate admission number');
                }
            });

            $.ajax({
                url: '/admin/generate-student-id/' + schoolIdStr,
                type: 'GET',
                success: function (res) {
                    let studentId = res.student_id;
                    parentRow.find(`input[name="student_id"]`).val(studentId);
                },
                error: function () {
                    alert('Failed to generate student ID');
                }
            });

        } else {
            let prevCount = dataCount - 1;

            // --- Handle admission number ---
            let prevAdmission = $(`input[name="admission_number"]`).val();

            if (prevAdmission) {
                let fixedPrefix = "9T9";
                let datePartLength = prevAdmission.length - (fixedPrefix.length + 2 + 5);
                let datePartStart = fixedPrefix.length + 2;
                let datePart = prevAdmission.substr(datePartStart, datePartLength);

                let prefix = fixedPrefix + schoolIdStr + datePart;

                let suffix = prevAdmission.substr(prevAdmission.length - 5);
                let nextSuffixNum = parseInt(suffix, 10) + 1;
                let nextSuffix = nextSuffixNum.toString().padStart(5, '0');

                let nextAdmission = prefix + nextSuffix;

                parentRow.find(`input[name="admission_number"]`).val(nextAdmission);
            } else {
                alert('Previous admission number missing. Please fill the first one first.');
            }

            // --- Handle student ID ---
            let prevStudentId = $(`input[name="student_id"]`).val();

            if (prevStudentId) {
                let fixedPrefix = "STU-";
                let datePartStart = fixedPrefix.length + 2;
                let datePart = prevStudentId.substr(datePartStart, 6);

                let prefix = fixedPrefix + schoolIdStr + datePart;

                let suffix = prevStudentId.substr(prevStudentId.length - 4);
                let nextSuffixNum = parseInt(suffix, 10) + 1;
                let nextSuffix = nextSuffixNum.toString().padStart(4, '0');

                let nextStudentId = prefix + nextSuffix;

                parentRow.find(`input[name="student_id"]`).val(nextStudentId);
            } else {
                alert('Previous student ID missing. Please fill the first one first.');
            }
        }
    } else {
        parentRow.find(`input[name="admission_number"]`).val('');
        parentRow.find(`input[name="student_id"]`).val('');
    }
});

function updateTotalPerMonthAmount() {
    var total = 0;
       
    $("input[name='sib_per_mo_amount[]']").each(function () {
        var amount = parseFloat($(this).val()) || 0; 
        total += amount;
    });
    
    $("#total_per_month_amount").text(total.toFixed(2));
}

function toggleStudentFields() {
    if ($('#new_student').is(':checked')) {
        // Enable fields
        $('#status, #student_image, #school_id, #academic_year, #admission_date, #first_name, #last_name, #primary_contact, #mother_tongue, #email, #phone_number_1, #phone_number_2, #address, #city, #state, #zip, #religion, #nationality, #password,#father_name,#mother_name')
            .prop('readonly', false);
        
        $('#parent_id').hide(); // Hide school field for new students
    } else {
        // Disable fields
        $('#status,#primary_contact, #email, #address, #password,#father_name')
            .prop('readonly', true);

        $('#parent_id').show(); // Show school select field for existing student
    }
}

$(document).ready(function () {
    // Run once on page load
    toggleStudentFields();

    // Trigger on radio change
    $('input[name="student_type"]').change(function () {
        toggleStudentFields();
    });


});





$('#selectparent').on('change', function () {
    let parent_id = $(this).val();
    // $('#admission_number').val('');
    $('#primary_contact').val('');
    $('#email').val('');
    $('#address').val('');
    $('#father_name').val('');
    $('#siblingContainer').empty();
    $('#status').val('');

    if (parent_id) {
        $.ajax({
            url: '/admin/getparentdata/' + parent_id,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                // $('#admission_number').val(response.admissionnum);
                 $('#primary_contact').val(response.parent.phone_number);
                $('#email').val(response.parent.email);
                $('#status').val(response.parent.status);
                $('#address').val(response.parent.address);
                $('#father_name').val(response.parent.name);
                $('#siblingContainer').html(response.html); // Replace or append HTML here

            }
        });
    } else {
        $('#admission_number').val('');
        $('#primary_contact').val('');
        $('#email').val('');
        $('#address').val('');
        $('#father_name').val('');
        $('#siblingContainer').empty();
        $('#status').val('');
    }
});






$(document).on('change', '.image-sign2', function (e) {
    const input = this;
    const index = $(this).data('index');
    const file = input.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            console.log(e.target.result);
            const $frame = $(`.frames[data-index="${index}"]`);
            $frame.find('.img-preview').attr('src', e.target.result).removeClass('d-none');
            $frame.find('.default-icon').addClass('d-none');
        };
        reader.readAsDataURL(file);
    }
});

// Remove image preview
$(document).ready(function () {
    // Preview on file select
    $('.image-sign1').on('change', function (e) {
        const reader = new FileReader();
        const preview = $('.img-preview1');
        const icon = $('.icon-placeholder');

        reader.onload = function (e) {
            preview.attr('src', e.target.result).removeClass('d-none');
            icon.addClass('d-none');
        };

        if (this.files && this.files[0]) {
            reader.readAsDataURL(this.files[0]);
        }
    });

    // Remove image
    $('.custom-file-container__image-clear').on('click', function () {
        $('.image-sign1').val('');
        $('.img-preview1').attr('src', '').addClass('d-none');
        $('.icon-placeholder').removeClass('d-none');
    });
});




// Remove image preview
$(document).on('click', '.custom-file-container__image-clear3', function () {
    const $container = $(this).closest('.d-flex.align-items-center.flex-wrap');
    const $input = $container.find('.image-sign3');
    const $frame = $container.find('.frames3');

    // Clear file input
    $input.val('');

    // Clear preview
    $frame.find('.img-preview3').attr('src', '').addClass('d-none');
    $frame.find('.icon-placeholder3').removeClass('d-none');
});

$(document).on('change', '.image-sign3', function () {
    const file = this.files[0];
    const $container = $(this).closest('.d-flex.align-items-center.flex-wrap');
    const $frame = $container.find('.frames3');

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            $frame.find('.img-preview3').attr('src', e.target.result).removeClass('d-none');
            $frame.find('.icon-placeholder3').addClass('d-none');
        };
        reader.readAsDataURL(file);
    }
});

</script>

<script>
  function toggleExtraFields(show) {
    document.querySelector('.extraFields').style.display = show ? 'block' : 'none';
  }

  window.onload = function() {
    // Check which radio is checked on page load and toggle extra fields accordingly
    const yesRadio = document.getElementById('condition_yes_0');
    if (yesRadio.checked) {
      toggleExtraFields(true);
    } else {
      toggleExtraFields(false);
    }
  }


  $('.topic-select').on('select2:opening select2:unselecting', function (e) {
    e.preventDefault();
});

$('.sub-topic-select').on('select2:opening select2:unselecting', function (e) {
    e.preventDefault();
});
$(document).on('change', '.image-sign2', function (e) {
    const input = this;
    const index = $(this).data('index');
    const file = input.files[0];

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            console.log(e.target.result);
            const $frame = $(`.frames[data-index="${index}"]`);
            $frame.find('.img-preview').attr('src', e.target.result).removeClass('d-none');
            $frame.find('.default-icon').addClass('d-none');
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection
