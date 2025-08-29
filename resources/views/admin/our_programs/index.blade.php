@extends('layouts.admin')

@section('title', 'Our Program List')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add Program</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Our Programs</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <!-- Program List -->
        <div class="card">
          <div class="card-header d-flex align-items-center justify-content-between flex-wrap pb-0">
            <h4 class="mb-3">Our Program List</h4>
            <a href="{{ route('our-program.create') }}" class="btn btn-primary mb-3">Add Our Program</a>
          </div>

          <div class="card-body p-0 py-3">
            <!-- Table -->
            <div class="custom-datatable-filter table-responsive">
              <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th>ID</th>
                    <th>Heading</th>
                    <th>Image</th>
                    <th>Short Description</th> {{-- NEW --}}
                    <th>Long Description</th> {{-- NEW --}}
                    <th>Fees</th>
                    <th>Time</th>
                    <th>Students</th>
                    <th>Age Group</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $program)
                  <tr>
                    <td>{{ $program->id }}</td>
                    <td>{{ $program->heading }}</td>
                    <td>
                      @if($program->image)
                      <img src="{{ asset($program->image) }}" width="50" height="50" alt="Image" class="rounded">
                      @else
                      No Image
                      @endif
                    </td>
                    <td>{{ Str::limit($program->short_description, 60) }}</td>
                    <td>{{ Str::limit($program->long_description, 60) }}</td>
                    <td>₹{{ $program->fees }}</td>
                    <td>{{ $program->time_from }} - {{ $program->time_to }}</td>
                    <td>{{ $program->student }}</td>
                    <td>{{ $program->age_group }}</td>
                    <td>
                      <span class="badge {{ $program->status ? 'badge-success' : 'badge-danger' }}">
                        {{ $program->status ? 'Active' : 'Inactive' }}
                      </span>
                    </td>
                    <td>
                      <div class="hstack gap-2 fs-15">


                        <a href="{{ route('our-program.edit', $program->id) }}" class="btn btn-icon btn-sm btn-light">
                          <i class="ti ti-edit-circle me-1"></i>
                        </a>

                        <a class="btn btn-icon btn-sm btn-light" href="javascript:void(0);" onclick="deleteConfirmation({{ $program->id }})">
                          <i class="ti ti-trash-x me-2"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                  @endforeach
                  @if($data->isEmpty())
                  <tr>
                    <td colspan="11" class="text-center">No programs found.</td>
                  </tr>
                  @endif
                </tbody>

              </table>
            </div>
            <!-- /Table -->
          </div>
        </div>
        <!-- /Program List -->
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  function deleteConfirmation(id) {
    swal({
      title: "Delete?",
      text: "Please ensure and then confirm!",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true
    }).then(function(e) {

      if (e.value === true) {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
          type: 'GET',
          url: "{{ url('/admin/delete-our-program') }}/" + id,
          data: {
            _token: CSRF_TOKEN
          },
          dataType: 'JSON',
          success: function(results) {
            if (results.success === true) {
              swal("Done!", results.message, "success");
              location.reload();
            } else {
              swal("Error!", results.message, "error");
              location.reload();
            }
          },
          error: function(xhr) {
            swal("Error!", "Something went wrong.", "error");
          }
        });

      } else {
        e.dismiss;
      }

    }, function(dismiss) {
      return false;
    });
  }
</script>
@endsection