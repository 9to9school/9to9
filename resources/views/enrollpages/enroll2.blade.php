@extends('layouts.web')
@section('css')
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <style>
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }
    </style>
@stop
@section('body')
    <div class="w-full h-[80px] sm:h-[100px] bg-[#F3E9FF] flex items-center justify-center px-4 sm:px-0">
        <div class="flex items-center w-full sm:w-[614px] h-[80px]">
            <!-- Step 1 - Active -->
            <div class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] bg-[#571D99] text-white rounded-full flex items-center justify-center text-xl sm:text-2xl">
                <i class="fas fa-location-dot"></i>
            </div>

            <!-- Dotted Line -->
            <div class="flex-1 border-t border-dashed border-[#571D99] mx-2"></div>

            <!-- Step 2 -->
            <div class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] bg-[#571D99] text-white rounded-full flex items-center justify-center text-xl sm:text-2xl">
                <i class="fas fa-user-graduate"></i>
            </div>

            <!-- Dotted Line -->
            <div class="flex-1 border-t border-dashed border-[#571D99] mx-2"></div>

            <!-- Step 3 -->
            <div class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] text-[#571D99] bg-white rounded-full flex items-center justify-center text-xl sm:text-2xl border border-gray-300">
                <i class="fas fa-credit-card"></i>
            </div>

            <!-- Dotted Line -->
            <div class="flex-1 border-t border-dashed border-[#571D99] mx-2"></div>

            <!-- Step 4 -->
            <div class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] bg-white text-[#571D99] rounded-full flex items-center justify-center text-xl sm:text-2xl border border-gray-300">
                <i class="fas fa-phone"></i>
            </div>
        </div>
    </div>

    <div class="max-w-4xl mx-auto p-8 bg-white rounded-xl  border border-gray-300 mt-4" style="box-shadow: 0px 4px 12px 0px #00000012;">
        <h2 class="text-3xl font-medium text-center text-black mb-4">Child & Parent Information</h2>
        <p class="text-center text-gray-600 mb-4">Please provide details about your child and contact information. This helps us prepare the best environment for your little one.</p>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Please fix the following errors:<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <form
    method="POST"
    action="{{ url('enroll2-save') }}"
    enctype="multipart/form-data"
    class="space-y-8 px-4 sm:px-6 md:px-10 lg:px-16 max-w-3xl mx-auto py-8"
>
    @csrf
            <!-- Child's Information Section -->
            <div>
                <input type="hidden" name="school_id" value="{{ $school_id }}">
                <!-- Parent Section -->
    <h3 class="text-xl font-semibold mb-4 bg-[#D6F2E4] p-2 rounded">Parent / Guardian Information</h3>
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Father’s Name</label>
        <input type="text" name="father_name" value="{{ old('father_name') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Mother’s Name</label>
        <input type="text" name="mother_name" value="{{ old('mother_name') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Mobile Number</label>
        <input type="number" name="phone_number_1" value="{{ old('phone_number_1') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Mobile Number 2</label>
        <input type="number" name="phone_number_2" value="{{ old('phone_number_2') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Email Address</label>
        <input type="email" name="email" value="{{ old('email') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" name="address" value="{{ old('address') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
      </div>
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">City</label>
          <input type="text" name="city" value="{{ old('city') }}" required
                 class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700">State</label>
          <input type="text" name="state" value="{{ old('state') }}" required
                 class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
        </div>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Pincode</label>
        <input type="number" name="zip" value="{{ old('zip') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500"/>
      </div>
    </div>

    <!-- Child Section -->
    <h3 class="text-xl font-semibold mb-4 bg-[#C9E3F7] p-2 rounded">Child’s Information</h3>
    <div class="space-y-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Child’s Name</label>
        <input type="text" name="child_name" value="{{ old('child_name') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Age</label>
        <input type="number" name="age" value="{{ old('age') }}"
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Academic Year</label>
        <input type="text" name="academic_year" value="{{ old('academic_year') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"/>
      </div>
      
        
      <div>
        <label class="block text-sm font-medium text-gray-700">Admission Date</label>
        <input type="date" name="admission_date" value="{{ old('admission_date') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"/>
      </div>
     
      <div>
        <label class="block text-sm font-medium text-gray-700">Gender</label>
        <select name="gender" required
                class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          <option value="">Choose</option>
          <option value="Male"   {{ old('gender')=='Male'? 'selected':'' }}>Male</option>
          <option value="Female" {{ old('gender')=='Female'? 'selected':'' }}>Female</option>
          <option value="Other"  {{ old('gender')=='Other'? 'selected':'' }}>Other</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
        <input type="date" name="dob" value="{{ old('dob') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Primary Contact</label>
        <input type="number" name="primary_contact" value="{{ old('primary_contact') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"/>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Mother Tongue</label>
        <input type="text" name="mother_tongue" value="{{ old('mother_tongue') }}" required
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"/>
      </div>
      
      <div>
        <label class="block text-sm font-medium text-gray-700">Medical Condition</label>
        <select name="medical_condition" required
                class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500">
          <option value="">Choose</option>
          <option value="Good"  {{ old('medical_condition')=='Good'? 'selected':'' }}>Good</option>
          <option value="Bad"   {{ old('medical_condition')=='Bad'? 'selected':'' }}>Bad</option>
          <option value="Others"{{ old('medical_condition')=='Others'? 'selected':'' }}>Others</option>
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Allergies</label>
        <input type="text" name="allergies" value="{{ old('allergies') }}"
               class="mt-1 p-3 w-full border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"/>
      </div>
     
      <div>
        <label class="block text-sm font-medium text-gray-700">Photo (optional)</label>
        <input type="file" name="student_image"
               class="mt-1 w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4
                      file:rounded-md file:border-0
                      file:text-sm file:font-semibold
                      file:bg-blue-50 file:text-blue-700
                      hover:file:bg-blue-100"/>
      </div>
    </div>


    <!-- Navigation Buttons -->
    <div class="flex flex-col sm:flex-row justify-between gap-4 sm:gap-0">
      <a href="{{ url('/enroll1') }}"
         class="w-full sm:w-auto px-6 py-2 rounded-md text-gray-700 border border-gray-700">
        Previous
      </a>
      <button type="submit"
         class="w-full sm:w-auto px-6 py-2 bg-purple-600 rounded-md text-white hover:bg-purple-700">
        Next
      </button>
    </div>
    </div>

</div>
  </form>
@stop
@section('js')

@stop
