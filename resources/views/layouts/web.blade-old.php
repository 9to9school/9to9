<!DOCTYPE html>
<html lang="en">
<?php
 $getCommonSetting = getCommonSetting();
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>9 To 9 School</title>
    <!-- Standard Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/'.$getCommonSetting->favicon) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{  asset('public/'.$getCommonSetting->favicon) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{  asset('public/'.$getCommonSetting->favicon) }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $getCommonSetting->site_title ?? '9TO9 SCHOOLS' }}">
    <meta property="og:description" content="{{ $getCommonSetting->site_desc ?? '9 To 9 Schools is a chain of schools which operates from 9AM To 9PM	' }}">
    <meta property="og:image" content="{{ asset('public/'.$getCommonSetting->favicon) }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="$getCommonSetting->site_title ?? '9TO9 SCHOOLS' ">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $getCommonSetting->site_title ?? '9TO9 SCHOOLS' }}">
    <meta name="twitter:description" content="{{ $getCommonSetting->site_desc ?? '9 To 9 Schools is a chain of schools which operates from 9AM To 9PM	' }}">
    <meta name="twitter:image" content="{{ asset('public/'.$getCommonSetting->favicon) }}">



    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/contact.css') }}">
    <style>
        /* General Styles */
        body {
            margin: 0;
            font-family: "Poppins", sans-serif;
        }
        .quick_links{
            line-height: 30px;
        }
        .company_links{
            line-height: 30px;
        }
        p{
            font-family: "Poppins", sans-serif;
        }

        .container {
            width: 80%;
        }


        button {
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Overlay (for dimming the background) */
        .hamburger {
            font-size: 24px;
            background: none;
            border: none;
            cursor: pointer;
            color: #fff;
            /* position: absolute; */
            top: 25px;
            right: 25px;
            z-index: 1001;
        }

        /* Overlay Nav */
        .overlay-nav {
            height: 100%;
            width: 25%;
            position: fixed;
            z-index: 999999;
            top: 0;
            left: auto;
            right:0;
            text-align: left;
            background-color:#39cce4;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 100px;
            text-align: center;
            display:none;
        }

        .overlay-nav a {
            padding: 14px;
            text-decoration: none;
            font-size: 24px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .overlay-nav a:hover {
            color: #f9c87a;
        }

        .overlay-close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 40px;
            color: white;
            cursor: pointer;
        }


        #page-header.sticky {
            transform: translateY(0);
            opacity: 1;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(-100%);
            opacity: 0;
        }
        /* Sidebar Styles */
        #sidebar-wrapper {
            position: fixed;
            right: 0;
            top: 0;
            width: 300px;
            height: 100%;
            background: #7a95cb;
            color: #fff;
            z-index: 999;
            transition: margin 0.3s ease;
            margin-right: -300px;
            /* start off-screen to the right */
        }

        .sidebar-nav li {
            padding: 15px 20px;
            border-bottom: 1px solid #333;
        }

        .sidebar-nav li a {
            color: #ddd;
            font-size: 16px;
            display: block;
        }

        .sidebar-nav li:hover {
            color: #fff;
            background-color: #2d1650;
        }

        /* Hamburger Button Styles */
        .hamburger {
            display: inline-block;
            cursor: pointer;
            padding: 15px;
            z-index: 1001;
            /*position: relative;*/
            background: transparent;
            border: none;
        }

        .hamburger span {
            display: block;
            height: 4px;
            width: 30px;
            background-color: #000;
            border-radius: 4px;
            margin: 6px auto;
            transition: all 0.3s ease-in-out;
        }

        .hamburger.is-open .hamb-top {
            transform: rotate(45deg);
            position: relative;
            top: 10px;
        }

        .hamburger.is-open .hamb-middle {
            opacity: 0;
        }

        .hamburger.is-open .hamb-bottom {
            transform: rotate(-45deg);
            position: relative;
            top: -10px;
        }

        .hamburger.is-closed .hamb-top {
            transform: rotate(0);
        }

        .hamburger.is-closed .hamb-middle {
            opacity: 1;
        }

        .hamburger.is-closed .hamb-bottom {
            transform: rotate(0);
        }

        /* Preloader Styles */
        #preloader {
            position: fixed;
            inset: 0;
            background: #fff;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        @media (max-width: 767px) {
            .hamburger{
                padding: 0px;
            }
            .logo_size{
                width: 100px !important;
                height: 100px !important;
            }
        }

        #preloader {
            position: fixed;
            inset: 0;
            background-color: #fff;
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: opacity 0.5s ease;
        }
        #preloader.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }

        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(-100%);
            opacity: 0;
        }

        /* When header becomes sticky */
        #page-header.sticky {
            transform: translateY(0);
            opacity: 1;
            position: sticky !important;
            top: 0;
            z-index: 999;

        }
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }
        .custompadding-2em {
            padding: 2em 0;
        }

    </style>
    @yield('css')
