@extends('layouts.school')

@section('title', 'Financial Report')

@section('content')
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Financial Report</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0);">Report</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Financial
                            Report</li>
                    </ol>
                </nav>
            </div>
            <div class="d-flex my-xl-auto right-content align-items-center flex-wrap">
                <div class="pe-1 mb-2">
                    <!-- <a href="#" class="btn btn-outline-light bg-white btn-icon me-1" data-bs-toggle="tooltip"
                        data-bs-placement="top" aria-label="Refresh" data-bs-original-title="Refresh">
                        <i class="ti ti-refresh"></i>
                    </a> -->
                </div>
                <div class="pe-1 mb-2">
                    <!-- <button type="button" class="btn btn-outline-light bg-white btn-icon me-1"
                        data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Print"
                        data-bs-original-title="Print">
                        <i class="ti ti-printer"></i>
                    </button> -->
                </div>
                <div class="dropdown me-2 mb-2">
                    <!-- <a href="javascript:void(0);"
                        class="dropdown-toggle btn btn-light fw-medium d-inline-flex align-items-center"
                        data-bs-toggle="dropdown">
                        <i class="ti ti-file-export me-2"></i>Export
                    </a> -->
                    <ul class="dropdown-menu  dropdown-menu-end p-3">
                        <!-- <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-pdf me-1"></i>Export as PDF</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="dropdown-item rounded-1"><i
                                    class="ti ti-file-type-xls me-1"></i>Export as Excel </a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">


            <!-- Fees Collection -->
            <div class="col-xxl-3 col-xl-6 ">
                <div class="card flex-fill mb-2">
                    <div class="card-body">
                        <p class="mb-2">Total Fees Collected</p>
                        <div class="d-flex align-items-end justify-content-between">
                            <h4>₹{{$totalfees}}</h4>
                            <!-- <span class="badge badge-soft-success"><i
                                    class="ti ti-chart-line me-1"></i>1.2%</span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-6 ">
                <div class="card flex-fill mb-2">
                    <div class="card-body">
                        <p class="mb-2">Total Kit Amount</p>
                        <div class="d-flex align-items-end justify-content-between">
                            <h4>₹{{$totalkitamount}}</h4>
                            <!-- <span class="badge badge-soft-danger"><i
                                    class="ti ti-chart-line me-1"></i>1.2%</span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-6 ">
                <div class="card flex-fill mb-2">
                    <div class="card-body">
                        <p class="mb-2">Total Wallet Amount</p>
                        <div class="d-flex align-items-end justify-content-between">
                            <h4>₹{{$totalcredit}}</h4>
                            <!-- <span class="badge badge-soft-info"><i class="ti ti-chart-line me-1"></i>1.2%</span> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-6 ">
                <div class="card flex-fill mb-4">
                    <div class="card-body">
                        <p class="mb-2">Total Event Amount</p>
                        <div class="d-flex align-items-end justify-content-between">
                            <h4>₹{{$totaleventamount}}</h4>
                            <!-- <span class="badge badge-soft-danger"><i
                                    class="ti ti-chart-line me-1"></i>1.2%</span> -->
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-xxl-3 col-xl-6 ">
                <div class="card flex-fill mb-4">
                    <div class="card-body">
                        <p class="mb-2">Total Revenue</p>
                        <div class="d-flex align-items-end justify-content-between">
                            <h4>₹{{$totalrevenue}}</h4>
                            <!-- <span class="badge badge-soft-danger"><i
                                    class="ti ti-chart-line me-1"></i>1.2%</span> -->
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- /Fees Collection -->
        </div>

         <!-- Attendance List -->
        <div class="row">
            <div class=" col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">Fees Collected Report</h4>
                        <div class="d-flex align-items-center flex-wrap">
                            <!-- <div class="input-icon-start mb-3 me-2 position-relative">
                                <span class="icon-addon">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                                value="Academic Year : 2024 / 2025">
                            </div> -->
                            <div class="dropdown mb-3 me-2">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                        class="ti ti-filter me-2"></i>Filter</a>
                                <div class="dropdown-menu drop-width">
                                    <form action="{{route('school.financial.report')}}" method="GET">
                                        <div class="d-flex align-items-center border-bottom p-3">
                                            <h4>Filter</h4>
                                        </div>
                                        <div class="p-3 border-bottom">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">start date</label>
                                                        <input type="date"  name="fees_start_date" class="form-control " placeholder="Start Date"
                                                   >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">End Date</label>
                                                        <input type="date" name="fees_end_date" class="form-control " placeholder="End Date"
                                                   >
                                                    </div>
                                                </div>
                                                
                                            
                                                
                                            
                                            </div>
                                        </div>
                                        <div class="p-3 d-flex align-items-center justify-content-end">
                                            <a href="{{route('school.financial.report')}}" class="btn btn-light me-3">Reset</a>
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="dropdown mb-3">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                    data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by A-Z
                                </a>
                                <ul class="dropdown-menu p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1 active">
                                            Ascending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Descending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Viewed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Added
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- Student List -->
                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S.no</th>
                                        <th>Student Name</th>
                                        <th>Amount</th>
                                        <th>payment Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($feesdata)
                            <?php $i = 1; ?>
                                @foreach($feesdata as $fee)
                                    <tr>
                                        <td>{{$i}}</td>
                                     
                                        
                                        <td>{{$fee->student->first_name ?? ''}} {{ $fee->student->last_name ?? ''}}</td>
                                        <td>{{$fee->paid_amount }}</td>
                                        <?php if($fee->payment_status  == 'paid'){
                                            $status = 'paid';
                                            $class = 'badge-success';
                                        }else{
                                            $status = 'failed';
                                            $class = 'badge-danger';
                                             
                                        }
                                        ?>
                                        <td><span class="badge {{ $class}}">
                                            {{$status}}
                                            </span>
                                         </td>  
                                        <td>{{$fee->date }}</td>
                                        
                                       
                                    </tr>
                                    <?php $i++ ; ?>
                                @endforeach
                            @endif
                                        
                                </tbody>
                            </table>
                        </div>
                        <!-- /Student List -->
                    </div>
                </div>
            </div>
        


            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Fees Collection Overview</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="chartjs-wrapper-demo">
                        <canvas id="feesDonutChart" class="h-300"></canvas>
                        <div class="mt-3">
                            <strong>Paid:</strong> ₹{{ number_format($totalPaid) }}<br>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    

        <!-- /Attendance List -->

        <!-- kit report List -->
        <div class="row mt-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">Kit Report</h4>
                        <div class="d-flex align-items-center flex-wrap">
                            <!-- <div class="input-icon-start mb-3 me-2 position-relative">
                                <span class="icon-addon">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                                value="Academic Year : 2024 / 2025">
                            </div> -->
                            <div class="dropdown mb-3 me-2">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                        class="ti ti-filter me-2"></i>Filter</a>
                                <div class="dropdown-menu drop-width">
                                    <form action="" method="GET">
                                        <div class="d-flex align-items-center border-bottom p-3">
                                            <h4>Filter</h4>
                                        </div>
                                        <div class="p-3 border-bottom">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">start date</label>
                                                        <input type="date"  name="start_date" class="form-control " placeholder="Start Date"
                                                   >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">End Date</label>
                                                        <input type="date" name="end_date" class="form-control " placeholder="Start Date"
                                                   >
                                                    </div>
                                                </div>
                                                
                                            
                                                
                                            
                                            </div>
                                        </div>
                                        <div class="p-3 d-flex align-items-center justify-content-end">
                                             <a href="{{route('school.financial.report')}}" class="btn btn-light me-3">Reset</a>
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="dropdown mb-3">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                    data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by A-Z
                                </a>
                                <ul class="dropdown-menu p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1 active">
                                            Ascending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Descending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Viewed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Added
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- Student List -->
                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S.no</th>
                                        <th>Kit Name</th>
                                        <th>Amount</th>
                                        <th>payment Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($kitdata)
                            <?php $i = 1; ?>
                                @foreach($kitdata as $kit)
                                    <tr>
                                        <td>{{$i}}</td>
                                     
                                        
                                        <td>{{$kit->kit->title ?? ''}} </td>
                                        <td>{{$kit->total }}</td>
                                        <?php if($kit->status  == 'paid'){
                                            $status = 'paid';
                                            $class = 'badge-success';
                                        }else{
                                            $status = 'failed';
                                            $class = 'badge-danger';
                                             
                                        }
                                        ?>
                                        <td><span class="badge {{ $class}}">
                                            {{$status}}
                                            </span>
                                         </td>  
                                        <td>{{$kit->payment_date }}</td>
                                        
                                       
                                    </tr>
                                    <?php $i++ ; ?>
                                @endforeach
                            @endif
                                        
                                </tbody>
                            </table>
                        </div>
                        <!-- /Student List -->
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Kit Collection Overview</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="chartjs-wrapper-demo">
                        <canvas id="KitDonutChart" class="h-300"></canvas>
                        <div class="mt-3">
                            <strong>Kit Amount:</strong> ₹{{ number_format($totalkitPaid) }}<br>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /kit report List -->

         <!-- Event report List -->
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">Event Report</h4>
                        <div class="d-flex align-items-center flex-wrap">
                            <!-- <div class="input-icon-start mb-3 me-2 position-relative">
                                <span class="icon-addon">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                                value="Academic Year : 2024 / 2025">
                            </div> -->
                            <div class="dropdown mb-3 me-2">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                        class="ti ti-filter me-2"></i>Filter</a>
                                <div class="dropdown-menu drop-width">
                                    <form action="" method="GET">
                                        <div class="d-flex align-items-center border-bottom p-3">
                                            <h4>Filter</h4>
                                        </div>
                                        <div class="p-3 border-bottom">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">start date</label>
                                                        <input type="date"  name="event_start_date" class="form-control " placeholder="Start Date"
                                                   >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">End Date</label>
                                                        <input type="date" name="event_end_date" class="form-control " placeholder="Start Date"
                                                   >
                                                    </div>
                                                </div>
                                                
                                            
                                                
                                            
                                            </div>
                                        </div>
                                        <div class="p-3 d-flex align-items-center justify-content-end">
                                             <a href="{{route('school.financial.report')}}" class="btn btn-light me-3">Reset</a>
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="dropdown mb-3">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                    data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by A-Z
                                </a>
                                <ul class="dropdown-menu p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1 active">
                                            Ascending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Descending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Viewed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Added
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- Student List -->
                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S.no</th>
                                        <th>Event Name</th>
                                        <th>Amount</th>
                                        <th>payment Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($eventdata)
                            <?php $i = 1; ?>
                                @foreach($eventdata as $event)
                                    <tr>
                                        <td>{{$i}}</td>
                                     
                                        
                                        <td>{{$event->activity->event_name ?? ''}} </td>
                                        <td>{{$event->total }}</td>
                                        <?php if($event->status  == 'paid'){
                                            $status = 'paid';
                                            $class = 'badge-success';
                                        }else{
                                            $status = 'failed';
                                            $class = 'badge-danger';
                                             
                                        }
                                        ?>
                                        <td><span class="badge {{ $class}}">
                                            {{$status}}
                                            </span>
                                         </td>  
                                        <td>{{$event->payment_date }}</td>
                                        
                                       
                                    </tr>
                                    <?php $i++ ; ?>
                                @endforeach
                            @endif
                                        
                                </tbody>
                            </table>
                        </div>
                        <!-- /Student List -->
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Event Collection Overview</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="chartjs-wrapper-demo">
                        <canvas id="EventDonutChart" class="h-300"></canvas>
                        <div class="mt-3">
                            <strong>Event Amount:</strong> ₹{{ number_format($totaleventPaid) }}<br>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Event report List -->

          <!-- Wallet report List -->
        <div class="row mt-4">
            <div class=" col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">Wallet Recharge Report</h4>
                        <div class="d-flex align-items-center flex-wrap">
                            <!-- <div class="input-icon-start mb-3 me-2 position-relative">
                                <span class="icon-addon">
                                    <i class="ti ti-calendar"></i>
                                </span>
                                <input type="text" class="form-control date-range bookingrange" placeholder="Select"
                                value="Academic Year : 2024 / 2025">
                            </div> -->
                            <div class="dropdown mb-3 me-2">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                    data-bs-toggle="dropdown" data-bs-auto-close="outside"><i
                                        class="ti ti-filter me-2"></i>Filter</a>
                                <div class="dropdown-menu drop-width">
                                    <form action="{{route('school.financial.report')}}" method="GET">
                                        <div class="d-flex align-items-center border-bottom p-3">
                                            <h4>Filter</h4>
                                        </div>
                                        <div class="p-3 border-bottom">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">start date</label>
                                                        <input type="date"  name="wallet_start_date" class="form-control " placeholder="Start Date"
                                                   >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">End Date</label>
                                                        <input type="date" name="wallet_end_date" class="form-control " placeholder="Start Date"
                                                   >
                                                    </div>
                                                </div>
                                                
                                            
                                                
                                            
                                            </div>
                                        </div>
                                        <div class="p-3 d-flex align-items-center justify-content-end">
                                             <a href="{{route('school.financial.report')}}" class="btn btn-light me-3">Reset</a>
                                            <button type="submit" class="btn btn-primary">Apply</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- <div class="dropdown mb-3">
                                <a href="javascript:void(0);" class="btn btn-outline-light bg-white dropdown-toggle"
                                    data-bs-toggle="dropdown"><i class="ti ti-sort-ascending-2 me-2"></i>Sort by A-Z
                                </a>
                                <ul class="dropdown-menu p-3">
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1 active">
                                            Ascending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Descending
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Viewed
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="dropdown-item rounded-1">
                                            Recently Added
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- Student List -->
                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>S.no</th>
                                        <th>Parent Name</th>
                                        <th>Amount</th>
                                        <th>payment Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($walletdata)
                            <?php $i = 1; ?>
                                @foreach($walletdata as $wallet)
                                    <tr>
                                        <td>{{$i}}</td>
                                     
                                        
                                        <td>{{$wallet->parent->name ?? ''}} </td>
                                        <td>{{$wallet->student_coins }}</td>
                                        <?php if($wallet->ladger_status  == 'credit'){
                                            $status = 'credit';
                                            $class = 'badge-success';
                                        }else{
                                            $status = 'debit';
                                            $class = 'badge-danger';
                                             
                                        }
                                        ?>
                                        <td><span class="badge {{ $class}}">
                                            {{$status}}
                                            </span>
                                         </td>  
                                        <td>{{$wallet->payment_date }}</td>
                                        
                                       
                                    </tr>
                                    <?php $i++ ; ?>
                                @endforeach
                            @endif
                                        
                                </tbody>
                            </table>
                        </div>
                        <!-- /Student List -->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Wallet Collection Overview</h5>
                    </div>
                    <div class="card-body text-center">
                        <div class="chartjs-wrapper-demo">
                        <canvas id="walletDonutChart" class="h-300"></canvas>
                        <div class="mt-3">
                            <strong>Wallet Amount:</strong> ₹{{ number_format($totalwalletPaid) }}<br>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /wallet report List -->


    </div>
