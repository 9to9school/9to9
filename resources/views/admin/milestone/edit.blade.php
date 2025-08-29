@extends('layouts.admin')

@section('title', 'Edit Milestone')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit Milestone</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('milestone.list') }}">Milestones</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Milestone</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('milestone.update', $milestone->id) }}" method="POST">
          @csrf
          @method('PUT')

          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Milestone</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">

                <div class="col-md-4 mb-3">
                  <label class="form-label">Age Group (Popular ID)</label>
                  <select name="popular_id" class="form-control" id="popular_id">
                    <option value="">Select Age</option>
                    @foreach($populars as $popular)
                      <option value="{{ $popular->id }}" {{ $milestone->popular_id == $popular->id ? 'selected' : '' }}>
                        {{ $popular->title }}
                      </option>
                    @endforeach
                  </select>
                  @error('popular_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if ($milestone->image)
                            <div class="mt-2">
                                <p class="mb-1">Current Image:</p>
                                <img src="{{ asset($milestone->image) }}" alt="Milestone Image" style="width: 60px; height: 60px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                  <label class="form-label">Goal Month</label>
                  <!-- <input type="text" name="goal_month" value="{{ old('goal_month', $milestone->goal_month) }}" class="form-control"> -->
                   <select name="goal_month" class="form-control" id="status">
                      <option value="">Select Goal Month</option>
                      <option value="months 1-3">Months 1-3</option>
                      <option value="months 4-6">Months 4-6</option>
                      <option value="months 7-9">Months 7-9</option>
                      <option value="months 10-12">Months 10-12</option>
                  </select>
                  @error('goal_month') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                
                <div class="col-md-4 mb-3">
                  <label class="form-label">Goal Heading</label>
                  <input type="text" name="goal_heading" value="{{ old('goal_heading', $milestone->goal_heading) }}" class="form-control">
                  @error('goal_heading') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                  <label class="form-label">Goal Description</label>
                  <input type="text" name="goal_description" value="{{ old('goal_description', $milestone->goal_description) }}" class="form-control">
                  @error('goal_description') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                  <label class="form-label">Goal Brief</label>
                  <input type="text" name="goal_breaf" value="{{ old('goal_breaf', $milestone->goal_breaf) }}" class="form-control">
                  @error('goal_breaf') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                  <label class="form-label">Topics Including</label>
                  <select name="topics_including[]" class="form-control select2" multiple required>
                    @foreach($topics as $topic)
                      <option value="{{ $topic->topic_name }}"
                        {{ in_array($topic->id, explode(',', $milestone->topics_including)) ? 'selected' : '' }}>
                        {{ $topic->topic_name }}
                      </option>
                    @endforeach
                  </select>
                  @error('topics_including') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                  <label class="form-label">Status</label>
                  <input type="text" name="status" value="{{ old('status', $milestone->status) }}" class="form-control">
                  @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Update</button>
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
  function loadTopics(popular_id, selected_topic_name = '') {
    if (popular_id) {
      $.ajax({
        url: '{{ url("admin/get-topics-by-age") }}/' + popular_id,
        type: 'GET',
        success: function (data) {
          let options = '';
          data.forEach(topic => {
            const selected = topic.topic_name === selected_topic_name ? 'selected' : '';
            options += `<option value="${topic.id}" ${selected}>${topic.topic_name}</option>`;
          });
          $('select[name="topics_including[]"]').html(options);
        }
      });
    }
  }

  $(document).ready(function () {
    const selectedPopularId = $('#popular_id').val();
    const selectedTopics = @json(explode(',', $milestone->topics_including));

    if (selectedPopularId) {
      $.ajax({
        url: '{{ url("admin/get-topics-by-age") }}/' + selectedPopularId,
        type: 'GET',
        success: function (data) {
          let options = '';
          data.forEach(topic => {
            const selected = selectedTopics.includes(topic.topic_name) ? 'selected' : '';
            options += `<option value="${topic.id}" ${selected}>${topic.topic_name}</option>`;
          });
          $('select[name="topics_including[]"]').html(options);
        }
      });
    }

    $('#popular_id').on('change', function () {
      loadTopics($(this).val());
    });
  });
</script>
@endsection
