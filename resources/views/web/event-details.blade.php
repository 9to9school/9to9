@extends('layouts.web')
@section('css')
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }
    </style>
@stop

@section('body')

    <!-- hero section -->
    <main class="px-5 md:px-8 lg:px-10 py-10 md:py-10 relative md:min-h-[500px] flex items-center gsap-fade-up">
        <!-- background -->
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset($events->banner_image ?? 'assets/web/images/events/bg.png') }}" alt class="size-full object-cover">
        </div>
        <!-- black overlay -->
        <div class="absolute inset-0 bg-black/50 pointer-events-none -z-10"></div>

        <!-- content -->
        <div class="max-w-5xl mx-auto space-y-8 text-center">
            <h1 class="text-3xl md:text-4xl lg:text-6xl font-bold text-white">
                {{ $events->banner_heading ?? 'Testing Exciting Events & Fun Activities ' }}
                <span class="text-cyan-400"> {{$events->banner_subheading ?? 'for Your Child!'}} </span>

            </h1>
            <p class="text-white font-medium text-lg md:text-2xl">
                {{ $events->banner_description ?? 'Creating memories and fostering growth through engaging experiences' }}
            </p>
            <!--<a href="{{ url('contact') }}">-->
            <!--    <button class="text-white text-xl md:text-2xl bg-cyan-400 font-semibold px-5 py-2 rounded-lg">-->
            <!--        More About us-->
            <!--    </button>-->
            <!--</a>-->
        </div>
    </main>


    <!-- storytelling and activities -->
    <main class="bg-[#f0f9fe] py-16 px-4 md:px-8 lg:px-10 gsap-fade-up">
        <div class="max-w-7xl mx-auto text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">{{ $events->event_name }}</h2>
            <p class="text-gray-600 text-lg">
                {{ $events->description }}
            </p>
        </div>
        <div class="flex flex-col lg:flex-row items-start gap-8">
            <!-- Video Placeholder or Image -->
            <div class="flex-1 rounded-xl overflow-hidden">
                {{-- You can replace this with a real video URL if you store one --}}
                @if(!empty($events->banner_image))
                    <img src="{{ asset($events->banner_image) }}" class="w-full h-auto object-cover rounded-xl" alt="{{ $events->event_name }}">
                @else
                    <iframe src="https://www.youtube.com/embed/Nkmarl4ynRM" title="YouTube video player" frameborder="0"
                            allowfullscreen class="w-full aspect-video rounded-xl"></iframe>
                @endif
            </div>

            <!-- Text content -->
            <div class="flex-1">
                <h3 class="text-2xl md:text-3xl font-semibold text-gray-900 mb-4">
                    {{ $events->sub_heading ?? 'Interactive Storytelling Experience' }}
                </h3>
                <p class="text-gray-600 text-lg mb-6">
                    {{ $events->banner_description ?? 'Join our session to explore fun-filled learning and creativity!' }}
                </p>

                <!-- Details Grid -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white shadow-md px-4 py-2 rounded-xl text-center">
                        <p class="text-sm font-semibold text-[#00bcd4]">Age Group</p>
                        <p class="text-gray-700">{{ $events->age }}</p>
                    </div>
                    <div class="bg-white shadow-md px-4 py-2 rounded-xl text-center">
                        <p class="text-sm font-semibold text-[#00bcd4]">Duration</p>
                        <p class="text-gray-700">{{ $events->duration }}</p>
                    </div>
                    <div class="bg-white shadow-md px-4 py-2 rounded-xl text-center">
                        <p class="text-sm font-semibold text-[#00bcd4]">Materials</p>
                        <p class="text-gray-700">{{ $events->materials ?? 'Paper, crayons'}} </p> {{-- Optional: Make this field dynamic if stored --}}
                    </div>
                    <div class="bg-white shadow-md px-4 py-2 rounded-xl text-center">
                        <p class="text-sm font-semibold text-[#00bcd4]">Skills</p>
                        <p class="text-gray-700">{{ $events->skills ?? 'Creativity, Listening'}} </p> {{-- Optional: Make this dynamic too --}}
                    </div>
                </div>

                <a href="#regidterEvent" class="bg-cyan-400 hover:bg-cyan-500 text-white font-semibold px-6 py-2 rounded-md transition">
                    Register for an Event

                </a>
            </div>
        </div>
    </main>


    <!-- registration form -->
    <main class="bg-[#FDF5EB] px-4 md:px-8 lg:px-10 py-20 space-y-8 gsap-fade-up">
        <!-- Container to hold both the image and form side by side -->
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-center gap-10">

            <!-- Left side: Image with a circular background accent -->
            <div class="relative flex-1 flex justify-center">
                <!-- Circle background behind the woman -->
                <div
                        class="absolute bg-yellow-300 rounded-full w-72 h-72 -z-10"
                        style="top: 50%; left: 50%; transform: translate(-50%, -50%);"
                ></div>
                <!-- Actual woman image -->
                <img
                        src="{{asset('assets/web/images/womenlaptop.png')}}"
                        alt="Woman with Laptop"
                        class="z-20 w-[50]"
                />
            </div>

            <!-- Right side: The form card -->
            <div class="flex-1 w-full max-w-md bg-white p-6 rounded-lg shadow-md border border-black/10">


                <div class="text-center">
                    <h2 class="text-3xl font-extrabold text-indigo-900">Register for an Event</h2>
                    <p class="text-sm text-gray-500 mt-1"> Fill out the form below to register your child for one of our upcoming events!</p>
                </div>

                <form class="space-y-5" method="POST" action="{{ route('enquiry.submit') }}">
                    <input type="hidden" name="page" value="{{ $events->event_name }}">
                    @csrf
                    <!-- Full Name -->
                    <div>
                        <input type="text" name="name" value="{{ old('name') }}"
                               required minlength="3" maxlength="30"
                               placeholder="Parent Name"
                               onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                               class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                    {{ $errors->has('name') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email ID -->
                    <div>
                        <input type="email" name="email" value="{{ old('eamil') }}"
                               required placeholder="Email ID"
                               class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
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
                               class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                    {{ $errors->has('mobile') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                        @error('mobile')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Pin_code -->
                    <div>
                        <input type="number" name="pin_code" value="{{ old('pin_code') }}"
                               placeholder="Pin Code"
                               class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                    {{ $errors->has('pin_code') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="pin_code1">
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
                                   class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                        {{ $errors->has('state') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="state1">
                            @error('state')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <input type="text" name="city" value="{{ old('city') }}"
                                   placeholder="City"
                                   onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                                   class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                        {{ $errors->has('city') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="city1">
                            @error('city')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                     <textarea name="message" placeholder="Write Message"
                               class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2 h-32
                        {{ $errors->has('message') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-indigo-900 font-semibold py-3 rounded-md mt-4 transition">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </main>


    <!-- Modal for Book a Demo / Enquire Now -->
    <section id="demo-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 hidden">
        <div class="relative bg-white rounded-xl shadow-xl p-8 space-y-6 w-full max-w-2xl">
            <!-- Close Button -->
            <button id="close-modal" class="absolute top-4 right-4 text-gray-500 text-2xl">&times;</button>
            <div class="text-center mb-8">
                <h2 class="text-4xl font-bold text-gray-900">Enquire Now</h2>
            </div>
            <div class="space-y-6">
                <!-- Full Name -->
                <div>
                    <label class="block text-gray-700 mb-1 font-medium">Full Name</label>
                    <input type="text" placeholder="Full Name" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                </div>
                <!-- Email ID -->
                <div>
                    <label class="block text-gray-700 mb-1 font-medium">Email ID</label>
                    <input type="email" placeholder="Email ID" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                </div>
                <!-- Phone Number -->
                <div>
                    <label class="block text-gray-700 mb-1 font-medium">Phone Number</label>
                    <input type="tel" placeholder="Phone Number" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                </div>
                <!-- Grid: State & City -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 mb-1 font-medium">Select State</label>
                        <input type="text" placeholder="State" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1 font-medium">Select City</label>
                        <input type="text" placeholder="City" class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-400">
                    </div>
                </div>
                <!-- Message -->
                <div>
                    <label class="block text-gray-700 mb-1 font-medium">Message</label>
                    <textarea rows="4" placeholder="Write Message" class="w-full border border-gray-300 rounded-md px-4 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-cyan-400"></textarea>
                </div>
                <!-- Submit Button -->
                <div class="text-center">
                    <button class="bg-cyan-500 text-white px-6 py-2 rounded-md hover:bg-cyan-600 transition duration-300">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </section>

@stop

@section('js')
    <!-- GSAP Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollToPlugin.min.js"></script>

    <script>
        // Register GSAP plugins
        gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

        // On-scroll fade-up animation for elements with class 'gsap-fade-up'
        gsap.utils.toArray('.gsap-fade-up').forEach(elem => {
            gsap.from(elem, {
                opacity: 0,
                y: 50,
                duration: 1,
                scrollTrigger: {
                    trigger: elem,
                    start: "top 80%",
                    toggleActions: "play none none reverse"
                }
            });
        });

        // Open modal when any button with .open-modal is clicked
        document.querySelectorAll('.open-modal').forEach(button => {
            button.addEventListener('click', function() {
                const modal = document.getElementById('demo-modal');
                modal.classList.remove('hidden');
                gsap.fromTo(modal, { opacity: 0 }, { opacity: 1, duration: 0.5 });
            });
        });

        // Close modal when the close button is clicked
        document.getElementById('close-modal').addEventListener('click', function() {
            const modal = document.getElementById('demo-modal');
            gsap.to(modal, { opacity: 0, duration: 0.5, onComplete: () => modal.classList.add('hidden') });
        });

        // (Optional) Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                gsap.to(window, { duration: 1, scrollTo: this.getAttribute('href') });
            });
        });

        document.querySelectorAll('.tab-pill').forEach(button => {
            button.addEventListener('click', function() {
                // Remove active state from all tab pills and add it to the clicked one
                document.querySelectorAll('.tab-pill').forEach(btn => btn.classList.remove('bg-purple-900', 'text-white'));
                this.classList.add('bg-purple-900', 'text-white');

                let filter = this.getAttribute('data-filter');
                document.querySelectorAll('.event-card').forEach(card => {
                    // If "all" is selected or card's data-age equals filter, show the card; otherwise, hide it.
                    if (filter === 'all' || card.getAttribute('data-age') === filter) {
                        gsap.to(card, { opacity: 1, duration: 0.5, display: 'block' });
                    } else {
                        gsap.to(card, { opacity: 0, duration: 0.5, onComplete: () => card.style.display = 'none' });
                    }
                });
            });
        });
    </script>
@stop
