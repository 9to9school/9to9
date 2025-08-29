@extends('layouts.admin')

@section('content')

    <div class="content">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content">

                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                    <div class="my-auto mb-2">
                        <h3 class="page-title mb-1">Partner School Enquiry</h3>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Partner School Enquiry</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Hacks List -->
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">Partner School Enquiry</h4>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- Hacks Table -->
                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Partner School Name</th>
                                    <th>Full Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Submitted At</th>
                                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $enquire)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <th> {{ $enquire->school->school_name ?? '' }}</th>
                        <td>{{ $enquire->full_name }}</td>
                        <td>{{ $enquire->mobile_number }}</td>
                        <td>{{ $enquire->email }}</td>
                        <td>{{ $enquire->que_of_concern }}</td>
                        <td>{{ \Carbon\Carbon::parse($enquire->created_at)->format('d M Y H:i') }}</td>
                        <td>
                                    <form method="POST" action="" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- /Hacks List -->

            </div>
        </div>
    </div>
@endsection
