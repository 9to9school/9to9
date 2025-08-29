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
    <!-- Navigation Icons -->
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
            <div class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] bg-[#571D99] text-white rounded-full flex items-center justify-center text-xl sm:text-2xl border border-gray-300">
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

    <!-- Main Container -->
    <div class="max-w-[90%] sm:max-w-[80%] lg:max-w-[1243px] mx-auto mt-6 sm:mt-10 border-2 border-[#E9EBF3] rounded-xl px-4 sm:px-8 lg:px-[91px] py-6 sm:py-8 lg:py-[42px]">
        <!-- Title -->
        <div class="text-center mb-6 sm:mb-10">
            <h2 class="text-xl sm:text-2xl font-semibold text-gray-800">Fee Structure</h2>
            <p class="text-gray-600 mt-2 text-sm sm:text-base">
                Choose the plan that best fits your needs at 9 to 9 School. All plans include quality childcare, educational activities, and nutritious meals.
            </p>
        </div>

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 sm:gap-8 lg:gap-[82px] max-w-full lg:max-w-[1061px] mx-auto">
            <!-- Card 1: Registration Fee -->
            <div class="w-full bg-[#FFF0E5] border-2 border-[#D9D9D9] rounded-2xl px-4 sm:px-6  py-4 sm:py-5 shadow-md flex flex-col">
                <div class="flex">
                    <div class="text-left sm:text-center">
                        <h3 class="text-base sm:text-xl text-left font-bold text-gray-700 mb-3 sm:mb-4">Pay Registration Fee Now</h3>
                        <ul class="space-y-5 text-sm sm:text-lg leading-[20px] sm:leading-[40px] text-gray-700">
                            <li class="flex">
                                <img src="{{ asset('assets/web/images/icon1.png') }}" class="w-[28px] h-[28px] mt-1 mr-2"> Pay the $100 registration fee now
                            </li>
                            <li class="flex">
                                <img src="{{ asset('assets/web/images/icon2.png') }}" class="w-[28px] h-[28px] mt-1 mr-2"> First month’s tuition due at orientation
                            </li>
                            <li class="flex">
                                <img src="{{ asset('assets/web/images/icon3.png') }}" class="w-[28px] h-[28px] mt-1 mr-2"> Immediate enrollment confirmation
                            </li>
                            <li class="flex">
                                <img src="{{ asset('assets/web/images/icon4.png') }}" class="w-[28px] h-[28px] mt-1 mr-2"> Secure your child’s spot in class
                            </li>
                        </ul>
                    </div>
                </div>
                <button class="mt-4 sm:mt-6 bg-purple-700 text-white py-2 px-4 rounded-lg hover:bg-purple-800 transition text-sm sm:text-base">
                    Pay $100 Registration Fee
                </button>
            </div>

            <!-- Card 2: Full Time Program -->
            <div class="w-full bg-white border-2 border-[#D9D9D9] rounded-2xl px-4 sm:px-6 lg:px-[40.86px] py-4 sm:py-5 lg:py-[20.43px] shadow-md flex flex-col justify-between">
                <div>
                    <h3 class="sm:text-xl text-left font-bold text-gray-700 mb-2">Full – Time Program</h3>
                    <p class="text-base mb-2">Perfect for families seeking comprehensive weekday care</p>
                    <p class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">
                        $5000<span class="text-xs sm:text-sm font-normal text-gray-600">/per month</span>
                    </p>
                    <ul class="space-y-2 leading-[30px] sm:leading-[40px] text-xs sm:text-base text-gray-700">
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon1.png') }}" class="w-[25px] h-[25px] mr-2"> All meals included
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon2.png') }}" class="w-[25px] h-[25px] mr-2"> Nap time supervision
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon3.png') }}" class="w-[25px] h-[25px] mr-2"> Weekly progress reports
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon4.png') }}" class="w-[25px] h-[25px] mr-2"> Comprehensive curriculum
                        </li>
                    </ul>
                </div>
                <button class="mt-4 sm:mt-6 bg-purple-700 text-white py-2 px-4 rounded-lg hover:bg-purple-800 transition text-sm sm:text-base">
                    Select Plan
                </button>
            </div>

            <!-- Card 3: Full Time Program -->
            <div class="w-full bg-white border-2 border-[#D9D9D9] rounded-2xl px-4 sm:px-6 lg:px-[40.86px] py-4 sm:py-5 lg:py-[20.43px] shadow-md flex flex-col justify-between">
                <div>
                    <h3 class="sm:text-xl text-left font-bold text-gray-700 mb-2">Full – Time Program</h3>
                    <p class="text-base mb-2">Perfect for families seeking comprehensive weekday care</p>
                    <p class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">
                        $5000<span class="text-xs sm:text-sm font-normal text-gray-600">/per month</span>
                    </p>
                    <ul class="space-y-2 leading-[30px] sm:leading-[40px] text-xs sm:text-base text-gray-700">
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon1.png') }}" class="w-[25px] h-[25px] mr-2"> All meals included
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon2.png') }}" class="w-[25px] h-[25px] mr-2"> Nap time supervision
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon3.png') }}" class="w-[25px] h-[25px] mr-2"> Weekly progress reports
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon4.png') }}" class="w-[25px] h-[25px] mr-2"> Comprehensive curriculum
                        </li>
                    </ul>
                </div>
                <button class="mt-4 sm:mt-6 bg-purple-700 text-white py-2 px-4 rounded-lg hover:bg-purple-800 transition text-sm sm:text-base">
                    Select Plan
                </button>
            </div>

            <!-- Card 4: Full Time Program -->
            <div class="w-full bg-white border-2 border-[#D9D9D9] rounded-2xl px-4 sm:px-6 lg:px-[40.86px] py-4 sm:py-5 lg:py-[20.43px] shadow-md flex flex-col justify-between">
                <div>
                    <h3 class="sm:text-xl text-left font-bold text-gray-700 mb-2">Full – Time Program</h3>
                    <p class="text-base mb-2">Perfect for families seeking comprehensive weekday care</p>
                    <p class="text-lg sm:text-xl font-bold text-gray-800 mb-2 sm:mb-3">
                        $5000<span class="text-xs sm:text-sm font-normal text-gray-600">/per month</span>
                    </p>
                    <ul class="space-y-2 leading-[30px] sm:leading-[40px] text-xs sm:text-base text-gray-700">
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon1.png') }}" class="w-[25px] h-[25px] mr-2"> All meals included
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon2.png') }}" class="w-[25px] h-[25px] mr-2"> Nap time supervision
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon3.png') }}" class="w-[25px] h-[25px] mr-2"> Weekly progress reports
                        </li>
                        <li class="flex items-center">
                            <img src="{{ asset('assets/web/images/icon4.png') }}" class="w-[25px] h-[25px] mr-2"> Comprehensive curriculum
                        </li>
                    </ul>
                </div>
                <button class="mt-4 sm:mt-6 bg-purple-700 text-white py-2 px-4 rounded-lg hover:bg-purple-800 transition text-sm sm:text-base">
                    Select Plan
                </button>
            </div>
        </div>
        <div class="grid grid-cols-2 sm:flex flex-col sm:flex-row items-center justify-between gap-2 sm:gap-2 mt-6 sm:mt-10 px-16 md:px-20">
            <a href="{{url('/enroll3')}}" class="bg-white border border-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-100 transition-colors duration-300 text-sm sm:text-base text-center">
                Previous
            </a>
            <a href="{{url('/enroll4')}}" class="bg-purple-700 text-white px-6 py-2 rounded-lg hover:bg-purple-800 transition-colors duration-300 text-sm sm:text-base text-center">
                Next
            </a>
        </div>
    </div>
@stop

@section('js')
@stop
