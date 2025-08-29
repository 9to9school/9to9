@extends('layouts.admin')

@section('title', 'Edit notification')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Edit notification</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ url('admin/dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('notification.list') }}">notification List</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Edit notification</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
               <form action="{{ url('admin/notifications/update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <input type="hidden" value="{{$notification->id}}" name="id"/>
    <div class="card">
        <div class="card-header bg-light">
            <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                    <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">Edit Notification</h4>
            </div>
        </div>

        <div class="card-body pb-1">
            <div class="row">

                <!-- Title -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text"
                               id="title"
                               name="title"
                               class="form-control"
                               value="{{ old('title', $notification->title) }}"
                               required>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Send To -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="sendto" class="form-label">Send To</label>
                        <select id="sendto" name="sendto" class="form-control" required>
                            <option value="" disabled {{ old('sendto', $notification->sendto) ? '' : 'selected' }}>Select recipient type</option>
                            <option value="school-pre-registration" {{ (old('sendto', $notification->sendto) === 'school-pre-registration') ? 'selected' : '' }}>School Pre-registration</option>
                            <option value="school-post-reg" {{ (old('sendto', $notification->sendto) === 'school-post-reg') ? 'selected' : '' }}>School Post-reg</option>
                            <option value="teacher-pre-registration" {{ (old('sendto', $notification->sendto) === 'teacher-pre-registration') ? 'selected' : '' }}>Teacher Pre-registration</option>
                            <option value="teacher-post-registration" {{ (old('sendto', $notification->sendto) === 'teacher-post-registration') ? 'selected' : '' }}>Teacher Post Registration</option>
                        </select>
                        @error('sendto')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Reason -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason</label>
                        <select id="reason" name="reason" class="form-control" required>
                            <option value="" disabled {{ old('reason', $notification->reason) ? '' : 'selected' }}>Select reason</option>
                            <option value="general" {{ (old('reason', $notification->reason) === 'general') ? 'selected' : '' }}>General</option>
                            <option value="fee-reminder" {{ (old('reason', $notification->reason) === 'fee-reminder') ? 'selected' : '' }}>Fee Reminder</option>
                            <option value="events" {{ (old('reason', $notification->reason) === 'events') ? 'selected' : '' }}>Events</option>
                            <option value="news" {{ (old('reason', $notification->reason) === 'news') ? 'selected' : '' }}>News</option>
                            <option value="holiday" {{ (old('reason', $notification->reason) === 'holiday') ? 'selected' : '' }}>Holiday</option>
                        </select>
                        @error('reason')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Image Upload & Preview -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Image (Optional)</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                        <p class="fs-12">Max 4MB, Format: JPG, PNG, SVG</p>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                        @if($notification->image)
                            <div class="mt-2">
                                <label class="form-label d-block">Current Image:</label>
                                <div style="position: relative; display: inline-block;">
                                    <img src="{{ asset($notification->image) }}" alt="Current" class="rounded" style="width:120px; height:80px; object-fit:cover; border:1px solid #ddd;">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Message -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea id="message"
                                  name="message"
                                  class="form-control"
                                  rows="4"
                                  required>{{ old('message', $notification->message) }}</textarea>
                        @error('message')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Time From -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="time_from" class="form-label">Time From</label>
                        <input type="datetime-local"
                               id="time_from"
                               name="time_from"
                               class="form-control"
                               value="{{ old('time_from', optional($notification->time_from)->format('Y-m-d\TH:i')) }}"
                               required>
                        @error('time_from')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Time To -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="time_to" class="form-label">Time To (Optional)</label>
                        <input type="datetime-local"
                               id="time_to"
                               name="time_to"
                               class="form-control"
                               value="{{ old('time_to', optional($notification->time_to)->format('Y-m-d\TH:i')) }}">
                        @error('time_to')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Recurring -->
                <div class="col-md-6">
                    <div class="mb-3 form-check mt-4">
                        <input type="checkbox"
                               id="recurring"
                               name="recurring"
                               class="form-check-input"
                               value="1"
                               {{ old('recurring', $notification->recurring) ? 'checked' : '' }}>
                        <label for="recurring" class="form-check-label">Recurring Notification</label>
                        @error('recurring')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

            </div>
        </div>

        <!-- Submit Button -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Notification</button>
        </div>
    </div>
</form>

            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const mediaTypeSelect = document.getElementById('mediaType');
    const imageUpload = document.getElementById('imageUpload');
    const videoUpload = document.getElementById('videoUpload');

    function toggleMediaUpload() {
        if (mediaTypeSelect.value === 'image') {
            imageUpload.classList.remove('d-none');
            videoUpload.classList.add('d-none');
        } else if (mediaTypeSelect.value === 'video') {
            videoUpload.classList.remove('d-none');
            imageUpload.classList.add('d-none');
        } else {
            imageUpload.classList.add('d-none');
            videoUpload.classList.add('d-none');
        }
    }

    mediaTypeSelect.addEventListener('change', toggleMediaUpload);

    // Initialize on page load
    toggleMediaUpload();
});
</script>


@endsection
