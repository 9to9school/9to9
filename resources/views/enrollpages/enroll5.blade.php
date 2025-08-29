@extends('layouts.web')
@section('css')
    <!-- Font Awesome for icons -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
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
            <div class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] bg-[#571D99] text-white rounded-full flex items-center justify-center text-xl sm:text-2xl border border-gray-300">
                <i class="fas fa-credit-card"></i>
            </div>

            <!-- Dotted Line -->
            <div class="flex-1 border-t border-dashed border-[#571D99] mx-2"></div>

            <!-- Step 4 -->
            <div class="w-[40px] h-[40px] sm:w-[50px] sm:h-[50px] bg-[#571D99] text-white rounded-full flex items-center justify-center text-xl sm:text-2xl border border-gray-300">
                <i class="fas fa-phone"></i>
            </div>
        </div>
    </div>

{{--    <section class="bg-white-100 py-10 px-4">--}}
{{--        <div class="max-w-5xl mx-auto space-y-10">--}}
{{--            <!-- Success Icon and Message -->--}}
{{--            <div class="text-center space-y-3">--}}
{{--                <div class="flex justify-center">--}}
{{--                    <div class="rounded-full">--}}
{{--                        <img src="{{ asset('assets/web/images/check.png') }}" class="w-[100px] h-[100px]">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <h2 class="text-2xl font-semibold">Enrollment Successful!</h2>--}}
{{--                <p class="text-gray-600">We’re excited to welcome your little one to our 9 to 9 School</p>--}}
{{--            </div>--}}

{{--            <!-- Enrollment Details -->--}}
{{--            <div class="bg-white shadow-md border border-gray-300 rounded-xl p-6 md:p-10">--}}
{{--                <h3 class="text-lg font-semibold mb-4">Enrollment Details</h3>--}}
{{--                <div class="grid grid-cols-1 text-center sm:grid-cols-2 gap-6 text-gray-700">--}}
{{--                    <div>--}}
{{--                        <p class="text-sm font-medium">Child’s Name</p>--}}
{{--                        <p class="text-base">Emma</p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <p class="text-sm font-medium">Branch</p>--}}
{{--                        <p class="text-base">Sunshine Valley Preschool</p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <p class="text-sm font-medium">Selected Plan</p>--}}
{{--                        <p class="text-base">Full-Day Program</p>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <p class="text-sm font-medium">Payment ID</p>--}}
{{--                        <p class="text-base">PAY12345</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- App Promo Section -->--}}
{{--            <div class="bg-white shadow-md border border-gray-300 rounded-xl p-6 md:p-8 flex flex-col justify-center md:flex-row items-center md:items-start gap-6">--}}
{{--                <!-- Text Content -->--}}
{{--                <div class="flex-1 space-y-4">--}}
{{--                    <h3 class="text-xl font-semibold">Stay Connected with Our Mobile App</h3>--}}
{{--                    <p class="text-gray-600">Download our mobile app to track your child’s activities, receive updates, and communicate with teachers.</p>--}}
{{--                    <div class="flex gap-3">--}}
{{--                        <a href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" class="h-12" alt="Get it on Google Play" /></a>--}}
{{--                        <a href="#"><img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" class="h-12" alt="Download on the App Store" /></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- App Images -->--}}
{{--                <div class="flex gap-4 justify-center md:justify-end">--}}
{{--                    <img src="{!! asset('assets/web/images/home/phone2.png') !!}"--}}
{{--                         class="rounded-xl h-60"--}}
{{--                         alt="Mobile App 1" />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <div class="max-w-5xl mx-auto flex flex-col gap-10">
        <!-- Enrollment Success Box -->
        <div class="bg-white rounded-xl p-8 flex flex-col items-center gap-6">
            <div class="text-green-500 text-5xl">
                <img src="{{ asset('assets/web/images/check.png') }}" class="w-[90px] h-[90px]">
            </div>
            <div class="text-center">
                <h1 class="text-2xl font-semibold mb-2">Enrollment Successful!</h1>
                <p class="text-gray-600">We're excited to welcome your little one to our 9 to 9 School</p>
            </div>

            <!-- Enrollment Details -->
            <div class="w-full bg-white border border-gray-300 rounded-xl p-6 shadow-sm">
                <div class="flex flex-col sm:flex-row justify-between gap-6 text-gray-700 text-center">
                    <div class="flex flex-col gap-6 w-full sm:w-1/2">
                         <h2 class="text-xl font-medium mb-6 text-center">Enrollment Details</h2>
                    </div>
                    <div class="flex flex-col gap-6 w-full sm:w-1/2"></div>
                </div>
                <div class="flex flex-col sm:flex-row justify-between gap-6 text-gray-700 text-center">
                    <!-- Left Column -->
                    <div class="flex flex-col gap-6 w-full sm:w-1/2">
                        <div>
                            <p class="text-lg font-semibold">Child's Name</p>
                            <p class="font-medium text-sm">Emma</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Selected Plan</p>
                            <p class="font-medium text-sm">Full-Day Program</p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="flex flex-col gap-6 w-full sm:w-1/2">
                        <div>
                            <p class="text-lg font-semibold">Branch</p>
                            <p class="font-medium text-sm">Sunshine Valley Preschool</p>
                        </div>
                        <div>
                            <p class="text-lg font-semibold">Payment ID</p>
                            <p class="font-medium text-sm">PAY12345</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile App Promotion Box -->
        <div class="bg-white border border-gray-300 rounded-xl shadow-md p-8 flex flex-col lg:flex-row items-center gap-8">
            <!-- Text Content -->
            <div class="flex-1">
                <h2 class="text-3xl font-semibold mb-4">Stay Connected with Our Mobile App</h2>
                <p class="text-gray-600 text-base mb-4">
                    Download our mobile app to track your child’s activities, receive updates, and communicate with teachers.
                </p>
                <div class="flex justify-center lg:justify-start gap-4">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Google_Play_Store_badge_EN.svg/512px-Google_Play_Store_badge_EN.svg.png" class="w-36" alt="Google Play" />
                    <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" class="w-32" alt="App Store" />
                </div>
            </div>

            <!-- Phone Images -->
            <div class="flex-1 flex justify-center gap-4">
                <img src="{!! asset('assets/web/images/home/phone2.png') !!}" class="rounded-lg">
            </div>
        </div>
    </div>
@stop
@section('js')

@stop