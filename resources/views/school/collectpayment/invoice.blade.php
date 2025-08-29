@extends('layouts.school')

@section('title', 'Invoice Details')

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
                        <li class="breadcrumb-item">
                            <a href="{{route('collect.fee.list')}}">Collected Fee List</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice Details</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->   
        
        <div class="row">
            <div class="col-md-12">
                <div class="invoice-popup-head d-flex align-items-center justify-content-between mb-4">
                    <span><img src="{{ asset('assets/web/images/9t9logopng-min.png') }}" alt="Img"></span>
                    <div class="popup-title">
                        <h2>9 TO 9 School</h2>
                        <!-- <p>Original For Recipient</p> -->
                    </div>
                </div>
                <div class="tax-info mb-2" id="printableArea">
                    <div class="mb-4 text-center">
                        <h1>Invoice</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="tax-invoice-info d-flex align-items-center justify-content-between">
                                <h5>Father Name :</h5>
                                <h6>{{ $details->student->father_name ?? '' }}</h6>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tax-invoice-info d-flex align-items-center justify-content-between">
                                <h5>Student Name :</h5>
                                <h6>{{ $details->student->first_name }} {{ $details->student->last_name }}</h6>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tax-invoice-info d-flex align-items-center justify-content-between">
                                <h5>Student ID :</h5>
                                <h6>{{ $details->student->student_id  ?? ''}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tax-invoice-info d-flex align-items-center justify-content-between">
                                <h5>Age :</h5>
                                <h6>{{ $details->student->ages->title  ?? ''}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tax-invoice-info d-flex align-items-center justify-content-between">
                                <h5>Invoice No :</h5>
                                <h6>{{ $invnum}}</h6>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="tax-invoice-info d-flex align-items-center justify-content-between">
                                <h5>Invoice Date :</h5>
                                <h6>{{ \Carbon\Carbon::now()->format('d M Y') }}</h6>
                            </div>
                        </div>
                         @php
                        use Carbon\Carbon;

                        $paidDate = Carbon::parse($details->date); // 'date' = paid date
                         $nextDate = $paidDate->addDays(45);
                        @endphp
                        <div class="col-lg-4">
                            <div class="tax-invoice-info d-flex align-items-center justify-content-between">
                                <h5>Due Date :</h5>
                                <h6>{{ $nextDate->format('d M Y') }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <h6 class="mb-1">Bill To :</h6>
                        <p><span class="text-dark">Walter Roberson</span> <br>
                           {{ $details->student->address }},{{ $details->student->city }},{{ $details->student->state }}, {{ $details->student->zip }}  <br>
                            <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="493e28253d2c3b092e24282025672a2624"> {{ $details->student->email }}</a> <br>
                           {{ $details->student->primary_contact }}
                        </p>
                    </div>

                   
                    <div class="invoice-product-table">
                        <div class="table-responsive invoice-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th>Due Date</th>
                                        <th>Amount</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Fees
                                        </td>
                                        <td>
                                            {{ $nextDate->format('d M Y') }}
                                        </td>
                                        <td>
                                           ₹ {{ $details->student_coins }}
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <h5 class="mb-1">Important Note: </h5>
                                <p class="text-dark mb-0">Delivery dates are not guaranteed and Seller has</p>
                                <p class="text-dark">no liability for damages that may be incurred
                                    due to any delay. has
                                </p>
                            </div>
                            <div>
                                @php
                                   
                                @endphp
                                <h5 class="mb-1">Total amount:</h5>
                                <p class="text-dark fw-medium">₹ {{  $details->student_coins  }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="total-amount-tax">
                                <ul>
                                    <li class="fw-medium text-dark">Subtotal</li>

                                    <li class="fw-medium text-dark">Discount 0%</li>

                                    <li class="fw-medium text-dark">IGST 0%</li>

                                </ul>
                                <ul>
                                    <li>₹ {{ $details->student_coins }}</li>
                                    <li>+ 0.00</li>
                                    <li>0.00</li>
                                </ul>
                            </div>
                            <div class="total-amount-tax mb-3">
                                <ul class="total-amount">
                                    <li class="text-dark">Amount Payable</li>
                                </ul>
                                <ul class="total-amount">
                                    <li class="text-dark">₹ {{ $details->student_coins }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="payment-info">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 pt-4">
                                <h5 class="mb-2">Payment Info:</h5>
                                <p class="mb-1">payment Mode : <span class="fw-medium text-dark">{{ $details->payment_mode }}
                                        </span></p>
                                <p class="mb-0">Amount : <span class="fw-medium text-dark">₹ {{ $details->student_coins }}</span></p>
                            </div>
                            <!-- <div class="col-lg-6 text-end mb-4 pt-4 ">
                                <h6 class="mb-2">For Dreamguys</h6>
                                <img src="assets/img/icons/signature.svg" alt="Img">
                            </div> -->
                        </div>
                    </div>
                    <div class="border-bottom text-center pt-4 pb-4">
                        <span class="text-dark fw-medium">Terms & Conditions : </span>
                        <p>Here we can write a additional notes for the client to get a better understanding of
                            this invoice.</p>
                    </div>
                    <!-- <p class="text-center pt-3">Thanks for your Business</p> -->               
                </div>
            </div>
        </div>
        <div class="text-center my-3">
            <button class="btn btn-primary" onclick="printDiv('printableArea')">Print</button>
        </div>

    </div>
</div>
@endsection
<script>
function printDiv(divId) {
    var printContents = document.getElementById(divId).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;
    window.print();
    document.body.innerHTML = originalContents;
}
</script>
@section('scripts')



@endsection
