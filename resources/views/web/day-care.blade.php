@extends('layouts.web')
@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }

        .curved-background {
            position: relative; /* Needed for pseudo-element positioning */
            background-color: #FDFAF0; /* Your existing background color as a fallback */
            overflow: hidden; /* To prevent the curve from overflowing */
        }

        .curved-background::before {
            content: "";
            position: absolute;
            top: 0;
            left: 50%; /* Center horizontally */
            width: 200%; /* Make it wider than the container */
            height: 150px; /* Adjust the height of the curve */
            transform: translateX(-50%) translateY(-50%) scaleY(2); /* Center and create the curve */
            background-image: radial-gradient(ellipse at 50% 100%, transparent 60%, #eaf8ff 60%); /* Adjust colors and stop points */
            border-radius: 50%; /* Creates the rounded shape that the scaling turns into a curve */
            z-index: -1;
        }

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
        .px-2.lg\:px-3.py-2.rounded-xl.shadow-lg.bg-white.group {
            background: #FFFEF2 !important;
        }

        .fancybox__backdrop {
            background-color: rgba(0, 0, 0, 0.7) !important; /* typical dark overlay */
        }

        img.fancybox__image {
          
            height: 30rem !important;
            object-fit: contain;
         }


        
    </style>

@stop

@section('body')
    <!-- Hero Section -->
    <!-- Hero Section -->
    <!-- Hero Section -->
    @if(!empty($banner))
    <section
            id="main-content"
            class="relative bg-cover  bg-left md:bg-center bg-no-repeat min-h-[500px] flex items-center px-4 py-12 md:py-24"
            style="background-image: url(' {{ asset($banner->image)  }}');"
    >
        <div class="container mx-auto w-full">
            <div class="max-w-xl space-y-6">
                <h1>
                    <p class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 leading-tight">
                        {!! ucfirst($banner->heading) !!}
                    </p>
                    <p class="text-3xl sm:text-4xl md:text-5xl font-bold text-cyan-500">
                        {!! ucfirst($banner->sub_heading) !!}
                    </p>
                </h1>

                <p class="text-gray-700 text-lg">
                    {!! ucfirst($banner->description) !!}
                </p>

               <div class="flex flex-col sm:flex-row items-start justify-start mt-4 gap-4">
                    <a href="{!! $banner->button_link1 !!}"
                       class="bg-cyan-500 text-white px-6 py-2.5 rounded-xl hover:bg-cyan-600 transition text-lg inline-flex items-center gap-2">
                        {!! ucfirst($banner->button_name1) !!}
                        <svg width="16" height="16" viewBox="0 0 25 25" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6895 11.25H3.75C3.55109 11.25 3.36032 11.329 3.21967 11.4696C3.07902 11.6103 3 11.8011 3 12C3 12.1989 3.07902 12.3896 3.21967 12.5303C3.36032 12.671 3.55109 12.75 3.75 12.75H17.6895L12.219 18.219C12.0782 18.3598 11.9991 18.5508 11.9991 18.75C11.9991 18.9491 12.0782 19.1401 12.219 19.281C12.3598 19.4218 12.5508 19.5009 12.75 19.5009C12.9492 19.5009 13.1402 19.4218 13.281 19.281L20.031 12.531C20.1008 12.4613 20.1563 12.3785 20.1941 12.2874C20.2319 12.1963 20.2513 12.0986 20.2513 12C20.2513 11.9013 20.2319 11.8036 20.1941 11.7125C20.1563 11.6214 20.1008 11.5386 20.031 11.469L13.281 4.71897C13.1402 4.57814 12.9492 4.49902 12.75 4.49902C12.5508 4.49902 12.3598 4.57814 12.219 4.71897C12.0782 4.8598 11.9991 5.05081 11.9991 5.24997C11.9991 5.44913 12.0782 5.64014 12.219 5.78097L17.6895 11.25Z" fill="black"/>
                        </svg>
                    </a>
                    <a href="{!! $banner->button_link2 !!}"
                       class="bg-cyan-500 text-white px-6 py-2.5 rounded-xl hover:bg-cyan-600 transition text-lg inline-flex items-center gap-2">
                        {!! ucfirst($banner->button_name2) !!}
                        <svg width="16" height="16" viewBox="0 0 25 25" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6895 11.25H3.75C3.55109 11.25 3.36032 11.329 3.21967 11.4696C3.07902 11.6103 3 11.8011 3 12C3 12.1989 3.07902 12.3896 3.21967 12.5303C3.36032 12.671 3.55109 12.75 3.75 12.75H17.6895L12.219 18.219C12.0782 18.3598 11.9991 18.5508 11.9991 18.75C11.9991 18.9491 12.0782 19.1401 12.219 19.281C12.3598 19.4218 12.5508 19.5009 12.75 19.5009C12.9492 19.5009 13.1402 19.4218 13.281 19.281L20.031 12.531C20.1008 12.4613 20.1563 12.3785 20.1941 12.2874C20.2319 12.1963 20.2513 12.0986 20.2513 12C20.2513 11.9013 20.2319 11.8036 20.1941 11.7125C20.1563 11.6214 20.1008 11.5386 20.031 11.469L13.281 4.71897C13.1402 4.57814 12.9492 4.49902 12.75 4.49902C12.5508 4.49902 12.3598 4.57814 12.219 4.71897C12.0782 4.8598 11.9991 5.05081 11.9991 5.24997C11.9991 5.44913 12.0782 5.64014 12.219 5.78097L17.6895 11.25Z" fill="black"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endif
@if(!empty($choose))
    <section data-aos="fade-up" id="safety-section" class="py-20 bg-white-100 overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold mb-4">Why Choose 9to9 Daycare?</h2>
                <p class="text-lg text-center text-gray-600 max-w-2xl mx-auto mb-10">
                    Our daycare is committed to providing exceptional child care services with a focus on safety, learning, and fun. Here’s why we stand out as the best daycare in India
                </p>
            </div>
            <!-- Grid of Safety Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-10">
                @foreach($choose as $row)
                    <div class="safety-card bg-[{{ !empty($row->color) ? $row->color : '#fff' }}] rounded-2xl shadow-md p-6 flex flex-col items-center text-center">
                        <div class="w-24 h-24 rounded-full flex items-center justify-center mb-4">
                            <img src="{{ asset($row->image) }}" alt="{{ ucfirst($row->heading) }}" class="w-12 h-12 object-contain" />
                        </div>
                        <h3 class="text-xl sm:text-2xl font-semibold">{{ ucfirst($row->heading) }}</h3>
                         <p class="max-w-62 text-lg text-gray-400 mt-6">{{ $row->description }}</p>
                    </div>
                @endforeach
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
                <h2 class="text-4xl md:text-5xl font-bold mb-4"> Our Age-Appropriate Programs</h2>
                <p class="text-gray-600 text-xl max-w-2xl mx-auto">
                    At 9to9, we design age-appropriate programs at daycare to spark curiosity and support development at every stage. Our curriculum blends Montessori, Reggio Emilia, and HighScope methodologies to create a child-centric learning environment.
                </p>
            </div>


            <!-- Card Container (3 columns) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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
                        <ul class="grid grid-cols-2 gap-3 mb-6">
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
                            <a href="{{ url('/enroll-enquiry') }}"
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
    <!-- Safety Section -->
@endif
@if(!empty($schedule))
    <!-- Schedule -->
    <main data-aos="fade-up" class="px-2 md:px-8 lg:px-10 py-10">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl md:text-4xl font-bold">Our Daily Schedule</h2>
            <p class="text-gray-500 text-center mt-8 max-w-2xl mx-auto">
                Our full-day child care center follows a balanced routine to promote learning, play, and rest, ensuring children feel secure and engaged. Below is a sample schedule tailored for daycare for working parents.
            </p>
            <!-- schedule cards -->
            <div class="max-w-3xl mx-auto space-y-8 mt-10">
                @foreach($schedule as $row)
                <!-- Schedule Item 1 -->
                <div class="flex items-center gap-4">
                    <div class="w-2/12 flex items-center justify-center">
                        <img src="{{ asset($row->image) }}" alt class="size-10">
                    </div>
                    <div class="px-4 py-4 rounded-xl border border-black/10 shadow-md">
                        <div class="flex flex-col md:flex-row items-start gap-4">
                            <h3 class="text-xl font-semibold">{!! $row->heading !!}</h2>
                            <span class="bg-gray-200 px-2 py-1 rounded-full text-sm font-semibold">{!! $row->timing !!}</span>
                        </div>
                        <p class="mt-2 text-gray-400 text-shadow-sm">{!! $row->description !!} </p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </main>
@endif
    <!-- schedule flexibility -->



    <style>
        .flexibile{
            clip-path: polygon(
                    0 21%,
                    0% 0%,
                    -6% -5%,
                    49% 15%,
                    89% 1%,
                    100% 2%,
                    100% 100%,
                    100% 100%,
                    82% 90%,
                    50% 90%,
                    0 100%,
                    0% 100%,
                    0% 90%
            );
            height: 300px;
            display: flex;
            align-items: center;
        }

        .bttomimg{
            bottom:0;
        }
        .top{
            top:0;
        }
    </style>
    <main data-aos="fade-up" class="flexibile px-2 md:px-8 lg:px-10 py-10 bg-[#FDFAF0] relative aos-init aos-animate curved-background">
        <div class="container mx-auto">
            <h2 class="text-center text-[#12275A] text-3xl md:text-4xl font-bold">Schedule Flexibility</h2>
            <p class="text-gray-500 text-center mt-8 max-w-3xl mx-auto">
                We adapt our daily schedule to meet individual needs and interests of children. Our flexible approach ensures all developmental areas are covered while following children's natural curiosity.
            </p>
            <img src="{!! asset('assets/web/images/daycare/abs1.png') !!}" alt="" class="topimg hidden md:block absolute size-28 md:size-32 object-cover -top-10 right-0">
            <img src="{!! asset('assets/web/images/daycare/abs2.png') !!}" alt="" class="bttomimg hidden md:block absolute size-28 md:size-32 object-cover">
        </div>
    </main>

    <!-- Engaging Activities -->
    @if(!empty($activites))
    <main data-aos="fade-up" class="px-2 md:px-8 lg:px-10 py-10">
        <div class="container mx-auto">


            <h2 class="text-center text-3xl md:text-4xl font-bold">Engaging Activities</h2>
            <p class="text-gray-500 text-center mt-4 mb-4 max-w-2xl mx-auto">
                Our curriculum is packed with learning activities for toddlers and creative activities for kids to foster holistic development. Here’s a glimpse of what we offer.
            </p>
            <!-- grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 mt-15">
                @foreach($activites as $row)
                <!-- card 1 -->
                <div class="px-2 lg:px-3 py-2 rounded-xl shadow-lg bg-[#DCF1FD] group">
                    <div class="h-60 overflow-hidden rounded-lg">
                        <img src="{{ asset($row->image) }}" alt="{!! ucfirst($row->heading) !!}" class="size-full object-cover rounded-lg group-hover:scale-110 transition-all duration-300">
                    </div>
                    <div class="px-2 py-4">
                        <h3 class="text-2xl font-semibold">{!! ucfirst($row->heading) !!}</h3>
                        <p class="text-gray-500 mt-2">
                           {!! ucfirst($row->description) !!}
                        </p>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </main>
@endif
    <!-- skills we develop -->
    @if(!empty($skills) && count($skills) > 0)
        <section class="bg-gradient-to-b from-[#FFF6DB] to-[#FFFDF2] px-4 md:px-20 py-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-[#3C1E6E]">Skills We Develop</h2>
                <p class="text-gray-700 mt-4 max-w-2xl mx-auto text-base md:text-lg">
                    Our programs are designed to nurture holistic growth, empowering children with lifelong skills.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                @foreach($skills as $row)
                    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 p-6 text-center flex flex-col items-center space-y-4 border border-purple-100">
                        <div class="w-20 h-20 bg-[#F7ECFF] rounded-full flex items-center justify-center shadow-inner">
                            <img src="{{ asset($row->image) }}" alt="{{ $row->heading }}" class="w-10 h-10 object-contain">
                        </div>
                        <h3 class="text-lg font-semibold text-[#3C1E6E]">{{ ucfirst($row->heading) }}</h3>
                        <p class="text-sm text-gray-600">{{ ucfirst($row->description) }}</p>
                    </div>
                @endforeach
            </div>
        </section>
    @endif



   

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

    <!-- Image Popup Modal -->
    <div id="imagePopup" class="fixed inset-0 bg-black bg-opacity-80 hidden items-center justify-center z-50">
        <div class="relative max-w-4xl w-full px-4">
            <img id="popupImage" src="" alt="Popup" class="w-full max-h-[90vh] object-contain rounded-2xl">
            <button id="closePopup" class="absolute top-2 right-4 text-white text-3xl font-bold hover:text-gray-300">&times;</button>
        </div>
    </div>


    <!-- Safety & Security Section -->
    <section class="px-4 md:px-10 py-16 bg-gradient-to-br from-purple-50 to-purple-100 text-[#12275A]">
        <div class="max-w-6xl mx-auto text-center space-y-6">
            <h2 class="text-3xl md:text-4xl font-bold">Safety & Security</h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                Safety is our top priority at <strong>9to9 Daycare</strong>. Our CCTV-enabled centers offer live monitoring via mobile devices for transparency. We follow CDC and WHO-aligned protocols with trained security and medical staff on-site.
            </p>

        </div>
    </section>

    <!-- Locations & Accessibility Section -->
    <section class="px-4 md:px-10 py-16 bg- text-[#12275A]">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Locations & Accessibility</h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto mb-10">
                With centers across India’s major cities, we’re the “<strong>daycare near me</strong>” solution for working parents. All centers offer transport and are conveniently located near offices and homes.
            </p>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach (['Delhi' => 'Affordable daycare with CCTV monitoring, flexible hours, and trusted care.',
                          'Mumbai' => 'Full-day programs with nutritious meals and fun, engaging activities.',
                          'Bangalore' => 'Tech-enabled daycare offering live updates and preschool programs.',
                          'Hyderabad' => 'Safe and nurturing space with flexible daycare timings for working parents.',
                          'Pune' => 'Holistic curriculum with creative activities and extended care hours.',
                          'Chennai' => 'Child-centered learning programs with strong safety protocols and toddler care.'] as $city => $desc)
                    <div class="p-6 rounded-2xl shadow-md border bg-[#FFF7ED] border-blue-100 hover:shadow-lg transition-all duration-300">
                        <h3 class="text-xl font-semibold text-blue-800 mb-2">{{ $city }}</h3>
                        <p class="text-gray-600">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Why 9to9 is Best Section -->
    <section class="px-4 md:px-10 py-16 bg-[#FFF7ED] text-[#12275A]">
        <div class="max-w-6xl mx-auto text-center space-y-8">
            <h2 class="text-3xl md:text-4xl font-bold">Why 9to9 is the Best Daycare in India</h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                We combine <strong>affordability</strong>, <strong>safety</strong>, and <strong>quality learning</strong> in every city we serve. As India’s leading child care service, 9to9 Daycare is the trusted partner for working parents in Delhi, Mumbai, Bangalore, Hyderabad, Chennai, and Pune.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">

                <a href="https://calendly.com/9to9schools/30min" class="border-2 border-[#9F3ED5] text-[#9F3ED5] hover:bg-[#9F3ED5] hover:text-white px-6 py-3 rounded-full font-semibold transition">Book an Appointment</a>

            </div>
        </div>
    </section>


    <!-- enquiry form -->
    <main data-aos="fade-up" class="px-2 md:px-8 lg:px-10 py-10">
        <div class="container mx-auto">
            <h2 class="text-center text-3xl md:text-4xl font-bold">ENQUIRE NOW</h2>
            <!-- form -->
            <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg border border-black/10 mt-10">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            

                <form class="space-y-5" method="POST" action="{{ route('enquiry.submit') }}">
                    <input type="hidden" name="page" value="day-care">
                @csrf
                <!-- Full Name -->
                    <div>
                        <label class="block font-semibold mb-1">Full Name</label>
                        <input type="text" name="name" placeholder="Full Name" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                    </div>
                    <!-- Email ID -->
                    <div>
                        <label class="block font-semibold mb-1">Email ID</label>
                        <input type="email"  name="email" placeholder="Email ID" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required>
                    </div>
                    <!-- Phone Number -->
                    <div>
                        <label class="block font-semibold mb-1">Phone Number</label>
                        <input type="tel" name="mobile"    pattern="[6-9][0-9]{9}" title="Please enter a valid 10-digit phone number starting with 6-9"  placeholder="Phone Number" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300"  required>
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Pin Code</label>
                        <input type="number" name="pin_code"  placeholder="Pin Code" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" min="100000" max="999999"  required id="pin_code">
                    </div>
                    <!-- Select State & City -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-semibold mb-1">State</label>
                            <input type="text"  name="state"  placeholder="State" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required id="state">
                        </div>
                        <div>
                            <label class="block font-semibold mb-1">City</label>
                            <input type="text"  name="city" placeholder="City" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300" required id="city">
                        </div>
                    </div>
                    <!-- Message -->
                    <div>
                        <label class="block font-semibold mb-1">Message</label>
                        <textarea  name="message" placeholder="Write Message" class="w-full px-4 py-2 border border-black/10 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 h-32" required></textarea>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="block w-fit mx-auto px-8 py-3 bg-cyan-400 text-white font-semibold rounded-md hover:bg-cyan-500 transition cursor-pointer">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </main>

@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    <!-- AOS JS for on scroll animations -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        AOS.init();

        // header slider
        let swiper = new Swiper(".swiper-container", {
            effect: "coverflow",
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: true,
            },
            centeredSlides: true,
            slidesPerView: "auto",
            initialSlide: 1,
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 10,
                slideShadows: false,
            },
        });

        // faq
        const questions = document.querySelectorAll(".ques");
        questions.forEach((question) => {
            question.addEventListener("click", function () {
                const answer = this.nextElementSibling;
                const arrow = this.querySelector(".arrow");
                if (answer.classList.contains("open")) {
                    answer.classList.remove("open");
                    arrow.style.transform = "rotate(0deg)";
                } else {
                    answer.classList.add("open");
                    arrow.style.transform = "rotate(180deg)";
                }
            });
        });
    </script>
    <script>
        // const swiperTestimonial = new Swiper(".mySwiper.mytestimonials", {
        //     slidesPerView: 1,
        //     spaceBetween: 30,
        //     centeredSlides: true,
        //     loop: true,
        //     pagination: {
        //         el: ".swiper-pagination",
        //         clickable: true,
        //     },
        //     autoplay: {
        //         delay: 4000,
        //         disableOnInteraction: false,
        //     },
        //     breakpoints: {
        //         768: {
        //             slidesPerView: 2,
        //         },
        //     },
        // });
       
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
<script>
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
