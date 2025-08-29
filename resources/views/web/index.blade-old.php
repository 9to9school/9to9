@extends('layouts.web')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/index.css') }}">
    <style>

.overlay-nav{display: none;}
.prototype .swiper-wrapper img {
                        width: 45%;
                        /* height: 600px; */

                    }
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

        /*.phone {*/
        /*    margin-top: -100px;*/
        /*}*/

        .phone {
            /* margin-top: -130px !important; */
            padding-top: 5px !important;
            height: 482px;
            width: 100% !important;
            object-fit: cover;
        }
        .mySwiper2 .card-body{
            background: #fff;
        }
        .video_thumbnails{
            height: 600px;
            width: 100%;
        }

        .banner_section {
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
            height: 277px;
        }
        .banner_section p{
            font-size: 16px;
            text-align: left;
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
            margin-top: -30px !important;
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
                text-align: center;
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
                text-align: center !important;
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
                margin-bottom: -2em !important;
            }

            .life-skills h2 {
                font-size: 32px;
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
.child_group{
                        /*position: relative;margin-top: -252px;overflow-x: hidden;*/
                        position: relative;margin-top: 0px;overflow-x: hidden;
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
                margin-top:1em;
            }

            .accordion-button::after{
                background-size:14px !important;
                transform:unset;
            }

            .swiper-pagination.mt-3.swiper-pagination-clickable.swiper-pagination-bullets.swiper-pagination-horizontal{
                bottom:-5px;
            }

            .phone {
                margin-top: -64px;
                height: 220px;
                width: 100% !important;
                object-fit: cover;
            }

            .events_activities.custompadding-2em.py-8.px-4 {
                padding: 10px !important;
            }

            .events_activities.custompadding-2em.py-8.px-4 .container.mx-auto {
                margin: 0 !important;
                padding: 0 !important;
            }

            .stand-apart.popular.container.mx-auto.py-8.px-4 {
                /* padding: 10px; */
            }
            .popularsec img{
             height: 48px !important;
             width: 48px !important;
            } 

            .popularsec h2{
             text-align: center !important;
            }
                   
        }
         /* home page */
        .secchildmil {
           padding-top: 2rem !important;
           padding-bottom: 2rem !important;
        }

        .downloadsec{
           padding-top: 2rem !important;
           padding-bottom: 2rem !important;
        }
        .testsec{
          margin-top: -14px; 
        }

        .swiper-slide.h-full.eventsec {
            height: 455px;

        }
            @media screen and (min-width:768px) and (max-width:1200px){
                section.banner_section h1 {
                    font-size: 35px;
                }
                .app-banner .start-your-child-s {
                        width: 100%;
                        line-height: 50.2px;
                        text-align: center;
                }
            }
        </style>
@stop

