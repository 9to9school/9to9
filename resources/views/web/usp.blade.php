@extends('layouts.web')
@section('css')
   <style>
       .active-tab {
           @apply bg-blue-500 text-white;
       }
   </style>
@stop

@section('body')
    {{--<section class="bg-gray-50 py-8 py-4 custompadding-2em relative">
        <div class="container mx-auto">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Right Tab Content (Scrollable) -->
                <div class="lg:w-3/4">
                     @foreach($usp as $key=>$tabItem)
                        <div id="slot{{$key+1}}" class="tab-content  rounded  p-4">
                            <img src="{{ asset($tabItem->image) }}" alt="{{ $tabItem->heading }}" class="w-full h-40 rounded">
                            <h2 class="text-2xl font-bold mt-4">{{ $tabItem->heading }}</h2>
                            <p class="mt-2 text-gray-700">{{ $tabItem->description }}</p>
                        </div>

                        @php

                            $data = App\Models\UspDetails::where('status', 'active')->get();
                        @endphp
                        @foreach($data as $key => $tab)
                            <div class="">
                                <div class="flex flex-col lg:flex-row {{ $key % 2 === 1 ? 'lg:flex-row-reverse' : '' }} items-center gap-6">
                                    <!-- Image -->
                                    <div class="lg:w-1/2">
                                        <img src="{{ asset($tab->image) }}" alt="{{ $tab->heading }}"
                                             class="w-full h-64 object-cover rounded-xl shadow-md">
                                    </div>
                        
                                    <!-- Text Content -->
                                    <div class="lg:w-1/2">
                                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $tab->heading }}</h2>
                                        <p class="text-gray-600 leading-relaxed">{{ $tab->description }}</p>
                                    </div>
                                </div>
                            </div>

                    @endforeach
                  
                </div>

                <!-- Left Tabs Menu (Sticky & Scrollable) -->
                <div class="lg:w-1/4">
                    <div class="sticky top-20 h-[calc(100vh-5rem)] overflow-y-auto flex flex-col gap-2">
                        @foreach($usp as $key=>$tabItem)
                        <button class="tab-btn bg-gray-200 hover:bg-blue-400 hover:text-white text-left px-4 py-2 rounded transition" data-tab="slot{{$key+1}}">{{ $tabItem->heading }}</button>
                        @endforeach
                        
                    </div>
                </div>

            </div>
        </div>
    </section>--}}


    @php
        $data = App\Models\UspDetails::where('status', 'active')->get();
    @endphp
    @foreach($data as $key => $tab)
    <section class="bg-gray-50 py-8 py-4 custompadding-2em relative">
        <div class="container mx-auto">
            <div class="">
                <div class="flex flex-col lg:flex-row {{ $key % 2 === 1 ? 'lg:flex-row-reverse' : '' }} items-center gap-6">
                    <!-- Image -->
                    <div class="lg:w-1/2">
                        <img src="{{ asset($tab->image) }}" alt="{{ $tab->heading }}" class="w-full h-64 object-cover rounded-xl shadow-md">
                    </div>
                    <!-- Text Content -->
                    <div class="lg:w-1/2">
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $tab->heading }}</h2>
                            <p class="text-gray-600 leading-relaxed">{{ $tab->description }}</p>
                    </div>
                </div>
            </div>
         
        </div>
    </section>
    @endforeach


@stop

@section('js')

    <!-- Tab Switching Script -->
    <script>
        // Select all buttons and content sections
        const tabButtons = document.querySelectorAll(".tab-btn");
        const tabContents = document.querySelectorAll(".tab-content");

        tabButtons.forEach(btn => {
            btn.addEventListener("click", () => {
                const tabName = btn.getAttribute("data-tab");

                // Hide all content
                tabContents.forEach(content => {
                    content.classList.add("hidden");
                });

                // Remove active style from all buttons
                tabButtons.forEach(b => {
                    b.classList.remove("bg-blue-400", "text-white");
                    b.classList.add("bg-gray-200");
                });

                // Show selected content
                document.getElementById(tabName).classList.remove("hidden");

                // Highlight active button
                btn.classList.add("bg-blue-400", "text-white");
                btn.classList.remove("bg-gray-200");
            });
        });

        // Optional: Show first tab by default
        document.querySelector(".tab-btn").click();
    </script>

@stop
