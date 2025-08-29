@extends('layouts.admin')

@section('title', 'Add Notifications')
@section('content')
<div class="page-wrapper">
    <div class="content content-two">

        <!-- Page Header -->
        <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
            <div class="my-auto mb-2">
                <h3 class="mb-1">Add Notifications</h3>
                <nav>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('gallery.list') }}">Notifications List</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Notifications</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <form action="{{ url('admin/notifications/save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Gallery Form -->
                    <div class="card">
                        <div class="card-header bg-light">
                            <div class="d-flex align-items-center">
                                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                                    <i class="ti ti-info-square-rounded fs-16"></i>
                                </span>
                                <h4 class="text-dark">Add Notifications</h4>
                            </div>
                        </div>

                        <div class="card-body pb-1">
                            <div class="row">

    <!-- Title -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Source -->
   <div class="col-md-6">
    <div class="mb-3">
        <label for="sendto" class="form-label">Send To</label>
        <select id="sendto" name="sendto" class="form-control" required>
            <option value="" disabled {{ old('sendto') ? '' : 'selected' }}>Select recipient type</option>
            <option value="school-pre-registration" {{ old('sendto') === 'school-pre-registration' ? 'selected' : '' }}>School Pre-registration</option>
            <option value="school-post-reg" {{ old('sendto') === 'school-post-reg' ? 'selected' : '' }}>School Post-reg</option>
            <option value="teacher-pre-registration" {{ old('sendto') === 'teacher-pre-registration' ? 'selected' : '' }}>Teacher Pre-registration</option>
            <option value="teacher-post-registration" {{ old('sendto') === 'teacher-post-registration' ? 'selected' : '' }}>Teacher Post Registration</option>
        </select>
        @error('sendto')
            <span class="text-danger">{{ $message }}</span>
        @enderror
        </div>
    </div>

    <div class="col-md-6">
    <div class="mb-3">
        <label for="reason" class="form-label">Reason</label>
        <select id="reason" name="reason" class="form-control" required>
            <option value="" disabled {{ old('reason') ? '' : 'selected' }}>Select reason</option>
            <option value="general" {{ old('reason') === 'general' ? 'selected' : '' }}>General</option>
            <option value="fee-reminder" {{ old('reason') === 'fee-reminder' ? 'selected' : '' }}>Fee Reminder</option>
            <option value="events" {{ old('reason') === 'events' ? 'selected' : '' }}>Events</option>
            <option value="news" {{ old('reason') === 'news' ? 'selected' : '' }}>News</option>
            <option value="holiday" {{ old('reason') === 'holiday' ? 'selected' : '' }}>Holiday</option>
        </select>
        @error('reason')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<!-- Image Upload -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image (Optional)</label>
            <input type="file" id="image" name="image" class="form-control" accept="image/*">
            <p class="fs-12">Max 4MB, Format: JPG, PNG, SVG</p>
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <!-- Message -->
    <div class="col-md-12">
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea id="message" name="message" class="form-control" rows="4" required>{{ old('message') }}</textarea>
            @error('message')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    

    <!-- Time From -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="time_from" class="form-label">Time From</label>
            <input type="datetime-local" id="time_from" name="time_from" class="form-control" value="{{ old('time_from') }}" required>
            @error('time_from')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Time To -->
    <div class="col-md-6">
        <div class="mb-3">
            <label for="time_to" class="form-label">Time To (Optional)</label>
            <input type="datetime-local" id="time_to" name="time_to" class="form-control" value="{{ old('time_to') }}">
            @error('time_to')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <!-- Recurring -->
    <div class="col-md-6">
        <div class="mb-3 form-check mt-4">
            <input type="checkbox" id="recurring" name="recurring" class="form-check-input" value="1" {{ old('recurring') ? 'checked' : '' }}>
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
                            <button type="submit" class="btn btn-primary">Save </button>
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
    document.addEventListener('DOMContentLoaded', function () {
        const mediaTypeSelect = document.getElementById('mediaType');
        const imageUpload = document.getElementById('imageUpload');
        const videoUpload = document.getElementById('videoUpload');

        function toggleUploadSections() {
            const selectedType = mediaTypeSelect.value;

            if (selectedType === 'image') {
                imageUpload.classList.remove('d-none');
                videoUpload.classList.add('d-none');
            } else if (selectedType === 'video') {
                videoUpload.classList.remove('d-none');
                imageUpload.classList.add('d-none');
            } else {
                imageUpload.classList.add('d-none');
                videoUpload.classList.add('d-none');
            }
        }

        // Listen for dropdown changes
        mediaTypeSelect.addEventListener('change', toggleUploadSections);

        // Trigger once on page load to reflect preselected option
        toggleUploadSections();
    });
</script>
@endsection


