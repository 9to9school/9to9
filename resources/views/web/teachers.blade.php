@extends('layouts.web')

@section('css')
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"/>

    <style>
     #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }


        @media (max-width: 768px) {
            .teachersbanner{
                height:unset;
            }

            .teacher_desc{
                text-align: center !important;
            }
            h3.text-lg.font-semibold.text-gray-800.mb-2 {
                text-align: center;
            }
            p.text-gray-600.text-sm {
                text-align: center;
            }
        }
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }
    </style>
@stop
@section('body')
    <!-- Why Choose Us Section -->
    <section id="main-content" class="relative px-4 sm:px-6 lg:px-8 py-16 min-h-[500px] flex items-center justify-center">

        <!-- Background Image -->
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset($teacher->banner_image) }}" alt="Background" class="w-full h-full object-cover" />
        </div>

        <!-- Black Overlay -->
        <div class="absolute inset-0 bg-black/50 -z-10"></div>

        <!-- Content -->
        <div class="max-w-5xl w-full mx-auto text-center space-y-6 px-4">
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white leading-tight">
                {{ $teacher->banner_heading }} <br>
{{--                <span class="text-cyan-400">{{ $about->banner_sub_heading }}</span>--}}
            </h1>

            <p class="text-white font-medium text-base sm:text-lg md:text-xl lg:text-2xl">
                {{ $teacher->banner_para }}
            </p>

            <!-- Optional CTA Button -->
        <!--<button class="bg-cyan-400 text-white font-semibold text-base sm:text-lg md:text-xl px-6 py-3 rounded-lg hover:bg-cyan-500 transition duration-300">
            {{ $teacher->btn_name }}
            </button>
        </div>-->
    </section>

    <section class="py-16 bg-white flex justify-center">
        <div class="w-full max-w-[1190px] px-4 sm:px-6 lg:px-8 flex flex-col items-center gap-16">
            <!-- Heading Section -->
            <div class="flex flex-col items-center gap-8">
                <div class="text-center">
                    <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">{{$teacher->why_apply_heading}}</h2>
                    <p class="text-gray-600">
                        {{$teacher->why_apply_para}}
                    </p>
                </div>

                <!-- Card Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Card 1 -->
                    @foreach($data as $row)
                        <div class="bg-white text-left rounded-2xl shadow-md p-2 pb-4">
                            <img src="{{asset($row->image)}}"
                                 alt="Flexible Working Hours"
                                 class="w-full h-48 object-cover rounded-md mb-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{$row->title}}</h3>
                            <p class="text-gray-600 text-sm">{{$row->description}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


    <section class="bg-white py-16 px-4 md:px-8">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{$teacher->works_heading}}</h2>
            <p class="text-gray-600 max-w-xl mx-auto mb-12">
                {{$teacher->works_para}}
            </p>

            <div class="flex flex-col md:flex-row justify-center items-start gap-12 md:gap-20">
                <!-- Step 1 -->
                <div class="flex flex-col items-center text-center max-w-sm relative">
                    <div class="bg-cyan-400 text-white text-2xl font-semibold rounded-full w-16 h-16 flex items-center justify-center">
                        1
                    </div>
                    <div class="w-px h-10 bg-gray-400 my-2"></div> <!-- Vertical line -->
                    <h3 class="text-lg font-semibold mb-2">{{$teacher->works_subheading1}}</h3>
                    <p class="text-gray-600">
                        {{$teacher->works_para1}}
                    </p>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center text-center max-w-sm relative">
                    <div class="bg-cyan-400 text-white text-2xl font-semibold rounded-full w-16 h-16 flex items-center justify-center">
                        2
                    </div>
                    <div class="w-px h-10 bg-gray-400 my-2"></div> <!-- Vertical line -->
                    <h3 class="text-lg font-semibold mb-2">{{$teacher->works_subheading2}}</h3>
                    <p class="text-gray-600">
                        {{$teacher->works_para2}}
                    </p>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center text-center max-w-sm relative">
                    <div class="bg-cyan-400 text-white text-2xl font-semibold rounded-full w-16 h-16 flex items-center justify-center">
                        3
                    </div>
                    <div class="w-px h-10 bg-gray-400 my-2"></div> <!-- Vertical line -->
                    <h3 class="text-lg font-semibold mb-2">{{$teacher->works_subheading3}}</h3>
                    <p class="text-gray-600">
                        {{$teacher->works_para3}}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <div class="max-w-[1196px] mb-4 mx-auto p-[40px_34px] bg-[#F4F9FE] rounded-[12px] flex flex-col md:flex-row items-center gap-[64px]">
        <!-- Text Section -->
        <div class="flex items-center justify-center px-4">
            <div class="w-full md:w-[490px] h-[166px] flex flex-col justify-center gap-[22px]">
                <h2 class="text-left text-[22px] md:text-[24px] font-semibold text-gray-900">
                    {{$teacher->journey_heading}}
                </h2>
                <p class="text-gray-600 text-sm leading-relaxed">
                    {{$teacher->journey_para}}
                </p>
            </div>
        </div>

        <!-- Image Section -->
        <div class="w-full md:w-[574px] h-[166px] bg-[#D9D9D9] rounded-[12px] overflow-hidden">
            <img src="{{asset($teacher->journey_image)}}"
                 alt="Students" class="w-full h-full object-cover" />
        </div>
    </div>

    <div class="max-w-[1086px] mx-auto bg-white border border-[#D9D9D9] rounded-[12px] px-6 md:px-[81px] py-6 md:py-[24px] space-y-[38px] font-[Poppins]">
        <!-- Title -->
        <div class="text-center space-y-2">
            <h2 class="text-2xl md:text-3xl font-bold">{{$teacher->position_heading}}</h2>
            <p class="text-sm text-gray-600"> {{$teacher->position_para}}</p>
        </div>

        <!-- Tabs -->
       <!-- <div class="flex flex-wrap justify-center gap-4">
            <button class="bg-[#0AC0DF] text-white px-6 py-3 rounded-[10px] text-sm md:text-base">Primary School</button>
            <button class="bg-white text-black border border-gray-300 px-6 py-3 rounded-[10px] text-sm md:text-base">Secondary School</button>
            <button class="bg-white text-black border border-gray-300 px-6 py-3 rounded-[10px] text-sm md:text-base">Senior School</button>
        </div>-->

        <!-- Job Cards -->
        <div class="space-y-4 md:space-y-4">
            <!-- Job Item -->
            <div class="flex items-center justify-between border border-gray-200 rounded-xl p-3">
                <span class="text-sm md:text-lg font-medium">Class Teacher - Grade 1-5</span>
               <a href="#" data-title="Physical Education Teacher"
   data-bs-toggle="modal" 
   data-bs-target="#enquiryModal"
   class="bg-[#0AC0DF] text-white px-5 py-2 rounded-[10px] text-sm md:text-base hover:bg-opacity-90 transition">
   Apply Here
