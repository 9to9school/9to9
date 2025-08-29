<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Talk to School Expert</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Inter', sans-serif;
    }
    .expert-form {
      max-width: 500px;
      margin: 50px auto;
      padding: 30px;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .expert-img {
      width: 80px;
      height: 80px;
      background-color: #ddd;
      border-radius: 50%;
      margin: 0 auto 15px;
    }
    .form-label {
      font-weight: 500;
    }
    .form-control, .form-select {
      border-radius: 8px;
      height: 44px;
    }
    textarea.form-control {
      height: 100px;
    }
    .btn-pay {
      background-color: #00bcd4;
      color: white;
      font-weight: 600;
      padding: 12px;
      border-radius: 8px;
      font-size: 16px;
      border: none;
    }
    .btn-pay:hover {
      background-color: #0097a7;
    }
  </style>
</head>
<body>

<div class="expert-form text-center">
  <div class="expert-img"></div>
  <h6 class="mb-4">Talk to ABC, 9 TO 9 School Expert</h6>
  <form action="{{ route('talk.expert.submit') }}" method="POST">
    @csrf

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Show validation errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3 text-start">
      <label class="form-label">Full Name</label>
      <input type="text" class="form-control"  name="full_name" value="{{ old('full_name') }}" placeholder="Full Name">
    </div>

    <div class="mb-3 text-start">
      <label class="form-label">Mobile Number</label>
      <input type="tel" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}" placeholder="Enter Your Mobile number">
    </div>

    <div class="mb-3 text-start">
      <label class="form-label">Email ID</label>
      <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email ID">
    </div>

    <div class="mb-3 text-start">
      <label class="form-label">Preferred Time to Talk</label>
      <select class="form-select" name="preferred_time">
        <option selected>Select Time</option>
        <option>10:00 AM - 11:00 AM</option>
        <option>12:00 PM - 1:00 PM</option>
        <option>3:00 PM - 4:00 PM</option>
      </select>
    </div>

    <div class="mb-4 text-start">
      <label class="form-label">Question or Concern</label>
      <textarea class="form-control" name="question_or_concern" placeholder="What would you like to discuss with our experts?">{{ old('question_or_concern') }}</textarea>
    </div>

    <button type="submit" class="btn btn-pay w-100">Pay ₹1 & Connect</button>
  </form>
</div>

</body>
</html>
