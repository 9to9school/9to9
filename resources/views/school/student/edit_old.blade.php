@extends('layouts.school')

@section('title', 'Edit Student')

@section('content')
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
                        <li class="breadcrumb-item active" aria-current="page">Edit Student</li>
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
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">                                                
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames">
                                                <img id="studentImagePreview" 
                                                    src="{{ !empty($student->student_image) ? asset($student->student_image) : '' }}" 
                                                    alt="Student Image" 
                                                    class="img-fluid" 
                                                    style="max-height: 100px; {{ empty($student->student_image) ? 'display:none;' : '' }}">
                                                <i id="placeholderIcon" class="ti ti-photo-plus fs-16" style="{{ !empty($student->student_image) ? 'display:none;' : '' }}"></i>
                                        </div>                                          
                                        <div class="profile-upload">
                                            <div class="profile-uploader d-flex align-items-center">
                                                <input type="file" name="student_image" class="form-control" accept=".jpg,.jpeg,.png,.svg" onchange="previewStudentImage(event)">
                                            </div>
                                            <p class="fs-12 text-danger">Upload image size max 4MB. Allowed formats: JPG, PNG, SVG.</p>
                                        </div>
                                         @if ($errors->has('student_image'))
                                            <span class="text-danger">{{ $errors->first('student_image') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Academic Year</label>
                                    <input type="number" name="academic_year" class="form-control" placeholder="e.g., June 2025/26"  value="{{ old('academic_year', $student->academic_year) }}">
                                   @if ($errors->has('academic_year'))
                                        <span class="text-danger">{{ $errors->first('academic_year') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Admission Number</label>
                                         <!-- <input type="number" name="admission_number" class="form-control" value="{{ old('academic_year', $student->admission_number) }}"> -->
                                            <select
                                            name="academic_year"
                                            id="academic_year"
                                            class="form-select @error('academic_year') is-invalid @enderror"
                                        >
                                            <option value="">-- Select Academic Year --</option>
                                            @foreach($acyear as $year)
                                                <option
                                                    value="{{ $year->academic_number }}"
                                                    {{ $student->academic_year == $year->academic_number ? 'selected' : '' }}>
                                                    {{ $year->academic_number }}
                                                </option>
                                            @endforeach
                                        </select>
                                         @if ($errors->has('admission_number'))
                                        <span class="text-danger">{{ $errors->first('admission_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Admission Date</label>
                                        <div class="input-icon position-relative">
                                            <span class="input-icon-addon">
                                                <i class="ti ti-calendar"></i>
                                            </span>
                                            <input type="text"  name="admission_date" class="form-control datetimepicker" value="{{ old('academic_year', $student->admission_date) }}">
                                        </div>
                                        @if ($errors->has('admission_date'))
                                        <span class="text-danger">{{ $errors->first('admission_date') }}</span>
                                        @endif
                                    </div>
                                </div>                               
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control" value="{{ $student->first_name }}">
                                    </div>
                                     @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                        @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $student->last_name) }}">
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                        @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Primary Contact Number</label>
                                        <input type="number" name="primary_contact" class="form-control" value="{{ old('primary_contact', $student->primary_contact) }}">
                                    </div>
                                     @if ($errors->has('primary_contact'))
                                        <span class="text-danger">{{ $errors->first('primary_contact') }}</span>
                                        @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Mother Tongue</label>
                                        <input type="text" name="mother_tongue" class="form-control" value="{{ old('academic_year', $student->mother_tongue) }}" >
                                    </div>
                                      @if ($errors->has('mother_tongue'))
                                        <span class="text-danger">{{ $errors->first('mother_tongue') }}</span>
                                        @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Father's Name</label>
                                    <input type="text" name="father_name" class="form-control" value="{{ old('academic_year', $student->father_name) }}">
                                    @if ($errors->has('father_name'))
                                        <span class="text-danger">{{ $errors->first('father_name') }}</span>
                                        @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Mother’s Name</label>
                                    <input type="text" name="mother_name" class="form-control"  value="{{ old('academic_year', $student->mother_name) }}">
                                    @if ($errors->has('mother_name'))
                                        <span class="text-danger">{{ $errors->first('mother_name') }}</span>
                                        @endif
                                </div>

                                <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" name="email" class="form-control" value="{{ old('academic_year', $student->email) }}">
                                        @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number 1</label>
                                    <input type="number" name="phone_number_1" class="form-control" value="{{ old('academic_year', $student->phone_number_1) }}">
                                    @if ($errors->has('phone_number_1'))
                                    <span class="text-danger">{{ $errors->first('phone_number_1') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                <label class="form-label">Phone Number 2</label>
                                    <input type="text" name="phone_number_2" class="form-control" value="{{ $student->phone_number_2 }}">
                                    @if ($errors->has('phone_number_2'))
                                    <span class="text-danger">{{ $errors->first('phone_number_2') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="school_id" class="form-label">Select Time Shift</label>
                                    <select
                                        name="time_shift" id="selectparent"
                                        class="form-select @error('school_id') is-invalid @enderror"
                                    >
                                        <option value="">-- Select Time Shift --</option>
                                        @foreach($shifts as $data)
                                            <option
                                                value="{{ $data->time_from }}-{{ $data->time_to }}"
                                                {{ $student->time_shift == ($data->time_from . '-' . $data->time_to) ? 'selected' : '' }}>
                                                {{ $data->time_from }}-{{ $data->time_to }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('time_shift')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>



                                <!-- Address 1 -->
                                <div class="col-md-12 mb-3">
                                <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control" rows="3" > {{ $student->address }}</textarea>
                                    @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                <label class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="{{ old('city', $student->city) }}">
                                     @if ($errors->has('city'))
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                <label class="form-label">State</label>
                                    <input type="text" name="state" class="form-control" value="{{ old('state', $student->state) }}">
                                     @if ($errors->has('state'))
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-3">
                                <label class="form-label">Zip Code</label>
                                    <input type="number" name="zip" class="form-control" value="{{ old('zip', $student->zip) }}">
                                    @if ($errors->has('zip'))
                                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                                    @endif
                                </div>
                                
                                <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Religion</label>
                                        <input type="text" name="religion" class="form-control" value="{{ old('religion', $student->religion) }}">
                                        @if ($errors->has('religion'))
                                    <span class="text-danger">{{ $errors->first('religion') }}</span>
                                    @endif
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Nationality</label>
                                        <input type="text" name="nationality" class="form-control"value="{{ old('nationality', $student->nationality) }}">
                                         @if ($errors->has('nationality'))
                                    <span class="text-danger">{{ $errors->first('nationality') }}</span>
                                    @endif
                                    </div>
                                </div>
                                <div class=" col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control"value="">
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select  class="form-control" name="status">
                                    <option value="">Select Status</option>
                                    <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ old('status', $student->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- /Personal Information -->

                    <!-- Sibilings -->
                     @php
                        use App\Models\Popular;

                        $agedata = Popular::all();
                    @endphp
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
                                <div class="row sibling-cont" data-count="0">
                                    <div class="col-md-12">
                                        <div class="mb-2">
                                            <label class="form-label">Sibiling Info</label>                                            
                                        </div>
                                    </div>
                           
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="sib_first_name[]" class="form-control" value="{{  $student->first_name }}">
                                            
                                        </div>
                                        @error('sib_first_name.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                             <input type="text" name="sib_last_name[]" class="form-control"  value="{{  $student->last_name }}">
                                           
                                        </div>
                                        @error('sib_last_name.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>                                    
                                        <div class="col-lg-2 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Age</label>
                                                <select class="select" name="sib_age[]" id="ageselect">
                                                    <option>Select</option>
                                                    @foreach($agedata as $age)
                                                    
                                                   <option value="{{$age->title}}" data-id="{{$age->id}}" {{  $student->age  == $age->title ? 'selected' : '' }}>{{$age->title}}</option>

                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('sib_age.*')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-2 col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Per Month Amount</label>
                                                <input type="text" name="sib_per_mo_amount[]" class="form-control" id="per_month_0" value="{{ $student->per_month_fee }}">  
                                                <input type="hidden" name="sib_dis_amount[]" class="form-control" id="dis_amount_0" value="{{ $student->discount_fee }}">  
                                                <input type="hidden" name="sib_ann_amount[]" class="form-control" id="ann_amount_0"  value="{{ $student->annual_fee }}">                                            
                                            </div>
                                            @error('sib_per_mo_amount.*')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>  
                                    
                                     
                                    <div class="col-lg-2 col-md-6">
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center">
                                                <div class="w-100">
                                                    <label class="form-label">Gender</label>
                                                      <select name="gender_1[]" class="form-select w-100">
                                                        <option>Select</option>
                                                        <option value="Male"  {{  $student->gender === 'Male'   ? 'selected' : '' }}>Male</option>
                                                        <option value="Female" {{  $student->gender === 'Female' ? 'selected' : '' }}>Female</option>
                                                        <option value="Other"  {{  $student->gender === 'Other'  ? 'selected' : '' }}>Other</option>
                                                    </select>
                                                </div>
                                                
                                                <div>
                                                    <label class="form-label">&nbsp;</label>
                                                    <a href="javascript:void(0);" class="trash-icon ms-3 remove-sibling"><i class="ti ti-trash-x"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        @error('gender_1.*')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- <div class="border-top pt-3 text-end"> 
                              <span><span>
                            </div>
                            <div class="border-top pt-3"> 
                                <a href="javascript:void(0);" class="add-child btn btn-primary d-inline-flex align-items-center"><i class="ti ti-circle-plus me-2"></i>Add New</a>
                            </div> -->
                            <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                                <a href="javascript:void(0);" class="add-child btn btn-primary d-inline-flex align-items-center">
                                    <i class="ti ti-circle-plus me-2"></i>Add New
                                </a>
                                <div class="text-end">
                                    <strong>Total Per Month Amount:</strong>
                                    <span id="total_per_month_amount" class="ms-2">0</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>   
                    <!-- /Sibilings -->                  

                   
                    <!-- /Other Details -->

                    <div class="text-end">
                       <a href="{{route('school.student.list')}}" class="btn btn-light me-3">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
$(".add-child").on('click', function () {
    var servicecontent = `
    <div class="row sibling-group position-relative mb-3">
        <div class="col-lg-3 col-md-3">
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="sib_first_name[]" class="form-control">
                <span class="text-danger error-sib_first_name"></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="sib_last_name[]" class="form-control">
                <span class="text-danger error-sib_last_name"></span>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" name="sib_age[]" class="form-control">
                <span class="text-danger error-sib_age"></span>
            </div>
        </div>
        <div class="col-lg-3 col-md-3">
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="d-flex align-items-center">
                    <select name="gender_1[]" class="form-select w-100">
                        <option>Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                   <div class="">
                    <button type="button" class="btn btn-danger btn-sm mt-4 remove-sibling">X</button>
                                          
                    </div>
                </div>
                <span class="text-danger error-gender"></span>
            </div>
        </div>
    </div>`;

    $(".addsibling-info").append(servicecontent);
    return false;
});


document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".remove-sibling").forEach(function (button) {
        button.addEventListener("click", function () {
            this.closest(".sibling-group").remove();
        });
    });
});



function previewStudentImage(event) {
    const input = event.target;
    const previewImg = document.getElementById('studentImagePreview');
    const placeholderIcon = document.getElementById('placeholderIcon');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
            placeholderIcon.style.display = 'none';
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        previewImg.src = '';
        previewImg.style.display = 'none';
        placeholderIcon.style.display = 'block';
    }
}

</script>

@endsection
