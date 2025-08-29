@extends('layouts.school')

@section('title', 'Teacher Leave Applications')

@section('content')
<div class="page-wrapper">
    <div class="content">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="page-title mb-1">Teacher Leave Applications</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('school.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Leaves</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Leave Table -->
        <div class="card">
            <div class="card-body p-0 py-3">
                <div class="table-responsive">
                    <table class="table datatable">
                        <thead class="thead-light">
                            <tr>
                                <th>S.No.</th>
                                <th>Teacher</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($leaves as $index => $leave)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    {{ $leave->teacher->first_name ?? 'N/A' }} {{ $leave->teacher->last_name ?? 'N/A' }}
                                </td>
                                <td>{{ ucfirst($leave->type) }}</td>
                                <td>{{ $leave->date_start ?? '-' }}</td>
                                <td>{{ $leave->date_end ?? '-' }}</td>
                                <td>{{ $leave->reason ?? '-' }}</td>
                                <td>
                                    @if($leave->status === 'pending')
                                    <span class="badge badge-soft-pending d-inline-flex align-items-center"><i
                                            class="ti ti-circle-filled fs-5 me-1"></i>Pending</span>
                                    @elseif($leave->status === 'approved')
                                    <span class="badge badge-soft-success d-inline-flex align-items-center"><i
                                            class="ti ti-circle-filled fs-5 me-1"></i>Approved</span>
                                    @elseif($leave->status === 'reject')
                                    <span class="badge badge-soft-danger d-inline-flex align-items-center"><i
                                            class="ti ti-circle-filled fs-5 me-1"></i>Rejectd</span>
                                    @endif
                                </td>
                                <td>
                                    @if($leave->status === 'pending')
                                    <div class="d-flex">
                                        <form action="{{ route('teacher-leaves.status', $leave->id) }}" method="POST" style="margin-right: 5px;">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="approved">
                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                        </form>
                                        <form action="{{ route('teacher-leaves.status', $leave->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="reject">
                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    </div>
                                    @else
                                    <span class="text-muted">-</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No leave applications found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /Leave Table -->

    </div>
</div>
@endsection