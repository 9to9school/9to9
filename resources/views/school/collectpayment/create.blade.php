@extends('layouts.school')

@section('title', 'Collect Fee')

@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Collect Fee</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('school.dashboard')}}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Collect Fee</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->
         @if (Session::has('success'))
            <div class="alert alert-solid-success alert-dismissible fade show">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" fdprocessedid="tdc5jm"><i class="fas fa-xmark"></i></button>
                @php
                header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
                header('Cache-Control: post-check=0, pre-check=0', false);
                header('Pragma: no-cache');
            @endphp
            </div>
            
    @endif
    @if (Session::has('error'))
        
        <div class="alert alert-solid-danger alert-dismissible fade show">
                {{ Session::get('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" fdprocessedid="tdc5jm"><i class="fas fa-xmark"></i></button>
                @php
                header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
                header('Cache-Control: post-check=0, pre-check=0', false);
                header('Pragma: no-cache');
            @endphp
            </div>
    @endif
        
        <div class="row">

            <div class="col-md-12">

                <form action="{{route('collect.fee.create-order')}}" method="Post" enctype="multipart/form-data">

                 @csrf
                    <!-- Personal Information -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Collect Fee Information</h4>
                            </div>
                        </div>
                        
                        <div class="card-body pb-1">
                            
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label">Students<span style="color: red">*</span></label>
                                    <!-- <input type="number" name="student_id" class="form-control" placeholder="Student Id" > -->
                                    <select class="js-example-basic-single select2 form-control" id="studentget" name="students">
                                         <option value="">Select Student</option>
                                            @foreach($student as $data)
                                                <option value="{{ $data->id }}">{{ $data->first_name }}  {{  $data->last_name}}</option>
                                            @endforeach
                                        
                                    </select>
                                    @if ($errors->has('students'))
                                    <span class="text-danger">{{ $errors->first('students') }}</span>
                                    @endif
                                </div>
                                <?php 
                                $prefix = 'order_';
                                // Generate a random string using Laravel's Str helper
                                $orderid = random_int(100000, 999999);
                                $genrate_order_id = $prefix . $orderid;

                                ?>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Receipt Number <span style="color: red">*</span></label>
                                        <input type="text" name="rec_number" class="form-control" placeholder="" value="<?php echo $genrate_order_id ?>" readonly>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Student Academy <span style="color: red">*</span></label>
                                        <div class="input-icon position-relative">
                                            <input type="number"  name="stu_acad" class="form-control" placeholder="Student Academy">
                                            
                                        </div>
                                    </div>
                                    @if ($errors->has('stu_acad'))
                                    <span class="text-danger">{{ $errors->first('stu_acad') }}</span>
                                    @endif
                                </div>                               
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Payment Date <span style="color: red">*</span></label>
                                        <input type="date" name="pay_date" class="form-control" placeholder="Payment Date">
                                    </div>
                                     @if ($errors->has('pay_date'))
                                    <span class="text-danger">{{ $errors->first('pay_date') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Payment Amount <span style="color: red">*</span></label>
                                        <input type="text" name="pay_amount" class="form-control" placeholder="Payment Amount ">
                                    </div>
                                    @if ($errors->has('pay_amount'))
                                    <span class="text-danger">{{ $errors->first('pay_amount') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Payment Mode <span style="color: red">*</span></label>
                                        <select name="payment_mode" class="form-select w-100" id="pay_mode">
                                            <option>Select</option>
                                            <option value="online" >Online</option>
                                            <option value="offline" >Offline</option>
                                            <option value="cash">Cash</option>
                                        </select>
                                    </div>
                                     @if ($errors->has('payment_mode'))
                                    <span class="text-danger">{{ $errors->first('payment_mode') }}</span>
                                    @endif
                                </div>    
                                <!-- Address 1 -->
                                <div class="col-md-12 mb-3">
                                <label class="form-label">Payment Note</label>
                                    <textarea name="note" class="form-control" rows="3" Placeholder="Note"></textarea>
                                    @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                    
                                </div> 
                                <div class="row" id="pay_mode_show" style="display:none;">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="field-6" class="form-label">Transaction Id</label>
                                            <input type="text" class="form-control" id="field-6" name="trans_id"
                                                placeholder="Transaction Id">
                                        </div>
                                        @if ($errors->has('trans_id'))
                                        <span class="text-danger">{{ $errors->first('trans_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="field-6" class="form-label">Reference Id</label>
                                            <input type="text" class="form-control" id="field-6" name="ref_id" 
                                                placeholder="Reference Id">
                                        </div>
                                        @if ($errors->has('ref_id'))
                                        <span class="text-danger">{{ $errors->first('ref_id') }}</span>
                                        @endif
                                    </div>
                                </div>                               
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-end">
                        <a href="{{route('school.dashboard')}}" class="btn btn-light me-3">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>

            </div>

        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>

$(document).ready(function () {
    // Handle the change event for #pay_mode
    $('#pay_mode').change(function () {
        var selectedValue = $(this).val();

        if (selectedValue === 'offline') {
            $('#pay_mode_show').show(); // Show the section
        } else {
            $('#pay_mode_show').hide(); // Hide the section for 'online' or any other value
        }
    });

    // Initially hide the #pay_mode_show section
    $('#pay_mode_show').hide();

   

});

// $(document).on('change', '#studentget', function() {
//     const selectedValue = $(this).val();

//     $.ajax({
//         url: '',
//         type: 'POST',
//         dataType: 'json',
//         data: {
//             id : selectedDataId,
//             _token: '{{ csrf_token() }}' 
//         },
//         success: function(response) {
//             console.log(response )
//             if(response && response.amount){
//                 $('#per_month_' + dataCount).val(response.amount.per_month_fee);
//                 $('#dis_amount_' + dataCount).val(response.amount.discount_fee);
//                 $('#ann_amount_' + dataCount).val(response.amount.annual_fee);
//                   updateTotalPerMonthAmount(); 
//             }
//         },
//         error: function(xhr) {
//             console.error("Error fetching data:", xhr.responseText);
//         }
//     });
    
// });

</script>


@endsection