@section('body')
    <!-- Main Section -->
    <section class="banner_section custompadding-2em" id="main-content">
        <div class="container mx-auto  md:py-2">
            <div class="row p-3 align-items-center">
                <!-- Left content -->
                <div class="col-md-6 text-center text-md-start">
                    <span id="desktopBadge" class="badge bg-white text-dark mb-2 p-2 rounded-full ">
                        Smart learning &, playful beginnings!</span>
                    <span id="mobileBadge" class="badge bg-white text-dark mb-2 p-2 rounded-full" style="display: none;">
                        A smarter way to start<br>your child’s learning journey
                    </span>
                    <h1 class="fw-bold">Welcome to the<br><span class="text-info">9 TO 9 School</span></h1>
                    <p class="md:text-left">
                        At 9to9 Preschool, every child’s journey is shaped by a custom-tailored curriculum, blending expert lessons with joyful discovery. With flexible hours from 9 AM to 9 PM, learning flows with your schedule. Crafted for young minds, designed for modern families  where education is both personal and effortless.
                    </p>
                    <div class="d-flex gap-2 justify-content-center justify-content-md-start mt-3">
                        <a href="{!! URL('enroll1') !!}" class="btn btn-primary btn-custom">Apply Today</a>
                        <a href="https://play.google.com/store/apps?hl=en_IN&pli=1" class="btn btn-outline-info btn-custom">Download App <span>&#x25BC;</span></a>
                    </div>
                </div>
                <!-- Right phone slider -->
                <div class="col-md-6 text-center z-2 mobile_sider">
                    <section class="prototype swiper-container0  w-full overflow-hidden pb-4">
                        <div class="swiper-wrapper">
                            @forelse($web_banner as $web_banners)
                            <img src="{{$web_banners->image}}"
                                alt="Mobile App UI" class="swiper-slide" />
                            @empty
                            @endforelse
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            
                <div style="" class="child_group">
                    <img src="{!! asset('assets/web/images/home/child.png') !!}" alt="Child"
                         class="w-full object-cover">
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="custompadding-2em py-5 lg:px-4">
        <div class="container mx-auto">
            <div class="row justify-content-center text-center">
                <!-- Preschool Card -->
                @foreach($categories as $category)
                    <div class="col-md-4 {{ $loop->iteration % 2 == 0 ? 'offset-md-1' : '' }} p-3">
                        <div class="card text-center frame-3 p-0">
                            <a href="{{ url($category->category_url) }}">
                                <img src="{!! asset($category->image) !!}" class="card-img-top rounded-top w-100 img-slider"
                                    alt="{{$category->category_name}}">
                                <div class="card-body">
                                    <h5 class="card-title fw-semibold">{{$category->category_name}}</h5>
                                    <p class="card-text text-muted">{{$category->content}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- closing for container -->
    </section>

   
    <div class="popularsec stand-apart popular container mx-auto py-8 lg:px-4">
        <h2 class="text-2xl font-bold mb-6 text-left mb-[50px]">Popular for you</h2>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12 gap-6">
            @foreach($populars as $popular)
            <a href="{{ url('popular-for-you') }}" class="text-decoration-none text-dark">
                <div class="aspect-square border border-gray-300 rounded-[30px] bg-white shadow-md overflow-hidden flex flex-col justify-center items-center md:p-4 p-2">
                    <img src="{!! asset($popular->image) !!}" alt="{{$popular->title}}" class="w-[80px] h-[80px] md:w-[120px] md:h-[120px] object-contain md:mb-4 mb-2">
                    <p class="md:text-2xl sm:text-lg font-medium text-center px-4">{{$popular->title}}</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <!--Child Milestones -->
    <section class="secchildmil child-milestones py-8 py-4 custompadding-2em">
        <div class="container mx-auto">
            <h2 class="heading text-center mb-3">Child Learning Milestones</h2>
            <p class="text-center sm:text-left text-muted w-[80%] m-auto mb-4">Our curriculum is carefully designed to support key developmental
                milestones at each age. See how we nurture your child's growth through targeted learning experiences.</p>
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
                        <p class="text-center sm:text-left  text-muted mb-4">{{ $milestone->goal_description }}</p>
                        <div class="row justify-content-center mb-14">
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
                                    <p class="text-wrapper-19">₹2500</p>
                                    <p class="text-wrapper-18">per month</p>
                                    <p class="text-wrapper-18" style="color: #000"><b>₹27000</b></p>
                                    <p class="text-wrapper-18">annual payment (save 10%)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="stand-apart custompadding-2em py-8 px-4">
        <div class="container mx-auto py-2">
            <h2 class="heading mb-[50px]">Why We Stand Apart</h2>
            <div class="row g-4">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- Card 1 -->
                        @php
                            $colors = ['#571D99', '#FFD037', '#16A34A', '#0AC0DF'];
                        @endphp
                        @foreach($standApart as $index => $stand)
                            @php
                                $color = $colors[$index % count($colors)] ?? '#000000'; // repeat & fallback
                            @endphp

                            <div class="swiper-slide">
                                <div class="card card-custom rounded-3xl">
                                    <img src="{!! asset($stand->image) !!}" class="card-img" alt="...">
                                    <div class="card-img-overlay" style="background: linear-gradient(0deg, black, transparent);height: 40%;top: auto;bottom: 0;">
                                         <h5 class="card-title">{{ $stand->title }}</h5>
                                        <!--<h5 class="card-title">{{ \Illuminate\Support\Str::limit($stand->title, limit: 24) }}</h5>-->
                                      {{--  <p class="card-text mb-4">{{ \Illuminate\Support\Str::limit($stand->description, limit: 50) }}</p> --}}
                                        @php
                                            $colors = ['#571D99', '#FFD037', '#16A34A', '#0AC0DF'];
                                                $color = $colors[$index % count($colors)];
                                        @endphp
                                        <a href="{{ url('usp-details') }}" class="btn m-auto w-[80%] bg-[{{ $color }}] hover:bg-[{{ $color }}]  text-white mt-2">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- Card 2 -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- EVENTS & ACTIVITIES -->
    <div class="events_activities custompadding-2em py-8 px-4">
        <div class="container mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="heading mb-[50px]">Events & Activities</h2>
<!--                 <a href="#" class="text-primary text-decoration-none mb-[20px]">View All</a> -->
            </div>
            <div class="swiper mySwiper md:mb-20 ">
                <div class="swiper-wrapper">
                    @foreach($events as $event)
                        <div class="swiper-slide h-full eventsec">
                            <div class="h-full flex flex-col bg-white rounded-lg border shadow overflow-hidden">
                                <img src="{!! asset($event->image) !!}" class="w-full p-2 object-cover" alt="Storytelling">
                                <div class="flex flex-col justify-between flex-1 p-4">
                                    <div>
                                        <h6 class="text-lg font-semibold">{{ $event->event_name }}</h6>
                                        <p class="text-sm mt-1">{{ $event->description }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <div class="grid grid-cols-3 mb-4">
                                            <div class="flex gap-1 items-center text-sm">
                                                <img class="!h-[14px]" src="{!! asset('assets/images/time.png') !!}" alt=""> {{ $event->duration }}
                                            </div>
                                            <div class="flex gap-1 items-center text-sm">
                                                <img class="!h-[16px]" src="{!! asset('assets/images/user.png') !!}" alt=""> {{ $event->age }}
                                            </div>
                                            <div class="flex gap-1 items-center text-sm">
                                                <img class="!h-[16px]" src="{!! asset('assets/images/copy.png') !!}" alt=""> Interactive
                                            </div>
                                        </div>
                                        <a href="https://calendly.com/9to9schools/30min" target="_blank"
                                           class="inline-block w-full text-center bg-[#571D99] hover:bg-[#760af1] text-white text-sm px-4 py-2 rounded hover:bg-opacity-90 transition">
                                            Book a section
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>

    <!-- Download App section -->
    <section class="app-banner py-8 py-4 mt-3 custompadding-2em downloadsec" >
        <div class="container mx-auto" style="background-color: #eaf8ff;">
            <div class="row align-items-center style_start_up">
                <div class="col-lg-5 text-center order-lg-last">
                    <img src="{{asset($child_learning->image)}}" width="100%" class="img-fluid phone sm:mt-[-57px] md:mt-[-115px] lg:mt-[-130px]" alt="App Preview">
                </div>
                <div class="col-lg-7 order-lg-first">
                    <h2 class="start-your-child-s heading">
                        <span class="text-wrapper-40" style="font-weight: 800" >{{$child_learning->heading}}</span>
                    </h2>
                    <p class="text-muted text-wrapper-26 lg:text-left text-left mt-2 journey_today">{{$child_learning->description}}</p>
                    <div class=" flex flex-wrap justify-center items-center gap-3 mt-3">
                        <a href="#"> <img src="{{asset($child_learning->app_image1)}}" alt="Google Play" style="height:40px;"></a>
                        <a href="#"><img src="{{asset($child_learning->app_image2)}}"alt="App Store" style="height:40px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- life skills hack -->
    <section class="life-skills py-8 px-4 custompadding-2em">
        <div class="container mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold heading mb-[50px]">Life Skills Hacks</h2>
<!--                 <a href="{{ url('life-skills') }}" class="text-primary text-decoration-none">View All</a> -->
            </div>
            <!-- Swiper -->
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper">
                    <!-- Slide 1 -->
                    @foreach($hacks as $row)
                    <div class="swiper-slide">
                        <div class="card bg-white shadow-md p-0 border-0 rounded-4">
                            <img src="{!! asset($row->image) !!}" class="card-img-top p-0" alt="Packing Bag">
                            <div class="card-body p-4 text-left">
                                <h6 class="fw-bold text-left">{!! ucfirst($row->title) !!}</h6>
                                <p class="text-muted mt-2 mb-3 text-left small">
                                    {!! ucfirst($row->description) !!}
                                </p>
                                <a href="{{ url('/life-skills') }}" class="text-left text-primary underline fw-semibold">Learn more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <!-- Swiper Pagination -->
                <div class="swiper-pagination mt-3"></div>
            </div>
        </div>
    </section>


    <!-- Quiz Contents App section -->
    <section class="quiz py-8 px-4 bg-light1 custompadding-2em">
        <div class="container mx-auto" style="background-color: #fef5ef;">
            <div class="row align-items-center p-3 p-md-5">
                <!-- Image Section -->
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="{{asset($quizContents->image)}}" class="img-fluid">
                </div>
                <!-- Text Section -->
                <div class="col-md-8">
                    <h2 class="text-wrapper-25">{{$quizContents->heading}}</h2>
                    <div class="frame-46 mb-3">
                        <h3 class="unlock-two-days-of">{{$quizContents->sub_heading}}</h3>
                        <p class="text-wrapper-26" style="font-family:'Poppins', sans-serif;">
                            {{$quizContents->description}}
                        </p>
                    </div>
                    <a href="{{url('quiz')}}" class="btn btn-info text-white px-4 start_quize" style="padding: 10px">Start Quiz</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-8 px-4 skill-learn custompadding-2em">
        <div class="container mx-auto">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="fw-bold heading mb-[50px]">Skill Learning</h2>
<!--                 <a href="#" class="text-primary text-decoration-none mb-[20px]">View All</a> -->
            </div>
            <div class="row">
                <!-- Right Section: Skill Learning -->
                <div class="col-md-12">
                    <!-- Video Thumbnail with Play Button -->
                    <div class="position-relative mb-4">
                        <img src="https://content.instructables.com/FXB/78JL/IL2C7BIP/FXB78JLIL2C7BIP.jpg?auto=webp&fit=bounds&frame=1&height=1024&width=1024auto=webp&frame=1&height=150" class="img-fluid rounded video_thumbnails" alt="Video Thumbnail">
                        <a class="rounded-circle position-absolute top-50 start-50 translate-middle">
                            <img src="{!! asset('assets/images/play.png') !!}" alt="">
                        </a>
                    </div>
                    <!-- Buttons -->
                    <div class="d-flex justify-content-center gap-3 mb-4">
                        <a href="#" class="btn px-6 py-4 text-xl fw-semibold text-white " style="background-color: #4b1c74; border-radius: 8px;width: 200px;height: 56px;align-items: center;justify-content: center;display: flex">Watch</a>
                        <a href="#" class="btn px-6 py-4  text-xl fw-semibold text-white apply_download" style="background-color: #4b1c74; border-radius: 8px;width: 200px;height: 56px;align-items: center;justify-content: center;display: flex">Download App</a>
                    </div>
                    <!-- Gradient CTA Box -->

                    <div class="frame-52 text-center items-center justify-center mt-5 mb-5">
                        <div class="frame-53 text-center">
                            <h2 class="text-wrapper-29 text-center">{{$visitBookings->title}}</h2>
                            <p class="text-6 mt-4">
                               {{$visitBookings->description}}
                            </p>
                        </div>
                        <a href="#" class="btn text-center btn-light fw-semibold px-4 my-2.5 py-2 rounded-pill">Book a
                            Visit →</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="py-8 px-4 custompadding-2em" style="background-color: #f6f6f6">
        <div class="container my-md-5 my-lg-5 my-0 mx-auto">
            <h2 class="text-center text-wrapper-31 heading frequently">Frequently Asked Questions</h2>
            @foreach ($faq_categories as $category)
                <div class="faq-category text-wrapper-32 flex">
{{--                    <img class="faq-icon" src="{{ asset('assets/web/images/home/' . strtolower(str_replace(' ', '', $category->name)) . '.svg') }}" alt="">--}}
                    {{ $category->name }}
                </div>

                <div class="accordion p-3" id="faqCategory{{ $category->id }}">
                    @if (isset($faqs[$category->id]))
                        @foreach ($faqs[$category->id] as $key => $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header p-1">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                        {{ $faq->name }}
                                    </button>
                                </h2>
                                <div id="faq{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqCategory{{ $category->id }}">
                                    <div class="accordion-body">
                                        {{ $faq->description }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>No FAQs available under this category.</p>
                    @endif
                </div>
            @endforeach
        </div>
    </section>
@stop

@section('js')
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        
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
            breakpoints: {
                0: {
                    slidesPerView: 1.6
                },
                768: {
                    slidesPerView: 2
                },
            }
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
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
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
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
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
