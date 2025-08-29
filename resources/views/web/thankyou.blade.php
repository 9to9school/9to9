@extends('layouts.web')

@section('body')

    <section class="py-12 px-4 bg-gray-100">
        <div class="max-w-4xl mx-auto">
            <div class="flex justify-center items-center">
                <div class="bg-white rounded-2xl shadow-xl p-10 w-full text-center">
                    <!-- Top Image -->
                    <div class="flex justify-center mb-6">
                        <img src="{!! asset('assets/images/thank.png') !!}" alt="tick" class="w-32 h-32 object-contain">
                    </div>

                    <!-- Thank You Heading with Icon -->
                    <div class="flex items-center justify-center gap-3 mb-4">
                        <img src="{!! asset('assets/images/thanks.png') !!}" alt="party-popper" class="w-10 h-10">
                        <h2 class="font-bold text-3xl text-gray-800">
                            Thank You for Registering <br> Your Child!
                        </h2>
                    </div>

                    <!-- Message Paragraph -->
                    <p class="text-lg text-gray-700 font-medium max-w-lg mx-auto">
                        We've received your child's admission form. Our coordinator will contact you soon to discuss the next steps.
                    </p>

                    <!-- Buttons -->
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-6 mt-10">
                        <a href="{!! url('/') !!}" class="inline-flex items-center gap-2 px-5 py-3 rounded-md text-white bg-[#571d98] hover:bg-[#4a1a85] transition">
                            <i class="fa-solid fa-arrow-left"></i> Back to Home Page
                        </a>
                        <a href="{!! url('/contact-us') !!} " class="inline-flex items-center gap-2 px-5 py-3 rounded-md text-[#571d98] border-2 border-[#7c56a7] hover:bg-[#f3eafc] transition">
                            <i class="fa-solid fa-envelope"></i> Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

 @endsection
