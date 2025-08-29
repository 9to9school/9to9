@extends('layouts.admin')

@section('title', 'Remark List')

@section('content')
<div class="content">
  <div class="page-wrapper">
    <div class="content">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="page-title mb-1">Remark List</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">All Remarks</li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- Flash Messages -->
      @if (Session::has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ Session('success') }}</strong>
      </div>
      @endif

      @if (Session::has('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ Session('error') }}</strong>
      </div>
      @endif

      <!-- Remarks Table -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
          <h4 class="mb-3">All Remarks</h4>
        </div>

        <div class="card-body p-0 py-3">
          <div class="custom-datatable-filter table-responsive">
            <table class="table datatable">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>School</th>
                  <th>Teacher</th>
                  <th>Student</th>
                  <th>Remark</th>
                  <th>Note</th>
                  <th>Image</th>
                  
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($remarks as $remark)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $remark->school->school_name ?? 'N/A' }}</td>
                  <td>{{ $remark->teacher->first_name ?? 'N/A' }}</td>
                  <td>{{ $remark->student->first_name ?? 'N/A' }}</td>
                  <td>{{ $remark->remark ?? 'N/A' }}</td>
                  <td>{{ $remark->remark_note ?? 'N/A' }}</td>
                  <td>
                    @if($remark->image)
                    <img src="{{ asset($remark->image) }}" alt="Image" width="60">
                    @else
                    N/A
                    @endif
</td>

                  <td>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn" data-id="{{ $remark->id }}">
                      Delete
                    </a>
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

<!-- Hidden form for delete -->
<form id="delete-form" method="POST" style="display: none;">
  @csrf
  @method('DELETE')
</form>
@endsection

@section('scripts')
<script>
  document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function() {
      if (confirm('Are you sure you want to delete this remark?')) {
        const id = this.getAttribute('data-id');
        const form = document.getElementById('delete-form');
        form.setAttribute('action', `/admin/remarks/${id}`);
        form.submit();
      }
    });
  });
</script>
@endsection