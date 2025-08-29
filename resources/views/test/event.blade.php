<form action="{{ url('api/events-order') }}" method="POST">
  <!-- Laravel CSRF Token -->
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <div class="mb-3">
    <label for="event_id" class="form-label">Event ID</label>
    <input type="text" class="form-control" id="event_id" name="event_id" required>
  </div>

  <div class="mb-3">
    <label for="event_name" class="form-label">Event Name</label>
    <input type="text" class="form-control" id="event_name" name="event_name" required>
  </div>

  <div class="mb-3">
    <label for="age" class="form-label">Age</label>
    <input type="number" class="form-control" id="age" name="age" required>
  </div>

  <div class="mb-3">
    <label for="student_id" class="form-label">Student ID</label>
    <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Optional">
  </div>

  <div class="mb-3">
    <label for="school_id" class="form-label">School ID</label>
    <input type="text" class="form-control" id="school_id" name="school_id" placeholder="Optional">
  </div>

  <div class="mb-3">
    <label for="parent_id" class="form-label">Parent ID</label>
    <input type="text" class="form-control" id="parent_id" name="parent_id" placeholder="Optional">
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name" name="name" required maxlength="255">
  </div>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address" required maxlength="255">
  </div>

  <div class="mb-3">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" required maxlength="255">
  </div>

  <div class="mb-3">
    <label for="state" class="form-label">State</label>
    <input type="text" class="form-control" id="state" name="state" required maxlength="255">
  </div>

  <div class="mb-3">
    <label for="pincode" class="form-label">Pincode</label>
    <input type="text" class="form-control" id="pincode" name="pincode" required maxlength="10">
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone" required maxlength="15">
  </div>

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>

  <button type="submit" class="btn btn-primary">Register</button>
</form>
