@extends('layouts.web')
@section('css')


<!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }
        /* When header becomes sticky */
        #page-header.sticky {
            transform: translateY(0);
            opacity: 1;
            position: sticky !important;
            top: 0;
            z-index: 999;

        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
            color: #fff !important;
            background-color: #571D99;
        }

        .max-w-xs.mx-auto.space-y-3 {
            text-align: center;
        }
        .sm\:text-2xl {
            font-size: 18px !important;
            line-height: 2rem;
        }
    </style>
@stop
@section('body')
    <!-- Decorative Wave Line -->
    <div class="bg-[linear-gradient(280deg,#EDFEFC_13.84%,#FEF6EC_96.14%)] py-10 fade-up">
        <svg viewBox="0 0 1440 50" preserveAspectRatio="none" class="w-full">
            <path id="snakeLine"
                  d="M0,30 Q30,0 60,30 T120,30 T180,30 T240,30 T300,30 T360,30 T420,30 T480,30 T540,30 T600,30 T660,30 T720,30 T780,30 T840,30 T900,30 T960,30 T1020,30 T1080,30 T1140,30 T1200,30 T1260,30 T1320,30 T1380,30 T1440,30"
                  stroke="#06b6d4" stroke-width="2" fill="none" />
        </svg>
    </div>
@if(!empty($banner))
    <!-- Hero Section -->
    <section id="main-content" class="relative bg-[linear-gradient(280deg,#EDFEFC_13.84%,#FEF6EC_96.14%)] px-4 py-0 fade-up">
        <div class="container mx-auto flex items-center flex-col-reverse md:flex-row  gap-10 relative z-10">
            <!-- Text Content -->
            <div class="flex-1 space-y-4 text-start md:text-left">
                <span class="text-xs text-black-500 bg-white p-2 rounded-full inline-block">
                    {!! ucfirst($banner->topbar) !!}
                </span>
                <h1>
                    <p class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight">
                        {!! ucfirst($banner->heading) !!}
                    </p>
                    <p class="text-3xl sm:text-4xl md:text-5xl font-bold  text-cyan-500">
                        {!! ucfirst($banner->sub_heading) !!}
                    </p>
                </h1>
                <p class="text-gray-700 max-w-md md:mx-0 text-lg mt-3">
                     {!! ucfirst($banner->description) !!}
                </p>
                <div class="flex flex-col sm:flex-row items-start justify-start mt-4 gap-4">
                    <a href="{!! $banner->button_link1 !!}"
                       class="bg-cyan-500 text-white px-6 py-2.5 rounded-xl hover:bg-cyan-600 transition text-lg inline-flex items-center gap-2">
                        {!! ucfirst($banner->button_name1) !!}
                        <svg width="16" height="16" viewBox="0 0 25 25" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6895 11.25H3.75C3.55109 11.25 3.36032 11.329 3.21967 11.4696C3.07902 11.6103 3 11.8011 3 12C3 12.1989 3.07902 12.3896 3.21967 12.5303C3.36032 12.671 3.55109 12.75 3.75 12.75H17.6895L12.219 18.219C12.0782 18.3598 11.9991 18.5508 11.9991 18.75C11.9991 18.9491 12.0782 19.1401 12.219 19.281C12.3598 19.4218 12.5508 19.5009 12.75 19.5009C12.9492 19.5009 13.1402 19.4218 13.281 19.281L20.031 12.531C20.1008 12.4613 20.1563 12.3785 20.1941 12.2874C20.2319 12.1963 20.2513 12.0986 20.2513 12C20.2513 11.9013 20.2319 11.8036 20.1941 11.7125C20.1563 11.6214 20.1008 11.5386 20.031 11.469L13.281 4.71897C13.1402 4.57814 12.9492 4.49902 12.75 4.49902C12.5508 4.49902 12.3598 4.57814 12.219 4.71897C12.0782 4.8598 11.9991 5.05081 11.9991 5.24997C11.9991 5.44913 12.0782 5.64014 12.219 5.78097L17.6895 11.25Z" fill="white"/>
                        </svg>
                    </a>
                    <a href="{!! $banner->button_link2 !!}"
                       class="bg-white-500 text-black px-6 py-2.5 rounded-xl border hover:bg-white-600 transition text-lg inline-flex items-center gap-2">
                        {!! ucfirst($banner->button_name2) !!}
                        <svg width="16" height="16" viewBox="0 0 25 25" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6895 11.25H3.75C3.55109 11.25 3.36032 11.329 3.21967 11.4696C3.07902 11.6103 3 11.8011 3 12C3 12.1989 3.07902 12.3896 3.21967 12.5303C3.36032 12.671 3.55109 12.75 3.75 12.75H17.6895L12.219 18.219C12.0782 18.3598 11.9991 18.5508 11.9991 18.75C11.9991 18.9491 12.0782 19.1401 12.219 19.281C12.3598 19.4218 12.5508 19.5009 12.75 19.5009C12.9492 19.5009 13.1402 19.4218 13.281 19.281L20.031 12.531C20.1008 12.4613 20.1563 12.3785 20.1941 12.2874C20.2319 12.1963 20.2513 12.0986 20.2513 12C20.2513 11.9013 20.2319 11.8036 20.1941 11.7125C20.1563 11.6214 20.1008 11.5386 20.031 11.469L13.281 4.71897C13.1402 4.57814 12.9492 4.49902 12.75 4.49902C12.5508 4.49902 12.3598 4.57814 12.219 4.71897C12.0782 4.8598 11.9991 5.05081 11.9991 5.24997C11.9991 5.44913 12.0782 5.64014 12.219 5.78097L17.6895 11.25Z" fill="black"/>
                        </svg>
                    </a>
                </div>

            </div>

            <!-- Hero Image -->
            <div class="flex-1 relative w-full max-w-lg mx-auto">
                <img src="{{ asset($banner->image) }}" alt="Child playing" class="max-w-md" />
              
            </div>
        </div>
    </section>
