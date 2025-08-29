@extends('layouts.admin')

@section('content')

    <div class="content">
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="content">

                <!-- Page Header -->
                <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
                    <div class="my-auto mb-2">
                        <h3 class="page-title mb-1">{{ $title }} Enquiry</h3>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $title }} Enquiry</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Hacks List -->
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
                        <h4 class="mb-3">{{ $title }} Enquiry</h4>
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
                                    <th>Email</th>
                                    <th>State</th>
                                    <th>City</th>
                                    <th>Message</th>
                                    <th>Submitted At</th>
                                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enquires as $key => $enquire)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $enquire->name }}</td>
                        <td>{{ $enquire->mobile }}</td>
                        <td>{{ $enquire->email }}</td>
                        <td>{{ $enquire->state }}</td>
                        <td>{{ $enquire->city }}</td>
                        <td>{{ $enquire->message }}</td>
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
