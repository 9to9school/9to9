@extends('layouts.web')
@section('css')

@stop

@section('body')

<section class="bg-gradient-to-br from-white to-indigo-50 text-gray-800">
<div class="container mx-auto">
    <div class="max-w-7xl mx-auto p-4">
        <div class="grid lg:grid-cols-3 gap-6">
            <!-- Blog Content -->
            <div class="lg:col-span-2 p-2 ">
                <div class="mb-6">
                    <img src="{{asset($lifeHack->image)}}" alt="Ananya" class=" w-full h-96 object-cover">
                    <div class="flex justify-between items-center mt-3 text-sm text-gray-500">
                        <p>9to9Schools team - {{ \Carbon\Carbon::parse($lifeHack->created_at)->format('d M Y') }}</p>
                        <div class="flex space-x-3 text-xl">
                            @php
                                $shareUrl = urlencode(url('/life-skills/'. $lifeHack->url));
                                $shareText = urlencode($lifeHack->heading ?? 'Check this out!');
                            @endphp
                            
                            <div class="flex items-center space-x-2">
                            
                                <!-- WhatsApp Share -->
                                <a href="https://wa.me/?text={{ $shareText }}%20{{ $shareUrl }}" target="_blank" class="p-2 bg-green-500 text-white rounded-full hover:bg-green-600 transition-colors">
                                    <!-- <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 21l1.9-5.7a8.5 8.5 0 1 1 3.8 3.8L3 21z"/>
                                    </svg> -->
                                <svg class="w-4 h-4" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/>
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
                            
                                <!-- Copy Link -->
                                <button onclick="navigator.clipboard.writeText('{{ url('/life-skills/'.$lifeHack->url) }}'); alert('Link copied to clipboard!')" class="p-2 bg-gray-600 text-white rounded-full hover:bg-gray-700 transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                                    </svg>
                                </button>
                            
                            </div>

                        </div>
                    </div>
                </div>
                <h1 class="text-3xl font-bold mb-6 text-left mb-3">{{$lifeHack->title ?? ''}}</h1>
                <p>
                    {!! ucfirst($lifeHack->description ) !!}
                </p>
            

                
                <p class="mb-4 leading-relaxed">{!! ucfirst($lifeHack->description ) !!}</p>
                
                @php
                    $data = \App\Models\lifehackDetails::where(['status' => 'active', 'life_hack_id' => $lifeHack->id])->get();
                @endphp
                
                @if($data->isNotEmpty())
                    @foreach($data as $key => $tab)
                        <div class="mb-2">
                            <div class="flex flex-col lg:flex-row {{ $key % 2 === 1 ? 'lg:flex-row-reverse' : '' }} items-center gap-6">
                                
                                <div class="lg:w-1/1">
                                    @if(!empty($tab->heading))
                                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $tab->heading }}</h2>
                                    @endif
                
                                    @if(!empty($tab->image))
                                        <img src="{{ asset($tab->image) }}" alt="{{ $tab->heading ?? 'Life Hack Image' }}" class="w-full mb-4">
                                    @endif
                
                                    @if(!empty($tab->description))
                                        <p class="text-gray-600 leading-relaxed">{!! $tab->description !!}</p><br>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>

            <!-- Sidebar -->
            <aside class="space-y-6">
               {{-- <div class="bg-white p-6 rounded-2xl shadow-md">
                    <h2 class="text-lg font-semibold mb-3 border-b pb-2">Service</h2>
                    <ul class="space-y-2 text-cyan-700">
                        <li><a href="#" class="hover:underline">Makeup Service</a></li>
                        <li><a href="#" class="hover:underline">Hair Service</a></li>
                        <li><a href="#" class="hover:underline">Nails Service</a></li>
                        <li><a href="#" class="hover:underline">Beauty Service</a></li>
                        <li><a href="#" class="hover:underline">Men's Grooming</a></li>
                    </ul>
                </div>--}}

                <div class="bg-blue-50 p-6 rounded-2xl shadow-md">
                    <h2 class="text-lg font-semibold mb-3 border-b pb-2">Recent Blogs</h2>
                    <div class="space-y-4">
                        @foreach($other5blogs as $blog)
                        <div class="flex space-x-3">
                            <img
                                    src="{{ asset($blog->image) }}?w=100&h=100&fit=crop"
                                    alt="{{ $blog->title }}"
                                    class="w-16 h-16 object-cover rounded"
                            />
                            <div class="flex-1">
                                <a href="{{ url('/life-skills/'. $blog->url) }}" class="text-sm text-gray-700 hover:text-salon-burgundy transition-colors line-clamp-3">
                                    {{ $blog->title }}
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-green-50 p-6 rounded-2xl shadow-md">

                        <h3 class="text-xl font-semibold mb-4">Get in touch with us.</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
                        @endif
                        @if (Session::has('success')) <div class="alert alert-success">{{ Session('success') }}</div> @endif
                        @if (Session::has('error')) <div class="alert alert-danger">{{ Session('error') }}</div> @endif
                    <form class="space-y-5" method="POST" action="{{ route('enquiry.submit') }}">
                        <input type="hidden" name="page" value="{!! '/life-skills'. $lifeHack->title !!}">
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

                <div class="bg-yellow-50 p-6 rounded-2xl shadow-md">
                    <h2 class="text-lg font-semibold mb-3 border-b pb-2">Tags Cloud</h2>
                    <div class="flex flex-wrap gap-2 text-sm">
                        <span class="bg-cyan-100 text-cyan-700 px-2 py-1 rounded">Child Wellness</span>
                        <span class="bg-cyan-100 text-cyan-700 px-2 py-1 rounded">Preschool Education</span>
                        <span class="bg-cyan-100 text-cyan-700 px-2 py-1 rounded">Healthy Habits</span>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-2xl shadow-md">
                    <h2 class="text-lg font-semibold mb-3 border-b pb-2">Follow Us</h2>
                    <div class="space-y-3">
                        <a href="https://www.facebook.com/9to9school" class="flex items-center space-x-2 text-blue-600 hover:text-blue-800 transition-colors">
                            
                            <svg class="w-5 h-5" fill="currentColor"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                              <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                            </svg>
                            <span>Facebook</span>
                        </a>
                        <a href="https://www.instagram.com/9to9school" class="flex items-center space-x-2 text-pink-600 hover:text-pink-800 transition-colors">
                            <!-- <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="m16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg> -->
                            <svg class="w-5 h-5" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                              <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                            <span>Instagram</span>
                        </a>
                        <a href="https://www.youtube.com/9to9school" class="flex items-center space-x-2 text-red-600 hover:text-red-800 transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                            </svg>
                            <span>Youtube</span>
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</div>
</section>





@stop

@section('js')
    <script>
        function copyLink() {
            navigator.clipboard.writeText(window.location.href);
            alert("Link copied to clipboard!");
        }

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
