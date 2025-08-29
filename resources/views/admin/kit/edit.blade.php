@extends('layouts.admin')

@section('title', 'Edit Kit')

@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Edit Kit</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('kit.list') }}">Kits</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Kit</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <form action="{{route('kit.update')}}" method="POST" enctype="multipart/form-data">
                     <input type="hidden" value="{{ $getdata->id }}" name="id">

                    @csrf

                    <!-- Kit Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Kit Information</h4>
                            </div>
                        </div>
                        <div class="card-body pb-1">
                            <div class="row">
                                <div class="col-md-12">
                                      <?php if($getdata->image){$image = $getdata->image ;}?>
                                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                                        <div class="d-flex align-items-center justify-content-center avatar avatar-xxl border border-dashed me-2 flex-shrink-0 text-dark frames">
                                             <img id="KitImagePreview" src="{{ asset($image) }}" alt="Preview" style="max-height: 100px; display: none;" class="img-fluid">

                                        <i id="placeholderIcon" class="ti ti-photo-plus fs-16"></i>
                                        </div>
                                        <div class="profile-upload">
                                            <div class="profile-uploader d-flex align-items-center">
                                                <input type="file" name="kit_image" class="form-control"  onchange="previewStudentImage(event)">
                                            </div>
                                            <p class="fs-12 text-danger">Upload image size max 4MB. Allowed formats: JPG, PNG, SVG.</p>
                                            @if ($errors->has('kit_image'))
                                                <span class="text-danger">{{ $errors->first('kit_image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Title	<span style="color: red">*</span></label>
                                    <input type="text" name="title" class="form-control" value="{{$getdata->title}}">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Discount Price<span style="color: red">*</span></label>
                                    <input type="number" name="discount_price" class="form-control" value="{{$getdata->discount_price}}">
                                    @if ($errors->has('discount_price'))
                                        <span class="text-danger">{{ $errors->first('discount_price') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Final Price<span style="color: red">*</span></label>
                                    <input type="number" name="final_price" class="form-control" value="{{$getdata->final_price}}">
                                    @if ($errors->has('final_price'))
                                        <span class="text-danger">{{ $errors->first('final_price') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Products<span style="color: red">*</span></label>
                                    <select name="products[]" class="select2" multiple="multiple">
                                        <option value="">Select Product</option>
                                        <?php $productlist = json_decode($getdata->products)?>
                                        @foreach($product as $data)
                                        <option value="{{$data->id}}" @if(is_array($productlist) && in_array($data->id, $productlist)) selected @endif>{{$data->name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    @if ($errors->has('products'))
                                        <span class="text-danger">{{ $errors->first('products') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">age<span style="color: red">*</span></label>
                                    <select name="age" class="select2" multiple="multiple">
                                        <option value="">Select Age</option>
                                        @foreach($age as $agedata)
                                        <option value="{{$agedata->title}}" @if(old('age', $getdata->age ?? '') == $agedata->title) selected @endif>{{$agedata->title}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('age'))
                                        <span class="text-danger">{{ $errors->first('age') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Description<span style="color: red">*</span></label>
                                    <textarea name="description" class="form-control" rows="3">{{$getdata->desc}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>

                                
                            </div>

                            <div class="text-end mt-3">
                                <a href="{{ route('kit.list') }}" class="btn btn-light me-3">Cancel</a>
                                <button type="submit" class="btn btn-primary">Update Kit</button>
                            </div>
                        </div>
                    </div>
                    <!-- /Kit Information -->

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
    const previewImg = document.getElementById('KitImagePreview');
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
