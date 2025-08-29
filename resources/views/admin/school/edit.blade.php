@extends('layouts.admin')

@section('title', 'Edit School')
@section('content')
<div class="page-wrapper">
  <div class="content content-two">

    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between mb-3">
      <div class="my-auto mb-2">
        <h3 class="mb-1">Edit School</h3>
        <nav>
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item">
              <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
              <a href="{{ route('school.list') }}">Schools</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Edit Schools</li>
          </ol>
        </nav>
      </div>
    </div>
    <!-- /Page Header -->

    <div class="row">
      <div class="col-md-12">
        <form action="{{ route('school.update', $school->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <!-- Personal Information -->
          <div class="card">
            <div class="card-header bg-light">
              <div class="d-flex align-items-center">
                <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                  <i class="ti ti-info-square-rounded fs-16"></i>
                </span>
                <h4 class="text-dark">School Information</h4>
              </div>
            </div>

            <div class="card-body pb-1">
              <div class="row">
                <div class="row">
                  <div class="col-md-12">
                    <div class="d-flex align-items-center flex-wrap row-gap-3 mb-3">
                      <div class="me-3">
                        <div class="preview-box border border-dashed rounded d-flex align-items-center justify-content-center" style="width: 150px; height: 150px; position: relative; overflow: hidden;">
                          <img
                              id="preview-image"
                              src="{{ $school->school_logo ? asset($school->school_logo) : '#' }}"
                              alt="Preview"
                              style="{{ $school->school_logo ? '' : 'display:none;' }} width: 100%; height: 100%; object-fit: cover; border-radius: 10px;"
                            />
                          <i class="ti ti-photo-plus fs-24 text-muted" id="upload-icon" style="position: absolute; {{ $school->school_logo ? 'display:none;' : '' }}"></i>
                        </div>
                      </div>
                      <div>
                        <label for="image" class="form-label">Upload Logo</label>
                        <input type="file" class="form-control" id="image" name="school_logo" accept="image/*">
                        <button type="button" class="btn btn-sm btn-primary mt-2" id="remove-image">Remove</button>
                        @error('school_logo') <span class="text-danger">{{ $message }}</span> @enderror
                      </div>
                    </div>
                </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-6">
                      <label class="form-label">School Name</label>
                      <input type="text" name="school_name" value="{{ old('school_name', $school->school_name) }}" class="form-control">
                      @error('school_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">School Phone 1</label>
                      <input type="number" name="school_phone_1" value="{{ old('school_phone_1', $school->school_phone_1) }}" class="form-control">
                      @error('school_phone_1')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">School Phone 2</label>
                      <input type="number" name="school_phone_2" value="{{ old('school_phone_2', $school->school_phone_2) }}" class="form-control">
                      @error('school_phone_2')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Principal Name</label>
                      <input type="text" name="principal_name" value="{{ old('principal_name', $school->principal_name) }}" class="form-control">
                      @error('principal_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Vice Principal Name</label>
                      <input type="text" name="vice_principal_name" value="{{ old('vice_principal_name', $school->vice_principal_name) }}" class="form-control">
                      @error('vice_principal_name')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Address</label>
                      <input type="text" name="address" value="{{ old('address', $school->address) }}" class="form-control">
                      @error('address')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">City</label>
                      <input type="text" name="city" value="{{ old('city', $school->city) }}" class="form-control">
                      @error('city')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">State</label>
                      <input type="text" name="state" value="{{ old('state', $school->state) }}" class="form-control">
                      @error('state')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Zip</label>
                      <input type="text" name="zip" value="{{ old('zip', $school->zip) }}" class="form-control">
                      @error('zip')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Rating</label>
                      <input type="number" name="rating" value="{{ old('rating', $school->rating) }}" class="form-control">
                      @error('rating')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-xl-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Status</label>
                      <select class="form-control" name="status">
                        <option value="">Select Status</option>
                        <option value="active" {{ old('status', $school->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status', $school->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                      </select>
                      @error('status')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                </div>


                <!-- Submit Button -->
                <!-- <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div> -->

              </div>
            </div>
            <!-- Card 2: Password Settings -->
            <div class="card mb-4">
              <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                  <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                    <i class="ti ti-lock fs-16"></i>
                  </span>
                  <h4 class="text-dark">details</h4>
                </div>
              </div>

              <div class="card-body pb-1">
                <div class="row">
                  <div class="col-xl-6 col-md-6">
                    <div class="mb-6">
                      <label class="form-label">School Email</label>
                      <input type="text" name="school_email" value="{{ old('school_email', $school->school_email) }}" class="form-control">
                      @error('school_email')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" name="password" class="form-control">
                      <!-- @error('password') <span class="text-danger">{{ $message }}</span> @enderror -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header bg-light">
                <div class="d-flex align-items-center">
                  <span class="bg-white avatar avatar-sm me-2 text-gray-7 flex-shrink-0">
                    <i class="ti ti-users fs-16"></i>
                  </span>
                  <h4 class="text-dark">School Fees</h4>
                </div>
              </div>
              <div class="card-body">
                <div class="addsibling-info">
                  @php
                      $fees = json_decode($school->age ?? '[]', true);
                      $feesprice = json_decode($school->fees_price ?? '[]', true);
                  @endphp

                  @foreach($fees as $index => $fee)
                    <div class="row sibling-cont" data-count="{{ $index }}">
                      <div class="col-lg-3 col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Age</label>
                          <select class="select" name="age[]">
                            <option value="">Select Age</option>
                            <option value="1" {{ $fee == 1 ? 'selected' : '' }} data-id="1">2-3 Years</option>
                            <option value="2" {{ $fee == 2 ? 'selected' : '' }} data-id="2">3-4 Years</option>
                            <option value="3" {{ $fee == 3 ? 'selected' : '' }} data-id="3">4-5 Years</option>
                            <option value="4" {{ $fee == 4 ? 'selected' : '' }} data-id="4">5-6 Years</option>
                          </select>
                        </div>
                      </div>
                      
                      <div class="col-lg-3 col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Per Month Fees</label>
                          <input type="text" name="per_month_fees[]" class="form-control" id="per_month_{{ $index }}" value="{{ $feesprice[$index]['per_month_fees'] ?? '' }}" required>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-6">
                        <div class="mb-3">
                          <div class="d-flex align-items-center">
                            <div class="w-100">
                              <label class="form-label">Annual Fees</label>
                              <input type="number" name="annual_fees[]" class="form-control" id="ann_amount_{{ $index }}" value="{{ $feesprice[$index]['annual_fees'] ?? '' }}" required>
                            </div>
                            <div>
                              <label class="form-label">&nbsp;</label>
                              <a href="javascript:void(0);" class="trash-icon ms-3"><i class="ti ti-trash-x"></i></a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach

                </div>

                <div class="border-top pt-3">
                  <a href="javascript:void(0);" class="add-child btn btn-primary d-inline-flex align-items-center">
                    <i class="ti ti-circle-plus me-2"></i>Add New
                  </a>
                </div>
              </div>
            </div>

            <div class="text-end">
              <!-- <button type="button" class="btn btn-light me-3">Cancel</button> -->
              <button type="submit" class="btn btn-primary">Update School</button>
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
  const imageInput = document.getElementById('image');
  const previewImage = document.getElementById('preview-image');
  const uploadIcon = document.getElementById('upload-icon');
  const removeBtn = document.getElementById('remove-image');

  imageInput.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewImage.src = e.target.result;
        previewImage.style.display = 'block';
        uploadIcon.style.display = 'none';
      };
      reader.readAsDataURL(file);
    }
  });

  removeBtn.addEventListener('click', function () {
    imageInput.value = '';
    previewImage.src = '#';
    previewImage.style.display = 'none';
    uploadIcon.style.display = 'block';
  });

let siblingCounter = 0;  // start with 0 or 1 depending on your initial count

$(".add-child").on('click', function () {
    siblingCounter++;  
    

    var servicecontent = `
    <div class="row sibling-cont" data-count="${siblingCounter}">
       
        <div class="col-lg-3 col-md-3">
            <div class="mb-3">
                <label class="form-label">Age</label>
                <select class="form-select w-100" name="age[]">
                  <option value="">Select Age</option>
                  <option value="1" data-id="1">2-3 Years</option>
                  <option value="2" data-id="2">3-4 Years</option>
                  <option value="3" data-id="3">4-5 Years</option>
                  <option value="4" data-id="4">5-6 Years</option>
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="mb-3">
            <label class="form-label">Per Month Fees</label>
              <input type="text" name="per_month_fees[]" class="form-control" id="per_month_${siblingCounter}" required> 
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="mb-3">
            <div class="d-flex align-items-center">
              <div class="w-100">
                <label class="form-label">Annual Fees</label> 
                  <input type="number" name="annual_fees[]" class="form-control" id="ann_amount_${siblingCounter}" required>
              </div>
              <div>
                <label class="form-label">&nbsp;</label>
                <a href="javascript:void(0);" class="trash-icon ms-3"><i class="ti ti-trash-x"></i></a>
              </div>
            </div>
          </div>
        </div>
    </div>`;

    $(".addsibling-info").append(servicecontent);
    return false;
});

  $(".addsibling-info").on("change", "select[name='age[]']", function () {
// alert();
    var selectedDataId = $(this).find('option:selected').data('id'); 
    var parentRow = $(this).closest('.sibling-cont');  
    
    var dataCount = parentRow.data('count');  
    
    if(!selectedDataId){
        
        $('#per_month_' + dataCount).val('');
        // $('#dis_amount_' + dataCount).val('');
        $('#ann_amount_' + dataCount).val('');

        // updateTotalPerMonthAmount(); 

        return;
    }
    
    $.ajax({
        url: '{{route('admin.student.getamount')}}',
        type: 'POST',
        dataType: 'json',
        data: {
            id : selectedDataId,
            _token: '{{ csrf_token() }}' 
        },
        success: function(response) {
            console.log(response )
            if(response && response.amount){
                $('#per_month_' + dataCount).val(response.amount.per_month_fee);
                // $('#dis_amount_' + dataCount).val(response.amount.discount_fee);
                $('#ann_amount_' + dataCount).val(response.amount.annual_fee);
                  // updateTotalPerMonthAmount(); 
            }
        },
        error: function(xhr) {
            console.error("Error fetching data:", xhr.responseText);
        }
    });
  });
</script>
@endsection