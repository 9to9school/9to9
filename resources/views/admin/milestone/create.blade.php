@extends('layouts.admin')

@section('title', 'Add Milestone')
@section('content')

  <div class="page-wrapper">
    <div class="content content-two">

      <!-- Page Header -->
      <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
        <div class="my-auto mb-2">
          <h3 class="mb-1">Add Milestone</h3>
          <nav>
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="">Dashboard</a>
              </li>
              <li class="breadcrumb-item">
                <a href="{{ route('milestone.list') }}">Milestones</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Add Milestones</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- /Page Header -->

      <div class="row">
        <div class="col-md-12">
          <form action="{{ route('milestone.store') }}" method="POST">
          @csrf
          @method('POST')

          <!-- Add Category Card -->
            <div class="card">
              <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                  <h4 class="text-dark mb-0">Add Milestone</h4>
                </div>
              </div>

              <div class="card-body pb-1">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Popular Id</label>
                      <!-- <input type="text" name="popular_id" class="form-control"> -->
                      <select name="popular_id" class="form-control" id="popular_id">
                            <option value="">Select Topic</option>
                            @foreach($populars as $populars)
                              <option value="{{ $populars->id }}">{{ $populars->title }}</option>
                            @endforeach
                          </select>
                          @error('topics_including')
                          <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>
                      @error('popular_id')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Image</label>
                      <input type="file" name="image" class="form-control">
                      @error('image')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Goal Month</label>
                      <!-- <input type="text" name="goal_month" class="form-control"> -->
                       <select name="goal_month" class="form-control" id="status">
                            <option value="">Select Goal Month</option>
                            <option value="months 1-3">Months 1-3</option>
                            <option value="months 4-6">Months 4-6</option>
                            <option value="months 7-9">Months 7-9</option>
                            <option value="months 10-12">Months 10-12</option>
                        </select>
                      @error('goal_month')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Goal Heading</label>
                      <input type="text" name="goal_heading" class="form-control">
                      @error('goal_heading')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Goal Description</label>
                      <input type="text" name="goal_description" class="form-control">
                      @error('goal_description')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Goal Breaf</label>
                      <input type="text" name="goal_breaf" class="form-control">
                      @error('goal_breaf')
                      <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                  <div class="mb-3">
                        <label class="form-label">Topics Including</label>
                        <select name="topics_including[]" class="form-control select2" multiple id="topic">
                          <!-- @foreach($topics as $topic)
                            <option value="{{ $topic->id }}">{{ $topic->topic_name }}</option>
                          @endforeach -->
                        </select>
                        @error('topics_including')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                  </div>

                </div>
              </div>

              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Milestone</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script>



$('#popular_id').on('change', function () {
    var popular_id = $(this).val();

    if (popular_id) {
        $.ajax({
            url: '{{ url("admin/get-topics-by-age") }}/' + popular_id,
            type: 'GET',
            success: function (data) {
                $('#topic').empty().append('<option value="">--Select Topic--</option>');
                $.each(data, function (key, value) {
                    $('#topic').append('<option value="' + value.id + '">' + value.topic_name + '</option>');
                });
            }
        });
    } else {
        $('#topic').html('<option value="">--Select Topic--</option>');
    }
});

</script>

@endsection