</div>
<!-- /Page Wrapper -->
@endsection

@section('scripts')


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let paidAmount = {{ $totalPaid ?? 0 }};

        // Always show a visible ring
        const chartPaidValue = paidAmount > 0 ? paidAmount : 0.01;

        // ✅ Conditional ring color
        const ringColor = paidAmount > 0 ? '#28a745' : '#dee2e6';

        const ctx = document.getElementById('feesDonutChart').getContext('2d');

        const centerTextPlugin = {
            id: 'centerText',
            beforeDraw(chart) {
                const { width, height } = chart;
                const ctx = chart.ctx;
                ctx.restore();

                ctx.font = `${(height / 100).toFixed(2)}em sans-serif`;
                ctx.textBaseline = 'middle';
                ctx.textAlign = 'center';

                // ✅ Conditional center text color
                ctx.fillStyle = paidAmount > 0 ? '#28a745' : '#ffffff';

                const text = `₹${paidAmount.toLocaleString()}`;
                ctx.fillText(text, width / 2, height / 2);
                ctx.save();
            }
        };

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Paid'],
                datasets: [{
                    data: [chartPaidValue],
                    backgroundColor: [ringColor], // ✅ Dynamic ring color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Paid: ₹${paidAmount.toLocaleString()}`;
                            }
                        }
                    }
                }
            },
            plugins: [centerTextPlugin]
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let paidAmount = {{ $totalwalletPaid ?? 0 }};

        // Always show a visible ring
        const chartPaidValue = paidAmount > 0 ? paidAmount : 0.01;

        // ✅ Conditional ring color
        const ringColor = paidAmount > 0 ? '#28a745' : '#dee2e6';

        const ctx = document.getElementById('walletDonutChart').getContext('2d');

        const centerTextPlugin = {
            id: 'centerText',
            beforeDraw(chart) {
                const { width, height } = chart;
                const ctx = chart.ctx;
                ctx.restore();

                ctx.font = `${(height / 100).toFixed(2)}em sans-serif`;
                ctx.textBaseline = 'middle';
                ctx.textAlign = 'center';

                // ✅ Conditional center text color
                ctx.fillStyle = paidAmount > 0 ? '#28a745' : '#ffffff';

                const text = `₹${paidAmount.toLocaleString()}`;
                ctx.fillText(text, width / 2, height / 2);
                ctx.save();
            }
        };

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Paid'],
                datasets: [{
                    data: [chartPaidValue],
                    backgroundColor: [ringColor], // ✅ Dynamic ring color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Paid: ₹${paidAmount.toLocaleString()}`;
                            }
                        }
                    }
                }
            },
            plugins: [centerTextPlugin]
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let paidAmount = {{ $totaleventPaid ?? 0 }};

        // Always show a visible ring
        const chartPaidValue = paidAmount > 0 ? paidAmount : 0.01;

        // ✅ Conditional ring color
        const ringColor = paidAmount > 0 ? '#28a745' : '#dee2e6';

        const ctx = document.getElementById('EventDonutChart').getContext('2d');

        const centerTextPlugin = {
            id: 'centerText',
            beforeDraw(chart) {
                const { width, height } = chart;
                const ctx = chart.ctx;
                ctx.restore();

                ctx.font = `${(height / 100).toFixed(2)}em sans-serif`;
                ctx.textBaseline = 'middle';
                ctx.textAlign = 'center';

                // ✅ Conditional center text color
                ctx.fillStyle = paidAmount > 0 ? '#28a745' : '#ffffff';

                const text = `₹${paidAmount.toLocaleString()}`;
                ctx.fillText(text, width / 2, height / 2);
                ctx.save();
            }
        };

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Paid'],
                datasets: [{
                    data: [chartPaidValue],
                    backgroundColor: [ringColor], // ✅ Dynamic ring color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Paid: ₹${paidAmount.toLocaleString()}`;
                            }
                        }
                    }
                }
            },
            plugins: [centerTextPlugin]
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let paidAmount = {{ $totalkitPaid ?? 0 }};

        // Always show a visible ring
        const chartPaidValue = paidAmount > 0 ? paidAmount : 0.01;

        // ✅ Conditional ring color
        const ringColor = paidAmount > 0 ? '#28a745' : '#dee2e6';

        const ctx = document.getElementById('KitDonutChart').getContext('2d');

        const centerTextPlugin = {
            id: 'centerText',
            beforeDraw(chart) {
                const { width, height } = chart;
                const ctx = chart.ctx;
                ctx.restore();

                ctx.font = `${(height / 100).toFixed(2)}em sans-serif`;
                ctx.textBaseline = 'middle';
                ctx.textAlign = 'center';

                // ✅ Conditional center text color
                ctx.fillStyle = paidAmount > 0 ? '#28a745' : '#ffffff';

                const text = `₹${paidAmount.toLocaleString()}`;
                ctx.fillText(text, width / 2, height / 2);
                ctx.save();
            }
        };

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Paid'],
                datasets: [{
                    data: [chartPaidValue],
                    backgroundColor: [ringColor], // ✅ Dynamic ring color
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Paid: ₹${paidAmount.toLocaleString()}`;
                            }
                        }
                    }
                }
            },
            plugins: [centerTextPlugin]
        });
    });
</script>


@endsection