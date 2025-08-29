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
        @media (max-width: 767px) {
        button.bg-cyan-400.hover\:bg-cyan-500.cursor-pointer.text-white.font-semibold.px-6.py-2.rounded-md.transition.gsap-fade-up {
            width: 100%;
            margin: 0 auto;
        }
        }
    </style>
@stop

@section('body')

    <!-- hero section -->
    <main class="px-5 md:px-8 lg:px-10 py-10 md:py-10 relative md:min-h-[500px] flex items-center gsap-fade-up">
        <!-- background -->
        <div class="absolute inset-0 -z-10">
            <img src="{{ asset('assets/images/event.webp') }}" alt class="size-full object-cover">
        </div>
        <!-- black overlay -->
        <div class="absolute inset-0 bg-black/50 pointer-events-none -z-10"></div>
        <!-- content -->
        <div class="max-w-5xl mx-auto space-y-8">
            <h1 class="text-3xl md:text-4xl lg:text-6xl text-center font-bold text-white">
                Exciting <span class="text-cyan-400"> Events & Fun Activities</span> for Your Child!
            </h1>

            <p class="text-white font-medium text-lg md:text-2xl text-center">
                Creating memories and fostering growth through engaging experiences
            </p>

            <!-- This button can also trigger a modal if needed -->
        
        </div>
    </main>

  
    <main class="px-4 md:px-8 lg:px-10 py-10 gsap-fade-up">
        <div class="container mx-auto">
            <h1 class="text-2xl md:text-4xl font-bold text-[#12275A] text-center">Upcoming Events</h1>

            <!-- Tab Pills -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-10">
                <button class="tab-pill active text-xl font-semibold px-4 py-2 rounded-2xl border bg-purple-900 text-white" data-filter="all">All Ages</button>
                @foreach($age_groups as $age)
                    <button class="tab-pill text-xl font-semibold px-4 py-2 rounded-2xl border border-black/10" data-filter="{{ $age }}">{{ $age }}</button>
                @endforeach
            </div>

            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-10" id="eventsWrapper">
                @foreach($grouped_events as $age => $events)
                    @foreach($events as $event)
                        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 group gsap-fade-up event-card" data-age="{{ $age }}">
                            <div class="h-48 overflow-hidden">
                                <a href="{{ url('event-details/'.$event->event_url) }}">
                                    <img src="{{ asset($event->image) }}" alt="{{ $event->event_name }}"
                                         class="size-full object-cover group-hover:scale-110 transition-all duration-300">
                                </a>
                            </div>
                            <div class="p-4 space-y-3">
                                <h2 class="text-lg font-semibold text-gray-800">{{ $event->event_name }}</h2>
                                <div class="flex items-center justify-between text-sm text-gray-600">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('assets/web/images/events/calendar.png') }}" alt>
                                        <span>{{ \Carbon\Carbon::parse($event->created_at)->format('F d, Y') }}</span>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <img src="{{ asset('assets/web/images/events/clock.png') }}" alt>
                                    <span>{{ $event->duration }}</span>
                                    <span class="bg-blue-100 text-blue-700 px-3 py-0.5 rounded-full text-xs font-medium">Ages {{ $age }}</span>
                                </div>
                                <div class="flex items-center gap-2 text-sm text-gray-600">
                                    <img src="{{ asset('assets/web/images/events/phone.png') }}" alt>
                                    <span>{{ Str::limit($event->description, 25) }}</span>
                                </div>

                                <a href="#"
                                   data-bs-toggle="modal"
                                   data-bs-target="#enquiryModal"
                                   class="inline-block w-full text-center bg-[#571D99] hover:bg-[#760af1] text-white text-sm px-4 py-2 rounded transition">
                                    Book a Session
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endforeach
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
            <input type="hidden" name="page" value="Events">
            @csrf
            <!-- Full Name -->
            <div>
                <input type="text" name="name" value="{{ old('name') }}"
                       required minlength="3" maxlength="30"
                       placeholder="Parent Name"
                       onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                       class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                    {{ $errors->has('name') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" required>
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email ID -->
            <div>
                <input type="email" name="email" value="{{ old('eamil') }}"
                       required placeholder="Email ID"
                       class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
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
                       class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                    {{ $errors->has('mobile') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" required>
                @error('mobile')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>


            <!-- Pin_code -->
            <div>
                <input type="number" name="pin_code" value="{{ old('pin_code') }}"
                       placeholder="Pin Code"  min="100000" max="999999"
                       class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                    {{ $errors->has('pin_code') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="pin_code1" required>
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
                                        {{ $errors->has('state') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="state1" required>
                    @error('state')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="city" value="{{ old('city') }}"
                           placeholder="City"
                           onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                           class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                        {{ $errors->has('city') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="city1" required>
                    @error('city')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Message -->
            <div>
                     <textarea name="message" placeholder="Write Message" required
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

              <!--Pin Code -->
              <div>
                  <input type="number" name="pin_code" value="{{ old('pin_code') }}"
                         placeholder="Pin Code"  min="100000" max="999999"
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
    
@stop

@section('js')
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
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


      document.getElementById('pin_code1').addEventListener('keyup', function () {
        const pincode = this.value;

        if (pincode.length === 6) {
            fetch(`https://api.postalpincode.in/pincode/${pincode}`)
                .then(response => response.json())
                .then(data => {
                    if (data[0].Status === "Success") {
                        const postOffice = data[0].PostOffice[0];
                        document.getElementById('city1').value = postOffice.District;
                        document.getElementById('state1').value = postOffice.State;
                    } else {
                        document.getElementById('city1').value = '';
                        document.getElementById('state1').value = '';
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
     document.addEventListener('DOMContentLoaded', function () {
         const tabs = document.querySelectorAll('.tab-pill');
         const cards = document.querySelectorAll('.event-card');

         tabs.forEach(tab => {
             tab.addEventListener('click', () => {
                 // Remove active class from all tabs
                 tabs.forEach(t => t.classList.remove('bg-purple-900', 'text-white', 'active'));

                 // Add active to clicked tab
                 tab.classList.add('bg-purple-900', 'text-white', 'active');

                 const filter = tab.getAttribute('data-filter');

                 cards.forEach(card => {
                     const cardAge = card.getAttribute('data-age');

                     if (filter === 'all' || cardAge === filter) {
                         card.classList.remove('hidden');
                     } else {
                         card.classList.add('hidden');
                     }
                 });
             });
         });
     });
 </script>

@stop
