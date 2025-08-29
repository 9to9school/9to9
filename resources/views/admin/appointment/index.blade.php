@extends('layouts.admin')

@section('content')

    <div class="content">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content">

                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                    <div class="my-auto mb-2">
                        <h3 class="page-title mb-1">Appointment</h3>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Hacks List -->
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">Appointment</h4>
                    </div>
                    <div class="card-body p-0 py-3">

                        <!-- Hacks Table -->
                        <div class="custom-datatable-filter table-responsive">
                            <table class="table datatable">
                                <thead class="thead-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Mobile</th>
                                    <th>Child Age Group</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Mode</th>
                                    <th>Preferred Date</th>
                                    <th>Time Slot</th>
                                    <th>Notes</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($appointments as $key => $appointment)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                         <td>{{ $appointment->full_name }}</td>
                                        <td>{{ $appointment->mobile_number }}</td>
                                        <td>{{ $appointment->child_age_group }}</td>
                                        <td>{{ $appointment->state }}</td>
                                        <td>{{ $appointment->city }}</td>
                                        <td>{{ ucfirst(str_replace('_', ' ', $appointment->appointment_mode)) }}</td>
                                        <td>{{ $appointment->preferred_date }}</td>
                                        <td>{{ $appointment->preferred_time_slot }}</td>
                                        <td>{{ $appointment->notes }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning">Edit</a>
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                            Delete
                                        </button>
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
