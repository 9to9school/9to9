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
      <div class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] text-[#571D99] bg-white rounded-full flex items-center justify-center text-xl sm:text-2xl">
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
<div class="max-w-[1248px] mx-auto bg-white border border-[#D9D9D9] rounded-[12px] shadow-md p-6 md:p-[42px] mt-4">
<h2 class="text-xl md:text-2xl font-semibold mb-2">Select a Branch</h2>
<p class="text-sm text-gray-500 mb-6">Choose the campus that’s most convenient for you</p>
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 md:gap-[64px]">
    @foreach($schools as $school)
 <a href="{{ route('enroll2.show', $school->school_id) }}" class="block w-full">
       
        <!-- <input type="hidden" name="school_id" value="{{ $school->id }}"> -->

        <div class="bg-white border border-[#E9EBF3] rounded-[20px] shadow-md p-2 md:p-5 w-full">
            <div class="rounded-t-[20px] overflow-hidden h-[180px] md:h-[200px] bg-gray-300 mb-4">
                <img src="{{ asset($school->image) }}" alt="Branch" class="w-full h-full object-cover">
            </div>
            <div class="flex justify-between w-full rounded-[10px] bg-white px-2">
                <div class="flex flex-col justify-center">
                    <h3 class="font-semibold text-base md:text-lg mb-1">{{ $school->school_name }}</h3>
                    <p class="flex items-center text-sm text-black">
                        <span class="mr-2"><img src="{{ asset('assets/web/images/location.png') }}" class="w-[20px] h-[20px] mt-1 mr-1"></span>{{ $school->address }}
                    </p>
                    <p class="flex items-center text-sm text-black mb-2">
                        <span class="mr-2"><img src="{{ asset('assets/web/images/call.png') }}" class="w-[20px] h-[20px] mt-1 mr-1"></span>{{ $school->school_phone_1 }}
                    </p>
                </div>
                <div class="flex gap-1 justify-end">
                    <span class="flex text-yellow-500 font-medium">
                        <img src="{{ asset('assets/web/images/star.png') }}" class="w-[30px] h-[30px] mr-1">
                        <span class="ml-1 text-gray-700">5.0</span>
                    </span>
                </div>
            </div>
            <div class="flex justify-center mt-2">
                <button type="submit" class="border-[1.63px] border-[#571D99] rounded-full px-6 md:px-16 lg:px-[118.91px] py-[9.77px] text-base md:text-[16.29px] font-medium font-[Poppins] text-[#571D99] hover:bg-[#f3eaff] transition-all">
                    Select School
                </button>
            </div>
        </div>
    </form>
    @endforeach
</div>

   
</form>

   <!-- Branch Card 1 End -->
</div>
@stop
@section('js')
@stop