</a>
            </div>

            <div class="flex items-center justify-between border border-gray-200 rounded-xl  p-3 ">
                <span class="text-sm md:text-lg font-medium">Art Teacher</span>
                
                
                 <a href="#" data-title="Physical Education Teacher"
   data-bs-toggle="modal" 
   data-bs-target="#enquiryModal"
   class="bg-[#0AC0DF] text-white px-5 py-2 rounded-[10px] text-sm md:text-base hover:bg-opacity-90 transition">
   Apply Here
</a>
            </div>

            <div class="flex items-center justify-between border border-gray-200 rounded-xl p-3">
                <span class="text-sm md:text-lg font-medium">Physical Education Teacher</span>
               <a href="#" data-title="Physical Education Teacher"
   data-bs-toggle="modal" 
   data-bs-target="#enquiryModal"
   class="bg-[#0AC0DF] text-white px-5 py-2 rounded-[10px] text-sm md:text-base hover:bg-opacity-90 transition">
   Apply Here
</a>
            </div>
        </div>

        <!-- Open Application -->
        <div class="text-center space-y-4">
            <p class="text-sm text-gray-600">Don't see a position that matches your expertise? We’d still love to hear from you!</p>
            <!--<button class="bg-[#0AC0DF] text-white px-6 py-3 rounded-[10px] text-sm md:text-base">Submit Open Application</button>-->
            
           <!-- <a href="#" data-title="Physical Education Teacher"
   data-bs-toggle="modal" 
   data-bs-target="#enquiryModal"
   class="bg-[#0AC0DF] text-white px-6 py-3 rounded-[10px] text-sm md:text-base hover:bg-opacity-90 transition">
   Submit Open Application
