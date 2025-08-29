<!DOCTYPE html>
<html lang="en">
<?php
 $getCommonSetting = getCommonSetting();
?>
    <?php 
	    use App\Models\Seo;
	    $current_url = url()->current(); // e.g., about-us
	    $seo = Seo::where('url', $current_url)->first();
    ?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $seo ->title ?? '9TO9 SCHOOLS' }}</title>
    <meta name="description" content="{{ $seo->description ?? '' }}">
   
    <!-- Standard Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/'.$getCommonSetting->favicon) }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{  asset('public/'.$getCommonSetting->favicon) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{  asset('public/'.$getCommonSetting->favicon) }}">
    <link rel="manifest" href="{{ asset('assets/favicon/site.webmanifest') }}">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ $seo ->title ?? '9TO9 SCHOOLS' }}">
    <meta property="og:description" content="{{ $seo->description ?? '' }}">
    @if (!empty($seo->image))
    <meta property="og:image" content="{{ asset($seo->image) }}">
    @endif
    <meta name="keywords" content="{{ $seo->keyword ?? ''}}"> 

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="$getCommonSetting->site_title ?? '9TO9 SCHOOLS' ">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo ->title ?? '9TO9 SCHOOLS' }}">
    <meta name="twitter:description" content="{{ $seo->description ?? '' }}">
    <meta name="twitter:image" content="{{ asset('public/'.$getCommonSetting->favicon) }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/contact.css') }}">
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '699270669376430');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=699270669376430&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Meta Pixel Code -->
{{--    <script src="https://translation-plugin.bhashini.co.in/v2/website_translation_utility.js"></script>--}}

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-P9C4C6X8');</script>
<!-- End Google Tag Manager -->
    

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
         @media (min-width: 1536px) {
            .container {
                max-width: 1300px !important;
            }
        }



    </style>
    


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

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P9C4C6X8"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-K6N17P07G3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-K6N17P07G3');
</script>
    @yield('css')
    
    
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/682ce0cf98a1b819123fb0f1/1irnksb4p';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

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
                             class=" rounded-lg " />
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <!-- Buttons Hidden on Mobile -->
                    <div class="hidden md:flex items-center space-x-4">
                        <!-- Mobile: Show Call Button -->
                        <a href="tel:+919990318880"
                           class="block md:hidden bg-white text-blue-900 px-4 py-2 rounded-lg font-semibold text-center transition">
                          Talk to Expert
                        </a>
                        
                        <!-- Desktop: Show WhatsApp Button -->
                        <a href="https://wa.me/919990318880?text=Hi%20I%20am%20interested%20in%20your%20school"
                           target="_blank"
                           class="hidden md:block  bg-white text-blue-900 px-4 py-2 rounded-lg font-semibold text-center transition">
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
        <img src="{!! asset('assets/web/images/home/child.webp') !!}" width="100%" alt="Child" class="w-full object-cover" />
    </div>

    <!-- Full Page Loader (for route changes) -->
    <div id="full-page-loader" class="fixed inset-0 z-50 flex items-center justify-center bg-white"
        style="display:none;">
        <i class="fas fa-spinner fa-spin fa-3x text-blue-500"></i>
    </div>
    
    <!--==================== fIXED bUTTONS ================================== -->
    
    <!-- Fixed Brochure Download Button -->
    <!-- Fixed Brochure Download Button -->
      {{--
<!-- Fixed Rotated Brochure Download Button -->
<a href="/path-to-brochure.pdf" 
   download 
   class="fixed right-[-90px] top-1/2 -translate-y-1/2 transform rotate-90 z-50 bg-purple-700 hover:bg-purple-800 text-white font-semibold px-4 py-2 rounded-xl shadow-lg transition-all duration-300">
   📄 Download Brochure
</a>
 <!-- Fixed Social Icons (Left Side) -->
<div class="fixed left-1 top-1/2 -translate-y-1/2 z-50 flex flex-col gap-1">
  <!-- Facebook -->
  <a href="https://facebook.com/9to9school" target="_blank" 
     class="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
    <!-- Facebook Icon -->
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
      <path d="M22 12a10 10 0 1 0-11.5 9.88v-7H8v-3h2.5v-2.3c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.2c-1.2 0-1.6.8-1.6 1.6V12H18l-.5 3h-2v7A10 10 0 0 0 22 12z"/>
    </svg>
  </a>

  <!-- Instagram -->
  <a href="https://www.instagram.com/9to9school" target="_blank" 
     class="bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
    <!-- Instagram Icon -->
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
      <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3a5 5 0 1 0 .001 10.001A5 5 0 0 0 12 7zm0 2a3 3 0 1 1-.001 6.001A3 3 0 0 1 12 9zm4.5-3a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 16.5 6z"/>
    </svg>
  </a>

  <!-- LinkedIn -->
  <a href="https://www.linkedin.com/company/9to9school" target="_blank" 
     class="bg-blue-800 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
    <!-- LinkedIn Icon -->
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
      <path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM.5 8h4V24h-4V8zm7.5 0h3.8v2.2h.1c.5-.9 1.7-2.2 3.6-2.2 3.8 0 4.5 2.5 4.5 5.8V24h-4V14.1c0-2.4-.1-5.5-3.4-5.5-3.4 0-3.9 2.7-3.9 5.3V24h-4V8z"/>
    </svg>
  </a>

  <!-- YouTube -->
  <a href="https://www.youtube.com/@9to9school" target="_blank" 
     class="bg-red-600 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
    <!-- YouTube Icon -->
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 576 512">
      <path d="M549.7 124.1c-6.3-23.7-24.9-42.4-48.6-48.6C458.3 64 288 64 288 64S117.7 64 74.9 75.5c-23.7 6.2-42.3 24.9-48.6 48.6C15.9 167.7 16 256 16 256s0 88.3 10.3 131.9c6.3 23.7 24.9 42.4 48.6 48.6C117.7 448 288 448 288 448s170.3 0 213.1-11.5c23.7-6.2 42.3-24.9 48.6-48.6C560.1 344.3 560 256 560 256s.1-88.3-10.3-131.9zM232 336V176l142 80-142 80z"/>
    </svg>
  </a>

  <!-- X (Twitter) -->
  <a href="https://twitter.com/9to9school" target="_blank" 
     class="bg-black text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
    <!-- Twitter X Icon -->
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
      <path d="M22.25 0H1.75C.78 0 0 .78 0 1.75v20.5C0 23.22.78 24 1.75 24h20.5c.97 0 1.75-.78 1.75-1.75V1.75C24 .78 23.22 0 22.25 0zM17.1 7.7l-2.95 3.38 3.47 5.22h-2.09l-2.39-3.61-2.76 3.61h-2.1l3.48-4.54-3.25-4.97h2.1l2.17 3.3 2.53-3.3h2.09z"/>
    </svg>
  </a>

  <!-- WhatsApp -->
  <a href="https://wa.me/919990318880" target="_blank" 
     class="bg-green-500 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
    <!-- WhatsApp Icon -->
    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
      <path d="M20.5 3.5A11.72 11.72 0 0 0 12 0a11.72 11.72 0 0 0-8.5 3.5C1.6 5.4.5 8.1.5 11c0 2.2.7 4.3 2.1 6.1L0 24l6.2-2.1c1.8 1.1 3.9 1.7 5.8 1.7 2.9 0 5.6-1.1 7.5-3.1A11.72 11.72 0 0 0 23.5 12c0-2.9-1.1-5.6-3-7.5zM12 21.5c-1.6 0-3.1-.5-4.4-1.3l-.3-.2-3.7 1.2 1.2-3.6-.2-.3c-.9-1.2-1.4-2.7-1.4-4.3 0-4.7 3.8-8.5 8.5-8.5 2.3 0 4.4.9 6 2.5s2.5 3.7 2.5 6c0 4.7-3.8 8.5-8.5 8.5zm4.4-6.4c-.2-.1-1.4-.7-1.6-.8s-.4-.1-.6.1-.7.8-.9 1c-.2.2-.3.2-.6.1s-1.1-.4-2-1.2c-.7-.6-1.2-1.3-1.4-1.5s-.2-.3 0-.5l.5-.6c.1-.1.2-.3.3-.4.1-.2 0-.4 0-.5s-.6-1.4-.8-1.9c-.2-.5-.4-.4-.6-.4h-.5c-.2 0-.4 0-.6.2s-.7.7-.7 1.6c0 .9.6 1.8.7 2 .1.1 1.1 2 2.6 3.1s2.9 1.4 3.3 1.6c.4.2.8.2 1.1.1.3-.1 1-.4 1.2-.8.2-.4.2-.8.2-.9s0-.1-.2-.2z"/>
    </svg>
  </a>
</div>

<!-- Fixed Social Button with Expand on Hover -->
<!-- Fixed Social Button with Slide Out Animation on Hover -->
<div class="fixed left-1 top-1/2 -translate-y-1/2 z-50 group">
    <!-- Main Button -->
    <div class="bg-blue-600 text-white p-3 rounded-full shadow-lg cursor-pointer transition-transform duration-300">
        <!-- Plus Icon -->
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 4v16m8-8H4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>

    <!-- Social Icons Container -->
    <div class="flex flex-col gap-2 mt-2 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300">
        <a href="https://facebook.com/9to9school" target="_blank" class="bg-blue-600 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
            <!-- Facebook Icon -->
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M22 12a10 10 0 1 0-11.5 9.88v-7H8v-3h2.5v-2.3c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.2c-1.2 0-1.6.8-1.6 1.6V12H18l-.5 3h-2v7A10 10 0 0 0 22 12z"/>
            </svg>
        </a>
        <a href="https://www.instagram.com/9to9school" target="_blank" class="bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
            <!-- Instagram Icon -->
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3a5 5 0 1 0 .001 10.001A5 5 0 0 0 12 7zm0 2a3 3 0 1 1-.001 6.001A3 3 0 0 1 12 9zm4.5-3a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 16.5 6z"/>
            </svg>
        </a>
        <a href="https://www.linkedin.com/company/9to9school" target="_blank" class="bg-blue-800 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
            <!-- LinkedIn Icon -->
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM.5 8h4V24h-4V8zm7.5 0h3.8v2.2h.1c.5-.9 1.7-2.2 3.6-2.2 3.8 0 4.5 2.5 4.5 5.8V24h-4V14.1c0-2.4-.1-5.5-3.4-5.5-3.4 0-3.9 2.7-3.9 5.3V24h-4V8z"/>
            </svg>
        </a>
        <a href="https://wa.me/919990318880" target="_blank" class="bg-green-500 text-white p-3 rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
            <!-- WhatsApp Icon -->
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.5 3.5A11.72 11.72 0 0 0 12 0a11.72 11.72 0 0 0-8.5 3.5C1.6 5.4.5 8.1.5 11c0 2.2.7 4.3 2.1 6.1L0 24l6.2-2.1c1.8 1.1 3.9 1.7 5.8 1.7 2.9 0 5.6-1.1 7.5-3.1A11.72 11.72 0 0 0 23.5 12c0-2.9-1.1-5.6-3-7.5zM12 21.5c-1.6 0-3.1-.5-4.4-1.3l-.3-.2-3.7 1.2 1.2-3.6-.2-.3c-.9-1.2-1.4-2.7-1.4-4.3 0-4.7 3.8-8.5 8.5-8.5 2.3 0 4.4.9 6 2.5s2.5 3.7 2.5 6c0 4.7-3.8 8.5-8.5 8.5z"/>
            </svg>
        </a>
    </div>
</div>

--}}

<!-- Footer -->
<footer class="bg-white px-4 sm:px-6 md:px-8 lg:px-10 py-10">
    <div class="max-w-7xl mx-auto grid gap-10 md:grid-cols-2 lg:grid-cols-3">
        <!-- Logo & Description -->
        <div class="space-y-4">
            <img src="{{asset('assets/web/images/home/footer-logo.png')}}" alt="Logo" class="h-12 w-auto" />
            <p class="text-sm font-semibold text-gray-700">
                Where every game is a lesson, and every lesson is a game. Our app transforms education into playful games, captivating young minds with interactive fun.
            </p>
            <div class="flex gap-3">
                <button>
                    <img src="{{asset('assets/web/images/playstore.png')}}" alt="Google Play" class="h-10 w-auto" />
                </button>
                <button>
                    <img src="{{asset('assets/web/images/app store.png')}}" alt="App Store" class="h-10 w-auto" />
                </button>
            </div>
        </div>

        <!-- Quick Links & Company -->
        <div class="grid grid-cols-2 gap-6 text-sm font-semibold text-gray-700">
            <div>
                <h3 class="text-lg font-bold mb-3">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="{{url('/')}}" class="hover:text-black">Home</a></li>
                    <li><a href="{{url('about-us')}}" class="hover:text-black">About Us</a></li>
                    <li><a href="{{url('contact-us')}}" class="hover:text-black">Contact Us</a></li>
                    <li><a href="{{url('/pre-school')}}" class="hover:text-black">Preschool</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-3">Company</h3>
                <ul class="space-y-2">
                    <li><a href="{{url('/day-care')}}" class="hover:text-black">Day Care</a></li>
                    <li><a href="{{url('/usp-details')}}" class="hover:text-black">User Detail</a></li>
                    <li><a href="{{url('/events')}}" class="hover:text-black">Events</a></li>
                    <li><a href="{{url('/teachers')}}" class="hover:text-black">Teachers</a></li>
                    <li><a href="{{url('/franchise')}}" class="hover:text-black">Franchise</a></li>
                </ul>
            </div>
        </div>

        <!-- Gallery / Brochure / Social -->
        <div class="space-y-4">
            <h3 class="text-lg font-bold">Connect Us</h3>

            <!-- Brochure Download -->
            <a href="/path-to-brochure.pdf" 
               download 
               class="inline-block bg-purple-700 hover:bg-purple-800 text-white font-semibold px-4 py-2 rounded-xl shadow-lg transition-all duration-300">
                📄 Download Brochure
            </a>

            <!-- Social Icons -->
            <div class="flex flex-wrap gap-2 justify-start">
    <a href="https://facebook.com/9to9school" target="_blank"
       class="bg-blue-600 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M22 12a10 10 0 1 0-11.5 9.88v-7H8v-3h2.5v-2.3c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.2c-1.2 0-1.6.8-1.6 1.6V12H18l-.5 3h-2v7A10 10 0 0 0 22 12z"/>
        </svg>
    </a>
    <a href="https://www.instagram.com/9to9school" target="_blank"
       class="bg-gradient-to-tr from-pink-500 via-red-500 to-yellow-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2a3 3 0 0 1 3 3v10a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h10zm-5 3a5 5 0 1 0 .001 10.001A5 5 0 0 0 12 7zm0 2a3 3 0 1 1-.001 6.001A3 3 0 0 1 12 9zm4.5-3a1.5 1.5 0 1 0 .001 3.001A1.5 1.5 0 0 0 16.5 6z"/>
        </svg>
    </a>
    <a href="https://www.linkedin.com/company/9to9school" target="_blank"
       class="bg-blue-800 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M4.98 3.5C4.98 4.88 3.87 6 2.5 6S0 4.88 0 3.5 1.12 1 2.5 1 4.98 2.12 4.98 3.5zM.5 8h4V24h-4V8zm7.5 0h3.8v2.2h.1c.5-.9 1.7-2.2 3.6-2.2 3.8 0 4.5 2.5 4.5 5.8V24h-4V14.1c0-2.4-.1-5.5-3.4-5.5-3.4 0-3.9 2.7-3.9 5.3V24h-4V8z"/>
        </svg>
    </a>
    <a href="https://wa.me/919990318880" target="_blank"
       class="bg-green-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-lg hover:scale-110 transition-transform duration-300">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20.5 3.5A11.72 11.72 0 0 0 12 0a11.72 11.72 0 0 0-8.5 3.5C1.6 5.4.5 8.1.5 11c0 2.2.7 4.3 2.1 6.1L0 24l6.2-2.1c1.8 1.1 3.9 1.7 5.8 1.7 2.9 0 5.6-1.1 7.5-3.1A11.72 11.72 0 0 0 23.5 12c0-2.9-1.1-5.6-3-7.5zM12 21.5c-1.6 0-3.1-.5-4.4-1.3l-.3-.2-3.7 1.2 1.2-3.6-.2-.3c-.9-1.2-1.4-2.7-1.4-4.3 0-4.7 3.8-8.5 8.5-8.5 2.3 0 4.4.9 6 2.5s2.5 3.7 2.5 6c0 4.7-3.8 8.5-8.5 8.5z"/>
        </svg>
    </a>
</div>

        </div>
    </div>

<!-- Bottom Section -->
<div class="mt-10 border-t pt-5 border-gray-300 text-sm text-gray-700 flex flex-col md:flex-row justify-between items-center">
    <div class="flex flex-wrap gap-4">
        <a href="{{url('/privacy-policy')}}" class="hover:text-black">Privacy Policy</a>
        <a href="{{url('/terms-and-condition')}}" class="hover:text-black">Terms & Conditions</a>
        <a href="{{url('/refund-policy')}}" class="hover:text-black">Support</a>
    </div>
    <p class="mt-4 md:mt-0">&copy; 2024 9to9 School. All Rights Reserved.</p>
</div>
</footer>




<!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script>
    function openNav() {
        const overlayNav = document.getElementById("overlayNav");
        const hamburger = document.getElementById("hamburger");

        document.getElementsByClassName("overlay-nav")[0].style.display = 'block';

        if (window.innerWidth <= 768) {
            overlayNav.style.width = "100%";
        } else {
            overlayNav.style.width = "30%";
        }

        hamburger.classList.remove('is-closed');
        hamburger.classList.add('is-open');

        // Add event listener for outside click
        document.addEventListener('click', handleOutsideClick);
    }

    function closeNav() {
        const overlayNav = document.getElementById("overlayNav");
        const hamburger = document.getElementById("hamburger");

        overlayNav.style.width = "0%";
        hamburger.classList.remove('is-open');
        hamburger.classList.add('is-closed');

        // Remove outside click listener
        document.removeEventListener('click', handleOutsideClick);
    }

    // Detect click outside overlay
    function handleOutsideClick(event) {
        const overlayNav = document.getElementById("overlayNav");
        const hamburger = document.getElementById("hamburger");

        if (!overlayNav.contains(event.target) && !hamburger.contains(event.target)) {
            closeNav();
        }
    }

    // Close nav on back/forward navigation
    window.addEventListener('pageshow', function (event) {
        // Only run if the menu was open (to avoid flicker)
        if (document.getElementById("hamburger").classList.contains('is-open')) {
            closeNav();
        }
    });
