@extends('layouts.web')
@section('css')


    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <style>
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }

        /* hero section */
        .hero-image {
            background-image: url("https://s3-alpha-sig.figma.com/img/7ff4/cd9c/47dd5f9ae58f64e48f554e7ad68ccd90?Expires=1744588800&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=HNQgV6Gc741MBeOm8dUolbgysHQyvKe7Q40H6PEDR8tglIpGrP9pHlT10ILHVX5Ex56RPr5R-VvsebXVK8evMy7yum8mTLy3j8UH20Z3yJdoADTmWmLYArwq7e6qpd5OH5L5jHhJsTRkh5jmM~MIBpLIkZt2iY4M2DCJfdmVMZOpwsd94Mcb18WOd~O46~PbgL8qRpvt6LGTKBvJCwhrDbdwXF4xh4huL5ox8kDQLFN1NC-GbbAF8QozzqykuEPGRNBzPi-BwtysvzClQq0SR3Gxsr7qjd4wT-Ud8iGLbCIoz1Y4HQr64SPi1g~Omtgye6kAfV~sTm9oUjxAGDVQxg__");
            background-size: cover;
            background-position: center;
            padding: 150px 20px;
            text-align: center;
            position: relative;
        }
        .hero-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }
        .hero-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 30px;
            border-radius: 12px;
            position: relative;
            z-index: 1;
        }
        .hero-content h1 {
            color: #ffffff;
            font-size: 3em;
            margin-bottom: 10px;
            font-weight: 600;
        }
        .hero-content h2 {
            color: #07c0de;
            font-size: 4em;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .hero-content p {
            color: #ffffff;
            font-size: 1.3em;
            line-height: 1.6;
            margin-bottom: 35px;
        }
        .more-about-us-btn {
            background-color: #07c0de;
            color: #fff;
            border: none;
            padding: 15px 30px;
            font-size: 1em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Newes letter css */
        .newsletter-section {
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            box-sizing: border-box;
            padding: 0 20px;
        }

        .newsletter-content {
            flex: 1 1 400px;
            background-color: #0144ca;
            padding: 40px;
            border-radius: 10px;
            color: white;
            z-index: 1;
            box-sizing: border-box;
            margin-right: -100px;
        }

        .newsletter-heading {
            margin: 0 0 10px;
            font-size: 24px;
            color: #ffffff;
        }

        .newsletter-text {
            margin: 0 0 20px;
            font-size: 14px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .newsletter-input {
            flex: 1 1 250px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            min-width: 200px;
        }

        .newsletter-button {
            padding: 12px 20px;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .newsletter-image-container {
            flex: 1 1 400px;
            text-align: center;
        }

        .newsletter-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 10px;
        }
        /* Why Choose */
        .why-choose {
            padding: 60px 0;
        }
        .why-choose .know-about-btn {
            color: #fb6b47;
            background-color: #fed6d6;
            border-radius: 20px;
            padding: 6px 15px;
            font-size: 16px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
            border: none;
        }
        .why-choose h2{

            font-size: 32px;
            font-weight: 700;
            color:#18191f;
            margin-bottom: 20px;
        }
        .why-choose p{

            font-size:18px;
            line-height: 28px;
            font-weight: 400;
        }

        /* We Work */
        .we-work .how-we-work-btn {
            color: #344BFD;
            background-color: #DEE2FE;
            border-radius: 20px;
            padding: 6px 15px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
            border: none;
        }
        .we-work h2{

            font-size: 32px;
            font-weight: 700;
            color:#18191f;
            margin-bottom: 20px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            /* display: flex;
            align-items: center;
            justify-content: center; */
            margin-right: 15px;
        }

        .feature-icon i {
            color: #000000;
            font-size: 16px;
            background: #ffc0cb54;
            padding: 9px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            text-align: center;
        }
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .feature-content h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .feature-content p {
            color: #666;
            margin-bottom: 0;
        }

        .image-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            height: 100%;
        }

        .image-grid img {
            width: 80%;
            height: 80%;
            object-fit: cover;
            border-radius: 10px;
        }

        .image-grid .img-1 {
            grid-row: 1 / 2;
            margin-top: 50px;
        }

        .image-grid .img-2 {
            grid-column: 2;
            grid-row: 1;
        }

        .image-grid .img-3 {
            grid-column: 2;
            grid-row: 2;
            margin-left: -80px;
            margin-top: -60px;
        }

        .video-container {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .video-container img {
            width: 100%;
            height: auto;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background-color: #ff0000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .play-button i {
            color: white;
            font-size: 24px;
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
            background-color: #f5f5f5;
            border-radius: 6px;
            padding: 43px 20px;
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

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .how_to_work_p{
            padding-right: 80px;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-author h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #262626;
        }

        .testimonial-author p {
            color: #737373;
            margin-bottom: 0;
            font-size: 14px;
        }

        .testimonial-content p {
            color: #000000;
            line-height: 1.6;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
            background-color: #d9d9d9;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
        }

        .carousel-control-prev {
            left: -20px;
        }

        .carousel-control-next {
            right: -20px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 20px;
            height: 20px;
            background-color: #333;
            -webkit-mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
            mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
        }

        .carousel-control-next-icon {
            -webkit-mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        iframe {
            width: 100%;
            height: 300px;
        }
        /* Responsive adjustments */
        @media (max-width: 991px) {
            .image-grid {
                margin-bottom: 30px;
            }

            .video-container {
                margin-top: 30px;
            }
        }

        @media (max-width: 767px) {

            .carousel-control-prev {left: -10px;}
            .newsletter-content {margin-right: 0;}
            .carousel-control-next {right: -10px;}
            .testimonial-card {margin: 0 5px;}
            .sub_titless {
                letter-spacing: 0px;
                padding-right: 20px !important;
            }
            .hero-image {
                padding: 20px 20px;
            }
            .p-sm{
                padding: 20px !important;
            }
            .hero-content h1{
                fonts-size:32px;
            }
            .hero-content p {
                font-size: 16px;
            }
            .video-container {
                position: relative;
                width: 100%;
                padding-bottom: 56.25%; /* 16:9 aspect ratio */
                height: 0;
                overflow: hidden;
            }

            .video-container iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: 0;
            }
            .testimonial-section .section-description{
                line-height: unset;
                font-size:15px;
            }
            .testimonial-card .testimonial-content .testimonial-text {
                font-family: "Poppins", Helvetica;
                font-weight: 400;
                font-size: 18px;
                line-height: 1.65;
                color: #000000;
                margin:15px 0;
            }
            .author-info {
                text-align: left !important;
            }

            section.section.why-choose.bg-white.px-5.md\:px-8.lg\:px-10.py-8 {
                padding: 15px !important;
            }
            section.our_mission_vision.bg-yellow-50.px-5.md\:px-8.lg\:px-10.py-8 {
                padding: 40px 10px !important;
            }
            p.text-gray-800.mb-4 {
                font-size: 14px;
            }
        }
    </style>

@stop

@section('body')
   {{-- <!-- Why Choose Us Section -->
    <section id="main-content" class="h-[600px] px-5 md:px-8 lg:px-10 py-10 relative flex items-center justify-center p-5">
        <!-- background -->
        <div class="absolute inset-0 -z-10">
            <img src="{{$about->banner_image}}" alt class="size-full object-cover">
            <img src="{{$about->banner_image}}" alt class="size-full object-cover">
        </div>
        <!-- black overlay -->
        <div class="absolute inset-0 bg-black/50 pointer-events-none -z-10"></div>

        <!-- content -->
        <div class="max-w-5xl mx-auto space-y-8">
            <h1 class="text-3xl md:text-4xl lg:text-6xl text-center font-bold text-white">
                {{$about->banner_heading}} <br/>
                <span class="text-cyan-400">{{$about->banner_sub_heading}}</span>
            </h1>

            <p class="text-white font-medium text-lg md:text-2xl text-center">
                {{$about->banner_para}}
            </p>

            <!-- This button can also trigger a modal if needed -->
            <!--<button class="text-white text-xl md:text-2xl bg-cyan-400 font-semibold px-5 py-2 rounded-lg block mx-auto cursor-pointer">-->
            <!--    {{$about->banner_btn_name}}-->
            <!--</button>-->
        </div>
    </section>--}}

    <!-- Why Choose Us Section -->
<section id="main-content" class="relative px-4 sm:px-6 lg:px-8 py-16 min-h-[500px] flex items-center justify-center">

    <!-- Background Image -->
    <div class="absolute inset-0 -z-10">
        <img src="{{ $about->banner_image }}" alt="Background" class="w-full h-full object-cover" />
    </div>

    <!-- Black Overlay -->
    <div class="absolute inset-0 bg-black/50 -z-10"></div>

    <!-- Content -->
    <div class="max-w-5xl w-full mx-auto text-center space-y-6 px-4">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold text-white leading-tight">
            {{ $about->banner_heading }} <br>
            <span class="text-cyan-400">{{ $about->banner_sub_heading }}</span>
        </h1>

        <p class="text-white font-medium text-base sm:text-lg md:text-xl lg:text-2xl">
            {{ $about->banner_para }}
        </p>

        <!-- Optional CTA Button -->
        <!--
        <button class="bg-cyan-400 text-white font-semibold text-base sm:text-lg md:text-xl px-6 py-3 rounded-lg hover:bg-cyan-500 transition duration-300">
            {{ $about->banner_btn_name }}
        </button>
        -->
    </div>
</section>

    <section class="section why-choose bg-white px-5 md:px-8 lg:px-10 py-8">
        <div class="container mx-auto">

            <h2>{{$about->heading_sec2}} <span class="text-cyan-400">{{$about->sub_heaading_sec2}}</span></h2>
            <p class="text-justify">
            {{$about->para_sec2}}
            </p>
        </div>
        </section>
    <section class="section why-choose bg-white px-5 md:px-8 lg:px-10 py-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 order-lg-1 order-2">
{{--                    <img src="{!! asset('assets/web/images/8c5d180dbfee964f0fd9abcbcb47e346f27c7c08.jpg') !!}" alt="">--}}
<img src="{!! asset($about->image_sec1) !!}" alt="">
                </div>
                <div class="col-lg-6 order-lg-2 order-1 p-sm">
                    <button class="know-about-btn"></button>
                    <h2>{{$about->main_heading}}</h2>
                    <p class="mb-4 text-justify">
                        {!! $about->main_para !!}
                    </p>

                   <div class="grid grid-cols-1 items-center md:grid-cols-2 gap-2 items-start">
                       <!-- Feature 1 -->
                       @for ($i = 1; $i <= 4; $i++)
                           <div class="feature-item flex items-center">
                               <div class="feature-icon">
                                   <img src="{!! asset($about->{'icon_image'.$i}) !!}" alt="" class="w-12 h-12 object-contain">
                               </div>
                               <div class="feature-content">
                                   <h4 class="text-lg font-semibold">{{$about->{'sub_heading'.$i} }}</h4>
                               </div>
                           </div>
                       @endfor
                   </div>
                </div>
            </div>
        </div>
    </section>



    <section class="our_mission_vision bg-yellow-50  px-5 md:px-8 lg:px-10 py-8">

      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20 items-start">

          <!-- Our Mission -->
          <div class="text-center">
            <div class="inline-block bg-pink-200 text-black text-2xl font-semibold px-6 py-3 rounded-lg mb-4">Our Mission</div>
            <div class="bg-white p-6 rounded-xl text-left shadow-lg border ring-1 ring-gray-200 hover:shadow-2xl hover:scale-105 transition duration-300 ease-in-out">
              <p class="text-gray-800 mb-4">
                  To provide a nurturing and inspiring environment where children develop a lifelong love for learning through purposeful play, exploration, and connection. We aim to support every child’s academic, emotional, social, and physical growth.
              </p>
              <ul class="space-y-3 text-left">
                <li class="flex items-start gap-2">
                  <span class="text-yellow-500 text-xl"><img src="{!! asset('assets/images/icon1.png') !!}" alt="icon-yellow"></span>
                  <span>Child-centered learning approach</span>
                </li>
                <li class="flex items-start gap-2">
                  <span class="text-red-500 text-xl"><img src="{!! asset('assets/images/icon2.png') !!}" alt="icon-red"></span>
                  <span>Development of the whole child</span>
                </li>
                <li class="flex items-start gap-2">
                  <span class="text-purple-600 text-xl"><img src="{!! asset('assets/images/icon3.png') !!}" alt="icon-blue"></span>
                  <span>Building a strong foundation for future learning</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Our Vision -->
          <div class="text-center">
            <div class="inline-block bg-blue-200 text-black text-2xl font-semibold px-6 py-3 rounded-lg mb-4">Our Vision</div>
            <div class="bg-white  p-6 text-left rounded-xl shadow-lg border ring-1 ring-gray-200 hover:shadow-2xl hover:scale-105 transition duration-300 ease-in-out">
              <p class="text-gray-800 mb-4 ">
                To be recognized as a leading preschool where children are empowered to become confident, creative, and compassionate individuals who are prepared for future academic success and who contribute positively to society.
              </p>
              <ul class="space-y-3 text-left">
                <li class="flex items-start gap-2">
                  <span class="text-yellow-500 text-xl"><img src="{!! asset('assets/images/icon1.png') !!}" alt="icon-yellow"></span></span>
                  <span>Creating innovative learning spaces</span>
                </li>
                <li class="flex items-start gap-2">
                  <span class="text-red-500 text-xl"><img src="{!! asset('assets/images/icon2.png') !!}" alt="icon-red"></span></span>
                  <span>Fostering community partnerships</span>
                </li>
                <li class="flex items-start gap-2">
                  <span class="text-purple-600 text-xl"><img src="{!! asset('assets/images/icon3.png') !!}" alt="icon-blue"></span></span>
                  <span>Embracing diversity and inclusion</span>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>

    </section>



    <section class="bg-white text-center px-4 py-10">
  <h2 class="text-4xl font-bold mb-10">{{$about->choose_heading}}</h2>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">

    <!-- Flexible Slot Booking -->
    <div class="bg-[#D7F8FD] rounded-2xl shadow-md p-6 flex flex-col items-center">
      <img src="{!! asset($about->choose_icon1) !!}" alt="{!! $about->choose_title1 !!}" class="w-[292px] h-[187px] mb-4" />
      <h3 class="text-xl font-semibold mb-2">{!! $about->choose_title1 !!}</h3>
      <p class="text-gray-600 mb-4">{!! $about->choose_para1 !!}</p>
      <a href="#" class="bg-[#DBECFE] text-blue-800 font-medium px-6 py-2 rounded-full hover:bg-blue-200 transition">Book Now</a>
    </div>

    <!-- Choose Your Teacher -->
    <div class="bg-[#f7f1fe] rounded-2xl shadow-md p-6 flex flex-col items-center">
        <img src="{!! asset($about->choose_icon2) !!}" alt="{!! $about->choose_title2 !!}"  class="w-[292px] h-[187px] mb-4" />
        <h3 class="text-xl font-semibold mb-2">{!! $about->choose_title2 !!}</h3>
        <p class="text-gray-600 mb-4">{!! $about->choose_para2 !!}</p>
      <a href="#" class="bg-[#E2C8FF] text-purple-800 font-medium px-6 py-2 rounded-full hover:bg-purple-200 transition">View Teacher</a>
    </div>

    <!-- Pay Per Day -->
    <div class="bg-[#feeded] rounded-2xl shadow-md p-6 flex flex-col items-center">
        <img src="{!! asset($about->choose_icon3) !!}" alt="{!! $about->choose_title2 !!}"  class="w-[292px] h-[187px] mb-4" />
        <h3 class="text-xl font-semibold mb-2">{!! $about->choose_title3 !!}</h3>
        <p class="text-gray-600 mb-4">{!! $about->choose_para3 !!}</p>
      <a href="#" class="bg-[#FDA7B6] text-pink-800 font-medium px-6 py-2 rounded-full hover:bg-pink-200 transition">View Plan</a>
    </div>

      <!-- Flexible Slot Booking -->
      <div class="bg-[#FFFDEE] rounded-2xl shadow-md p-6 flex flex-col items-center">
          <img src="{!! asset($about->choose_icon4) !!}" alt="{!! $about->choose_title4 !!}"  class="w-[292px] h-[187px] mb-4" />
          <h3 class="text-xl font-semibold mb-2">{!! $about->choose_title4 !!}</h3>
          <p class="text-gray-600 mb-4">{!! $about->choose_para4 !!}</p>
          <a href="#" class="bg-[#FFC909] text-blue-800 font-medium px-6 py-2 rounded-full hover:bg-blue-200 transition">Book Now</a>
      </div>

      <!-- Choose Your Teacher -->
      <div class="bg-[#F4EEE5] rounded-2xl shadow-md p-6 flex flex-col items-center">
          <img src="{!! asset($about->choose_icon5) !!}" alt="{!! $about->choose_title5 !!}" class="w-[292px] h-[187px] mb-4" />
          <h3 class="text-xl font-semibold mb-2">{!! $about->choose_title5 !!}</h3>
          <p class="text-gray-600 mb-4">{!! $about->choose_para5 !!}</p>
          <a href="#" class="bg-[#FBC97D] text-purple-800 font-medium px-6 py-2 rounded-full hover:bg-purple-200 transition">View Teacher</a>
      </div>

      <!-- Pay Per Day -->
      <div class="bg-[#F6FEEC] rounded-2xl shadow-md p-6 flex flex-col items-center">
          <img src="{!! asset($about->choose_icon6) !!}" alt="{!! $about->choose_title6 !!}"  class="w-[292px] h-[187px] mb-4" />
          <h3 class="text-xl font-semibold mb-2">{!! $about->choose_title6 !!}</h3>
          <p class="text-gray-600 mb-4">{!! $about->choose_para6 !!}</p>
          <a href="#" class="bg-[#BFFB76] text-pink-800 font-medium px-6 py-2 rounded-full hover:bg-pink-200 transition">View Plan</a>
      </div>

  </div>
</section>

    <!-- Know About 9 to 9 School Section -->
    <!--<section class="section bg-light we-work py-5">-->
    <!--    <div class="container">-->
    <!--        <div class="row align-items-center">-->
    <!--            <div class="col-lg-6 p-sm how_to_work_p">-->
    <!--                <button class="how-we-work-btn">{{$about->sub_heaading_sec2}}</button>-->
    <!--                <h2>{{$about->heading_sec2}}</h2>-->
    <!--                <p class="text-justify">-->
    <!--                    {{$about->para_sec2}}-->
    <!--                </p>-->
    <!--            </div>-->
    <!--            <div class="col-lg-6">-->
    <!--                <div class="video-container">-->
    <!--                    <iframe-->
    <!--                            src="{{$about->video_link_sec2}}"-->
    <!--                            title="YouTube video player"-->
    <!--                            frameborder="0"-->
    <!--                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"-->
    <!--                            referrerpolicy="strict-origin-when-cross-origin"-->
    <!--                            allowfullscreen-->
    <!--                    ></iframe>-->
    <!--                </div>-->

    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->


   <!-- gallery -->
   <main data-aos="fade-up" class="px-2 md:px-8 lg:px-10 py-10" id="gallery">
        <div class="container mx-auto">
            <h1 class="text-center text-[#385469] text-3xl md:text-4xl font-bold">Gallery</h1>

           <div id="image-gallery">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-10">
                @foreach($gallery as $index => $item)
                    <div class="image">
                        <div class="img-wrapper">
                        <img src="{{ asset($item->image) }}"
                            class="rounded-2xl w-full h-60 object-cover
                                {{ $index === 0 ? 'col-span-1 md:col-span-2' : '' }}"
                            alt="{{ $item->heading ?? 'Gallery Image' }}">
                            
                        </div>
                    </div>
                @endforeach
            </div>
           </div>
        </div>
    </main>


   <!-- newes letter section -->
    <section class="newsletter-section py-5">
        <div class="newsletter-content">
            <h2 class="newsletter-heading">{{$about->heading_newsletter}}</h2>
            <p class="newsletter-text">
                {{$about->para_newsletter}}
            </p>
            <form class="newsletter-form">
                <input
                        type="email"
                        placeholder="Enter Your Mail"
                        class="newsletter-input text-blue-900"
                />
                <button type="submit" class="newsletter-button">Subscribe Now</button>
            </form>
        </div>
        <div class="newsletter-image-container">
            <img src="{{asset($about->image_newsletter)}}"
                    alt="Newsletter Image"
                    class="newsletter-image"
            />
        </div>
    </section>
@stop


@section('js')
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    {{--    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>--}}

    <script>
        // document.addEventListener('DOMContentLoaded', function () {
        //     var swiper = new Swiper('.testimonialSwiper', {
        //         slidesPerView: 1,
        //         spaceBetween: 30,
        //         pagination: {
        //             el: '.swiper-pagination',
        //             clickable: true,
        //         },
        //         breakpoints: {
        //             768: {
        //                 slidesPerView: 2,
        //             },
        //             992: {
        //                 slidesPerView: 3,
        //             },
        //         },
        //     });
        // });

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

<script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
document.addEventListener("DOMContentLoaded", function () {
    const galleryImages = document.querySelectorAll('#image-gallery img');

    galleryImages.forEach(img => {
        const src = img.getAttribute('src');
        const alt = img.getAttribute('alt') || 'Gallery Image';

        // Check if already wrapped to avoid duplicates
        if (!img.parentElement.matches('a[data-fancybox="gallery"]')) {
            const link = document.createElement('a');
            link.href = src;
            link.setAttribute('data-fancybox', 'gallery');
            link.setAttribute('data-caption', alt);
            link.style.display = "block"; // Ensure block-level for styling

            img.parentNode.insertBefore(link, img);
            link.appendChild(img);
        }
    });

    // Initialize Fancybox on these links
    Fancybox.bind("[data-fancybox='gallery']", {
        Images: {
            zoom: false,
        },
        Thumbs: false,
        Toolbar: false,
        backdropClick: "close",
    });
});
</script>


@stop
