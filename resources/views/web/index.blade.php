@extends('layouts.web')
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/web/css/index.css') }}">
    <style>
        .stand-apart .card-img-overlay p {
            font-size: 15px;
            line-height:20px;}

.overlay-nav{display: none;}
.prototype .swiper-wrapper img {width: 45%;}
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
                        {{ $webcontents->heading ?? '' }}</span>

                    <h1 class="fw-bold">{{ $webcontents->title ?? '' }}<br><span class="text-info">{{ $webcontents->subheading ?? '' }}</span></h1>
                    <p class="md:text-left">
                        {{ $webcontents->description ?? '' }}
                    </p>
                    <div class="d-flex gap-2 justify-content-center justify-content-md-start mt-3">
                        <a href="{{ $webcontents->button_link ?? ''}}" class="btn btn-primary btn-custom">{{ $webcontents->button_name ?? '' }}</a>
                        <a href="{{ $webcontents->button_link2 ?? '' }}" class="btn btn-outline-info btn-custom">{{ $webcontents->button_name2 ?? '' }} <span>&#x25BC;</span></a>
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
                        <img src="{!! asset('assets/web/images/home/child.webp') !!}" alt="Child"
                             class="w-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="custompadding-2em py-5 lg:px-4">  
        <div class="container mx-auto">
            <h2 class="heading text-center mb-3 ">Our Programs: Best Preschool Curriculum in India</h2>
            <div class="row justify-content-center text-center">
                <!-- Preschool Card -->
                @foreach($categories as $category)
                    <div class="col-md-4 {{ $loop->iteration % 2 == 0 ? 'offset-md-1' : '' }} p-3">
                        <div class="card text-center frame-3 transition duration-300 hover:shadow-xl p-0">
                            <a href="{{ url($category->category_url) }}">
                                <img src="{!! asset($category->image) !!}" class="card-img-top rounded-top w-100 img-slider"
                                    alt="{{$category->category_name}}">
                                <div class="card-body">
                                    <h3 class="card-title fw-semibold">{{$category->category_name}}</h3>
                                    <p class="card-text text-muted">{{$category->content}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> <!-- closing for container -->
    </section>

    <!-- Popular for You -->
    <div class="popularsec stand-apart popular container mx-auto py-8 lg:px-4">
        <h2 class="text-2x2l font-bold mb-6 text-left mb-[50px]">Popular Age Groups for Preschool Education in India</h2>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12 gap-6">
            @foreach($populars as $index => $popular)
                <a href="javascript:void(0);" class="text-decoration-none text-dark popular-btn"
                   data-popular-id="{{ $popular->id }}">
                    <div class="aspect-square border border-gray-300 rounded-[30px] shadow-md overflow-hidden flex flex-col justify-center items-center md:p-4 p-2
                    transition duration-300 hover:shadow-sm
                    {{ $index === 0 ? 'ring-2 ring-[#571D99] shadow-sm bg-[#f3e8ff]' : 'bg-white' }}">
                        <img src="{!! asset($popular->image) !!}" alt="{{ $popular->title }}"
                             class="w-[80px] h-[80px] md:w-[120px] md:h-[120px] object-contain md:mb-4 mb-2">
                        <p class="md:text-2xl sm:text-lg font-medium text-center px-4">{{ $popular->title }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Milestones Content for Each Popular -->
    @foreach($populars as $index => $popular)
        <section class="secchildmil child-milestones py-8 py-4 custompadding-2em popular-milestones {{ $index !== 0 ? 'hidden' : '' }}"
                 id="popular-milestones-{{ $popular->id }}">
            <div class="container mx-auto">
                <h2 class="heading text-center mb-3">Child Learning Milestones for {{ $popular->title }} at the Best Preschool in India</h2>

                @php
                    $milestones = \App\Models\Milestone::where('popular_id', $popular->id)->get();
                @endphp

                @if(!$milestones->isEmpty())
                    <div class="d-flex justify-content-center mb-4">
                        <div class="container my-4">
                            <ul class="grid lg:grid-cols-4 grid-cols-2 m-0 nav nav-pills row row-cols-2 row-cols-md-auto g-2 justify-content-center"
                                id="milestoneTabs-{{ $popular->id }}" role="tablist">
                                @foreach($milestones as $mIndex => $milestone)
                                    <li class="nav-item text-center w-full" role="presentation">
                                        <button class="nav-link btn-light w-100 {{ $mIndex === 0 ? 'active' : '' }}"
                                                id="tab-{{ $popular->id }}-{{ $mIndex }}" data-bs-toggle="pill"
                                                data-bs-target="#tab-content-{{ $popular->id }}-{{ $mIndex }}"
                                                type="button" role="tab">
                                            {{ $milestone->goal_month }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="milestoneTabsContent-{{ $popular->id }}">
                        @foreach($milestones as $mIndex => $milestone)
                            <div class="tab-pane fade {{ $mIndex === 0 ? 'show active' : '' }}"
                                 id="tab-content-{{ $popular->id }}-{{ $mIndex }}" role="tabpanel">
                    
                                <!-- Milestone Title & Description -->
                                <div class="text-center mb-8">
                                    <h3 class="text-2xl font-bold text-gray-800">{{ $milestone->goal_heading }}</h3>
                                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">{{ $milestone->goal_description }}</p>
                                </div>
                    
                                <div class="flex flex-col lg:flex-row gap-8 justify-center items-center ">
                                    <!-- Left Side: Topic Cards -->
                                    <div class="flex-1 space-y-6">
                                        <div class="p-4">
                                            <h3 class="text-lg font-semibold text-blue-900 mb-4">{{ $milestone->goal_breaf }}</h3>
                    
                                            @php
                                                $topics = json_decode($milestone->topics_including, true) ?? [];
                                            @endphp
                    
                                            <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-2">
                                                @foreach($topics as $num => $topic_id)
                                                    @php
                                                        $get_topic = \App\Models\Topic::find($topic_id);
                                                    @endphp
                    
                                                    @if($get_topic)
                                                        <div class="transition transform hover:-translate-y-1 hover:shadow-2xl hover:border-blue-400 border border-gray-200 bg-gray-50 rounded-2xl p-3 duration-300 ease-in-out">
                                                            <div class="flex items-center gap-3 mb-2">
                                                                <div class="bg-blue-100 text-blue-800 text-sm font-bold rounded-full w-8 h-8 flex items-center justify-center">
                                                                    {{ $num + 1 }}
                                                                </div>
                                                                <h4 class="text-md font-semibold text-gray-800">
                                                                    {{ $get_topic->topic_name }}
                                                                </h4>
                                                            </div>
                    
                                                            {{-- Subtopics --}}
                                                            @php
                                                                $subtopics = \App\Models\SubTopic::where('topic_name', $get_topic->id)
                                                                    ->where('age', $milestone->popular_id)
                                                                    ->where('quarters', $milestone->goal_month)
                                                                    ->get();
                                                            @endphp
                    
                                                            @if($subtopics->count())
                                                                <div class="text-sm text-gray-600 mt-1 space-y-1">
                                                                    @foreach($subtopics as $sub)
                                                                        <div class="pl-3 border-l-2 border-blue-500">{{ $sub->name }}</div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                    
                                    <!-- Right Side: Image -->
                                    <div class="w-full lg:w-1/3 flex justify-center items-center">
                                        <img src="{{ asset('assets/images/usp.png') }}"
                                             alt="Milestone Visual"
                                             class="w-full max-w-sm mx-auto rounded-xl mt-4 shadow-lg">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @else
                    <p class="text-center">No milestones found for this category.</p>
                @endif
            </div>
        </section>
    @endforeach




    <section class="stand-apart custompadding-2em py-8 px-4">
        <div class="container mx-auto py-2">
            <h2 class="heading mb-[50px]">Why 9to9 School Stands Apart as a Top Preschool Franchise in India</h2>
            <div class="row g-4">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- Card 1 -->
                       @php
                            $colors = ['#571D99', '#FFD037', '#16A34A', '#0AC0DF'];
                        @endphp
                        
                        @foreach($standApart as $index => $stand)
                            @php
                                $color = $colors[$index % count($colors)] ?? '#000000';
                            @endphp
                        
                            <div class="swiper-slide">
                                <div class="card card-custom rounded-3xl overflow-hidden h-full">
                                    <img src="{!! asset($stand->image) !!}" class="card-img w-full object-cover" alt="...">
                        
                                    <div class="card-img-overlay flex flex-col justify-end" style="background: linear-gradient(0deg, black, transparent); height: 33%; top: auto; bottom: 0;">
                                        <!-- Title with equal height -->
                                        <div class="min-h-[60px] flex items-center justify-center text-center px-2">
                                            <h5 class="card-title text-white line-clamp-2 leading-snug">
                                                {{ $stand->title }}
                                            </h5>

                                        </div>
                                        <p class="text-gray-600 mt-2 text-lg max-w-2xl mx-auto">{{ $stand->description }}</p>
                        
                                        <!-- CTA Button -->
                                        <a href="{{ url('usp-details') }}" class="btn m-auto w-[80%] bg-[{{ $color }}] hover:bg-[{{ $color }}] text-white mt-2">
                                            Learn More
                                        </a>
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
                <h2 class="heading mb-[50px]">Events & Activities at the Best Preschool in India</h2>
            </div>
            <div class="swiper mySwiper md:mb-20 ">
                <div class="swiper-wrapper">
                    @foreach($events as $event)
                        <div class="swiper-slide h-full eventsec">
                            <div class="h-full flex flex-col bg-white rounded-lg border shadow overflow-hidden">
                                <img src="{!! asset($event->image) !!}" class="w-full p-2 object-cover" alt="Storytelling">
                                <div class="flex flex-col justify-between flex-1 p-4">
                                    <div>
                                        <h3 class="text-lg font-semibold">{{ $event->event_name }}</h3>
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
                                        <!--<a href="{{ url('event-details/'.$event->event_url) }}" target="_blank"-->
                                        <!--   class="inline-block w-full text-center bg-[#571D99] hover:bg-[#760af1] text-white text-sm px-4 py-2 rounded hover:bg-opacity-90 transition">-->
                                        <!--    Book a section-->
                                        <!--</a>-->
                                        
                                        <a href="#" 
   data-bs-toggle="modal" 
   data-bs-target="#enquiryModal"
   class="inline-block w-full text-center bg-[#571D99] hover:bg-[#760af1] text-white text-sm px-4 py-2 rounded hover:bg-opacity-90 transition">
   Book a Session
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
                    <div class="flex flex-wrap justify-center md:justify-start lg:justify-start items-center gap-3 mt-3">
                        <a href="#"><img src="{{ asset($child_learning->app_image1) }}" alt="Google Play" style="height:40px;"></a>
                        <a href="#"><img src="{{ asset($child_learning->app_image2) }}" alt="App Store" style="height:40px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!-- Life Skill HAck & ACTIVITIES -->
<div class="events_activities custompadding-2em py-8 px-4">
    <div class="container mx-auto">
        <!-- <div class="flex  justify-content-between align-items-center mb-4">
            <h2 class="heading mb-[50px]">Life Skills Hacks</h2>
            <a href="" class="text-sm text-white bg-[#571D99] hover:bg-[#760af1] px-4 py-2 rounded transition">
                View All
            </a>
        </div> -->
         <div class="flex justify-between items-center mb-[50px]">
            <h2 class="font-bold heading">Life Skills Hacks for Preschoolers at Top Preschool Franchises in India</h2>
            <a href="{{ url('/life-skills') }}"
               class="text-sm text-white bg-[#571D99] hover:bg-[#760af1] px-4 py-2 rounded transition">
                View All
            </a>
        </div>
        <div class="swiper mySwiper md:mb-20">
            <div class="swiper-wrapper">
                @foreach($hacks as $row)
                    <div class="swiper-slide h-full eventsec flex">
                        <div class="flex flex-col bg-white rounded-lg border shadow overflow-hidden w-full h-full">
                            <div class="h-[200px] overflow-hidden">
                                <img src="{!! asset($row->image) !!}" class="w-full h-full object-cover p-2" alt="Storytelling">
                            </div>
                            <div class="flex flex-col justify-between flex-1 p-4">
                                <div>
                                    <h3 class="text-lg font-semibold">{!! ucfirst($row->title) !!}</h3>
                                    <p class="text-sm mt-1">{!! ucfirst(Str::limit($row->description,50)) !!}</p>
                                </div>
                                <div class="mt-4">
                                    <a href="{{ url('/life-skills/'. $row->url) }}"
                                       class="inline-block w-full text-center bg-[#571D99] hover:bg-[#760af1] text-white text-sm px-4 py-2 rounded hover:bg-opacity-90 transition">
                                        Learn more
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
            </div>
            <div class="row">
                <!-- Right Section: Skill Learning -->
                <div class="col-md-12">
                    <!-- Video Thumbnail with Play Button -->
                    <!--<div class="position-relative mb-4">-->
                    <!--    <img src="https://content.instructables.com/FXB/78JL/IL2C7BIP/FXB78JLIL2C7BIP.jpg?auto=webp&fit=bounds&frame=1&height=1024&width=1024auto=webp&frame=1&height=150" class="img-fluid rounded video_thumbnails" alt="Video Thumbnail">-->
                    <!--    <a href="https://www.youtube.com/watch?v=a_Z4pBjOqLo" class="rounded-circle position-absolute top-50 start-50 translate-middle">-->
                    <!--        <img src="{!! asset('assets/images/play.png') !!}" alt="">-->
                    <!--    </a>-->
                    <!--</div>-->
                   <!-- Video Thumbnail with Play Button -->
<!-- Video Thumbnail with Play Button -->
<div class="position-relative mb-4">
    <img src="{!! asset('assets/images/youtube.jpg') !!}" 
         class="img-fluid rounded video_thumbnails" 
         alt="Video Thumbnail">
    <a href="#" 
       class="rounded-circle position-absolute top-50 start-50 translate-middle"
       data-bs-toggle="modal"
       data-bs-target="#videoModal"
       data-video-url="https://www.youtube.com/embed/a_Z4pBjOqLo">
        <img src="{!! asset('assets/images/play.png') !!}" alt="">
    </a>
</div>
                    <!-- Buttons -->
                    <div class="d-flex justify-content-center gap-3 mb-4">
                       <a href="#" 
   class="btn px-6 py-4 text-xl fw-semibold text-white" 
   style="background-color: #4b1c74; border-radius: 8px; width: 200px; height: 56px; align-items: center; justify-content: center; display: flex;"
   data-bs-toggle="modal" 
   data-bs-target="#videoModal"
   data-video-url="https://www.youtube.com/embed/a_Z4pBjOqLo">
   Watch
</a>
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
                        <a href="https://calendly.com/9to9schools/30min?month=2025-05" class="btn text-center btn-light fw-semibold px-4 my-2.5 py-2 rounded-pill">Book a
                            Visit →</a>
                    </div>
                </div>
            </div>
            <!-- Video Modal -->
<!-- Bootstrap Video Modal -->
<!-- Video Modal -->
<div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="videoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content bg-dark border-0">
      <div class="modal-body p-0">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
        <div class="ratio ratio-16x9">
          <iframe id="youtubeVideo" class="w-100 h-100" src="" 
                  title="YouTube video player" 
                  allow="autoplay; encrypted-media" 
                  allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="enquiryModal" tabindex="-1" aria-labelledby="enquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md">
    <div class="modal-content rounded-lg">
      <div class="modal-header">
        <h5 class="modal-title text-lg font-semibold" id="enquiryModalLabel">Book a Session</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-6">
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
                                    {{ $errors->has('name') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" required>
                  @error('name')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                  @enderror
              </div>

              <!-- Email ID -->
              <div>
                  <input type="email" name="email" value="{{ old('eamil') }}"
                         required placeholder="Email ID"
                         class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                    {{ $errors->has('email') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" required>
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
                                    {{ $errors->has('mobile') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" required>
                  @error('mobile')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                  @enderror
              </div>

              <div>
                  <input type="number" name="pin_code" value="{{ old('pin_code') }}"
                         placeholder="Pin Code" min="100000" 
                          max="999999"
                         class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                    {{ $errors->has('pin_code') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="pin_code" required> 
                  @error('pin_code')
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
                                        {{ $errors->has('state') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="state" required>
                      @error('state')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                      @enderror
                  </div>
                  <div>
                      <input type="text" name="city" value="{{ old('city') }}"
                             placeholder="City"
                             onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                             class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                        {{ $errors->has('city') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="city" required>
                      @error('city')
                      <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                      @enderror
                  </div>
              </div>

              <!-- Message -->
              <div>
                     <textarea name="message" placeholder="Write Message"
                               class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 h-32
                        {{ $errors->has('message') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" required>{{ old('message') }}</textarea>
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


    <script>
        const videoModal = document.getElementById('videoModal');
        const youtubeIframe = document.getElementById('youtubeVideo');

        // When modal is shown, load video with autoplay
        videoModal.addEventListener('show.bs.modal', function (event) {
            const trigger = event.relatedTarget;
            const baseUrl = trigger.getAttribute('data-video-url');
            youtubeIframe.src = baseUrl + "?autoplay=1";
        });

        // When modal is hidden, stop the video
        videoModal.addEventListener('hidden.bs.modal', function () {
            youtubeIframe.src = "";
        });
    </script>

        </div>
    </section>

    <section class="bg-gradient-to-br from-yellow-50 via-white to-yellow-100 py-20">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="text-center mb-14">
                <h2 class="text-4xl font-extrabold text-gray-800 drop-shadow-sm">Explore Top Preschool Franchise Opportunities in India</h2>
                <p class="mt-4 text-gray-700 max-w-3xl mx-auto text-lg">
                    Join the best preschool franchise in India with low-cost preschool franchises and high ROI.
                    Our franchise opportunities across major cities offer complete support and training for aspiring entrepreneurs.
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card -->
                <div class="bg-gradient-to-br from-yellow-100 to-yellow-50 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-3 shadow-md">
                            <svg class="w-6 h-6 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2L2 6v6c0 5 8 8 8 8s8-3 8-8V6l-8-4z"/></svg>
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">Preschool Franchise Investment</h3>
                    </div>
                    <p class="text-gray-700">Affordable entry points for starting your preschool business in Chennai.</p>
                </div>

                <!-- Card -->
                <div class="bg-gradient-to-br from-green-100 to-green-50 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-3 shadow-md">
                            <svg class="w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path d="M3 10a7 7 0 1114 0A7 7 0 013 10z"/><path d="M10 5v5l3 2"/></svg>
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">High ROI</h3>
                    </div>
                    <p class="text-gray-700">High returns with our proven Montessori preschool franchise model.</p>
                </div>

                <!-- Card -->
                <div class="bg-gradient-to-br from-blue-100 to-blue-50 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-3 shadow-md">
                            <svg class="w-6 h-6 text-blue-500" fill="currentColor" viewBox="0 0 20 20"><path d="M4 3h12v2H4V3zM4 7h12v2H4V7zM4 11h8v2H4v-2z"/></svg>
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">Comprehensive Support</h3>
                    </div>
                    <p class="text-gray-700">Extensive training, marketing, and operational guidance.</p>
                </div>

                <!-- Card -->
                <div class="bg-gradient-to-br from-pink-100 to-pink-50 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-3 shadow-md">
                            <svg class="w-6 h-6 text-pink-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a6 6 0 016 6c0 5-6 10-6 10S4 13 4 8a6 6 0 016-6z"/></svg>
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">Low-Cost Preschool</h3>
                    </div>
                    <p class="text-gray-700">Start a preschool franchise in Hyderabad with minimal investment.</p>
                </div>

                <!-- Card -->
                <div class="bg-gradient-to-br from-purple-100 to-purple-50 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-3 shadow-md">
                            <svg class="w-6 h-6 text-purple-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927C9.469 2.21 10.531 2.21 10.951 2.927L12.868 6.35l3.902.568c.764.112 1.07 1.05.516 1.59l-2.823 2.752.667 3.887c.13.758-.668 1.337-1.35.978L10 14.347l-3.48 1.828c-.682.359-1.48-.22-1.35-.978l.667-3.887-2.823-2.752c-.554-.54-.248-1.478.516-1.59l3.902-.568L9.049 2.927z"/></svg>
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">Top Preschool Brands</h3>
                    </div>
                    <p class="text-gray-700">Join a trusted name in preschool education in India.</p>
                </div>

                <!-- Card -->
                <div class="bg-gradient-to-br from-orange-100 to-orange-50 rounded-2xl shadow-lg p-6 transform hover:scale-105 transition duration-300 ease-in-out">
                    <div class="flex items-center mb-4">
                        <div class="bg-white rounded-full p-3 shadow-md">
                            <svg class="w-6 h-6 text-orange-500" fill="currentColor" viewBox="0 0 20 20"><path d="M13 7H7v6h6V7z"/><path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v10H5V5z" clip-rule="evenodd"/></svg>
                        </div>
                        <h3 class="ml-3 text-xl font-bold text-gray-800">Franchise Training</h3>
                    </div>
                    <p class="text-gray-700">Comprehensive programs to ensure franchise success.</p>
                </div>
            </div>

            <div class="text-center mt-14">
                <a href="/franchise" class="bg-gradient-to-r from-yellow-400 to-orange-400 hover:from-yellow-500 hover:to-orange-500 text-white font-semibold py-3 px-10 rounded-full shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    Get Franchise Details
                </a>
            </div>
        </div>
    </section>


{{--    <section class="bg-gradient-to-br from-blue-50 via-white to-blue-100 py-16">
        <div class="max-w-6xl mx-auto px-6 lg:px-12 text-center">
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 drop-shadow-sm">
                Contact Us for the Best Preschool Near You
            </h2>
            <p class="mt-4 text-gray-700 max-w-2xl mx-auto text-lg">
                Looking for a preschool near you in <strong>Pune, Mumbai, Delhi, Bangalore, Hyderabad,</strong> or <strong>Chennai</strong>?
                Discover the best preschool in India and give your child the perfect start to their learning journey!
            </p>

            <div class="mt-8">
                <a href="/contact"
                   class="bg-gradient-to-r from-blue-400 to-indigo-400 hover:from-blue-500 hover:to-indigo-500 text-white font-semibold py-3 px-8 rounded-full shadow-lg transform hover:scale-105 transition duration-300 ease-in-out">
                    Contact Us Today
                </a>
            </div>
        </div>
    </section>--}}

    <section id="faq" class="py-8 px-4 custompadding-2em" style="background-color: #f6f6f6">
        <div class="container my-md-5 my-lg-5 my-0 mx-auto">
            <h2 class="text-center text-wrapper-31 heading frequently">Frequently Asked Questions About Preschool Education in India</h2>
            @foreach ($faq_categories as $category)
                <div class="faq-category text-wrapper-32 flex">
{{--                    <img class="faq-icon" src="{{ asset('assets/web/images/home/' . strtolower(str_replace(' ', '', $category->name)) . '.svg') }}" alt="">--}}
                    {{ $category->name }}
                </div>

                <div class="accordion p-3" id="faqCategory{{ $category->id }}">
                    @if (isset($faqs[$category->id]))
                        @foreach ($faqs[$category->id] as $key => $faq)
                            <div class="accordion-item">
                                <h3 class="accordion-header p-1">
                                    <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                        {{ $faq->name }}
                                    </button>
                                </h3>
                                <div id="faq{{ $faq->id }}" class="accordion-collapse collapse" data-bs-parent="#faqCategory{{ $category->id }}">
                                    <div class="accordion-body">
                                        <p>{{ $faq->description }}</p>
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


    <!-- JavaScript for Dynamic Switching -->
    <script>
        document.querySelectorAll('.popular-btn').forEach(button => {
            button.addEventListener('click', function() {
                const popularId = this.getAttribute('data-popular-id');

                // Hide all milestones sections
                document.querySelectorAll('.popular-milestones').forEach(section => {
                    section.classList.add('hidden');
                });

                // Remove ring and bg from all buttons
                document.querySelectorAll('.popular-btn div').forEach(div => {
                    div.classList.remove('ring-2', 'ring-[#571D99]', '!bg-[#f3e8ff]');
                    div.classList.add('bg-white');
                });

                // Show the selected milestone section
                const activeSection = document.getElementById('popular-milestones-' + popularId);
                if (activeSection) {
                    activeSection.classList.remove('hidden');
                }

                // Add ring and bg to the clicked button
                this.querySelector('div').classList.add('ring-2', 'ring-[#571D99]', '!bg-[#f3e8ff]');
            });
        });
    </script>

<script>
    document.getElementById('pin_code').addEventListener('keyup', function () {
        const pincode = this.value;

        if (pincode.length === 6) {
            fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                .then(response => response.json())
                .then(data => {
                    if (data[0].Status === "Success") {
                        const postOffice = data[0].PostOffice[0];
                        document.getElementById('city').value = postOffice.District;
                        document.getElementById('state').value = postOffice.State;
                    } else {
                        document.getElementById('city').value = '';
                        document.getElementById('state').value = '';
                        alert('Invalid Pincode or Data Not Found');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Something went wrong. Please try again.');
                });
        }
    });
</script>

@stop
