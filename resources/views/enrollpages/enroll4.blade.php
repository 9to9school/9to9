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
    <div class="bg-white flex items-center justify-center p-4">
        <div class="w-full max-w-6xl space-y-6">
            <!-- Proceed to Payment Card -->
            <div class="flex items-start gap-4 p-8 border rounded-xl shadow-sm hover:shadow-md transition duration-200">
                <div class="text-red-600 text-3xl">
                    <!-- Credit card icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18a2 2 0 012 2v8a2 2 0 01-2 2H3a2 2 0 01-2-2V8a2 2 0 012-2z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Proceed to Payment</h3>
                    <p class="text-sm text-gray-600 mt-1">Secure your spot now by making the payment online</p>
                </div>
            </div>
            <!-- Talk to a Counsellor Card -->
            <div class="flex items-start gap-4 p-6 border rounded-xl shadow-sm hover:shadow-md transition duration-200">
                <div class="text-blue-600 text-3xl">
                    <!-- Phone icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a2 2 0 011.91 1.41l.56 2.19a2 2 0 01-.45 1.91l-1.1 1.1a16.02 16.02 0 006.36 6.36l1.1-1.1a2 2 0 011.91-.45l2.19.56A2 2 0 0121 18.72V21a2 2 0 01-2 2h-1C9.82 23 1 14.18 1 3V2a1 1 0 011-1h1z" />
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">Talk to a counsellor</h3>
                    <p class="text-sm text-gray-600 mt-1">Schedule a call with our education counsellor to discuss further</p>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop
