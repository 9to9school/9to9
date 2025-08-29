@extends('layouts.web')
@section('css')

@stop

@section('body')


    <main id="main-content" class="relative h-[500px] flex items-center justify-center px-5 sm:px-10 overflow-hidden">

        <!-- Background Image -->
        <img src="{{ asset('assets/images/hack.webp') }}"
             alt="Background"
             class="absolute inset-0 w-full h-full object-cover z-0" />

        <!-- Black Overlay (darkens bg only) -->
        <div class="absolute inset-0 bg-black/50 z-10"></div>

        <!-- Foreground Text -->
        <div class="relative z-20 text-center text-white max-w-2xl">
            <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight">
                Life Skills Hacks
            </h1>
            <p class="text-lg sm:text-xl mt-4 font-light">
                Our curriculum is carefully designed to support key developmental
                milestones at each age. See how we nurture your child's growth through targeted learning experiences.
            </p>
        </div>

    </main>



    <section class="life-skills-section py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Life Skills</h2>

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @forelse($life_skills as $life_skillss)
                    <div class="bg-white shadow-md rounded-2xl overflow-hidden flex flex-col transition hover:shadow-lg">
                        <img src="{{ asset($life_skillss->image) }}" alt="{{ $life_skillss->title ?? '' }}" class="w-full h-56 object-cover">

                        <div class="p-3 flex-1 flex flex-col justify-between">
                            <div>
                                <p class="text-sm text-gray-400 mb-2 flex items-center gap-1">
                                    <i class="bi bi-calendar"></i> {{ date('d M Y', strtotime($life_skillss->created_at)) }}
                                </p>
                                <h3 class="text-xl font-semibold text-gray-800 mb-3">{{ $life_skillss->title ?? '' }}</h3>
                                <p class="text-gray-600 text-sm">{!! Str::limit(strip_tags($life_skillss->description ?? ''), 100) !!}</p>
                            </div>

                            <div class="mt-5 flex justify-between items-center">
                                <a href="{{ url('/life-skills/' . $life_skillss->url) }}" class="bg-[#571D99] hover:bg-[#760af1] px-4 py-2 rounded text-white text-sm   font-medium text-sm">
                                    Read More <i class="bi bi-arrow-up-right"></i>
                                </a>

                                <div class="flex gap-2 items-center">
                                    @php
                                        $shareUrl = urlencode(url('/life-skills/' . $life_skillss->url));
                                        $shareText = urlencode($life_skillss->title ?? 'Check this out!');
                                    @endphp

                                            <!-- WhatsApp Share -->
                                    <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank" class="p-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-colors">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 21l1.9-5.7a8.5 8.5 0 1 1 3.8 3.8L3 21z"/>
                                        </svg>
                                    </a>

                                    <!-- X (formerly Twitter) -->
                                    <a href="https://x.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareText }}" target="_blank" class="p-2 bg-black text-white rounded-full hover:bg-gray-900 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22.26 0H1.74C.78 0 0 .774 0 1.729v20.542C0 23.226.78 24 1.74 24h20.52c.96 0 1.74-.774 1.74-1.729V1.729C24 .774 23.22 0 22.26 0zM17.68 17.71h-2.017l-2.932-4.246-2.868 4.246H7.898l4.193-6.075L8.13 6.29h2.018l2.651 3.906L15.35 6.29h2.016l-4.075 5.906 4.389 6.014z"/>
                                        </svg>
                                    </a>

                                    <!-- Facebook Share -->
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" class="p-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M22.675 0h-21.35C.597 0 0 .597 0 1.325v21.351C0 23.403.597 24 1.325 24h11.495v-9.294H9.691v-3.622h3.129V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.464.099 2.797.143v3.24l-1.918.001c-1.504 0-1.794.715-1.794 1.763v2.31h3.587l-.467 3.622h-3.12V24h6.116C23.403 24 24 23.403 24 22.676V1.325C24 .597 23.403 0 22.675 0z"/>
                                        </svg>
                                    </a>

                                    <!-- LinkedIn Share -->
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}" target="_blank" class="p-2 bg-blue-700 text-white rounded-full hover:bg-blue-800 transition-colors">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M20.452 20.452h-3.555v-5.569c0-1.328-.028-3.037-1.854-3.037-1.854 0-2.137 1.446-2.137 2.939v5.667H9.351V9h3.414v1.56h.046c.477-.9 1.638-1.85 3.372-1.85 3.6 0 4.266 2.37 4.266 5.455v6.286zM5.338 7.433c-1.143 0-2.063-.926-2.063-2.065 0-1.137.92-2.062 2.063-2.062 1.14 0 2.064.925 2.064 2.062 0 1.14-.925 2.065-2.064 2.065zM6.674 20.452H3.555V9h3.119v11.452z"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center text-gray-500">
                        No life skills content available at the moment.
                    </div>
                @endforelse
            </div>
        </div>
    </section>




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
