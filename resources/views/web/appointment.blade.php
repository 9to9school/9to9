@extends('layouts.web')
@section('css')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
      #page-header {
    transition: transform 0.4s ease, opacity 0.4s ease;
    transform: translateY(0%);
    opacity: 1;
}
    .appointment-form {
      max-width: 600px;
      margin: 50px auto;
      padding: 30px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-label {
      font-weight: 500;
    }
    .btn-appointment {
      background-color: #00bcd4;
      color: white;
      font-weight: 600;
    }
    .btn-appointment:hover {
      background-color: #0097a7;
    }
  </style>
 @endsection


@section('body')

<div class="appointment-form">
@if(session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('appointment.store') }}" method="POST">
  @csrf
    <div class="mb-3">
      <label class="form-label">Full Name</label>
      <input type="text" name="full_name" class="form-control" placeholder="Full Name">
    </div>

    <div class="mb-3">
      <label class="form-label">Mobile Number</label>
      <input type="tel" name="mobile_number" class="form-control" placeholder="Enter Your Mobile number">
    </div>

    <div class="mb-3">
      <label class="form-label">Child's Age</label>
      <select class="form-select" name="child_age_group">
        <option selected>Select age group</option>
        <option>1-2 years</option>
        <option>3-4 years</option>
        <option>5-6 years</option>
      </select>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Select State</label>
        <input type="text" name="state" class="form-control" placeholder="State">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Select City</label>
        <input type="text" name="city" class="form-control" placeholder="City">
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Mode of Appointment</label>
      <div class="form-check">
        <input class="form-check-input" name="appointment_mode" type="radio"  id="visit"value="in_person" checked>
        <label class="form-check-label" for="visit">In-person Visit</label>
      </div>
      <div class="form-check">
        <input class="form-check-input"  name="appointment_mode" type="radio"  id="video" value="video_call">
        <label class="form-check-label"   for="video">Video Call</label>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Preferred Date</label>
        <input type="date" name="preferred_date" class="form-control">
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Preferred Time Slot</label>
        <select class="form-select" name="preferred_time_slot">
          <option selected>Select time slot</option>
          <option>10:00 AM - 11:00 AM</option>
          <option>2:00 PM - 3:00 PM</option>
        </select>
      </div>
    </div>

    <div class="mb-4">
      <label class="form-label">Notes (Optional)</label>
      <textarea class="form-control" rows="3" name="notes" placeholder="Any specific questions or requirements for your appointment."></textarea>
    </div>

    <button type="submit" class="btn btn-appointment w-100">Book Appointment</button>
  </form>
</div>

@stop
