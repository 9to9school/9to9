@extends('layouts.web')
@section('css')
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css"
    />

    <style>
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }
    </style>

@stop

@section('body')
    <!-- Main Container -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 lg:grid-cols-3 gap-10">

        <!-- Main Blog Content -->
        <article class="lg:col-span-2">
            <img src="https://via.placeholder.com/800x400" alt="Blog Image" class="rounded-lg w-full mb-6 shadow-md">

            <div class="flex items-center gap-4 text-sm text-gray-500 mb-4">
                <span class="flex items-center gap-1">📅 <span>Jan 1, 2025</span></span>
                <span class="flex items-center gap-1">📁 <span>Education</span></span>
                <span class="flex items-center gap-1">👤 <span>Admin</span></span>
            </div>

            <h2 class="text-3xl font-bold text-orange-600 mb-6">From Without Content Style Without</h2>

            <p class="mb-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit magnam totam excepturi at tempore doloremque!
            </p>

            <blockquote class="bg-gray-100 border-l-4 border-orange-500 italic p-4 mb-6 rounded">
                "Education is not the learning of facts, but the training of the mind to think." – Albert Einstein
            </blockquote>

            <div class="grid sm:grid-cols-2 gap-4 mb-6">
                <img src="https://via.placeholder.com/500x300" class="rounded-lg shadow" alt="">
                <img src="https://via.placeholder.com/500x300" class="rounded-lg shadow" alt="">
            </div>

            <p class="mb-6">
                Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.
            </p>

            <!-- Tags -->
            <div class="flex flex-wrap gap-2 mb-6">
                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">Kids</span>
                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">Games</span>
                <span class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-sm">Learning</span>
            </div>

            <!-- Social Share -->
            <div class="flex gap-4 mb-10">
                <a href="#" class="text-blue-600 hover:underline">Facebook</a>
                <a href="#" class="text-sky-500 hover:underline">Twitter</a>
                <a href="#" class="text-blue-700 hover:underline">LinkedIn</a>
            </div>

            <!-- Comments Section -->
            <section class="mb-12">
                <h3 class="text-2xl font-bold mb-6">2 Comments</h3>

                <!-- Single Comment -->
                <div class="mb-6 flex items-start gap-4">
                    <img src="https://via.placeholder.com/50" class="rounded-full" alt="">
                    <div>
                        <h4 class="font-semibold">Albert Flores <span class="text-gray-400 text-sm ml-2">Jan 5, 2025</span></h4>
                        <p class="mt-1">This was very informative. Thanks for sharing!</p>
                    </div>
                </div>

                <div class="mb-6 flex items-start gap-4">
                    <img src="https://via.placeholder.com/50" class="rounded-full" alt="">
                    <div>
                        <h4 class="font-semibold">Jenny Wilson <span class="text-gray-400 text-sm ml-2">Jan 6, 2025</span></h4>
                        <p class="mt-1">Looking forward to reading more blogs like this one.</p>
                    </div>
                </div>
            </section>

            <!-- Comment Form -->
            <section>
                <h3 class="text-2xl font-bold mb-6">Leave a Comment</h3>
                <form class="space-y-4">
                    <div class="grid sm:grid-cols-2 gap-4">
                        <input type="text" placeholder="Your Name" class="border p-3 w-full rounded focus:outline-none focus:ring-2 focus:ring-orange-300">
                        <input type="email" placeholder="Your Email" class="border p-3 w-full rounded focus:outline-none focus:ring-2 focus:ring-orange-300">
                    </div>
                    <textarea rows="4" placeholder="Your Message" class="border p-3 w-full rounded focus:outline-none focus:ring-2 focus:ring-orange-300"></textarea>
                    <button class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600 transition">Post Comment</button>
                </form>
            </section>
        </article>

        <!-- Sidebar -->
        <aside class="space-y-8">
            <!-- Search -->
            <div>
                <h4 class="text-xl font-semibold mb-3 border-b pb-2">Search</h4>
                <input type="text" placeholder="Search..." class="w-full border p-3 rounded focus:outline-none focus:ring-2 focus:ring-orange-300">
            </div>

            <!-- Categories -->
            <div>
                <h4 class="text-xl font-semibold mb-3 border-b pb-2">Categories</h4>
                <ul class="space-y-2 text-sm text-gray-700">
                    <li class="hover:text-orange-600 cursor-pointer">🎓 Education</li>
                    <li class="hover:text-orange-600 cursor-pointer">🎲 Indoor Games</li>
                    <li class="hover:text-orange-600 cursor-pointer">🎤 Music</li>
                    <li class="hover:text-orange-600 cursor-pointer">🍴 Canteen</li>
                </ul>
            </div>

            <!-- Recent Posts -->
            <div>
                <h4 class="text-xl font-semibold mb-3 border-b pb-2">Recent Posts</h4>
                <ul class="space-y-3">
                    <li class="flex items-center gap-3">
                        <img src="https://via.placeholder.com/60" class="rounded-lg" alt="">
                        <div>
                            <p class="font-medium text-sm">From Without Content Style</p>
                            <span class="text-xs text-gray-400">Feb 15, 2025</span>
                        </div>
                    </li>
                    <li class="flex items-center gap-3">
                        <img src="https://via.placeholder.com/60" class="rounded-lg" alt="">
                        <div>
                            <p class="font-medium text-sm">That Jerk Farm Finance</p>
                            <span class="text-xs text-gray-400">Mar 2, 2025</span>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Tags -->
            <div>
                <h4 class="text-xl font-semibold mb-3 border-b pb-2">Tags</h4>
                <div class="flex flex-wrap gap-2">
                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">Children</span>
                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">Drawing</span>
                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">Exam</span>
                    <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">Time-table</span>
                </div>
            </div>
        </aside>
    </main>
@stop
@section('js')

@stop
