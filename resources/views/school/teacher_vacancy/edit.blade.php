@extends('layouts.school')

@section('title', 'Edit Vacancy')

@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Edit Vacancy</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('school.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('teacher.vacancy.list') }}">Vacancies</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Vacancy</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form action="{{route('teacher.vacancy.update')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $vacancy->id }}" name="id">
                    @csrf

                    <!-- Facility Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Vacancy Information</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            
                            <div class="row">

                                <!-- Title -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" class="form-control" placeholder="" value="{{$vacancy->title}}">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Syllabus -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Subject <span class="text-danger">*</span></label>
                                        <!-- <input type="text" name="syllabus" class="form-control" placeholder=""> -->
                                        <select name="subject[]" class="form-control select2"  placeholder="Subject">
                                            @php
                                                $selectedSubjects = old('subject', json_decode($vacancy->syllabus ?? '[]'));
                                            @endphp
                                        <option value="">-- Select Subjects --</option>
                                    
                                        @foreach ($topics as $topic)
                                        
                                            <option value="{{ $topic->id }}" {{ in_array($topic->id, $selectedSubjects) ? 'selected' : '' }}>{{ $topic->topic_name  }} - {{ isset( $topic->popular?->title ) ?  $topic->popular?->title  : 'N/A' }}</option>
                                        @endforeach
                                        </select>
                                        @if ($errors->has('subject'))
                                            <span class="text-danger">{{ $errors->first('subject') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Qualification -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Qualification <span class="text-danger">*</span></label>
                                        <input type="text" name="qualification" class="form-control" placeholder="" value="{{$vacancy->qualification}}">
                                        @if ($errors->has('qualification'))
                                            <span class="text-danger">{{ $errors->first('qualification') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Shift -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Shift <span class="text-danger">*</span></label>
                                        @php
                                        $selectedShifts = old('shift', json_decode($vacancy->shift ?? '[]'));
   
                                        @endphp
                                        <select name="shift[]" class="form-control select2" >
                                            <option value="">-- Select Work Shift --</option>
                                            @foreach ($shifts as $shift)
                                                <option value="{{ $shift->id }}" {{ in_array($shift->id, $selectedShifts) ? 'selected' : '' }}>{{ $shift->time_from }} - {{ $shift->time_to }}</option>
                                            @endforeach
                                        </select> 
                                        @if ($errors->has('shift'))
                                            <span class="text-danger">{{ $errors->first('shift') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Salary -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Salary <span class="text-danger">*</span></label>
                                        <input type="text" name="salary" class="form-control" placeholder="" value="{{$vacancy->fee}}">
                                        @if ($errors->has('salary'))
                                            <span class="text-danger">{{ $errors->first('salary') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- No of Openings -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">No of Openings <span class="text-danger">*</span></label>
                                        <input type="text" name="opening" class="form-control" placeholder="" value="{{$vacancy->openings}}">
                                        @if ($errors->has('opening'))
                                            <span class="text-danger">{{ $errors->first('opening') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Experience -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Experience <span class="text-danger">*</span></label>
                                        <input type="text" name="experience" class="form-control" placeholder="" value="{{$vacancy->experience}}">
                                        @if ($errors->has('experience'))
                                            <span class="text-danger">{{ $errors->first('experience') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Students -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Students <span class="text-danger">*</span></label>
                                        <input type="number" name="student" class="form-control" placeholder="" value="{{$vacancy->students}}">
                                        @if ($errors->has('student'))
                                            <span class="text-danger">{{ $errors->first('student') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="">Select Status</option>
                                        <option value="Open" {{ old('status', $vacancy->status) == 'Open' ? 'selected' : '' }}>Open</option>
                                        <option value="closed" {{ old('status', $vacancy->status) == 'closed' ? 'selected' : '' }}>Closed</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>

                                <!-- Description -->
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" class="form-control" rows="3" placeholder="">{{$vacancy->job_description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="text-end mt-3">
                                <a href="{{ route('teacher.vacancy.list') }}" class="btn btn-light me-3">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Vacancy</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Facility Information -->

                </form>
            </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script>

let siblingCounter = 0;  // start with 0 or 1 depending on your initial count





$(".addsibling-info").on("change", "select[name='sib_age[]']", function () {
    
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

function previewStudentImage(event) {
    const input = event.target;
    const previewImg = document.getElementById('FacilityImagePreview');
    const placeholderIcon = document.getElementById('placeholderIcon');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.style.display = 'block';
            placeholderIcon.style.display = 'none';
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        previewImg.src = '';
        previewImg.style.display = 'none';
        placeholderIcon.style.display = 'block';
    }
}

</script>

@endsection
