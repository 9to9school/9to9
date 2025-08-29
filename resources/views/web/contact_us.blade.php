@extends('layouts.web')
@section('css')


@stop
@section('body')


  <main id="main-content" class="relative h-[500px] flex items-center justify-center px-5 sm:px-10 overflow-hidden">
  
  <!-- Background Image -->
  <img src="{{ asset('assets/images/contact.webp') }}" 
       alt="Background" 
       class="absolute inset-0 w-full h-full object-cover z-0" />

  <!-- Black Overlay (darkens bg only) -->
  <div class="absolute inset-0 bg-black/50 z-10"></div>

  <!-- Foreground Text -->
  <div class="relative z-20 text-center text-white max-w-2xl">
    <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight">
      Empowering Futures at <br />
      <span class="text-sky-300">9 to 9 School</span>
    </h1>
    <p class="text-lg sm:text-xl mt-4 font-light">
      Our 9-to-9 approach gives you the flexibility to learn on your
    </p>

    <!-- Optional CTA Button -->
    <!--
    <button class="mt-6 bg-sky-500 hover:bg-sky-600 text-white px-6 py-3 rounded-lg font-semibold transition">
      More About Us
    </button>
    -->
  </div>

</main>

<section class="relative py-20 px-6 bg-gradient-to-br from-sky-100 via-blue-200 to-indigo-300 overflow-hidden">
  <!-- Background Blobs -->
  <div class="absolute top-[-10%] left-[-10%] w-[300px] h-[300px] bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
  <div class="absolute bottom-[-10%] right-[-10%] w-[300px] h-[300px] bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>

  <div class="max-w-7xl mx-auto relative z-10 text-center">
    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-14 drop-shadow-xl animate-fade-in">🌍 Get in Touch with Our Branches</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

      <!-- Card Template Start -->
      <div class="bg-sky-50 border border-sky-100 shadow-2xl rounded-3xl p-8 text-left relative hover:scale-105 transition-transform duration-500">
       
        <h3 class="text-2xl font-bold text-sky-800 mb-6 pt-4">Lucknow</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-gray-800 text-sm">
          <div>
            <p class="font-semibold text-gray-900 mb-1">📍 Address</p>
            <p>1/184, Opp First Cry Showroom</p>
            <p>Sector 1, Vikas Nagar</p>
          </div>
          <div>
            <p class="font-semibold text-gray-900 mb-1">📞 Phone</p>
            <p>+91 99903 18880</p>
            <p>+91 99181 90555</p>
          </div>
          <div>
            <p class="font-semibold text-gray-900 mb-1">✉️ Email</p>
            <p>admin@9to9school.com</p>
            <p>info@9to9school.com</p>
          </div>
        </div>
      </div>
      <!-- Card Template End -->

      <!-- Singapore -->
      <div class="bg-green-50 border border-green/20 shadow-2xl rounded-3xl p-8 text-left relative hover:scale-105 transition-transform duration-500">
       
        <h3 class="text-2xl font-bold text-green-800 mb-6 pt-4">Singapore</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-gray-800 text-sm">
          <div>
            <p class="font-semibold text-gray-900 mb-1">📍 Address</p>
            <p>300 Tampines Ave 5</p>
            <p>Tampines Junction #07-01/07</p>
            <p>Singapore 529653</p>
          </div>
          <div>
            <p class="font-semibold text-gray-900 mb-1">📞 Phone</p>
            <p>+65 98765 43210</p>
          </div>
          <div>
            <p class="font-semibold text-gray-900 mb-1">✉️ Email</p>
            <p>sg@9to9school.com</p>
          </div>
        </div>
      </div>

      <!-- Gurgaon -->
      <div class="bg-pink-50 border border-pink/20 shadow-2xl rounded-3xl p-8 text-left relative hover:scale-105 transition-transform duration-500">
      
        <h3 class="text-2xl font-bold text-pink-800 mb-6 pt-4">Gurgaon</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-gray-800 text-sm">
          <div>
            <p class="font-semibold text-gray-900 mb-1">📍 Address</p>
            <p>66/9 Sushant Lok Phase1</p>
            <p>Gurgaon, Haryana</p>
          </div>
          <div>
            <p class="font-semibold text-gray-900 mb-1">📞 Phone</p>
            <p>+91 98123 45678</p>
          </div>
          <div>
            <p class="font-semibold text-gray-900 mb-1">✉️ Email</p>
            <p>gurgaon@9to9school.com</p>
          </div>
        </div>
      </div>

      <!-- Noida -->
      <div class="bg-violet-50 border border-violet/20 shadow-2xl rounded-3xl p-8 text-left relative hover:scale-105 transition-transform duration-500">
    
        <h3 class="text-2xl font-bold text-violet-800 mb-6 pt-4">Noida</h3>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-gray-800 text-sm">
          <div>
            <p class="font-semibold text-gray-900 mb-1">📍 Address</p>
            <p>C-4, Sector 63</p>
            <p>Noida, Uttar Pradesh</p>
          </div>
          <div>
            <p class="font-semibold text-gray-900 mb-1">📞 Phone</p>
            <p>+91 99789 12345</p>
          </div>
          <div>
            <p class="font-semibold text-gray-900 mb-1">✉️ Email</p>
            <p>noida@9to9school.com</p>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>



    <div class="contact-section py-5 flex justify-center items-center text-center">
        <div class="container">
            <!-- Contact Cards -->


            <!-- Contact Main Section -->
            <div class="contact-main flex flex-wrap justify-center items-center gap-8 mt-10">
                <div class="contact-imgs">
                    <img src="https://9to9school.com/assets/images/about/sec1/6826110cf13a0.webp"
                         alt="Contact"
                         class="w-full" />
                </div>

                <div class="contact-form bg-white p-6 rounded-lg w-full md:w-100">
                    <h3 class="text-xl font-semibold mb-4">Get in touch with us.</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                    @endif
                    @if (Session::has('success')) <div class="alert alert-success">{{ Session('success') }}</div> @endif
                    @if (Session::has('error')) <div class="alert alert-danger">{{ Session('error') }}</div> @endif
                    <form class="space-y-5" method="POST" action="{{ route('enquiry.submit') }}">
                        <input type="hidden" name="page" value="contact">
                        @csrf
                        <!-- Full Name -->
                        <div>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   required minlength="3" maxlength="30"
                                   placeholder="Full Name" required
                                   onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                    {{ $errors->has('name') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                            @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email ID -->
                        <div>
                            <input type="email" name="email" value="{{ old('eamil') }}"
                                   required placeholder="Email ID" required
                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
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
                                   placeholder="Phone Number" required
                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                    {{ $errors->has('mobile') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                            @error('mobile')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <input type="number" name="pin_code" value="{{ old('pin_code') }}"                                   
                                   placeholder="Pin Code" required  min="100000" max="999999"
                                   class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                    {{ $errors->has('pin_code') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="pin_code">
                            @error('pin_code')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Select State & City -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <input type="text" name="state" value="{{ old('state') }}"
                                       placeholder="State"
                                       onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)" required
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                        {{ $errors->has('state') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="state">
                                @error('state')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="text" name="city" value="{{ old('city') }}"
                                       placeholder="City"
                                       onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)" required
                                       class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300
                                        {{ $errors->has('city') ? 'border-red-500 ring-red-300' : 'border-black/10' }}" id="city">
                                @error('city')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Message -->
                        <div>
                     <textarea name="message" placeholder="Write Message" required
                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 h-32
                        {{ $errors->has('message') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">{{ old('message') }}</textarea>
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
    <div class="contact-section py-5 flex justify-center items-center text-center">
        <div style="width: 100%; height: 450px;">


            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3558.114907101328!2d80.95701581188659!3d26.899848107222773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3999571190eb6acd%3A0xa37da33126cbc7c!2sThe%20Little%20Hands%20-%20Speech%20And%20Occupational%20Therapy%20Center!5e0!3m2!1sen!2sin!4v1750412475713!5m2!1sen!2sin" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <section class="newsletter-section py-5">
        <div class="newsletter-content">
            <h2 class="newsletter-heading">Subscribe Our Newsletter</h2>
            <p class="newsletter-text">
                Updates on new courses and workshops
            </p>
            <form class="newsletter-form">
                <input
                        type="email"
                        placeholder="Enter Your Mail"
                        class="newsletter-input"
                />
                <button type="submit" class="newsletter-button">Subscribe Now</button>
            </form>
        </div>
        <div class="newsletter-image-container">
            <img
                    {{--                    src="{{ asset('assets/web/images/newsletter-min.png') }}"--}}
                    src="https://img.freepik.com/free-photo/view-young-students-attending-school_23-2151031925.jpg?t=st=1745137482~exp=1745141082~hmac=a20a5e4d43e3e5358df6ce30857aea18f3d207aa36359076bf9d4f297722c7c9&w=996"
                    alt="Newsletter Image"
                    class="newsletter-image"
            />
        </div>
    </section>
@stop

@section('js')
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
