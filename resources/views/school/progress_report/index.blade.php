@extends('layouts.school')

@section('title', 'Progress Report List')

@section('content')
<div class="content">
  <div class="page-wrapper">
    <div class="content">

      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">Progress Report List</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('school.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Progress Reports</li>
            </ol>
          </nav>
        </div>
      </div>

      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('success') }}</strong>
      </div>
      @endif

      @if (Session::has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ Session::get('error') }}</strong>
      </div>
      @endif

      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
          <h4 class="mb-3">All Progress Reports</h4>
        </div>

        <div class="card-body p-0 py-3">
          <div class="custom-datatable-filter table-responsive">
            <table class="table datatable">
              <thead class="thead-light">
                <tr>
                  <th>#</th>
                  <th>School</th>
                  <th>Student</th>
                  <th>Teacher</th>
                  <th>Progress (%)</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($progressReports as $report)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $report->school->school_name ?? 'N/A' }}</td>

                  <td>{{ $report->student->first_name ?? 'N/A' }}</td>
                  <td>{{ $report->teacher->first_name ?? 'N/A' }}</td>
                  <td>{{ $report->percent }}%</td>
                  <td>
                    <form action="{{ route('school.progress-reports.show', $report->id) }}" method="GET" class="d-inline">
                      <button type="submit" class="btn btn-sm btn-warning">View</button>
                    </form>
                    
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<form id="delete-form" method="POST" style="display: none;">
  @csrf
  @method('DELETE')
</form>
@endsection

@section('scripts')
<script>
  document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function() {
      if (confirm('Are you sure you want to delete this progress report?')) {
        const id = this.getAttribute('data-id');
        const form = document.getElementById('delete-form');
        form.setAttribute('action', `{{ url('school/progress-reports') }}/${id}`);
        form.submit();
      }
    });
  });
</script>
@endsection