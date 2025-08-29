@extends('layouts.web')
@section('css')
   

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/index.css') }}">
    <style>


        .heading{
            font-size: 40px !important;
        }
        .container{
            width:95% !important;
        }
        .pop-image {
            width: 70px !important;
            object-fit: cover;
        }

        .phone {
            margin-top: -100px;
        }

        .mySwiper2 .card-body{
            background: #fff;
        }
        .video_thumbnails{
            height: 600px;
            width: 100%;
        }

        .banner_section {
        //background-image: url(https://9to9school.com/public/assets/web/images/home/hello.png);
            background-size: cover;
            background-position: center;
            padding: 0;
            background: linear-gradient(180deg, #D7F8FE, #FFFFFF) !important;
        }

        .collapse {
            visibility: visible !important;
        }

        .accordion-item .accordion-header .accordion-button {
            padding: 10px 20px;
        }
        .skill-learn .frame-52 .frame-53{
            display:block;
        }
        .skill-learn .text-6{
            font-size:24px;
        }
        .mySwiper2 .card-body.p-4.text-left {
            border: 1px solid #ddd;
            border-radius: 0 0 15px 15px;
            box-shadow: unset;
        }
        .banner_section p{
            font-size: 16px;
            text-align: justify;
            padding: 5px;
        }
        .swiper-button-next{
            display: none;
        }
        .swiper-button-prev{
            display: none;
        }
        .journey_today{
            font-family: "Poppins", sans-serif;
            font-size: 18px !important;
            font-weight: 500;
            color: #000 !important;
        }

        @media (max-width: 480px) {
            .heading {
                font-size: 20px !important;
            }
            .apply_download{
                font-size: 14px !important;
            }

            .btn-custom {
                font-size: 10px;
                padding: 6px 10px;
            }

            .frame-35 {
                padding: 20px;
            }
            .child-milestones .tab-content h5{
                font-size: 20px !important;
            }

            .text-wrapper-26,
            .text-6 {
                font-size: 12px;
                line-height: 18px;
            }

            .quiz .unlock-two-days-of {
                font-size: 24px;
            }
            .video_thumbnails{
                height: 100%;
            }
            .start_quize{
                margin-bottom: 25px;
            }
            .frame-3 .card-body p{
                font-size: 15px;
            }

            .frame-3 .card-body h5 {
                font-size: 20px;
            }

            .start-your-child-s {
                font-size: 28px;
                line-height: 36px;
            }
            .child_group{
                margin-top: -30px !important;
            }
        }
        .child_group{
            margin-top: -100px !important;
        }
        .stand-apart .card-custom{
            height: 500px;
        }
        .frame-3 .card-body p{
            font-size: 15px !important;
        }
        .style_start_up{
            padding: 2rem;
        }
        @media (max-width: 767px) {
            .frame-3 .card-body p{
                line-height: 24px;
            }
            .style_start_up{
                padding: 2rem 1rem;
            }
            .btn-custom {
                font-size: 12px;
                padding: 8px 12px;
                font-weight: 500;
                background: #0dcaf0;
                color: #fff;
                font-size: 11px;
            }
            .child_group{
                margin-top: -30px !important;
            }

            .popular .frame-4 {
                border-radius: 20px;
            }

            section.banner_section h1 {
                font-size: 30px;
            }

            .banner_section p {
                font-size: 14px;
                text-align:center;
            }

            .skill-learn .text-wrapper-29 {
                font-size: 20px;
            }

            .skill-learn .frame-52 {
                padding: 27px 26px;
            }

            .skill-learn .text-6 {
                position: relative;
                align-self: stretch;
                font-weight: 400;
                color: #ffffff;
                font-size: 13.6px;
                letter-spacing: 0;
                line-height: 20.2px;
            }

            .app-banner .text-wrapper-26{
                font-size: 16px!important;
                text-align: center;
            }

            .app-banner .start-your-child-s {

                width: 100%;
                margin-top: -1px;

                font-size: 26px !important;
                letter-spacing: 0;
                line-height: 30.2px;
            }

            .quiz .text-wrapper-26 {
                position: relative;
                width: 100%;
            }
            #faq .text-wrapper-32{
                font-size: 15px;
            }

            .frame-3 .card-body h5 {
                font-size: 24px;
                line-height: 30px;
            }

            .popular .frame-4 p {
                line-height: 0px;
                font-size: 12px;

            }
            .stand-apart h2 {
                font-size: 26px;

            }
            .stand-apart .col-md-3 {
                height: 100%;
            }
            .heading {
                font-size: 20px !important;
                margin-bottom:20px !important;
            }
            .events_activities.py-2 h2 {
                margin-bottom: 0 !important;
            }


            .swiper {
                padding-bottom: 0;
            }

            .child-milestones p {
                font-size: 14px;
                text-align: justify !important;
                line-height: unset;
            }

            .child-milestones .btn-light {
                padding: 15px;
            }

            .child-milestones .tab-content .text-wrapper-16 {
                font-size: 15px;
            }

            .child-milestones .tab-content .frame-30 {
                margin: 20px 0;
            }

            .child-milestones .tab-content .frame-35 {
                text-align: center;
                padding: 35px 50px;
                gap: 0px;
            }

            .child-milestones .tab-content .text-wrapper-19 {
                text-align: center !important;
            }
            .app-banner .text-wrapper-26{
                line-height: 26px;
            }
            section.app-banner.my-5.py-4 {
                text-align: center;
                margin-top:8em !important;
            }

            .life-skills h2 {
                font-size: 32px;
            }

            section.app-banner.my-5.py-4 {
                margin-bottom: -2em !important;
            }
            section.life-skills.my-5 h2 {
                margin-bottom: 0 !important;
            }

            .mySwiper2 .card-body.p-4.text-left {
                border: 1px solid #ddd;
                border-radius: 0 0 15px 15px;
                box-shadow: unset;
                padding: 10px !important;
            }

            .swiper-wrapper {
                padding: 0px;
            }

            .quiz .frame-46 {
                text-align: left;
            }

            .quiz .unlock-two-days-of {
                font-size: 26px;
                text-align:center;
                line-height: unset;
            }

            .mobile_sider{
                margin-top: 20px !important;
                /*display: none;*/
            }

            .quiz .text-wrapper-26 {
                position: relative;
                width: 100%;
                font-size: 16px;
                text-align:center;
            }
            a.btn.btn-info.text-white.px-4.start_quize {
                display: block;
            }
            h2.text-wrapper-25{
                text-align: center;
            }

            .skill-learn .text-wrapper-27 {
                font-size: 32px;
            }
            section.py-2.skill-learn h2 {
                margin: 0 !important;
            }

            a.btn.text-center.btn-light.fw-semibold.px-4.my-3.py-2.rounded-pill {
                margin:15px 0 0 0 !important;
            }

            section#faq {
                padding: 50px 0 !important;
            }
            #faq .text-wrapper-31 {
                font-size: 32px;
                line-height:30px
            }

            .faq-category.text-wrapper-32 {
                margin: 30px 0 0;
            }

            button.accordion-button {
                padding: 16px;
                font-size: 14px;
            }

            .accordion-button:not(.collapsed)::after {
                background-image: var(--bs-accordion-btn-active-icon);
                transform: var(--bs-accordion-btn-icon-transform);
                background-size: 75%;
            }

            .life-skills img{

            }

            .popular .frame-4 img {
                position: relative;
                width: 65px;
                height: 90px;
                margin: 0 auto;
                padding: 10px;
                object-fit: contain;
            }

            .swiper-button-next:after,
            .swiper-button-prev:after {
                background: #fafafa;
                padding: 10px;
                font-size: 12px;
                border-radius: 50%;
            }

            .events_activities .card-body h6,
            .events_activities .card-body p {
                font-family: "Poppins", sans-serif;
            }

            .events_activities .card-body p {
                font-size: 14px;
                text-align: center;
            }

            .events_activities .card-body h6 {
                font-size: 22px;
            }

            .child-milestones .btn-purple,
            .child-milestones {
                font-size: 15px
            }

            .child-milestones .btn-light {
                font-size: 12px
            }
            .card-title{
                font-size: 18px;
            }

            h2.start-your-child-s.heading{
                margin-top:2em;
            }

            .accordion-button::after{
                background-size:14px !important;
                transform:unset;
            }

            .swiper-pagination.mt-3.swiper-pagination-clickable.swiper-pagination-bullets.swiper-pagination-horizontal{
                bottom:-5px;
            }
        }
    </style>
