@extends('layouts.admin')

@section('title', 'Add Teachers')

@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Add Teachers</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('usp.list') }}">Teachers</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add Teachers</li>
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

        <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="row g-3">

              <!-- Select School -->
              <div class="col-md-6">
                <label for="school_id" class="form-label">Select School</label>
                <select name="school" id="school_id" class="form-select">
                  <option value="">-- Select School --</option>
                  @foreach ($schools as $school)
                    <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                  @endforeach
                </select>
              </div>

              <!-- Teacher Image -->
              <div class="col-md-6">
                <label for="image" class="form-label">Teacher Image</label>
                <input type="file" name="image" class="form-control">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Basic Info -->
              <div class="col-md-6">
                <input name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}">
                @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="col-md-6">
                <input name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}">
                @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="col-md-6">
                <input name="class" class="form-control" placeholder="Class" value="{{ old('class') }}">
                @error('class') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="col-md-6">
                <!-- <input name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}"> -->
                 <select name="subject[]" class="form-control select2" multiple placeholder="Subject">
                  <option value="">-- Select Subjects --</option>
                  @foreach ($topics as $data)
                    <option value="{{ $data->id }}">{{ $data->topic_name }}</option>
                  @endforeach
                </select>
                @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Gender -->
              <div class="col-md-6">
                <select name="gender" class="form-select">
                  <option value="">Select Gender</option>
                  <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                  <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Contact Info -->
              @foreach (['primary_contact_number1', 'primary_contact_number2'] as $field)
                <div class="col-md-6">
                  <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field) }}">
                  @error($field) <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              @endforeach

              <!-- Dates -->
              <div class="col-md-6">
                <input type="date" name="date_of_joining" class="form-control" value="{{ old('date_of_joining') }}">
                @error('date_of_joining') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="col-md-6">
                <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
                @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Personal Info -->
              @foreach (['marital_status', 'email', 'language_known', 'qualification', 'work_experience'] as $field)
                <div class="col-md-6">
                  <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field) }}">
                  @error($field) <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              @endforeach

              <!-- Previous Schools -->
              @foreach (['previous_school1', 'previous_school2', 'previous_school_number'] as $field)
                <div class="col-md-6">
                  <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field) }}">
                  @error($field) <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              @endforeach

              <!-- Address -->
              @foreach (['address', 'permanent_address', 'city', 'id_number', 'state', 'zip'] as $field)
                <div class="col-md-6">
                  <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field) }}">
                  @error($field) <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              @endforeach

              <div class="col-md-6">
                <select name="work_shift[]" class="form-control select2"  multiple>
                  <option value="">-- Select Work Shift --</option>
                  @foreach ($shifts as $shift)
                    <option value="{{ $shift->id }}">{{ $shift->time_from }} - {{ $shift->time_to }}</option>
                  @endforeach
                </select>
                @error('work_shift') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              
              <div class="col-md-6">
                
              
              </div>

              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="status">
                    <option value="">Select Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                  </select>
                  @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
              </div>

              <!-- Notes -->
              <div class="col-md-12">
                <textarea name="notes" class="form-control" rows="3" placeholder="Notes">{{ old('notes') }}</textarea>
                @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Payroll Details -->
              <hr class="my-4">
              <h5>Payroll Details</h5>
              @foreach (['epf_no', 'basic_salary', 'contract_type'] as $field)
                <div class="col-md-4">
                  <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field) }}">
                  @error($field) <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              @endforeach

              

              <div class="col-md-4">
                <input type="date" name="date_leaving" class="form-control" value="{{ old('date_leaving') }}">
                @error('date_leaving') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Bank Details -->
              <hr class="my-4">
              <h5>Bank Account Details</h5>
              @foreach (['account_name', 'account_number', 'bank_name', 'ifsc_code', 'branch_name'] as $field)
                <div class="col-md-6">
                  <input name="{{ $field }}" class="form-control" placeholder="{{ ucwords(str_replace('_', ' ', $field)) }}" value="{{ old($field) }}">
                  @error($field) <small class="text-danger">{{ $message }}</small> @enderror
                </div>
              @endforeach

              <!-- Documents -->
              <hr class="my-4">
              <h5>Documents</h5>
              <div class="col-md-6">
                <label for="resume" class="form-label">Upload Resume (PDF)</label>
                <input type="file" name="resume" accept="application/pdf" class="form-control">
                @error('resume') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="col-md-6">
                <label for="letter" class="form-label">Upload Joining Letter (PDF)</label>
                <input type="file" name="letter" accept="application/pdf" class="form-control">
                @error('letter') <small class="text-danger">{{ $message }}</small> @enderror
              </div>

              <!-- Password -->
              <hr class="my-4">
              <h5>Account Password</h5>
              <div class="col-md-6">
                <input type="password" name="password" class="form-control" placeholder="New Password">
                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
              </div>
              <div class="col-md-6">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
              </div>

            </div>
          </div>

          <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Add Teacher</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection
