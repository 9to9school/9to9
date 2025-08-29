@extends('layouts.admin')

@section('title', 'Add Event')

@section('content')
  <div class="page-wrapper">
    <div class="content content-two">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="mb-1">Add Event</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="{{ url('/admin/event-list') }}">Events</a></li>
              <li class="breadcrumb-item active">Add Event</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- /Page Header -->

    <div class="mb-3">
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
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

    </div>
      <form action="{{ url('admin/event/' . ($event->id ?? '')) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card">
          <div class="card-header bg-light">
            <div class="d-flex align-items-center">
            <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
              <i class="ti ti-info-square-rounded fs-16"></i>
            </span>
              <h4 class="text-dark">Add Event</h4>
            </div>
          </div>

          <div class="card-body pb-1">
            <div class="row">

              {{-- Event Name --}}
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Event Name</label>
                  <input type="text" name="event_name" class="form-control" placeholder="Event Name" value="{{ $event->event_name }}">
                  @error('event_name')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>


              {{-- Image --}}
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Image</label>
                  <input type="file" name="image" class="form-control" accept="image/*">
                  @error('image')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              {{-- Description --}}
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <textarea name="description" class="form-control" rows="3">{{ $event->description }}</textarea>
                  @error('description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Banner Image --}}
              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Banner Image</label>
                  <input type="file" name="banner_image" class="form-control" accept="image/*">
                  @error('banner_image')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Banner Heading --}}
              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Banner Heading</label>
                  <input type="text" name="banner_heading" class="form-control" placeholder="Banner Heading"
                         value="{{ $event->banner_heading }}">
                  @error('banner_heading')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Sub Heading --}}
              <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label">Sub Heading</label>
                  <input type="text" name="sub_heading" class="form-control" placeholder="Sub Heading" value="{{ $event->sub_heading }}">
                  @error('sub_heading')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Banner Description --}}
              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label">Banner Description</label>
                  <textarea name="banner_description" class="form-control" rows="3">{{ $event->banner_description }}</textarea>
                  @error('banner_description')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Duration --}}
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Duration</label>
                  <input type="text" name="duration" class="form-control" placeholder="Duration" value="{{ $event->duration }}">
                  @error('duration')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Age --}}
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Age</label>
                  <select class="form-control" name="age">
                    <option value="2 - 3" {{ ($event->age  == '2 - 3') ? 'selected' : '' }}>2 - 3 Years</option>
                    <option value="4 - 5"{{ ($event->age == '2 - 3') ? 'selected' : '' }}>4 - 5 Years</option>
                    <option value="5 - 6"{{ ($event->age == '2 - 3') ? 'selected' : '' }}>5 - 6 Years</option>
                  </select>
                  @error('age')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Program --}}
              @php
                  $selectedPrograms = json_decode($event->program, true);
              @endphp
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Program</label>
                  <select class="form-control select2" name="program[]" id="program_id" multiple>
                    @foreach($progdata  as $data)
                     <option value="{{ $data->id }}" 
                        {{ is_array($selectedPrograms) && in_array($data->id, $selectedPrograms) ? 'selected' : '' }}>
                        {{ $data->title }}
                    </option>
                    @endforeach
                  </select>
                  @error('program')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>

              {{-- Fees --}}
              <!-- <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Fees</label>
                  <input type="hidden" name="fees" class="form-control" placeholder="" value="{{ $event->fees ?? '' }}" id="pay_fees" readonly>
                  @error('fees')
                  <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div> -->
            <!-- </div> -->
          </div>

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('scripts')
<script>
function getEventAmount(id) {
    if (id) {
        $.ajax({
            url: "{{ url('/admin/get-event-amount') }}/" + id,
            type: 'GET',
            success: function (data) {
                console.log(data); // ✅ Debug: log response
                $('#pay_fees').val(data.fees || '');
            },
            error: function (xhr) {
                console.error("Error fetching amount:", xhr);
                $('#pay_fees').val('');
            }
        });
    } else {
      $('#pay_fees').val('');
    }
}

$(document).ready(function () {
    // Trigger on change
    $('#program_id').on('change', function () {
        const programId = $(this).val();
        getEventAmount(programId);
    });

    // 🔁 Trigger on page load if value is already set
    const initialProgramId = $('#program_id').val();
    if (initialProgramId) {
        getEventAmount(initialProgramId);
    }
});
</script>

@endsection