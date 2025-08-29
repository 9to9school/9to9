@extends('layouts.school')

@section('title', 'Add Student')

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
                <h3 class="mb-1">Add Student</h3>
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

                <form action="{{route('school.student.post')}}" method="Post" enctype="multipart/form-data">
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
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">                                                
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames1">
                                                <i class="ti ti-photo-plus fs-16"></i>
                                                <img src="" class="img-preview1 d-none" style="width: 100%; height: 100%; object-fit: cover;" />

                                            </div>                                              
                                            <div class="profile-upload">
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn mb-3">
                                                        Upload
                                                        <input type="file" class="form-control image-sign1" name="father_image">
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
                                            <input type="text" class="form-control" name="father_name" value="">
                                            @if ($errors->has('father_name'))
                                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number <span style="color: red">*</span></label>
                                            <input type="number" class="form-control" name="phone_number_1">
                                            @if ($errors->has('phone_number_1'))
                                                <span class="text-danger">{{ $errors->first('phone_number_1') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Father Occupation <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="father_occ" >
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
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">                                                
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames3">
                                                <i class="ti ti-photo-plus fs-16"></i>
                                                <img src="" class="img-preview3 d-none" style="width: 100%; height: 100%; object-fit: cover;" />

                                            </div>                                              
                                            <div class="profile-upload">
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn mb-3">
                                                        Upload
                                                        <input type="file" class="form-control image-sign3"  name="mother_image">
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
                                            <input type="text" class="form-control"  name="mother_name" >
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
                                            <input type="text" class="form-control" name="phone_number_2" >
                                            @if ($errors->has('phone_number_2'))
                                                <span class="text-danger">{{ $errors->first('phone_number_2') }}</span>
                                            @endif  
                                        </div>
                                       
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mother Occupation <span style="color: red">*</span></label>
                                            <input type="text" class="form-control" name="mother_occ" >
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
                                            <textarea name="address" class="form-control" rows="3" ></textarea>
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">City <span style="color: red">*</span></label>
                                            <input type="text" name="city" class="form-control" id="city" value="">
                                             @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">State <span style="color: red">*</span></label>
                                            <input type="text" name="state" class="form-control" id="state" value="">
                                             @if ($errors->has('state'))
                                                <span class="text-danger">{{ $errors->first('state') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Zip Code <span style="color: red">*</span></label>
                                            <input type="number" name="zip" class="form-control" id="zip" value="">
                                            @if ($errors->has('zip'))
                                                <span class="text-danger">{{ $errors->first('zip') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Religion <span style="color: red">*</span></label>
                                            <input type="text" name="religion" class="form-control" id="religion" value="">
                                             @if ($errors->has('religion'))
                                                <span class="text-danger">{{ $errors->first('religion') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mother Tongue <span style="color: red">*</span></label>
                                            <input type="text" name="mother_tongue" class="form-control" id ="mother_tongue" value="">
                                            @if ($errors->has('mother_tongue'))
                                                <span class="text-danger">{{ $errors->first('mother_tongue') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                    <div class="col-xxl col-xl-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Language Known <span style="color: red">*</span></label>
                                            <input class="input-tags form-control" type="text" data-role="tagsinput"   value="" name="lang_known">
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
                                            <option value="active" >Active</option>
                                            <option value="inactive" >Inactive</option>
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
                                <div class="row sibling-cont mb3" data-count="0" data-last-admission="9T90625071500006">
                                    <div class="col-md-12">
                                        <h5 class="sibling-title mb-3">Sibling 1</h5>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">                                                
                                            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames" data-index="0">
                                                <i class="ti ti-photo-plus fs-16 default-icon"></i>
                                                <img src="" class="img-preview d-none" style="width: 100%; height: 100%; object-fit: cover;" />
                                            </div>                                            
                                            <div class="profile-upload">
                                                <div class="profile-uploader d-flex align-items-center">
                                                    <div class="drag-upload-btn mb-3">
                                                        Upload
                                                        <input type="file" class="form-control image-sign2" multiple="" name="student_image[0]" data-index="0" accept="image/*">
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
                                            <input type="text" name="student_id[0]" class="form-control student_id_0" readonly value="{{$studentid}}">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <label class="form-label">Academic Year <span style="color: red">*</span></label>
                                        <select
                                            name="academic_year[0]"
                                            id="academic_year"
                                            class="form-select @error('academic_year') is-invalid @enderror"
                                        >
                                            <option value="">-- Select Academic Year --</option>
                                            @foreach($acyear as $year)
                                                <option
                                                    value="{{ $year->academic_number }}"
                                                    >
                                                    {{ $year->academic_number }}
                                                </option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Admission Number <span style="color: red">*</span></label>
                                            <input type="text" name="admission_number[0]" class="form-control admission_number_0" readonly value="{{$admissionid}}">
                                            
                                        </div>
                                    </div>

                                      <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">Admission Date <span style="color: red">*</span></label>
                                            <div class="input-icon position-relative">
                                                <span class="input-icon-addon">
                                                    <i class="ti ti-calendar"></i>
                                                </span>
                                                <input type="text"  name="admission_date[0]" class="form-control datetimepicker" id ="admission_date" value="">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name <span style="color: red">*</span></label>
                                            <input type="text" name="sib_first_name[0]" class="form-control">
                                           @if ($errors->has("sib_first_name.0"))
                                                <span class="text-danger">{{ $errors->first("sib_first_name.0") }}</span>
                                            @endif
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name <span style="color: red">*</span></label>
                                             <input type="text" name="sib_last_name[0]" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Age <span style="color: red">*</span></label>
                                            <select class="age-select form-select" name="sib_age[0]">
                                                <option>Select</option>
                                                @foreach($agedata as $age)
                                                
                                                <option value="{{$age->id}}" data-id="{{$age->id}}">{{$age->title}}</option>

                                                @endforeach
                                            </select>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Topic <span style="color: red">*</span></label>
                                        <select name="topic[0][]" class="topic-select select2" multiple readonly>
                                            <option value="">--Select Topic--</option>
                                            
                                        </select>
                                        
                                       
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Sub Topic <span style="color: red">*</span></label>
                                        <select name="sub_topic[0][]" class="select2 sub-topic-select"  multiple readonly>
                                            <option value="">--Select Sub Topic--</option>
                                            
                                        </select>
                                       
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Per Month Amount <span style="color: red">*</span></label>
                                            <input type="text" name="sib_per_mo_amount[0]" class="form-control" id="per_month_0">  
                                            <input type="hidden" name="sib_dis_amount[0]" class="form-control" id="dis_amount_0">  
                                            <input type="hidden" name="sib_ann_amount[0]" class="form-control" id="ann_amount_0">                                            
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="w-100">
                                                    <label class="form-label">Gender <span style="color: red">*</span></label>
                                                    <select name="gender_1[0]" class="form-select w-100">
                                                        <option>Select</option>
                                                        <option value="Male" >Male</option>
                                                        <option value="Female" >Female</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="school_id" class="form-label">Select Time Shift</label>
                                        <select name="time_shift[0]" id="time_shift" class="form-select @error('school_id') is-invalid @enderror">
                                            <option value="">-- Select Time Shift --</option>
                                            @foreach($shifts as $data)
                                                <option
                                                    value="{{ $data->id }}"
                                                   >
                                                    {{ $data->time_from }}-{{ $data->time_to }}
                                                </option>
                                            @endforeach
                                        </select>
                                       
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <label for="school_id" class="form-label">Good Habits</label>
                                        <select name="good_habit[0]" id="good_habit" class="form-select @error('school_id') is-invalid @enderror select-good">
                                            <option value="">-- Select Time Shift --</option>
                                            @foreach($good_habits as $good_habit)
                                                <option
                                                    value="{{ $good_habit->id }}"
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
                                        <select name="bad_habit[0]" id="bad_habit" class="form-select @error('school_id') is-invalid @enderror select-bad">
                                            <option value="">-- Select Time Shift --</option>
                                            @foreach($bad_habits as $bad_habit)
                                                <option
                                                    value="{{ $bad_habit->id }}"
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
														<input class="form-check-input medical-radio" type="radio" name="condition_0[0]"  value="yes">
														<label class="form-check-label" for="yes">
															yes
														</label>
													</div>
													<div class="form-check me-3 mb-2">
														<input class="form-check-input medical-radio" type="radio" name="condition_0[0]"  value="no">
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
                                                <textarea name="description[0]" class="form-control medical-desc" rows="3" placeholder="Enter description here..."></textarea>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">image</label>
                                                <input class="input-tags form-control medical_image"  name="medical_image[0]" type="file" data-role="tagsinput">
                                            </div>
                                        </div>
									</div>
                                    
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">misc1</label>
                                            <input type="text" name="misc1[0]" class="form-control" id="misc1">
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">misc2</label>
                                            <input type="text" name="misc2[0]" class="form-control" id="misc2">
                                            
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="border-top pt-3"> 
                                <a href="javascript:void(0);" class="add-child btn btn-primary d-inline-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                            </div>
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
                                         <input type="email" name="email" class="form-control"  value="">
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
                        <a href="{{ route('student.list') }}" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Add Student</button>
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
$('.add-siblings').on('click', function (e) {
    e.preventDefault();

    let $lastSibling = $('.sibling-cont').last();
    let newIndex = $('.sibling-cont').length;

    // Clone the last sibling
    let $clone = $lastSibling.clone();

    // Update name attributes and reset values
    $clone.find('input, select, textarea').each(function () {
        let name = $(this).attr('name');
        if (name) {
            let updated = name.replace(/\[\d+\]/, `[${newIndex}]`);
            $(this).attr('name', updated);
        }

        // Reset values
        if ($(this).is('input[type="file"]')) {
            $(this).val('');
        } else if ($(this).is('select')) {
            $(this).val(''); // ✅ reset selected value only, keep options
        } else {
            $(this).val('');
        }
    });

    $clone.find('.text-danger').remove();

    // Destroy Select2 on clone before reinit
    $clone.find('.select2').each(function () {
        if ($(this).data('select2')) {
            $(this).select2('destroy');
        }
    });

    // 🔁 Destroy datetimepicker if already applied
    $clone.find('.datetimepicker').each(function () {
        if ($(this).data("DateTimePicker")) {
            $(this).data("DateTimePicker").destroy();
        }
    });

     // Update data-index for image preview
    $clone.find('.image-sign2, .frames, .remove-image').each(function () {
        $(this).attr('data-index', newIndex);
    });

    $clone.find('.image-sign2').attr('name', `student_image[${newIndex}]`);

    // Reset preview
    $clone.find('.img-preview').attr('src', '').addClass('d-none');
    $clone.find('.default-icon').removeClass('d-none');


    // Hide extraFields section inside the clone (if exists)
    $clone.find('.extraFields').hide();

    // Add remove button if not present
    if ($clone.find('.remove-sibling').length === 0) {
        $clone.append(`
            <a href="javascript:void(0);" class="remove-sibling text-danger d-block mt-2">
                <i class="ti ti-trash"></i> Remove
            </a>
        `);
    } else {
        $clone.find('.remove-sibling').removeClass('d-none');
    }

    // Append cloned sibling to the form
    $('.addsibling-info').append($clone);

    // Re-initialize Select2 inside only the clone
    $clone.find('.select2').select2();


    
    $clone.find('.datetimepicker').datetimepicker({
        format: 'DD-MM-YYYY',
        icons: {
            up: "fas fa-angle-up",
            down: "fas fa-angle-down",
            next: 'fas fa-angle-right',
            previous: 'fas fa-angle-left'
        }
    });

    // Update title/counting etc.
    updateSiblingTitles();
});


// Event delegation for remove button (if not added yet)
$('.addsibling-info').on('click', '.remove-sibling', function (e) {
    e.preventDefault();
    $(this).closest('.sibling-cont').remove();
    updateSiblingTitles();

    // Optional: hide remove button on first sibling if only one left
    if ($('.sibling-cont').length === 1) {
        $('.sibling-cont').first().find('.remove-sibling').addClass('d-none');
    }
});



function updateSiblingTitles() {
  $('.sibling-cont').each(function(index) {
    // Example: Update title inside each sibling block
    $(this).find('.sibling-title').text('Sibling ' + (index + 1));
    
    // Optionally update data-count attribute
    $(this).attr('data-count', index);
  });
}




let index = 0;  // start with 0 or 1 depending on your initial count

$(".add-child").on('click', function () {
    index++;  
    
    var ageOptions = `
        @foreach($agedata as $age)
            <option value="{{ $age->id }}" data-id="{{ $age->id }}">{{ $age->title }}</option>
        @endforeach
    `;

    var goodhabit = `
        @foreach($good_habits as $good_habit)
            <option
                value="{{ $good_habit->id }}"
                >
                {{  $good_habit->name }}
            </option>
        @endforeach
    `;

    

    var badhabit = `
         @foreach($bad_habits as $bad_habit)
            <option
                value="{{ $bad_habit->id }}"
                >
                {{  $bad_habit->name }}
            </option>
        @endforeach
    `;

   

    var timeshift = `
        @foreach($bad_habits as $bad_habit)
            <option
                value="{{ $bad_habit->id }}"
                >
                {{  $bad_habit->name }}
            </option>
        @endforeach
    `;

    var year = `
        @foreach($acyear as $year)
            <option
                value="{{ $year->academic_number }}"
                >
                {{ $year->academic_number }}
            </option>
        @endforeach
    `;

    var servicecontent = `
    <div class="row sibling-cont mb3" data-count="${index}">
    <div class="col-md-12">
        <h5 class="sibling-title mb-3">Sibling ${index + 1}</h5>
    </div>

       <!-- Image Upload -->
    <div class="col-md-12">
        <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">                                                
            <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames" data-index="${index}">
                <i class="ti ti-photo-plus fs-16 default-icon"></i>
                <img src="" class="img-preview d-none" style="width: 100%; height: 100%; object-fit: cover;" />
            </div>                                            
            <div class="profile-upload">
                <div class="profile-uploader d-flex align-items-center">
                    <div class="drag-upload-btn mb-3">
                        Upload
                        <input type="file" class="form-control image-sign2" multiple name="student_image[${index}]" data-index="${index}" accept="image/*">
                    </div>
                    <a href="javascript:void(0);" class="btn btn-primary mb-3 remove-image" data-index="${index}">Remove</a>
                </div>
                <p class="fs-12">Upload image size 4MB, Format JPG, PNG, SVG</p>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Student ID<span style="color: red">*</span></label>
            <input type="text" name="student_id[${index}]" class="form-control student_id_${index}" readonly>
            
        </div>
    </div>

    <!-- School -->
    

    <!-- Academic Year -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Academic Year <span style="color: red">*</span></label>
        <select name="academic_year[${index}]" class="form-select select2">
            <option value="">--Select Year--</option>
                ${year}
        </select>
    </div>

    <!-- Admission No -->
    <div class="col-md-4 mb-3">
        <label class="form-label">Admission Number</label>
        <input type="text" name="admission_number[${index}]" class="form-control admission_number_${index}">
    </div>

    

    <!-- Admission Date -->
    <div class="col-md-4">
        <div class="mb-3">
            <label class="form-label">Admission Date <span style="color: red">*</span></label>
            <div class="input-icon position-relative">
                <span class="input-icon-addon">
                    <i class="ti ti-calendar"></i>
                </span>
                <input type="text"  name="admission_date[${index}]" class="form-control datetimepicker" id ="admission_date" value="">
                
            </div>
        </div>
    </div>


 

    <!-- Name Fields -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">First Name <span style="color: red">*</span></label>
            <input type="text" name="sib_first_name[${index}]" class="form-control">
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Last Name <span style="color: red">*</span></label>
            <input type="text" name="sib_last_name[${index}]" class="form-control">
        </div>
    </div>

    <!-- Age -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Age <span style="color: red">*</span></label>
            <select class="age-select form-select" name="sib_age[${index}]">
                <option value="">Select</option>
                ${ageOptions}
            </select>
        </div>
    </div>

    <!-- Topic -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Topic <span style="color: red">*</span></label>
        <select name="topic[${index}][]" class="topic-select select2" multiple readonly>
            <option value="">--Select Topic--</option>
        </select>
    </div>

    <!-- Sub Topic -->
    <div class="col-md-12 mb-3">
        <label class="form-label">Sub Topic <span style="color: red">*</span></label>
        <select name="sub_topic[${index}][]" class="select2 sub-topic-select" multiple readonly>
            <option value="">--Select Sub Topic--</option>
        </select>
    </div>
    
     <!-- Fees -->
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Per Month Amount</label>
            <input type="text" name="sib_per_mo_amount[]" class="form-control" id="per_month_${index}">  
            <input type="hidden" name="sib_dis_amount[]" class="form-control" id="dis_amount_${index}">  
            <input type="hidden" name="sib_ann_amount[]" class="form-control" id="ann_amount_${index}">                                            
        </div>
    </div> 

    <!-- Gender -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Gender <span style="color: red">*</span></label>
        <select name="gender_1[${index}]" class="form-select">
            <option value="">--Select Gender--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>

    <!-- Shift -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Time Shift</label>
        <select name="time_shift[${index}]" class="form-select select2">
            <option value="">--Select Shift--</option>
                            ${timeshift}
        </select>
    </div>

    <!-- Good Habits -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Good Habits</label>

        <select name="good_habits[${index}]" class="form-select select2" multiple>
            <option value="">-- Select Good Habits --</option>
           ${goodhabit}
        </select>
    </div>
    
    <!-- Bad Habits -->
    <div class="col-md-6 mb-3">
        <label for="school_id" class="form-label">Bad Habits</label>
        <select name="bad_habit[0]" id="bad_habit" class="form-select @error('school_id') is-invalid @enderror select-bad">
            <option value="">-- Select Bad Habits --</option>
            @foreach($bad_habits as $bad_habit)
                <option
                    value="{{ $bad_habit->id }}"
                    >
                    {{  $bad_habit->name }}
                </option>
            @endforeach
        </select>        
    </div>

    <!-- Birth Certificate  Upload -->
    <div class="col-lg-6">
        <div class="mb-2">
            <div class="mb-3">
                <label class="form-label mb-1">Upload Birth Certificate <span style="color: red">*</span> </label>
                <p class="text-danger">Upload image size of 4MB, Accepted Format PDF</p>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <div class="btn btn-primary drag-upload-btn mb-2 me-2">
                    <i class="ti ti-file-upload me-1"></i>Change
                    <input type="file" name="birthcer[0]" class="form-control image_sign" accept=".pdf,.doc,.jpg,.jpeg,.png">
                </div>
                <p class="mb-2">BirthCertificate.pdf</p>
            </div>
        </div>
    </div>

    <!-- Transfer Certificate  Upload -->
    <div class="col-lg-6">
        <div class="mb-2">
            <div class="mb-3">
                <label class="form-label mb-1">Upload Transfer Certificate <span style="color: red">*</span></label>
                <p class="text-danger">Upload image size of 4MB, Accepted Format PDF</p>
            </div>
            <div class="d-flex align-items-center flex-wrap">
                <div class="btn btn-primary drag-upload-btn mb-2">
                    <i class="ti ti-file-upload me-1"></i>Upload Document
                    <input type="file"  name="trancer[0]" class="form-control image_sign" accept=".pdf,.doc,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>
    </div>

    <!-- Medical History -->
    <div class="row">
        <div class="col-md-12">
            <div class="mb-2">
                <label class="form-label">Medical History <span style="color: red"></label>
                <div class="d-flex align-items-center flex-wrap">
                    <label class="form-label text-dark fw-normal me-2">Medical Condition of a Student</label>
                    <div class="form-check me-3 mb-2">
                        <input class="form-check-input medical-radio" type="radio" name="condition_0[0]"  value="yes">
                        <label class="form-check-label" for="yes">
                            yes
                        </label>
                    </div>
                    <div class="form-check me-3 mb-2">
                        <input class="form-check-input medical-radio" type="radio" name="condition_0[0]"  value="no">
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
                <textarea name="description[0]" class="form-control medical-desc" rows="3" placeholder="Enter description here..."></textarea>

            </div>
            <div class="mb-3">
                <label class="form-label">image</label>
                <input class="input-tags form-control medical_image"  name="medical_image[0]" type="file" data-role="tagsinput">
            </div>
        </div>
    </div>


    <!-- Misc Fields -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Misc 1</label>
        <input type="text" name="misc1[${index}]" class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Misc 2</label>
        <input type="text" name="misc2[${index}]" class="form-control">
    </div>
    <div col-md-12>
    <a href="javascript:void(0);" class="btn btn-primary mb-3 remove-sibling" style="float:right;">Remove</a>

    </div>


    
    </div>`;

$(".addsibling-info").append(servicecontent);

$(".addsibling-info .select2").select2({
    width: '100%'  // Ensure proper styling
});
changedata(index);
return false;
});

$('.addsibling-info').on('change', '.age-select', function () {   
    let $this = $(this);
    let popular_id = $this.val();
    var selectedDataId = $(this).find('option:selected').data('id'); 
    var parentRow = $(this).closest('.sibling-cont');  

     var dataCount = parentRow.data('count');  
    
    if(!selectedDataId){
        
        $('#per_month_' + dataCount).val('');
        $('#dis_amount_' + dataCount).val('');
        $('#ann_amount_' + dataCount).val('');

        updateTotalPerMonthAmount(); 

        return;
    }

    // Find the .topic-select inside the same sibling container
    let $topicSelect = $this.closest('.sibling-cont').find('.topic-select');
    let $addclass = $this.closest('.sibling-cont').find('.topic-select').addClass('select2');
     var subTopicDropdown =   $this.closest('.sibling-cont').find('.sub-topic-select');
    //  parentRow.find('.select2 .sub-topic-select');


    if (popular_id) {
        $.ajax({
            url: '/school/get-topics-by-age/' + popular_id,
            type: 'GET',
            success: function (data) {
                $topicSelect.empty().append('<option value="">--Select Topic--</option>');
                $.each(data, function (key, value) {
                   $topicSelect.append('<option value="' + value.id + '" selected>' + value.topic_name + '</option>');
                });

                // Optionally, clear the sub-topic select when topic changes
                let $subTopicSelect = $this.closest('.sibling-cont').find('.sub-topic-select');
                $subTopicSelect.empty().append('<option value="">--Select Sub Topic--</option>');
            },
            error: function() {
                $topicSelect.empty().append('<option value="">--Select Topic--</option>');
            }
        });
    } else {
        $topicSelect.empty().append('<option value="">--Select Topic--</option>');
    }

     if (popular_id) {
        $.ajax({
            url: '{{ url("school/get-subtopics-by-topic") }}/' + popular_id,
            type: 'GET',
            success: function (data) {
                subTopicDropdown.empty().append('<option value="">--Select Sub Topic--</option>');
                $.each(data, function (key, value) {
                    subTopicDropdown.append('<option value="' + value.id + '" selected>' + value.name + '</option>');
                });
            },
            error: function () {
                console.error("Error loading sub topics.");
            }
        });
    } else {
        subTopicDropdown.html('<option value="">--Select Sub Topic--</option>');
    }

    $.ajax({
        url: '{{route('student.getamount')}}',
        type: 'POST',
        dataType: 'json',
        data: {
            id : selectedDataId,
            _token: '{{ csrf_token() }}' 
        },
        success: function(response) {
            console.log(response )
            if(response && response.amount){
                $('#per_month_' + dataCount).val(response.amount.per_month_fee);
                $('#dis_amount_' + dataCount).val(response.amount.discount_fee);
                $('#ann_amount_' + dataCount).val(response.amount.annual_fee);
                  updateTotalPerMonthAmount(); 
            }
        },
        error: function(xhr) {
            console.error("Error fetching data:", xhr.responseText);
        }
    });
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
                    parentRow.find(`input[name="admission_number[${dataCount}]"]`).val(admissionNumber);
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
                    parentRow.find(`input[name="student_id[${dataCount}]"]`).val(studentId);
                },
                error: function () {
                    alert('Failed to generate student ID');
                }
            });

        } else {
            let prevCount = dataCount - 1;

            // --- Handle admission number ---
            let prevAdmission = $(`input[name="admission_number[${prevCount}]"]`).val();

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

                parentRow.find(`input[name="admission_number[${dataCount}]"]`).val(nextAdmission);
            } else {
                alert('Previous admission number missing. Please fill the first one first.');
            }

            // --- Handle student ID ---
            let prevStudentId = $(`input[name="student_id[${prevCount}]"]`).val();

            if (prevStudentId) {
                let fixedPrefix = "STU-";
                let datePartStart = fixedPrefix.length + 2;
                let datePart = prevStudentId.substr(datePartStart, 6);

                let prefix = fixedPrefix + schoolIdStr + datePart;

                let suffix = prevStudentId.substr(prevStudentId.length - 4);
                let nextSuffixNum = parseInt(suffix, 10) + 1;
                let nextSuffix = nextSuffixNum.toString().padStart(4, '0');

                let nextStudentId = prefix + nextSuffix;

                parentRow.find(`input[name="student_id[${dataCount}]"]`).val(nextStudentId);
            } else {
                alert('Previous student ID missing. Please fill the first one first.');
            }
        }
    } else {
        parentRow.find(`input[name="admission_number[${dataCount}]"]`).val('');
        parentRow.find(`input[name="student_id[${dataCount}]"]`).val('');
    }
});


 function changedata(dataCount) {


    if (dataCount) {

        let school_id_raw = {{ auth()->id() }};
        // Pad school ID to 2 digits
        let schoolIdStr = school_id_raw.toString().padStart(2, '0');

        if (dataCount === 0) {
            

        } else {
            let prevCount = dataCount - 1;

            // --- Handle admission number ---
            let prevAdmission = $(`input[name="admission_number[${prevCount}]"]`).val();


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

                $(`input[name="admission_number[${dataCount}]"]`).val(nextAdmission);
            } else {
                alert('Previous admission number missing. Please fill the first one first.');
            }

            // --- Handle student ID ---
            let prevStudentId = $(`input[name="student_id[${prevCount}]"]`).val();

            if (prevStudentId) {
                let fixedPrefix = "STU-";
                let datePartStart = fixedPrefix.length + 2;
                let datePart = prevStudentId.substr(datePartStart, 6);

                let prefix = fixedPrefix + schoolIdStr + datePart;

                let suffix = prevStudentId.substr(prevStudentId.length - 4);
                let nextSuffixNum = parseInt(suffix, 10) + 1;
                let nextSuffix = nextSuffixNum.toString().padStart(4, '0');

                let nextStudentId = prefix + nextSuffix;

                $(`input[name="student_id[${dataCount}]"]`).val(nextStudentId);
            } else {
                alert('Previous student ID missing. Please fill the first one first.');
            }
        }
    } else {
        parentRow.find(`input[name="admission_number[${dataCount}]"]`).val('');
        parentRow.find(`input[name="student_id[${dataCount}]"]`).val('');
    }
}



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



// When topic is selected inside any .sibling-cont
// $(document).on('change', '.topic-select', function () {
//     var topicId = $(this).val();
//     var parentRow = $(this).closest('.sibling-cont'); // container div
//     var subTopicDropdown = parentRow.find('.select2#sub_topic'); // find sub_topic within same row

//    
// });

$('.addsibling-info').on('change', '.medical-radio', function () {
    const $radio = $(this);
    const $sibling = $radio.closest('.sibling-cont');

    if ($radio.val() === 'yes') {
        $sibling.find('.extraFields').slideDown();
    } else {
        $sibling.find('.extraFields').slideUp();
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
$(document).on('click', '.custom-file-container__image-clear', function () {
    const $input = $('.image-sign1');
    const $frame = $('.frames1');

    // Clear input
    $input.val('');

    // Reset image preview and show icon
    $frame.find('.img-preview1').attr('src', '').addClass('d-none');
    $frame.find('i').removeClass('d-none'); // Show icon
});

$(document).on('change', '.image-sign1', function (e) {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const $frame = $('.frames1');
            $frame.find('.img-preview1').attr('src', e.target.result).removeClass('d-none');
            $frame.find('i').addClass('d-none'); // Hide icon
        };
        reader.readAsDataURL(file);
    }
});


// Remove image preview
$(document).on('click', '.custom-file-container__image-clear3', function () {
    const $input = $('.image-sign3');
    const $frame = $('.frames3');

    // Clear input
    $input.val('');

    // Reset image preview and show icon
    $frame.find('.img-preview3').attr('src', '').addClass('d-none');
    $frame.find('i').removeClass('d-none'); // Show icon
});

$(document).on('change', '.image-sign3', function (e) {
    const file = this.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const $frame = $('.frames3');
            $frame.find('.img-preview3').attr('src', e.target.result).removeClass('d-none');
            $frame.find('i').addClass('d-none'); // Hide icon
        };
        reader.readAsDataURL(file);
    }
});




                                        

</script>
@endsection
