@extends('layouts.admin')

@section('title', 'Add Sub Topic')

@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Add Sub Topic</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('sub.topic.list') }}">Sub Topics</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Sub Topic</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form action="{{route('sub.topic.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Sub Topic Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Sub Topic Information</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Age</label>
                                        <!-- <input type="text" name="popular_id" class="form-control"> -->
                                        <select name="popular_id" class="form-control" id="popular_id">
                                            <option value="">Select Age</option>
                                            @foreach($populars as $populars)
                                            <option value="{{ $populars->id }}">{{ $populars->title }}</option>
                                            @endforeach
                                        </select>
                                        
                                    </div>
                                    @error('popular_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                    

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Topic<span style="color: red">*</span></label>
                                    <select name="topic" class="select2" id="topic" >
                                        <option value="">--Select Topic--</option>
                                        
                                    </select>
                                    @if ($errors->has('topic'))
                                        <span class="text-danger">{{ $errors->first('topic') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name<span style="color: red">*</span></label>
                                    <input type="text" name="name" class="form-control">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Quarters<span style="color: red">*</span></label>
                                    <select name="quarters" class="form-control" id="status">
                                        <option value="">Select Quarters</option>
                                        <option value="months 1-3">Months 1-3</option>
                                        <option value="months 4-6">Months 4-6</option>
                                        <option value="months 7-9">Months 7-9</option>
                                        <option value="months 10-12">Months 10-12</option>
                                    </select>
                                    @if ($errors->has('quarters'))
                                        <span class="text-danger">{{ $errors->first('status') }}</span>
                                    @endif
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

                                <!-- <div class="col-md-12 mb-3">
                                    <label class="form-label">Description<span style="color: red">*</span></label>
                                    <textarea name="description" class="form-control" rows="3"></textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div> -->

                                
                            </div>

                            <div class="text-end mt-3">
                                <a href="{{ route('sub.topic.list') }}" class="btn btn-light me-3">Cancel</a>
                                <button type="submit" class="btn btn-primary">Add Sub Topic</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Sub Topic Information -->

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
    const previewImg = document.getElementById('productImagePreview');
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


    $('#popular_id').on('change', function () {
        var popular_id = $(this).val();
        if (popular_id) {
            $.ajax({
               url: '{{ url("admin/get-topics-by-age") }}/' + popular_id,
                type: 'GET',
                success: function (data) {
                    $('#topic').empty().append('<option value="">--Select Topic--</option>');
                    $.each(data, function (key, value) {
                        $('#topic').append('<option value="' + value.id + '">' + value.topic_name + '</option>');
                    });
                }
            });
        } else {
            $('#topic').html('<option value="">--Select Topic--</option>');
        }
    });

</script>

@endsection