@stop

@section('body')
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
        .popular .frame-4 {
            border-radius: 20px;
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
    <!--<main id="main-content"  class="hero-section">-->
    <!--    <img src="{{ asset('assets/web/images/events/bg.png') }}" alt="Background" class="hero-bg" />-->
    <!--    <div class="hero-overlay"></div>-->

    <!--    <div class="text-center text-white">-->
    <!--        <h1 class="fw-bold display-5">-->
    <!--            Child Learning Milestones-->
    <!--        </h1>-->
    <!--        <p class="lead mt-3">-->
    <!--            Our curriculum is carefully designed to support key developmental-->
    <!--            milestones at each age. See how we nurture your child's growth through targeted learning experiences.-->
    <!--        </p>-->

    <!--    </div>-->
    <!--</main>-->
    <!--<div class="stand-apart popular container mx-auto custompadding-2em">-->
    <!--    <h2 class="heading mb-3">Popular for you</h2>-->
    <!--    <div class="row justify-content-center text-center">-->
            <!-- Each Age Group Item -->
    <!--        @foreach($populars as $popular)-->
    <!--        <div class="col-6 col-md-3 mb-4">-->
    <!--            <a href="{{url('popular-for-you?popularid='.$popular->id)}}" class="text-decoration-none text-dark">-->
    <!--                <div class="frame-4">-->
    <!--                    <img src="{!! asset($popular->image) !!}" class="img-fluid mb-2 pop-image" alt="{{$popular->title}}">-->
    <!--                    <p class="mb-0 fw-medium">{{$popular->title}}</p>-->
    <!--                </div>-->
    <!--            </a>-->
    <!--        </div>-->
    <!--        @endforeach-->
    <!--    </div>-->
    <!--</div>-->
    
        <div class="popularsec stand-apart popular container mx-auto py-8 lg:px-4">
    <h2 class="text-2xl font-bold mb-6 text-left mb-[50px]">Popular for you</h2>
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12 gap-6">
        @foreach($populars as $index => $popular)
            <a href="{{ url('popular-for-you?popularid='.$popular->id) }}" class="text-decoration-none text-dark">
                <div class="aspect-square border border-gray-300 rounded-[30px] shadow-md overflow-hidden flex flex-col justify-center items-center md:p-4 p-2
    transition duration-300 hover:shadow-sm
    {{ request('popularid') == $popular->id ? 'ring-2 ring-[#571D99] shadow-sm bg-[#f3e8ff]' : 'bg-white' }}">

                    <img src="{!! asset($popular->image) !!}" alt="{{ $popular->title }}" class="w-[80px] h-[80px] md:w-[120px] md:h-[120px] object-contain md:mb-4 mb-2">
                    <p class="md:text-2xl sm:text-lg font-medium text-center px-4">{{ $popular->title }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>

    <!--Child Milestones -->
    <section class="child-milestones py-2">
        <div class="container mx-auto">

            <div class="d-flex justify-content-center mb-4">
                <div class="container my-4">
                <ul class="grid lg:grid-cols-4 grid-cols-2 m-0 nav nav-pills row row-cols-2 row-cols-md-auto g-2 justify-content-center"
            id="milestoneTabs" role="tablist">
            @foreach($milestones as $index => $milestone)
                <li class="nav-item text-center w-full" role="presentation">
                    <button class="nav-link btn-light w-100 {{ $index === 0 ? 'active' : '' }}"
                        id="tab-{{ $index }}" data-bs-toggle="pill"
                        data-bs-target="#tab-content-{{ $index }}"
                        type="button" role="tab">
                        {{ $milestone->goal_month }}
                    </button>
                </li>
            @endforeach
        </ul>
                </div>
            </div>

            <!-- Tab Content -->
            <div class="tab-content" id="milestoneTabsContent">
    @foreach($milestones as $index => $milestone)
        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="tab-content-{{ $index }}" role="tabpanel">
            <h5 class="fw-semibold text-center mb-2">{{ $milestone->goal_heading }}</h5>
            <p class="text-center text-muted mb-4">{{ $milestone->goal_description }}</p>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="frame-30">
                        <h6 class="fw-bold">{{ $milestone->goal_breaf }}</h6>

                        @php
                            $topics = json_decode($milestone->topics_including, true);
                            $topics = is_array($topics) ? array_map('intval', $topics) : [];
                        @endphp

                        <ul class="list-unstyled">
                            @foreach($topics as $num => $topic_id)
                                @php
                                    $get_topic = \App\Models\Topic::find($topic_id);
                                @endphp
                                @if($get_topic)
                                    <li class="mb-2">
                                        <div class="frame-34"><span class="text-wrapper-15">{{ $num + 1 }}</span></div>
                                        <span class="text-wrapper-16">{{ $get_topic->topic_name }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="frame-35">
                        <h4 class="text-wrapper-18">Program Fee</h4>
                        <p class="text-wrapper-19">₹{{ $feesdata->per_month_fee ?? 0.00}}</p>
                        <p class="text-wrapper-18">per month</p>
                        <p class="text-wrapper-18" style="color: #000"><b>₹{{ $feesdata->per_month_fee ?? 0.00}}</b></p>
                        <p class="text-wrapper-18">annual payment (save 10%)</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
        </div>
    </section>
    <!-- Download App section -->

@stop

@section('js')
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // header slider
        // header slider
        let swiper = new Swiper(".swiper-container0", {
            effect: "coverflow",
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: true,
            },
            centeredSlides: true,
            slidesPerView: 3, // Show exactly 3 slides
            initialSlide: 1,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 10,
                slideShadows: false,
            },
        });

    </script>

    <!-- Events -->
    <script>
        const swiper2 = new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 4,
                },
            },
        });

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

    <!-- Life skills -->

    <script>
        new Swiper(".mySwiper2", {
            slidesPerView: 1,
            spaceBetween: 15,
            breakpoints: {
                576: {
                    slidesPerView: 2,
                },
                768: {
                    slidesPerView: 3,
                },
                992: {
                    slidesPerView: 4,
                }
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>


@stop