</head>

<body>
<div class="loader">
    <div class="orb"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
</div>


<div id="preloader">
    <img id="preloader-logo" src="{{ asset('assets/web/images/9t9logopng-min.png') }}" alt="Loading...">
</div>


    <!-- Header -->
    <header id="page-header" class="top-0 z-50 p-2 transition-all duration-300  {{ request()->is('/') ? 'bg-[#D7F8FE]' : 'bg-blue-50' }}">
        <div class="container">
            <nav class="mx-auto flex justify-between items-center container1">
                <!--<div class="w-22 h-22  rounded-lg">-->
                <div class="  rounded-lg">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('assets/web/images/9t9logopng-min.png') }}" alt="Logo"

                             class=" rounded-lg" />

                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Buttons Hidden on Mobile -->
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="https://calendly.com/9to9schools/30min" class="bg-white text-blue-900 px-4 py-2 rounded-lg font-semibold">
                            Talk to Expert
                        </a>
                        <a href="https://calendly.com/9to9schools/30min" class="bg-cyan-400 text-white font-semibold px-4 py-2 rounded-lg">
                            Book an Appointment
                        </a>
                    </div>

                    <!-- Hamburger Icon Always Visible -->
                    <button class="hamburger is-closed" id="hamburger" onclick="openNav()">
                        <span class="hamb-top"></span>
                        <span class="hamb-middle"></span>
                        <span class="hamb-bottom"></span>
                    </button>
                </div>

            </nav>
        </div>
    </header>

    <div id="overlayNav" class="overlay-nav">
        <a href="javascript:void(0)" class="overlay-close" onclick="closeNav()">&times;</a>
        <a href="{{url("/")}}" class="hover:text-blue-500 text-orange text-2xl" style="font-size: 25px">Home</a>

        <a href="{{ url('/about-us') }}" class="hover:text-blue-500" style="font-size: 25px">About Us</a>
        <a href="{{url("/pre-school")}}" class="hover:text-blue-500" style="font-size: 25px">Pre School</a>
        <a href="{{url("/day-care")}}" class="hover:text-blue-500" style="font-size: 25px">Day Care</a>
        <a href="{{url("/events")}}" class="hover:text-blue-500" style="font-size: 25px">Events</a>
        <a href="{{ url('/teachers') }}" class="hover:text-blue-500" style="font-size: 25px">Teachers</a>
        <a href="{{ url('/franchise') }}" class="hover:text-blue-500" style="font-size: 25px">Franchise</a>
        <a href="{{url("/contact-us")}}" class="hover:text-blue-500" style="font-size: 25px">Contact Us</a>


    </div>


    <!-- Main Content -->
    <div class="parent_div">
        @yield('body')
    </div>

    <!-- Sidebar Menu -->
{{--    <div id="sidebar-wrapper">--}}
{{--        <ul class="sidebar-nav">--}}
{{--            <li class="py-2">--}}
{{--                <a href="{{ url('/') }}" class="hover:text-blue-500 text-orange text-2xl"--}}
{{--                    style="font-size: 25px">Home</a>--}}
{{--            </li>--}}
{{--            <li class="py-2">--}}
{{--                <a href="{{ url('/about-us') }}" class="hover:text-blue-500" style="font-size: 25px">About Us</a>--}}
{{--            </li>--}}
{{--            <li class="py-2">--}}
{{--                <a href="{{ url('/contact-us') }}" class="hover:text-blue-500" style="font-size: 25px">Contact Us</a>--}}
{{--            </li>--}}
{{--            <li class="py-2">--}}
{{--                <a href="{{ url('/pre-school') }}" class="hover:text-blue-500" style="font-size: 25px">Pre-School</a>--}}
{{--            </li>--}}
{{--            <li class="py-2">--}}
{{--                <a href="{{ url('/day-care') }}" class="hover:text-blue-500" style="font-size: 25px">Day-School</a>--}}
{{--            </li>--}}
{{--            <li class="py-2">--}}
{{--                <a href="{{ url('/usp-details') }}" class="hover:text-blue-500" style="font-size: 25px">USP Details</a>--}}
{{--            </li>--}}
{{--            <li class="py-2">--}}
{{--                <a href="{{ url('/events') }}" class="hover:text-blue-500" style="font-size: 25px">Events</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}


<style>
    .swiper-slide-active .testimonial-card {
        background-color: #312e81; /* indigo-900 */
        color: #ffffff;
        border-radius: 1.5rem; /* rounded-3xl */
    }

    .swiper-slide-active .quote-icon {
        color: white;
    }

    .swiper-slide-active .testimonial-img {
        position: absolute;
        bottom: -28px;
        left: 50%;
        transform: translateX(-50%);
        border: 4px solid white;
    }

    /* Testimonials */

    .testimonial-section {
        text-align: center;
        padding: 60px 0;
    }
    .testimonial-section .section-header {
        margin-bottom: 22px;
    }
    .testimonial-section h2 {

        font-weight:700 ;
        font-size: 32px;
        margin-bottom: 10px;
    }

    .testimonial-section .section-description {

        font-size:18px;
        line-height: 18px;
        color: #666;
        margin-bottom: 40px;
    }

    .testimonial-card {
        background-color: #ffffff;
        border-radius: 6px;
        /*box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);*/
    }
    .testimonial-card .testimonial-author {
        display: flex;
        align-items: center;
        gap: 23px;
        margin-bottom: 31px;
    }
    .testimonial-card .testimonial-author .author-image {
        width: 65px;
        height: 65px;
        border-radius: 50%;
        object-fit: cover;
    }
    .testimonial-card .testimonial-author .author-name {
        font-family: "Poppins", Helvetica;
        font-weight: 700;
        font-size: 24px;
        color: #262626;
    }
    .testimonial-card .testimonial-content .author-description {
        font-family: "Poppins", Helvetica;
        font-weight: 500;
        font-size: 16px;
        color: #737373;
    }
    .testimonial-card .testimonial-content .testimonial-text {
        font-family: "Poppins", Helvetica;
        font-weight: 400;
        font-size: 18px;
        line-height: 1.65;
        color: #000000;
        margin:15px 0;
    }

    .swiper-slide.flex.justify-center.swiper-slide-active {
        height: 300px !important;
    }


</style>


<section class="py-16 px-4 md:px-20 bg-white">
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-14 text-indigo-950">
        What they are saying
    </h2>

    <!-- Swiper -->
    <div class="container">
        <div class="swiper mySwiper1 mytesti">
            <div class="swiper-wrapper">

                @php
                $testimonial = App\Models\Testimonial::all() ;
                @endphp

                @foreach($testimonial as $row)
                <!-- Slide 1 -->
                <div class="swiper-slide flex ">
                    <div class="testimonial-card relative w-full text-left p-6 m-6 transition-all duration-300">
                        <div class="!text-[70px] text-gray-400 absolute top-[-10px] left-4 testsec">&#10077;</div>
                        <p class="text-base p-3">
                            {!! ucfirst($row->description) !!}
                        </p>
                        <img src="{{ asset($row->image) }}" alt="User 1" class="absolute bottom-[-26px] left-10  w-14 h-14 mask-radial-circle  bg-white rounded-full mx-auto transition-all duration-300">
                    </div>
                </div>
                @endforeach


            </div>

            <!-- Swiper Pagination -->
{{--            <div class="swiper-pagination mt-10"></div>--}}
        </div>
    </div>

</section>




    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Additional Content (e.g., Image) -->
    <div>
        <img src="{{ asset('assets/web/images/home/child.png') }}" width="100%" alt="Child" class="w-full object-cover" />
    </div>

    <!-- Full Page Loader (for route changes) -->
    <div id="full-page-loader" class="fixed inset-0 z-50 flex items-center justify-center bg-white"
        style="display:none;">
        <i class="fas fa-spinner fa-spin fa-3x text-blue-500"></i>
    </div>


    <!-- Footer -->
<footer class="bg-white sm:px-5 md:px-8 lg:px-10 py-8">
  <div class="container mx-auto grid grid-cols-1 md:grid-cols-4 lg:grid-cols-3 place-items-center gap-8">
    <!-- Logo & Description -->
    <div>
      <div class="flex items-center space-x-2">
{{--        <img src="{{asset('assets/web/images/logo.png')}}" alt="Logo" class="w-10 h-10 rounded-full" />--}}
          <img src="{{asset('assets/web/images/home/footer-logo.png')}}" alt="Logo" class="w-50 h-50 rounded-full" />
      </div>
      <p class="font-semibold text-sm mt-2">
        Where every game is a lesson, and every lesson is a game. Our app transforms education into playful games, captivating young minds with interactive fun.
      </p>
      <div class="flex space-x-3 mt-4">
        <button>
          <img src="{{asset('assets/web/images/playstore.png')}}" alt="Google Play" class="h-10" />
        </button>
        <button>
          <img src="{{asset('assets/web/images/app store.png')}}" alt="App Store" class="h-10" />
        </button>
      </div>
    </div>

        <!-- Quick Links & Company -->
        <div class="flex flex-col md:flex-row justify-center gap-8 text-left text-sm font-semibold px-4">
            <div>
                <h3 class="text-lg font-bold">Quick links</h3>
                <ul class="mt-3 space-y-2 quick_links">
                    <li><a href="{{url('/')}}" class="hover:text-black">Home</a></li>
                    <li><a href="{{url('about-us')}}" class="hover:text-black">About Us</a></li>
                    <li><a href="{{url('contact-us')}}" class="hover:text-black">Contact Us</a></li>
                    <li><a href="{{url('/pre-school')}}" class="hover:text-black">Preschool</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold">Company</h3>
                <ul class="mt-3 space-y-2 company_links">
                    <li><a href="{{url('/day-care')}}" class="hover:text-black">Day Care</a></li>
                    <li><a href="{{url('/usp-details')}}" class="hover:text-black">User Detail</a></li>
                    <li><a href="{{url('/events')}}" class="hover:text-black">Events</a></li>
                    <li><a href="{{url('/teachers')}}" class="hover:text-black">Teachers</a></li>
                    <li><a href="{{url('/franchise')}}" class="hover:text-black">Franchise</a></li>
                </ul>
            </div>
        </div>

        <!-- Gallery -->
        <div class="flex flex-col space-y-4">
            <h3 class="text-lg font-bold">Gallery</h3>
            <div class="grid grid-cols-3 gap-4">
                @for ($i = 0; $i < 6; $i++)
                    <img src="{{asset('assets/web/images/home/' . ($i % 2 == 0 ? 'gallery1.png' : 'gallary2.png'))}}" alt="Gallery" class="rounded-lg h-20 " />
                @endfor
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="mt-8 border-t border-t-black/20 pt-4 flex flex-col md:flex-row justify-between font-semibold text-sm">
        <div class="flex space-x-4">
            <a href="#" class="hover:text-black">Privacy Policy</a>
            <a href="#" class="hover:text-black">Terms & Conditions</a>
            <a href="#" class="hover:text-black">Support</a>
        </div>
        <p class="mt-4 md:mt-0">&copy; Copyright 2024, All Rights Reserved</p>
    </div>
</footer>




    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>

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
        
        function openNav() {
            const overlayNav = document.getElementById("overlayNav");
            const hamburger = document.getElementById("hamburger");

            document.getElementsByClassName("overlay-nav")[0].style.display = 'block';

            // Responsive width: 30% for desktop, 100% for mobile
            if (window.innerWidth <= 768) {
                overlayNav.style.width = "100%";
            } else {
                overlayNav.style.width = "30%";
            }

            hamburger.classList.remove('is-closed');
            hamburger.classList.add('is-open');
        }

        // function closeNav() {
        //     document.getElementById("overlayNav").style.width = "0%";
        //     document.getElementById("hamburger").classList.remove('is-open');
        //     document.getElementById("hamburger").classList.add('is-closed');
        // }
        function closeNav() {
            const overlayNav = document.getElementById("overlayNav");
            const hamburger = document.getElementById("hamburger");

            overlayNav.style.width = "0%";
            hamburger.classList.remove('is-open');
            hamburger.classList.add('is-closed');
        }

        window.addEventListener("load", function () {
            setTimeout(() => {
                gsap.to("#preloader", {
                    opacity: 0,
                    duration: 0.5,
                    onComplete: () => {
                        document.getElementById("preloader").style.display = "none";
                    }
                });
            }, 1000);
        });


    </script>
<script>
    // GSAP animation for the preloader logo
    gsap.to("#preloader-logo", {
        duration: 1.2,
        scale: 1.2,
        rotate: 360,
        repeat: -1,
        ease: "power1.inOut",
        yoyo: true,
    });

    // Hide preloader after 2s

</script>

<script>
    const swiperTestimonial = new Swiper(".mytesti", {
        slidesPerView: 1,
        spaceBetween: 30,
        centeredSlides: true,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 10000,
            disableOnInteraction: false,
        },
        breakpoints: {
            576: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            992: {
                slidesPerView: 3,
            },
        },
    });
    // var swiperTestimonial = new Swiper(".mySwiper", {
    //     loop: true,
    //     pagination: {
    //         el: ".swiper-pagination",
    //         clickable: true,
    //     },
    //     autoplay: {
    //         delay: 4000,
    //         disableOnInteraction: false,
    //     },
    //     slidesPerView: 1,
    //     spaceBetween: 30,
    //     breakpoints: {
    //         768: {
    //             slidesPerView: 1,
    //         },
    //         1024: {
    //             slidesPerView: 3,
    //         }
    //     }
    // });
</script>

    @yield('js')
</body>

</html>