@endif

@if(!empty($safety))
    <!-- Safety Section -->
<section id="safety-section" class="py-20 overflow-hidden bg-white">
  <div class="container mx-auto px-4">
    
    <!-- Heading -->
    <div class="text-center mb-12">
      <h2 class="text-4xl md:text-5xl font-bold text-slate-800">Why 9to9 Preschool?</h2>
    </div>

    <!-- Grid of Safety Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
      @foreach($safety as $row)
        <div class="border border-gray-200 rounded-2xl p-6 flex flex-col items-start text-left bg-white transition duration-300 hover:border-gray-300">
          
          <!-- Icon -->
          <div class="w-20 h-20 flex items-center justify-center mb-1">
            <img src="{{ asset($row->image) }}" alt="{{ ucfirst($row->heading) }}" class="object-contain" />
          </div>

          <!-- Title -->
          <h3 class="text-xl sm:text-2xl font-semibold text-slate-800 mb-2">{{ ucfirst($row->heading) }}</h3>

          <!-- Description -->
          <p class="text-gray-600 text-sm leading-relaxed">{{ ucfirst($row->description) }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

    @endif


    @if(!empty($populars))
      <section class="py-10 bg-gradient-to-b from-white to-blue-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-800 mb-3">What Will My Child Learn?</h2>
        <p class="text-lg text-center text-gray-600 max-w-2xl mx-auto mb-10">
            Our curriculum is designed to nurture every aspect of your child's development, tailored to their age group.
        </p>
        <div class="max-w-5xl text-center mx-auto">
            <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 lg:gap-12 gap-4 mt-4 mb-6">
        <!-- Popular Tabs -->
        <!--<div class="flex flex-wrap justify-center gap-4 mb-8">-->
            @foreach($populars as $index => $popular)
                <button class="popular-tab popular-btn border border-gray-300 rounded-xl shadow-md overflow-hidden flex flex-col justify-center items-center md:p-4 p-2 transition duration-300 hover:shadow-lg {{ $index === 0 ? 'bg-[#6B21A8] text-white ring-2 ring-[#6B21A8]' : 'bg-white text-gray-800' }}"
                    data-popular="{{ $popular->id }}">
                   <p class="md:text-2xl sm:text-lg font-medium text-center px-4">{{ $popular->title }}</p>
                </button>
            @endforeach
        </div>
        </div>

        <!-- Curriculum Content -->
        <div class="space-y-12">
            @foreach($populars as $index => $popular)
                <div class="popular-content {{ $index !== 0 ? 'hidden' : '' }}" id="popular-{{ $popular->id }}">
                    <h3 class="text-2xl font-bold text-left text-gray-800 mb-6">{{ $popular->title }} Curriculum</h3>

                    @php
                        $milestones = \App\Models\Milestone::where('popular_id', $popular->id)->get();
                    @endphp

                    @if(!$milestones->isEmpty())
                        <!-- Milestone Pills -->
                        <div class="flex flex-wrap gap-3 mb-6">
                            @foreach($milestones as $mIndex => $milestone)
                                <button class="milestone-pill px-4 py-2 rounded-full border border-gray-300 transition {{ $mIndex === 0 ? 'bg-[#6B21A8] text-white' : 'bg-white text-gray-700' }}"
                                        data-milestone="{{ $popular->id }}-{{ $milestone->id }}">
                                    {{ $milestone->goal_month }}
                                </button>
                            @endforeach
                        </div>

                        @foreach($milestones as $mIndex => $milestone)
                            <div class="milestone-content {{ $mIndex !== 0 ? 'hidden' : '' }}" id="milestone-{{ $popular->id }}-{{ $milestone->id }}">
                                <div class="text-center mb-8">
                                    <h4 class="text-xl font-semibold text-gray-700">{{ $milestone->goal_heading }}</h4>
                                    <p class="text-gray-600 mt-2 max-w-2xl mx-auto">{{ $milestone->goal_description }}</p>
                                </div>

                                <div class="flex flex-col lg:flex-row gap-8">
                                    <!-- Topics -->
                                    <div class="flex-1">
                                        <h5 class="text-md font-semibold text-blue-900 mb-4">{{ $milestone->goal_breaf }}</h5>

                                        @php $topics = json_decode($milestone->topics_including, true) ?? []; @endphp
                                        <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-4">
                                            @foreach($topics as $num => $topic_id)
                                                @php $get_topic = \App\Models\Topic::find($topic_id); @endphp

                                                @if($get_topic)
                                                    <div class="p-4 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-lg transition-all">
                                                        <div class="flex items-center gap-3 mb-2">
                                                            <div class="bg-blue-100 text-blue-800 text-sm font-bold rounded-full w-8 h-8 flex items-center justify-center">
                                                                {{ $num + 1 }}
                                                            </div>
                                                            <h6 class="font-semibold text-gray-800">{{ $get_topic->topic_name }}</h6>
                                                        </div>

                                                        @php
                                                            $subtopics = \App\Models\SubTopic::where('topic_name', $get_topic->id)
                                                                ->where('age', $milestone->popular_id)
                                                                ->where('quarters', $milestone->goal_month)
                                                                ->get();
                                                        @endphp

                                                        @if($subtopics->count())
                                                            <ul class="text-sm text-gray-600 space-y-1">
                                                                @foreach($subtopics as $sub)
                                                                    <li class="pl-3 border-l-2 border-blue-500">{{ $sub->name }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- Image -->
                                    <div class="w-full lg:w-1/3 flex items-center justify-center">
                                        <img src="{{ asset('assets/images/usp.png') }}" alt="Milestone Visual"
                                            class="rounded-xl shadow-md max-w-xs">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500 text-sm">No milestones found for this item.</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>


    @endif







@if(!empty($choose))
   <section class="relative bg-white py-20 px-4">
  <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    
    <!-- Image Column -->
    <div class="flex justify-center items-center">
      <img src="{{ asset($choose->image) }}" alt="Main Kids" class="max-w-md" />
      <!--<img src="{{ asset($choose->image) }}" alt="Main Kids" class="max-w-full h-auto p-3 object-cover" />-->
    </div>

    <!-- Content Column -->
    <div class="space-y-8">
      <!-- Heading & Description -->
      <div class="text-start">
        <h2 class="text-3xl md:text-4xl font-bold text-slate-800">{!! ucfirst($choose->heading) !!}</h2>
        <p class="text-md md:text-lg text-gray-500 mt-3">{!! ucfirst($choose->description) !!}</p>
      </div>

      <!-- Feature List -->
      <div class="space-y-6">
        <!-- Feature 1 -->
        <div class="flex items-start space-x-4">
          <div class="w-16 h-16 flex items-center justify-center  bg-white">
            <img src="https://img.icons8.com/ios-filled/50/1E88E5/wallet--v1.png" alt="Daily Updates" class="" />
          </div>
          <div>
            <h4 class="text-lg font-semibold text-slate-800">{!! ucfirst($choose->title) !!}</h4>
            <p class="text-sm text-gray-500">{!! ucfirst($choose->paragraph) !!}</p>
          </div>
        </div>

        <!-- Feature 2 -->
        <div class="flex items-start space-x-4">
          <div class="w-16 h-16 flex items-center justify-center   bg-white">
            <img src="https://img.icons8.com/ios-filled/50/1E88E5/time-machine.png" alt="Attendance Tracking" class="" />
          </div>
          <div>
            <h4 class="text-lg font-semibold text-slate-800">{!! ucfirst($choose->title2) !!}</h4>
            <p class="text-sm text-gray-500">{!! ucfirst($choose->paragraph2) !!}</p>
          </div>
        </div>

        <!-- Feature 3 -->
        <div class="flex items-start space-x-4">
          <div class="w-16 h-16 flex items-center justify-center  bg-white">
            <img src="https://img.icons8.com/ios-filled/50/1E88E5/combo-chart--v1.png" alt="Skill Progress" class="" />
          </div>
          <div>
            <h4 class="text-lg font-semibold text-slate-800">{!! ucfirst($choose->title3) !!}</h4>
            <p class="text-sm text-gray-500">{!! ucfirst($choose->paragraph3) !!}</p>
          </div>
        </div>

          <!-- Feature 4 -->
          <div class="flex items-start space-x-4">
              <div class="w-16 h-16 flex items-center justify-center  bg-white">
                  <img src="https://img.icons8.com/?size=50&id=3FuChaSXHE3d&format=png&color=000000" alt="Skill Progress" class="" />
              </div>
              <div>
                  <h4 class="text-lg font-semibold text-slate-800">{!! ucfirst($choose->title4) !!}</h4>
                  <p class="text-sm text-gray-500">{!! ucfirst($choose->paragraph4) !!}</p>
              </div>
          </div>
      </div>

      <!-- App Buttons -->
      <div class="flex flex-wrap gap-4 mt-6">
        <a href="#" class="inline-block">
          <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Google Play" class="h-12" />
        </a>
        <a href="#" class="inline-block">
          <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="App Store" class="h-12" />
        </a>
      </div>
    </div>
  </div>
</section>


@endif



{{--
@if(!empty($choose))
<!-- Why Choose Us Section -->
<section class="bg-[linear-gradient(280deg,#EDFEFC_13.84%,#FEF6EC_96.14%)] py-20 px-4 fade-up">
    <div class="container mx-auto items-center ">
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-4">{!! ucfirst($choose->heading) !!}</h2>
            <p class="text-gray-600 text-xl max-w-2xl mx-auto">
               {!! ucfirst($choose->description) !!}
            </p>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 items-center fade-up">
        <!-- Left Column Features -->
        <div class="space-y-10">
            <!-- Feature 1 -->
            <div class="max-w-xs mx-auto text-center space-y-3">
                <div class="w-12 h-12 rounded-full bg-[#491881] text-white flex items-center justify-center mx-auto font-bold">
                    1
                </div>
                <h3 class="text-2xl font-semibold">{!! ucfirst($choose->title) !!}</h3>
                <p class="text-gray-600 text-lg">
                    {!! ucfirst($choose->paragraph) !!}
                </p>
            </div>
            <!-- Feature 2 -->
            <div class="max-w-xs mx-auto text-center space-y-3">
                <div class="w-12 h-12 rounded-full bg-[#491881] text-white flex items-center justify-center mx-auto font-bold">
                    2
                </div>
                 <h3 class="text-2xl font-semibold">{!! ucfirst($choose->title2) !!}</h3>
                <p class="text-gray-600 text-lg">
                    {!! ucfirst($choose->paragraph2) !!}
                </p>
            </div>
        </div>

        <!-- Center Image -->
        <div class="relative max-w-sm mx-auto">
            <img src="{{ asset($choose->image) }}" alt="Chat UI" class="rounded-xl w-full h-auto h-62" />
        </div>

        <!-- Right Column Features -->
        <div class="space-y-10">
            <!-- Feature 3 -->
            <div class="max-w-xs mx-auto space-y-3">
                <div class="w-12 h-12 rounded-full bg-[#491881] text-white flex items-center justify-center mx-auto font-bold">
                    3
                </div>
                 <h3 class="text-2xl font-semibold">{!! ucfirst($choose->title3) !!}</h3>
                <p class="text-gray-600 text-lg">
                    {!! ucfirst($choose->paragraph3) !!}
                </p>
            </div>
            <!-- Feature 4 -->
            <div class="max-w-xs mx-auto  space-y-3">
                <div class="w-12 h-12 rounded-full bg-[#491881] text-white flex items-center justify-center mx-auto font-bold">
                    4
                </div>
                 <h3 class="text-2xl font-semibold">{!! ucfirst($choose->title4) !!}</h3>
                <p class="text-gray-600 text-lg">
                    {!! ucfirst($choose->paragraph4) !!}
                </p>
            </div>
        </div>
    </div>
    </div>
</section>
@endif

@if(!empty($program))
<!-- Programs Tailored to Your Child -->
<section class="py-20 bg-[#E8F4FE]">
    <div class="container mx-auto items-center ">
        <!-- Heading -->
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold mb-4"> Programs Tailored to Your Child</h2>
            <p class="text-gray-600 text-xl max-w-2xl mx-auto">
                We offer specialized programs for different age groups, ensuring each
                child receives the appropriate level of education and care.
            </p>
        </div>

        <!-- Card Container (3 columns) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach($program as $row)
            <!-- Card 1: Toddlers -->
            <div class="program-card bg-white border border-gray-200 shadow-sm rounded-lg px-6 py-4 flex flex-col">
                <!-- Image -->
                <img src="{{ asset($row->image) }}" alt="Toddlers" class="w-full h-48 object-cover rounded-md mb-4" />
                <!-- Title & Description -->
                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                   {{ ucfirst($row->heading) }}
                </h3>
                <p class="text-gray-600 mb-4">
                   {{ ucfirst($row->discription) }}
                </p>
                <!-- Key Skills -->
                <h4 class="font-semibold text-gray-800 mb-6">{!! ucfirst($row->sub_heading)  !!}</h4>
                <ul class="grid grid-cols-2 gap-4 mb-6">
                    <li class="flex items-center">
                        <span class="inline-block w-5 h-5 rounded-full mr-2">
                            <img src="{{ asset('assets/web/images/preschool/bi_patch-check-fill.png') }}" alt="" class="p-0">
                        </span>
                        <span>{!! ucfirst($row->key1) !!}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="inline-block w-5 h-5 rounded-full mr-2">
                            <img src="{{ asset('assets/web/images/preschool/bi_patch-check-fill_purple.png') }}" alt="" class="p-0">
                        </span>
                        <span>{!! ucfirst($row->key2) !!}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="inline-block w-5 h-5 rounded-full mr-2">
                            <img src="{{ asset('assets/web/images/preschool/bi_patch-check-fill_purple.png') }}" alt="" class="p-0">
                        </span>
                        <span>{!! ucfirst($row->key3) !!}</span>
                    </li>
                    <li class="flex items-center">
                        <span class="inline-block w-5 h-5 rounded-full mr-2">
                            <img src="{{ asset('assets/web/images/preschool/bi_patch-check-fill_sky.png') }}" alt="" class="p-0">
                        </span>
                        <span>{!! ucfirst($row->key4) !!}</span>
                    </li>
                </ul>
                <!-- Button -->
                <div class="flex flex-col sm:flex-row items-start justify-start mt-4 gap-4">
                    <a href="{{ url('/enroll1') }}"
                       class="hover:bg-cyan-500 text-white px-6 py-2.5 rounded-full  bg-[#ff7426] transition text-lg inline-flex items-center gap-2">
                        Learn More
                        <svg width="22" height="22" viewBox="0 0 25 25" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6895 11.25H3.75C3.55109 11.25 3.36032 11.329 3.21967 11.4696C3.07902 11.6103 3 11.8011 3 12C3 12.1989 3.07902 12.3896 3.21967 12.5303C3.36032 12.671 3.55109 12.75 3.75 12.75H17.6895L12.219 18.219C12.0782 18.3598 11.9991 18.5508 11.9991 18.75C11.9991 18.9491 12.0782 19.1401 12.219 19.281C12.3598 19.4218 12.5508 19.5009 12.75 19.5009C12.9492 19.5009 13.1402 19.4218 13.281 19.281L20.031 12.531C20.1008 12.4613 20.1563 12.3785 20.1941 12.2874C20.2319 12.1963 20.2513 12.0986 20.2513 12C20.2513 11.9013 20.2319 11.8036 20.1941 11.7125C20.1563 11.6214 20.1008 11.5386 20.031 11.469L13.281 4.71897C13.1402 4.57814 12.9492 4.49902 12.75 4.49902C12.5508 4.49902 12.3598 4.57814 12.219 4.71897C12.0782 4.8598 11.9991 5.05081 11.9991 5.24997C11.9991 5.44913 12.0782 5.64014 12.219 5.78097L17.6895 11.25Z" fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach

        </div>
    </div>
</section>

@endif --}}

    @if(!empty($program))
    <section class="py-16 bg-yellow-100">
        <div class="container mx-auto px-4 text-center">
            <h2 class="section-title text-3xl md:text-4xl font-bold mb-6">Give Your Child the Best Start with 9to9 School</h2>
            <p class="mb-8 text-lg max-w-4xl  mx-auto">Join our flexible preschool community and watch your child thrive in a supportive, play-based learning environment designed for toddlers aged 2-6.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                @foreach($program as $row)
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-xl font-semibold mb-3">{{ ucfirst($row->heading) }}</h3>
                        <p>{{ ucfirst($row->description) }}</p>
                    </div>
                @endforeach
            </div>
            <a href="#RgidterSec" class="btn-primary text-white px-6 py-3 mt-3 rounded-full font-semibold">Register Your Child Now</a>
        </div>
    </section>
    @endif


    <!-- Enquiry Form Section -->
<!-- enquiry form -->
<section class="bg-gradient-to-r from-indigo-400 via-purple-400 to-pink-500 min-h-screen flex items-center justify-center p-4">
  <div class="w-full max-w-6xl flex flex-col lg:flex-row overflow-hidden">

    <!-- Left Section: 60% on desktop, full width on mobile/tablet -->
    <div class="w-full lg:w-3/5 p-6 sm:p-10 text-white ">
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">Ready to Give Your Child the Best Start?</h2>
      <p class="text-base sm:text-lg mb-6">Join our flexible preschool community and watch your child thrive in a supportive, adaptive learning environment designed around their needs.</p>

      <div class="space-y-6">
        <!-- Point 1 -->
        <div class="flex items-start space-x-4">
          <div class="bg-white text-indigo-500 p-2 rounded-full shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 .667-1 2-2 2s-2-1.333-2-2 1-2 2-2 2 1.333 2 2z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v7m0 0v8m0-8H9m3 0h3" />
            </svg>
          </div>
          <div>
            <h4 class="font-semibold">No Binding Contracts</h4>
            <p class="text-sm">Pay only for the classes your child attends</p>
          </div>
        </div>

        <!-- Point 2 -->
        <div class="flex items-start space-x-4">
          <div class="bg-white text-indigo-500 p-2 rounded-full shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h16v16H4z" />
            </svg>
          </div>
          <div>
            <h4 class="font-semibold">Flexible Schedule</h4>
            <p class="text-sm">Choose days and times that work for your family</p>
          </div>
        </div>

        <!-- Point 3 -->
        <div class="flex items-start space-x-4">
          <div class="bg-white text-indigo-500 p-2 rounded-full shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </div>
          <div>
            <h4 class="font-semibold">Try Before You Commit</h4>
            <p class="text-sm">Book a trial class to experience our approach</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Section: 40% on desktop, full width on mobile/tablet -->
    <div id="RgidterSec" class="w-full lg:w-2/5 p-6 sm:p-10 bg-white rounded-xl">
      
      {{-- Show validation errors --}}
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

          @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ Session('success') }}</strong>
            </div>
        @endif
      <h3 class="text-xl sm:text-2xl font-semibold text-center text-cyan-600 mb-6">Register Your Child Now</h3>

          <form class="space-y-5" method="POST" action="{{ route('preschoolenquiry.save') }}">
          <input type="hidden" name="page" value="pre-school">
          @csrf
        <!-- Name -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
          <input type="text" name="name" placeholder="Your Name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500" required/>
        </div>

        <!-- Phone Number -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
          <input type="tel" name="mobile" placeholder="Your Phone Number" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500" required/>
        </div>

        <!-- Age -->
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Age</label>
          <input type="number" name="age"   placeholder="Child's Age (Year)" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-cyan-500" required/>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-600 text-white py-2 rounded-md transition duration-200" required>
          Submit Registration
        </button>
      </form>

      <!-- Contact Buttons -->
      <div class="flex flex-col sm:flex-row justify-between mt-6 gap-4">
        <a href="tel:+919990318880" class="flex-1 flex items-center justify-center border border-cyan-500 text-cyan-600 rounded-md py-2 hover:bg-cyan-50 transition">
        <svg width="30px" height="30px" viewBox="0 0 120 120" id="Layer_1" version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <style type="text/css"> .st0{fill:#FFB562;} .st1{fill:#3F3F3F;} .st2{fill:#438DFF;} .st3{fill:#3D81E2;} </style> <g> <g> <ellipse class="st0" cx="20.1" cy="65" rx="6.4" ry="6.4"></ellipse> <ellipse class="st0" cx="99.9" cy="65" rx="6.4" ry="6.4"></ellipse> </g> <path class="st0" d="M94.1,53.1C93.6,34.8,78.5,20,60,20c-18.5,0-33.5,14.7-34.1,33.1h-4C22.5,32.6,39.3,16,60,16 c20.7,0,37.5,16.5,38.1,37.1H94.1z"></path> <g> <path class="st1" d="M69.4,101.8c-2.4,0-4-0.1-4.2-0.1l0.2-2.2c0.2,0,23,1.7,25.8-7.7c3-10.5,1.5-21.5,1.5-21.6l2.2-0.3 c0.1,0.4,1.6,11.6-1.6,22.5C90.7,100.7,76.6,101.8,69.4,101.8z"></path> </g> <path class="st0" d="M70.4,104H60.2c-0.9,0-1.6-0.7-1.6-1.6v-4c0-0.9,0.7-1.6,1.6-1.6h10.2c0.9,0,1.6,0.7,1.6,1.6v4 C72,103.3,71.3,104,70.4,104z"></path> <g> <path class="st2" d="M28.5,51h-7.1c-2.2,0-4,2-4,4.5v17.9c0,2.5,1.8,4.5,4,4.5h7.1c1.5,0,2.8-1.4,2.8-3.1V54 C31.2,52.3,30,51,28.5,51z"></path> <path class="st2" d="M98.7,51h-7.1c-1.5,0-2.8,1.4-2.8,3.1v20.6c0,1.7,1.2,3.1,2.8,3.1h7.1c2.2,0,4-2,4-4.5v-18 C102.6,52.9,100.8,51,98.7,51z"></path> </g> <g> <path class="st2" d="M68.4,70.8l-1.7,1.7c-2.6,2.6-5.2,4.3-7.3,2.2L47.2,62.5c-2.2-2.2-0.5-4.7,2.2-7.3l1.7-1.7l-8.3-8.3l-2.4,2.4 c-4.3,4.3-4.3,11.1,0,15.3L59,81.5c4.3,4.3,11.1,4.3,15.3,0l2.4-2.4L68.4,70.8z"></path> <g> <path class="st3" d="M52.5,52.7l-8.8-8.8c-0.8-0.8-2.1-0.8-2.9,0l-1.5,1.5c-0.8,0.8-0.8,2.1,0,2.9l8.8,8.8c0.8,0.8,2.1,0.8,2.9,0 l1.5-1.5C53.3,54.9,53.3,53.6,52.5,52.7z"></path> <path class="st3" d="M78,78.2l-8.8-8.8c-0.8-0.8-2.1-0.8-2.9,0l-1.5,1.5c-0.8,0.8-0.8,2.1,0,2.9l8.8,8.8c0.8,0.8,2.1,0.8,2.9,0 l1.5-1.5C78.8,80.3,78.8,79,78,78.2z"></path> </g> <g> <path class="st2" d="M58.9,54.3c-0.2-0.2-0.4-0.5-0.4-0.7c-0.2-0.9,0.3-1.6,1.2-1.9c3-0.7,6,0.2,8.1,2.3s3,5.2,2.3,8.1 c-0.2,0.9-1,1.3-1.9,1.2c-0.9-0.2-1.3-1-1.2-1.9c0.4-1.9-0.1-3.9-1.5-5.3c-1.4-1.4-3.3-2-5.3-1.5C59.8,54.8,59.3,54.6,58.9,54.3z "></path> <path class="st2" d="M57.6,48.2c-0.2-0.2-0.4-0.5-0.4-0.7c-0.2-0.9,0.3-1.6,1.2-1.9c5.1-1.2,10.3,0.3,13.9,4 c3.7,3.7,5.2,8.8,4,13.9c-0.2,0.9-1,1.4-1.9,1.2c-0.9-0.2-1.4-1-1.2-1.9c0.9-4-0.3-8.1-3.1-11s-7-4.1-11-3.1 C58.5,48.7,58,48.6,57.6,48.2z"></path> <path class="st2" d="M56.3,42.1c-0.2-0.2-0.4-0.5-0.4-0.7c-0.2-0.9,0.3-1.6,1.2-1.9c7.1-1.6,14.5,0.5,19.7,5.6 c5.2,5.2,7.3,12.5,5.6,19.7c-0.2,0.9-1,1.4-1.9,1.2c-0.9-0.2-1.4-1-1.2-1.9c1.4-6.1-0.4-12.4-4.8-16.7 c-4.4-4.4-10.7-6.2-16.7-4.8C57.2,42.7,56.6,42.5,56.3,42.1z"></path> </g> </g> </g> </g></svg>
          Talk to Expert
        </a>

        <a href="tel:+919990318880" class="flex-1 flex items-center justify-center border border-cyan-500 text-cyan-600 rounded-md py-2 hover:bg-cyan-50 transition">
          <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" class="w-5 h-5 mr-2" />
          WhatsApp Us
        </a>
      </div>
    </div>
  </div>
</section>

@stop
@section('js')
   <script>
    document.querySelectorAll('.popular-tab').forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.dataset.popular;

            // Remove active state from all popular tabs
            document.querySelectorAll('.popular-tab').forEach(btn => {
                btn.classList.remove('bg-[#6B21A8]', 'text-white', 'ring-2', 'ring-[#6B21A8]');
                btn.classList.add('bg-white', 'text-gray-800');
            });

            // Set active state for current button
            button.classList.remove('bg-white', 'text-gray-800');
            button.classList.add('bg-[#6B21A8]', 'text-white', 'ring-2', 'ring-[#6B21A8]');

            // Hide all content blocks
            document.querySelectorAll('.popular-content').forEach(content => content.classList.add('hidden'));
            document.getElementById('popular-' + targetId).classList.remove('hidden');

            // Auto-activate the first milestone pill inside selected content
            const firstPill = document.querySelector(`#popular-${targetId} .milestone-pill`);
            if (firstPill) firstPill.click();
        });
    });

    document.querySelectorAll('.milestone-pill').forEach(pill => {
        pill.addEventListener('click', () => {
            const [popularId, milestoneId] = pill.dataset.milestone.split('-');

            // Remove active from all pills in this popular group
            document.querySelectorAll(`#popular-${popularId} .milestone-pill`).forEach(p => {
                p.classList.remove('bg-[#6B21A8]', 'text-white');
                p.classList.add('bg-white', 'text-gray-700');
            });

            // Set active for selected pill
            pill.classList.remove('bg-white', 'text-gray-700');
            pill.classList.add('bg-[#6B21A8]', 'text-white');

            // Toggle milestone content
            document.querySelectorAll(`#popular-${popularId} .milestone-content`).forEach(m => m.classList.add('hidden'));
            document.getElementById(`milestone-${popularId}-${milestoneId}`).classList.remove('hidden');
        });
    });
</script>

@stop