</script>



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
</script>

  <script>
                            // const country = "India";

                            // // Fetch States of India
                            // fetch("https://countriesnow.space/api/v0.1/countries/states", {
                            //     method: "POST",
                            //     headers: { "Content-Type": "application/json" },
                            //     body: JSON.stringify({ country: country })
                            // })
                            //     .then(res => res.json())
                            //     .then(data => {
                            //         const stateDropdown = document.getElementById('state-dropdown');
                            //         data.data.states.forEach(state => {
                            //             const option = document.createElement('option');
                            //             option.value = state.name;
                            //             option.text = state.name;
                            //             stateDropdown.appendChild(option);
                            //         });
                            //     });

                            // // Fetch cities when a state is selected
                            // document.getElementById('state-dropdown').addEventListener('change', function () {
                            //     const state = this.value;
                            //     const cityDropdown = document.getElementById('city-dropdown');
                            //     cityDropdown.innerHTML = '<option>Loading...</option>';

                            //     fetch("https://countriesnow.space/api/v0.1/countries/state/cities", {
                            //         method: "POST",
                            //         headers: { "Content-Type": "application/json" },
                            //         body: JSON.stringify({ country: country, state: state })
                            //     })
                            //         .then(res => res.json())
                            //         .then(data => {
                            //             cityDropdown.innerHTML = '<option value="">-- Select City --</option>';
                            //             data.data.forEach(city => {
                            //                 const option = document.createElement('option');
                            //                 option.value = city;
                            //                 option.text = city;
                            //                 cityDropdown.appendChild(option);
                            //             });
                            //         });
                            // });
                        </script>

    @yield('js')
</body>

</html>
