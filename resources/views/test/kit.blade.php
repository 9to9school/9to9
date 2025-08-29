<form action="{{ url('api/online-payment') }}" method="POST">
    @csrf
  

  <div class="mb-3">
    <label for="kit_id" class="form-label">Kit ID</label>
    <input type="number" class="form-control" id="kit_id" name="kit_id"  required>
  </div>

  <div class="mb-3">
    <label for="payment_mode" class="form-label">Payment Mode</label>
    <select class="form-select" id="payment_mode" name="payment_mode" required>
      <option value="online" selected>Online</option>
      <option value="cash">Cash</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="student_id" class="form-label">Student ID</label>
    <input type="text" class="form-control" id="student_id" name="student_id"  required>
  </div>

  <div class="mb-3">
    <label for="school_id" class="form-label">School ID</label>
    <input type="text" class="form-control" id="school_id" name="school_id"  required>
  </div>

  <div class="mb-3">
    <label for="parent_id" class="form-label">Parent ID</label>
    <input type="text" class="form-control" id="parent_id" name="parent_id"  required>
  </div>

  <div class="mb-3">
    <label for="name" class="form-label">Full Name</label>
    <input type="text" class="form-control" id="name" name="name"  required>
  </div>

  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control" id="address" name="address"  required>
  </div>

  <div class="mb-3">
    <label for="city" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city"  required>
  </div>

  <div class="mb-3">
    <label for="state" class="form-label">State</label>
    <input type="text" class="form-control" id="state" name="state"  required>
  </div>

  <div class="mb-3">
    <label for="pincode" class="form-label">Pincode</label>
    <input type="text" class="form-control" id="pincode" name="pincode"  required>
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="phone" name="phone"  required>
  </div>

  <div class="mb-3">
    <label for="phone" class="form-label">delivery_charge</label>
    <input type="text" class="form-control" id="phone" name="delivery_charge"  required>
  </div>

  

  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email"  required>
  </div>

  <button type="submit" class="btn btn-primary">Submit Order</button>
</form>