</a>-->
        </div>
    </div>

    <div class="max-w-3xl mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center mb-4">{{$teacher->faq_heading}}</h2>
        <p class="text-center text-gray-500 dark:text-gray-400 mb-10">
            {{$teacher->faq_para}}
        </p>

        <div id="accordion" class="space-y-4">
            @forelse ($faqs as $index => $faq)
                <div class="border rounded-xl shadow-md dark:border-gray-700">
                    <button type="button"
                            class="accordion-btn w-full flex justify-between items-center px-4 py-3 text-left font-medium text-base text-gray-800 dark:text-gray-200 focus:outline-none"
                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                        {{ $faq->name }}
                        <svg class="icon w-7 h-7 p-1 text-white bg-[#0AC0DF] rounded-full transition-transform duration-300 transform {{ $index == 0 ? 'rotate-180' : '' }}"
                             xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="accordion-content {{ $index == 0 ? '' : 'hidden' }} px-4 pb-4 text-sm text-gray-600 dark:text-gray-300">
                        {{ $faq->description }}
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No FAQs found for this page.</p>
            @endforelse

{{--            <!-- Accordion Item 1 -->--}}
{{--            <div class="border rounded-xl shadow-md dark:border-gray-700">--}}
{{--                <button type="button"--}}
{{--                        class="accordion-btn w-full flex justify-between items-center px-4 py-3 text-left font-medium text-base text-gray-800 dark:text-gray-200 focus:outline-none"--}}
{{--                        aria-expanded="true">--}}
{{--                    What is the working schedule?--}}
{{--                    <svg class="icon w-7 h-7 p-1 text-white bg-[#0AC0DF] rounded-full transition-transform duration-300 transform rotate-180"--}}
{{--                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                         stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                              d="M19 9l-7 7-7-7"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--                <div class="accordion-content px-4 pb-4 text-sm text-gray-600 dark:text-gray-300">--}}
{{--                    Our school operates from 9 AM to 9 PM. Teachers can choose flexible shifts within this timeframe that best suit their schedule and lifestyle. Both full-time and part-time positions are available.--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Accordion Item 2 -->--}}
{{--            <div class="border rounded-xl shadow-md dark:border-gray-700">--}}
{{--                <button type="button"--}}
{{--                        class="accordion-btn w-full flex justify-between items-center px-4 py-3 text-left font-medium text-base text-gray-800 dark:text-gray-200 focus:outline-none"--}}
{{--                        aria-expanded="false">--}}
{{--                    Do I need prior teaching experience?--}}
{{--                    <svg class="icon w-7 h-7 p-1 text-gray-800 rounded-full transition-transform duration-300 transform"--}}
{{--                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                         stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                              d="M19 9l-7 7-7-7"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--                <div class="accordion-content hidden px-4 pb-4 text-sm text-gray-600 dark:text-gray-300">--}}
{{--                    No, prior experience is not mandatory. We provide training to all new teachers.--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Accordion Item 3 -->--}}
{{--            <div class="border rounded-xl shadow-md dark:border-gray-700">--}}
{{--                <button type="button"--}}
{{--                        class="accordion-btn w-full flex justify-between items-center px-4 py-3 text-left font-medium text-base text-gray-800 dark:text-gray-200 focus:outline-none"--}}
{{--                        aria-expanded="false">--}}
{{--                    What benefits do I get?--}}
{{--                    <svg class="icon w-7 h-7 p-1 text-gray-800 rounded-full transition-transform duration-300 transform"--}}
{{--                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                         stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                              d="M19 9l-7 7-7-7"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--                <div class="accordion-content hidden px-4 pb-4 text-sm text-gray-600 dark:text-gray-300">--}}
{{--                    Benefits include paid training, flexible hours, health insurance, and performance bonuses.--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Accordion Item 4 -->--}}
{{--            <div class="border rounded-xl shadow-md dark:border-gray-700">--}}
{{--                <button type="button"--}}
{{--                        class="accordion-btn w-full flex justify-between items-center px-4 py-3 text-left font-medium text-base text-gray-800 dark:text-gray-200 focus:outline-none"--}}
{{--                        aria-expanded="false">--}}
{{--                    How long does the hiring process take?--}}
{{--                    <svg class="icon w-7 h-7 p-1 text-gray-800 rounded-full transition-transform duration-300 transform"--}}
{{--                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"--}}
{{--                         stroke="currentColor">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"--}}
{{--                              d="M19 9l-7 7-7-7"/>--}}
{{--                    </svg>--}}
{{--                </button>--}}
{{--                <div class="accordion-content hidden px-4 pb-4 text-sm text-gray-600 dark:text-gray-300">--}}
{{--                    Typically, it takes about 1 to 2 weeks after your initial application.--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>

    <section class="w-full bg-white px-4 py-10 lg:py-16">
        <div class="max-w-[1299px] mx-auto flex flex-col lg:flex-row gap-[69px]">
            <!-- Left Section -->
            <div class="lg:w-[572px] w-full space-y-[32px]">
                <div class="space-y-[27px]">
                    <div>
                        <h2 class="text-left text-3xl font-bold mb-2">{{$teacher->apply_heading}}</h2>
                        <p class="text-gray-600">{{$teacher->apply_para}}</p>
                    </div>
                    <img src="{{asset($teacher->apply_image)}}" alt="Interview Image" class="rounded-xl w-full h-auto object-cover max-h-[300px]" />
                </div>

                <!-- What Happens Next -->
                <div class="bg-[#F9F9FF] p-6 rounded-xl space-y-4">
                    <h3 class="text-xl font-semibold">{{$heading}}</h3>
                    <ul class="space-y-4">
                        @foreach($steps as $key=>$step)
                        <li class="flex items-start gap-4">
                            <div class="w-8 h-8 bg-[#0AC0DF] text-white rounded-full flex items-center justify-center text-sm font-bold shrink-0">
                                {{$key + 1}}
                            </div>
                            <p>{{$step}}</p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Right Section - Form -->
            <div class="w-full lg:w-[659px] bg-white rounded-xl p-6 space-y-6 shadow-[8px_8px_20px_0px_rgba(0,0,0,0.08)]">
                <h3 class="text-2xl font-semibold">Application Form</h3>
                 @if (session('success'))
                        <div class="alert alert-success bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                            {{ session('error') }}
                        </div>
                    @endif

                <!-- enquiry form -->
                <!-- enquiry form -->
                <!-- Enquiry Form -->
            <main class="container mx-auto">
                <div class="max-w-2xl mx-auto">
                   

                    <form class="space-y-6" method="POST" action="{{ route('apply.save') }}"  enctype="multipart/form-data">
                        <input type="hidden" name="page" value="teacher">
                        @csrf
                        <!-- Full Name -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" name="fullname" placeholder="Full Name" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent bg-white/50 transition-all duration-300" required>
                        </div>
                        <!-- Email ID -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Email ID</label>
                            <input type="email" name="email" placeholder="Email ID" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent bg-white/50 transition-all duration-300" required>
                        </div>
                        <!-- Phone Number -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Phone Number</label>
                            <input type="tel"   minlength="10" maxlength="13"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="phone_number" placeholder="Phone Number" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent bg-white/50 transition-all duration-300" required>
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Pin Code</label>
                            <input type="number" name="pin_code" min="100000" max="999999" placeholder="Pin Code" id="pin_code1" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent bg-white/50 transition-all duration-300" required>
                        </div>
                        <!-- Select State & City -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">State</label>
                                <input type="text" name="state" placeholder="State" id="state1" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent bg-white/50 transition-all duration-300" required>
                            </div>
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">City</label>
                                <input type="text" name="city" placeholder="City"  id="city1" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent bg-white/50 transition-all duration-300" required>
                            </div>
                        </div>
                        <!-- Message -->
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">Upload Resume</label>
                            <input type="file" name="resume" class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-400 focus:border-transparent bg-white/50 transition-all duration-300" required>
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="block w-fit mx-auto px-8 py-3 bg-gradient-to-r from-cyan-400 to-blue-500 text-white font-semibold rounded-lg hover:from-cyan-500 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 shadow-md">
                            Submit
                        </button>
                    </form>
                </div>
            </main>

            </div>

        </div>
    </section>
    
    
    
<!-- Modal -->
<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content rounded-2xl shadow-2xl overflow-hidden border-0">
      
      <!-- Modal Header with Gradient -->
      <div class="modal-header bg-gradient-to-r from-cyan-500 to-blue-500 px-6 py-5">
        <h5 class="modal-title text-2xl font-bold text-white" id="enquiryModalLabel">Apply for Teacher Vacancy</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <!-- Modal Body -->
      <div class="modal-body bg-gray-50 p-6 md:p-8">
        <form class="space-y-6" method="POST" action="{{ route('apply.save') }}"  enctype="multipart/form-data">
          <input type="hidden" name="page" value="teacher-application">
          <input type="hidden" name="service_title" id="serviceTitleInput">
          @csrf

          <!-- Full Name -->
          <div>
            <label class="block mb-1 font-semibold text-gray-700">Full Name</label>
            <input type="text" name="fullname" value="{{ old('fullname') }}" required minlength="3" maxlength="30"
              placeholder="John Doe" required
              onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
              class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-white shadow-sm">
            @error('fullname')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Email -->
          <div>
            <label class="block mb-1 font-semibold text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" required
              placeholder="you@example.com"
              class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-white shadow-sm">
            @error('email')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Phone Number -->
          <div>
            <label class="block mb-1 font-semibold text-gray-700">Phone Number</label>
            <input type="tel" name="phone_number" value="{{ old('phone_number') }}" minlength="10" maxlength="13"
              onkeypress="return event.charCode >= 48 && event.charCode <= 57" required
              placeholder="e.g. 9876543210"
              class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-white shadow-sm">
            @error('phone_number')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>


          <!-- Pin Code -->
          <div>
            <label class="block mb-1 font-semibold text-gray-700">Pin Code</label>
            <input type="number" name="pin_code" value="{{ old('pin_code') }}"  min="100000" max="999999" id="pin_code"
              placeholder="e.g. 4510008" required
              class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-white shadow-sm">
            @error('pin_code')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- State & City -->
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block mb-1 font-semibold text-gray-700">State</label>
              <input type="text" name="state" value="{{ old('state') }}"
                placeholder="e.g. Maharashtra"
                onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)" id="state" required
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-white shadow-sm">
              @error('state')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label class="block mb-1 font-semibold text-gray-700">City</label>
              <input type="text" name="city" value="{{ old('city') }}"
                placeholder="e.g. Pune" id="city"
                onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)" required
                class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-white shadow-sm">
              @error('city')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <!-- Resume Upload -->
          <div>
            <label class="block mb-1 font-semibold text-gray-700">Upload Resume</label>
            <input type="file" name="resume" required accept=".pdf,.doc,.docx" required
              class="w-full px-5 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-cyan-500 bg-white shadow-sm">
            @error('message')
              <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Submit Button -->
          <div class="text-center pt-4">
            <button type="submit"
              class="inline-block px-10 py-3 bg-gradient-to-r from-cyan-500 to-blue-500 hover:from-cyan-600 hover:to-blue-600 text-white font-semibold rounded-full shadow-lg transition-all duration-300">
              Submit Application
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

@stop
@section('js')
    <script>
        const accordionBtns = document.querySelectorAll('.accordion-btn');

        accordionBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const isOpen = btn.getAttribute('aria-expanded') === 'true';

                // Close all
                accordionBtns.forEach(b => {
                    b.setAttribute('aria-expanded', 'false');
                    b.nextElementSibling.classList.add('hidden');

                    const icon = b.querySelector('svg');
                    icon.classList.remove('rotate-180', 'bg-[#0AC0DF]', 'text-white');
                    icon.classList.add('text-gray-800');
                });

                // Open the clicked one if it was not already open
                if (!isOpen) {
                    btn.setAttribute('aria-expanded', 'true');
                    btn.nextElementSibling.classList.remove('hidden');

                    const icon = btn.querySelector('svg');
                    icon.classList.add('rotate-180', 'bg-[#0AC0DF]', 'text-white');
                    icon.classList.remove('text-gray-800');
                }
            });
        });
    </script>
    <script>
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('enquiryModal');
    const titleInput = document.getElementById('serviceTitleInput');

    modal.addEventListener('show.bs.modal', function (event) {
      const trigger = event.relatedTarget;
      const title = trigger?.getAttribute('data-title') || '';
      if (titleInput) titleInput.value = title;
    });
  });
</script>
<script>
    document.getElementById('pin_code').addEventListener('keyup', function () {
        const pincode = this.value;

        if (pincode.length === 6) {
            fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                .then(response => response.json())
                .then(data => {
                    if (data[0].Status === "Success") {
                        const postOffice = data[0].PostOffice[0];
                        document.getElementById('city').value = postOffice.District;
                        document.getElementById('state').value = postOffice.State;
                    } else {
                        document.getElementById('city').value = '';
                        document.getElementById('state').value = '';
                        alert('Invalid Pincode or Data Not Found');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong. Please try again.');
                });
        }
    });


      document.getElementById('pin_code1').addEventListener('keyup', function () {
        const pincode = this.value;

        if (pincode.length === 6) {
            fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                .then(response => response.json())
                .then(data => {
                    if (data[0].Status === "Success") {
                        const postOffice = data[0].PostOffice[0];
                        document.getElementById('city1').value = postOffice.District;
                        document.getElementById('state1').value = postOffice.State;
                    } else {
                        document.getElementById('city1').value = '';
                        document.getElementById('state1').value = '';
                        alert('Invalid Pincode or Data Not Found');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong. Please try again.');
                });
        }
    });
</script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop
