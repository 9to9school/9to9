@extends('layouts.school')

@section('title', 'Add Facility')

@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Add Facility</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('school.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('school.facility.list') }}">Facilities</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Facility</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form action="{{route('school.facility.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Facility Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Facility Information</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                             

                            <div class="row">  
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name <span style="color: red">*</span></label>
                                        <input type="text" name="name" class="form-control" placeholder="">
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>                              
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status<span style="color: red">*</span></label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @if ($errors->has('status'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
                                </div>

                            </div>

                            <div class="text-end mt-3">
                                <a href="{{ route('school.facility.list') }}" class="btn btn-light me-3">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Facility</button>
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
