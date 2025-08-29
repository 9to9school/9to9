@extends('layouts.admin')

@section('title', 'Update Teacher')

@section('content')

<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Update Teacher</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('teacher.list') }}">Teacher</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update Teacher</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">

        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="card-body">
            <div class="row g-3">

              <!-- Teacher Image -->
              <div class="col-md-6">
                <label for="image" class="form-label">Teacher Image</label>
                <input type="file" name="image" class="form-control">
                @if($teacher->image)
                  <div class="mt-2">
                    <img src="{{ asset($teacher->image) }}" alt="Teacher Image" style="max-width: 150px;">
                  </div>
                @endif
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <div class="col-md-6">
                <label for="image" class="form-label">Schools</label>
                 <select class="js-example-basic-single select2 form-control" id="studentget" name="school_id">
                      <option value="">Select School</option>
                        @foreach($schools as $data)
                            <option value="{{ $data->id }}"  {{ (isset($teacher) && $teacher->school_id == $data->id) ? 'selected' : '' }}>{{ $data->school_name }}</option>
                        @endforeach
                    
                </select>
                @if ($errors->has('school'))
                <span class="text-danger">{{ $errors->first('school') }}</span>
                @endif
              </div>  

              <!-- Name & Subject Info -->
              <div class="col-md-6">
                <input name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name', $teacher->first_name) }}">
                @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <div class="col-md-6">
                <input name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name', $teacher->last_name) }}">
                @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <div class="col-md-6">
                <input name="class" class="form-control" placeholder="Class" value="{{ old('class', $teacher->class) }}">
                @error('class') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <div class="col-md-6">
                <!-- <input name="subject" class="form-control" placeholder="Subject" value="{{ old('subject', $teacher->subject) }}"> -->
                <select name="subject[]" class="form-control select2" multiple placeholder="Subject">
                  <option value="">-- Select Subjects --</option>
                  @php
                    $selectedSubjects = old('subject', json_decode($teacher->subject ?? '[]'));
                  @endphp
                  @foreach ($topics as $data)
                    <option value="{{ $data->id }}" {{ in_array($data->id, $selectedSubjects) ? 'selected' : '' }}>
                      {{ $data->topic_name }}
                    </option>
                  @endforeach
                </select>
                @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Gender -->
              <div class="col-md-6">
                <select name="gender" class="form-select">
                  <option value="">Select Gender</option>
                  <option value="Male" {{ old('gender', $teacher->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                  <option value="Female" {{ old('gender', $teacher->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Contact & Dates -->
              @foreach (['primary_contact_number1', 'primary_contact_number2'] as $field)
              <div class="col-md-6">
                <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field, $teacher->$field) }}">
                @error($field) <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              @endforeach

              <div class="col-md-6">
                <input type="date" name="date_of_joining" class="form-control" value="{{ old('date_of_joining', $teacher->date_of_joining) }}">
                @error('date_of_joining') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="col-md-6">
                <input type="date" name="dob" class="form-control" value="{{ old('dob', $teacher->dob) }}">
                @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Personal Info -->
              @foreach (['marital_status', 'email', 'language_known', 'qualification', 'work_experience'] as $field)
              <div class="col-md-6">
                <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field, $teacher->$field) }}">
                @error($field) <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              @endforeach

              <!-- Previous Schools -->
              @foreach (['previous_school1', 'previous_school2', 'previous_school_number'] as $field)
              <div class="col-md-6">
                <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field, $teacher->$field) }}">
                @error($field) <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              @endforeach

              <!-- Address -->
              @foreach (['address', 'permanent_address', 'city', 'id_number', 'state', 'zip'] as $field)
              <div class="col-md-6">
                <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field, $teacher->$field) }}">
                @error($field) <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              @endforeach
              
              <div class="col-md-6">
                @php
                  $selectedShifts = old('work_shift', json_decode($teacher->work_shift ?? '[]'));
                @endphp

                <select name="work_shift[]" class="form-control select2" multiple>
                  <option value="">-- Select Work Shift --</option>
                  @foreach ($shifts as $shift)
                    <option value="{{ $shift->id }}" {{ in_array($shift->id, $selectedShifts) ? 'selected' : '' }}>
                      {{ $shift->time_from }} - {{ $shift->time_to }}
                    </option>
                  @endforeach
                </select>
                @error('work_shift') <small class="text-danger">{{ $message }}</small> @enderror
              </div>



              <!-- Notes -->
              <div class="col-md-12">
                <textarea name="notes" class="form-control" rows="3" placeholder="Notes">{{ old('notes', $teacher->notes) }}</textarea>
                @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Payroll -->
              <hr class="my-4">
              <h5>Payroll Details</h5>
              @foreach (['epf_no', 'basic_salary', 'contract_type'] as $field)
              <div class="col-md-4">
                <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field, $teacher->$field) }}">
                @error($field) <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              @endforeach

              <div class="col-md-4">
                <input type="date" name="date_leaving" class="form-control" value="{{ old('date_leaving', $teacher->date_leaving) }}">
                @error('date_leaving') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Bank Info -->
              <hr class="my-4">
              <h5>Bank Account Details</h5>
              @foreach (['account_name', 'account_number', 'bank_name', 'ifsc_code', 'branch_name'] as $field)
              <div class="col-md-6">
                <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field, $teacher->$field) }}">
                @error($field) <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              @endforeach

              <!-- Documents -->
             <!-- Documents -->
<hr class="my-4">
<h5>Documents</h5>

<div class="col-md-6">
  <label for="resume" class="form-label">Upload Resume (PDF)</label>
  <input type="file" name="resume" accept="application/pdf" class="form-control">
  @if($teacher->resume)
    <div class="mt-2">
      <a href="{{ asset($teacher->resume) }}" target="_blank" class="btn btn-outline-primary btn-sm">
        View Current Resume
      </a>
    </div>
  @endif
  @error('resume') <small class="text-danger">{{ $message }}</small> @enderror
</div>

<div class="col-md-6">
  <label for="letter" class="form-label">Upload Joining Letter (PDF)</label>
  <input type="file" name="letter" accept="application/pdf" class="form-control">
  @if($teacher->letter)
    <div class="mt-2">
      <a href="{{ asset($teacher->letter) }}" target="_blank" class="btn btn-outline-primary btn-sm">
        View Current Letter
      </a>
    </div>
  @endif
  @error('letter') <small class="text-danger">{{ $message }}</small> @enderror
</div>

             
          </div>

          <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Update Teacher</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
