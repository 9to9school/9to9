@extends('layouts.web')
@section('css')
<title>Contact 9to9 School | Preschool Admission Enquiry & Location Details</title>
<meta name="description" content="Get in touch with 9to9 School for preschool admission details, location information, and direct contact with our team. Reach out to learn more about our programs and how to enroll your child in the best early education center.">
<meta name="keywords" content="contact 9to9 School, preschool contact details, talk to admission team, preschool location India, preschool enquiry form, best preschool contact number, get in touch with preschool, early education contact, preschool admission support, preschool location details">

<meta property="og:title" content="Contact 9to9 School | Preschool Admission Enquiry & Location Details">
<meta property="og:description" content="Get in touch with 9to9 School for preschool admission details, location information, and direct contact with our team.">
<meta property="og:url" content="https://www.9to9school.com/contact-us">
<meta property="og:type" content="website">
<meta property="og:image" content="https://9to9school.com/assets/images/contact-us-og.jpg"> <!-- Replace with actual image -->

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Contact 9to9 School | Preschool Admission Enquiry & Location Details">
<meta name="twitter:description" content="Reach out to 9to9 School for preschool admission info and location details. Connect with our admission team today.">
<meta name="twitter:image" content="https://9to9school.com/assets/images/contact-us-twitter.jpg"> <!-- Replace with actual image -->

@stop
@section('body')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <style>
        .hero-section {
            position: relative;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 20px;
        }
        .hero-bg {
            position: absolute;
            inset: 0;
            z-index: -10;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: -5;
        }

        @media (max-width: 767px) {
            .hero-section {
                padding: 20px;
                text-align: center;
            }
            .hero-section h1 {
                font-size: 32px;
            }
            .hero-section p {
                font-size: 16px;
            }
            .newsletter-content {
                margin-right: 0px;
            }
        }
    </style>

    <main id="main-content"  class="hero-section">
        <img src="{{ asset('assets/web/images/events/bg.png') }}" alt="Background" class="hero-bg" />
        <div class="hero-overlay"></div>

        <div class="text-center text-white">
            <h1 class="fw-bold display-5">
                Empowering Futures at <br />
                <span class="text-info">9 to 9 School</span>
            </h1>
            <p class="lead mt-3">
                Our 9-to-9 approach gives you the flexibility to learn on your
            </p>
            <!--<button class="btn btn-info mt-4 text-white px-4 py-2 fw-semibold">-->
            <!--    More About Us-->
            <!--</button>-->
        </div>
    </main>
    <div class="contact-section py-5 flex justify-center items-center text-center">
        <div class="container">
            <!-- Contact Cards -->
            <div class="contact-cards flex flex-wrap justify-center gap-10">
                <div class="card bg-sky-100 p-5 rounded-lg shadow-md w-64"  style="background-color: #DCF1FD;border: 0px">
                    <div class="icon text-black-500 text-3xl mb-3"><i class="fas fa-phone"></i></div>
                    <h4 class="text-lg font-semibold">Contact Phone Number</h4>
                    <p>+91 99903 18880</p>
                    <p>+91 99181 90555</p>
                     <p>+91 92118 44103</p>
                </div>
                <div class="card bg-sky-100 p-5 rounded-lg shadow-md w-64" style="background-color: #DCF1FD;border: 0px">
                    <div class="icon text-black-500 text-3xl mb-3"><i class="fas fa-envelope"></i></div>
                    <h4 class="text-lg font-semibold">Our Email Address</h4>
                    <p>admin@9to9school.com</p>
                    <p>info@9to9school.com</p>
                </div>
                <!-- <div class="card bg-sky-100 p-5 rounded-lg shadow-md w-64" style="background-color: #DCF1FD;border: 0px">
                    <div class="icon text-black-500 text-3xl mb-3"><i class="fas fa-map-marker-alt"></i></div>
                    <h4 class="text-lg font-semibold">Our Location</h4>
                    <p>1/184, opposite First CRY Showroom, Sector 1,</p>
                    <p>Vikas Nagar, Lucknow</p>
                </div> -->
                
            </div>

            <!-- Contact Main Section -->
            <div class="contact-main flex flex-wrap justify-center items-center gap-8 mt-10">
                <div class="contact-imgs">
                    <img src="https://9to9school.com/assets/images/about/sec1/6826110cf13a0.webp"
                         alt="Contact"
                         class="w-full" />
                </div>

                <div class="contact-form bg-white p-6 rounded-lg w-full md:w-100">
                    <h3 class="text-xl font-semibold mb-4">Get in touch with us.</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                    @endif
                    @if (Session::has('success')) <div class="alert alert-success">{{ Session('success') }}</div> @endif
                    @if (Session::has('error')) <div class="alert alert-danger">{{ Session('error') }}</div> @endif
                    <form class="space-y-5" method="POST" action="{{ route('enquiry.submit') }}">
                        <input type="hidden" name="page" value="contact">
                        @csrf
                        <!-- Full Name -->
                        <div>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   required minlength="3" maxlength="30"
                                   placeholder="Full Name"
                                   onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                    {{ $errors->has('name') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email ID -->
                        <div>
                            <input type="email" name="email" value="{{ old('eamil') }}"
                                   required placeholder="Email ID"
                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                    {{ $errors->has('email') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                            @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <input type="tel" name="mobile" value="{{ old('mobile') }}"
                                   minlength="10" maxlength="13"
                                   onkeypress='return event.charCode >= 48 && event.charCode <= 57'
                                   placeholder="Phone Number"
                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                    {{ $errors->has('mobile') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                            @error('mobile')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Select State & City -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input type="text" name="state" value="{{ old('state') }}"
                                       placeholder="State"
                                       onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                        {{ $errors->has('state') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                                @error('state')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="city" value="{{ old('city') }}"
                                       placeholder="City"
                                       onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                        {{ $errors->has('city') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                                @error('city')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                     <textarea name="message" placeholder="Write Message"
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 h-32
                        {{ $errors->has('message') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">{{ old('message') }}</textarea>
                            @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="block w-fit mx-auto px-8 py-3 bg-cyan-400 text-white font-semibold rounded-md hover:bg-cyan-500 transition cursor-pointer">
                            Submit
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="contact-section py-5 flex justify-center items-center text-center">
        <div style="width: 100%; height: 450px;">
            <iframe
                    src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d17516.540146560586!2d80.99815679999999!3d26.874406800000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sin!4v1745034792083!5m2!1sen!2sin"
                    width="100%"
                    height="100%"
                    style="border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
    <section class="newsletter-section py-5">
        <div class="newsletter-content">
            <h2 class="newsletter-heading">Subscribe Our Newsletter</h2>
            <p class="newsletter-text">
                Updates on new courses and workshops
            </p>
            <form class="newsletter-form">
                <input
                        type="email"
                        placeholder="Enter Your Mail"
                        class="newsletter-input"
                />
                <button type="submit" class="newsletter-button">Subscribe Now</button>
            </form>
        </div>
        <div class="newsletter-image-container">
            <img
                    {{--                    src="{{ asset('assets/web/images/newsletter-min.png') }}"--}}
                    src="https://img.freepik.com/free-photo/view-young-students-attending-school_23-2151031925.jpg?t=st=1745137482~exp=1745141082~hmac=a20a5e4d43e3e5358df6ce30857aea18f3d207aa36359076bf9d4f297722c7c9&w=996"
                    alt="Newsletter Image"
                    class="newsletter-image"
            />
        </div>
    </section>
@stop

@section('js')
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            const header = document.getElementById("page-header");
            const mainContent = document.getElementById("main-content");

            const observer = new IntersectionObserver(
                function (entries) {
                    if (!entries[0].isIntersecting) {
                        header.classList.add("sticky");
                    } else {
                        header.classList.remove("sticky");
                    }
                },
                {
                    root: null,
                    threshold: 0,
                    rootMargin: "0px 0px -100% 0px",
                }
            );

            observer.observe(mainContent);
        });

    </script>
@stop
