@extends('layouts.web')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
@stop

@section('body')
    <!-- Hero Section -->



    <!-- Hero Section with Form -->
{{--<section id="main-content" class="relative bg-[linear-gradient(280deg,#EDFEFC_13.84%,#FEF6EC_96.14%)] px-4 py-20 fade-up">--}}
<section id="main-content" class=" px-4 py-16 fade-up">
    <div class="container mx-auto flex items-center flex-col-reverse md:flex-row gap-10 relative z-10">
        <!-- Text Content -->
        <div class="flex-1 space-y-4 text-start md:text-left">
            <span class="text-xs text-black-500 bg-white p-2 rounded-full inline-block">
               9to9School Franchise Opportunity
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight">
                {!! ucfirst($franchise->banner_heading) !!}
            </h1>
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold ">
                <span class="text-cyan-500">{!! ucfirst('9to9School ') !!}</span>{!! ucfirst('Franchise') !!}
            </h2>
            <p class="text-gray-700 max-w-md md:mx-0 text-lg mt-3">
                {!! ucfirst($franchise->banner_para) !!}
            </p>
            <div class="flex flex-col sm:flex-row items-start justify-start mt-4 gap-4">
                <a  data-bs-toggle="modal" data-bs-target="#franchiseModal" class="bg-cyan-500 text-white px-6 py-2.5 rounded-xl hover:bg-cyan-600 transition text-lg inline-flex items-center gap-2">
                    {{$franchise->btn_name}} >
                </a>
            </div>
        </div>
        <!-- Form Container -->
        <div class="flex-1 w-full  mx-auto">
            <img src="{{ asset($franchise->banner_image) }}" alt="Child playing" class="w-full" />
        </div>

    </div>
</section>


    <section class=" bg-[#F4F7FE] text-[#1E293B] px-4 py-8">
        <div class="container mx-auto ">
        <h2 class="text-3xl sm:text-4xl font-bold text-center mb-10">{{$franchise->why_choose_heading}}</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Feature Card -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="text-blue-500 bg-blue-100 w-10 h-10 flex items-center justify-center rounded-lg mb-4">
                    📚
                </div>
                <h3 class="text-lg font-semibold mb-1">Open 9 AM to 9 PM</h3>
                <p class="text-sm text-gray-600">Flexible operations that cater to various student schedules and maximize your earning potential.</p>
            </div>

            <!-- Feature Card -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="text-blue-500 bg-blue-100 w-10 h-10 flex items-center justify-center rounded-lg mb-4">
                    ₹
                </div>
                <h3 class="text-lg font-semibold mb-1">Pay-per-class Model</h3>
                <p class="text-sm text-gray-600">Simple booking and payment system that allows for transparent financial management.</p>
            </div>

            <!-- Feature Card -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="text-blue-500 bg-blue-100 w-10 h-10 flex items-center justify-center rounded-lg mb-4">
                    📊
                </div>
                <h3 class="text-lg font-semibold mb-1">Modern Admin Dashboard</h3>
                <p class="text-sm text-gray-600">Complete control over your franchise with an intuitive management dashboard.</p>
            </div>

            <!-- Feature Card -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="text-blue-500 bg-blue-100 w-10 h-10 flex items-center justify-center rounded-lg mb-4">
                    📱
                </div>
                <h3 class="text-lg font-semibold mb-1">Parent Mobile App</h3>
                <p class="text-sm text-gray-600">Keep parents engaged with real-time progress tracking and easy communication.</p>
            </div>

            <!-- Feature Card -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="text-blue-500 bg-blue-100 w-10 h-10 flex items-center justify-center rounded-lg mb-4">
                    🧑‍🏫
                </div>
                <h3 class="text-lg font-semibold mb-1">Full Onboarding Support</h3>
                <p class="text-sm text-gray-600">Zero experience needed – we provide complete training and ongoing support.</p>
            </div>

            <!-- Feature Card -->
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="text-blue-500 bg-blue-100 w-10 h-10 flex items-center justify-center rounded-lg mb-4">
                    💰
                </div>
                <h3 class="text-lg font-semibold mb-1">Low Investment, High ROI</h3>
                <p class="text-sm text-gray-600">Start your profitable education business with minimal upfront investment.</p>
            </div>

        </div>
    </div>
    </section>


        <section class="max-w-7xl mx-auto px-4 py-12">
            <!-- Title -->
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-black">Powerful Technology Platform</h2>
                <p class="text-gray-500 mt-3 text-base sm:text-lg">Modern tools to run your franchise efficiently and deliver exceptional service</p>
            </div>

            <!-- Images & Headings -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center text-center md:text-left">
                <!-- Dashboard -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Manage Everything From One Dashboard</h3>
                    <img src="{!! asset('assets/web/images/laptop.png') !!}" alt="Admin Dashboard" class="mx-auto ">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-1 mt-4 ">
                        <div class="flex items-center gap-2"><span class="text-yellow-500 text-xl"><img src="https://9to9school.com/assets/images/icon1.png" alt=""></span> Complete student management</div>
                        <div class="flex items-center gap-2"><span class="text-yellow-500 text-xl"><img src="https://9to9school.com/assets/images/icon1.png" alt=""></span> Performance analytics</div>
                        <div class="flex items-center gap-2"><span class="text-red-500 text-xl"><img src="https://9to9school.com/assets/images/icon2.png" alt=""></span> Fee collection & reporting</div>
                        <div class="flex items-center gap-2"><span class="text-orange-500 text-xl"><img src="https://9to9school.com/assets/images/icon2.png" alt=""></span> Communication tools</div>
                        <div class="flex items-center gap-2"><span class="text-purple-500 text-xl"><img src="https://9to9school.com/assets/images/icon3.png" alt=""></span> Teacher scheduling </div>
                    </div>
                </div>

                <!-- Mobile App -->
                <div>
                    <h3 class="text-xl font-semibold mb-4">Empower Parents with a Smart App</h3>
                    <img src="{!! asset('assets/web/images/mobile.png') !!}" alt="Parent App" class="mx-auto">
                    <div class="grid grid-cols-1 md:grid-cols-2 px-6 gap-1 mt-4">
                        <div class="flex items-center gap-2"><span class="text-yellow-500 text-xl"><img src="https://9to9school.com/assets/images/icon1.png" alt=""></span> Real-time progress tracking</div>
                        <div class="flex items-center gap-2"><span class="text-yellow-500 text-xl"><img src="https://9to9school.com/assets/images/icon1.png" alt=""></span> Direct messaging with Admin</div>
                        <div class="flex items-center gap-2"><span class="text-orange-500 text-xl"><img src="https://9to9school.com/assets/images/icon2.png" alt=""></span> Attendance notifications</div>
                        <div class="flex items-center gap-2"><span class="text-orange-500 text-xl"><img src="https://9to9school.com/assets/images/icon2.png" alt=""></span> Event calendar & updates</div>
                        <div class="flex items-center gap-2"><span class="text-purple-500 text-xl"><img src="https://9to9school.com/assets/images/icon3.png" alt=""></span> Fee payment & history</div>
                    </div>
                </div>
            </div>

            <!-- Feature Highlights -->

        </section>

    <!-- Investment vs Return Section -->
    <section>
        <div class="container">
            <div class="text-center mb-12">
                <h2 class="text-3xl sm:text-4xl font-bold text-black">{{$franchise->investment_heading}}</h2>
                <p class="text-gray-500 mt-3 text-base sm:text-lg">{{$franchise->investment_para}}</p>
            </div>


            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <div class="roi-calculator">
                        <div class="form-group">
                            <label class="form-label">Initial Investment (₹)</label>
                            <input type="number" class="form-control" id="investment" value="300000" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Monthly Fee per Student (₹)</label>
                            <input type="number" class="form-control" id="monthlyFee" value="3000" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">No. of Batches</label>
                            <input type="number" class="form-control" id="batches" value="4" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Students per Batch</label>
                            <input type="number" class="form-control" id="studentsPerBatch" value="30" />
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xs-12 col-sm-12 order-first order-md-0">
                    <canvas id="roiChart"></canvas>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx = document.getElementById("roiChart").getContext("2d");
                        let chart;

                        function calculateROI() {
                            const investment = parseInt(document.getElementById("investment").value);
                            const monthlyFee = parseInt(document.getElementById("monthlyFee").value);
                            const batches = parseInt(document.getElementById("batches").value);
                            const studentsPerBatch = parseInt(document.getElementById("studentsPerBatch").value);

                            const totalStudents = batches * studentsPerBatch;
                            const year1 = monthlyFee * totalStudents * 12;
                            const year2 = year1 * 2;
                            const year3 = year1 * 3;

                            const data = [year1, year2, year3];
                            const colors = ['#0d6efd', '#ffde06', '#07ff7d']; // Multicolor

                            if (chart) {
                                chart.data.datasets[0].data = data;
                                chart.data.datasets[0].backgroundColor = colors;
                                chart.update();
                            } else {
                                chart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: ["Year 1", "Year 2", "Year 3"],
                                        datasets: [{
                                            label: "Expected Return (₹)",
                                            backgroundColor: colors,
                                            data: data
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                ticks: {
                                                    callback: value => '₹' + value.toLocaleString()
                                                }
                                            }
                                        },
                                        plugins: {
                                            tooltip: {
                                                callbacks: {
                                                    label: function(context) {
                                                        return "₹" + context.parsed.y.toLocaleString();
                                                    }
                                                }
                                            }
                                        }
                                    }
                                });
                            }
                        }


                        // Initial draw and bind to input changes
                        calculateROI();
                        document.querySelectorAll("#investment, #monthlyFee, #batches, #studentsPerBatch").forEach(input => {
                            input.addEventListener("input", calculateROI);
                        });
                    </script>
                </div>
            </div>

        </div>
    </section>

    <section>
        <div class="py-10 bg-white text-center">
            <h2 class="text-3xl font-bold text-gray-900">How It Works – Step-by-Step</h2>
            <p class="mt-2 text-gray-400">Your journey to franchise ownership is simple and supported at every stage</p>

            <div class="mt-10 flex justify-center gap-12 flex-wrap">

                <!-- Step 1 -->
                <div class="flex flex-col items-center">
                    <div class="bg-cyan-400 rounded-full p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-6 8h2a2 2 0 002-2V4a2 2 0 00-2-2h-2a2 2 0 00-2 2v16z" />
                        </svg>
                    </div>
                    <div class="mt-3 bg-cyan-400 text-white py-1 px-3 rounded font-medium">Step 1</div>
                    <div class="font-semibold text-black mt-1">{{$franchise->step1}}</div>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center">
                    <div class="bg-cyan-400 rounded-full p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 12l-9-5 9-5 9 5-9 5zm0 0v9" />
                        </svg>
                    </div>
                    <div class="mt-3 bg-cyan-400 text-white   font-medium py-1  px-3 rounded ">Step 2</div>
                    <div class="font-semibold text-black mt-1">{{$franchise->step2}}</div>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center">
                    <div class="bg-cyan-400 rounded-full p-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0v7" />
                        </svg>
                    </div>
                    <div class="mt-3 bg-cyan-400 text-white py-1  px-3 rounded font-medium">Step 3</div>
                    <div class="font-semibold text-black mt-1">{{$franchise->step3}}</div>
                </div>

                <!-- Step 4 -->
                <div class="flex flex-col items-center">
                    <div class="bg-cyan-400 rounded-full p-6">
                        <span class="text-white text-5xl font-bold">₹</span>
                    </div>
                    <div class="mt-3 bg-cyan-400 text-white py-1  px-3 rounded font-medium">Step 4</div>
                    <div class="font-semibold text-black mt-1">{{$franchise->step4}}</div>
                </div>

            </div>
        </div>

    </section>

    <section>
        <div class="py-12 px-4 bg-white max-w-7xl mx-auto">
            <h2 class="text-3xl font-bold text-center text-black mb-12">
                Franchise Benefits & Support
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 text-left">

                <!-- Item 1 -->
                <div class="flex items-start gap-4">
                    <div class="text-orange-500 text-3xl">
                        ⭐
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-black">Marketing Support</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Complete digital marketing strategy, social media templates, and local promotion assistance.
                        </p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="flex items-start gap-4">
                    <div class="text-orange-500 text-3xl">
                        🗂️
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-black">Teacher Training</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Comprehensive teacher training program to maintain quality educational standards.
                        </p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="flex items-start gap-4">
                    <div class="text-orange-500 text-3xl">
                        📄
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-black">Branding Materials</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Professional branding kit including signage, stationery, and digital assets.
                        </p>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="flex items-start gap-4">
                    <div class="text-orange-500 text-3xl">
                        👤
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-black">Tech & App Setup</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Complete setup of your admin dashboard and custom-branded parent mobile app.
                        </p>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="flex items-start gap-4">
                    <div class="text-orange-500 text-3xl">
                        🎧
                    </div>
                    <div>
                        <h3 class="font-bold text-lg text-black">Dedicated Franchise Manager</h3>
                        <p class="text-gray-600 text-sm mt-1">
                            Personal support manager to guide you through setup and ongoing operations.
                        </p>
                    </div>
                </div>

            </div>
        </div>

    </section>



{{--

    <!-- Why Choose Section -->
    <section>
        <div class="container">
            <h2 class="section-title">{{$franchise->why_choose_heading}}</h2>
            <div class="row">
                @foreach($data as $row)
                <div class="col col-12 col-md-4 col-sm-12">
                    <div class="card">
                        <img src="{{asset($row->image)}}"  class="card-img-top"
                                alt="Extended School Hours"
                        />
                        <div class="card-body">
                            <h5 class="card-title">{{$row->title}}</h5>
                            <p class="card-text">
                               {{$row->description}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
--}}
{{--                <div class="col col-12 col-md-4 col-sm-12">--}}{{--

--}}
{{--                    <div class="card">--}}{{--

--}}
{{--                        <img--}}{{--

--}}
{{--                                src="https://s3-alpha-sig.figma.com/img/1e1b/9280/21fc1ae04282de69d4a5c99f232187e7?Expires=1745798400&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=WZoK1QdSopfIO7W3yhfTbDuobR4ApKG8JPQaH4YWHkglzU5vCk4RBJKoBW4kLvVhSN2XiM5z~InMAtPeV2YAsq847monZOKIidx6OZLgWk-w0B8yceLEkrsIAGGZukLtzMybs6QY7gn5C6G1u~R9Xvp~xzme67pMQj2N344~IF60Gk15Fka2~FiLp9ydgBQtEJdGCsomK6QXaITyD~Ak3yVEsSV1uqw4c~sabBUOKEyZarcQigIeylXjJ3gI10fdPoFyjY5w5TWbswNHH8bj4WVg4cv1nslbiWw1ksTKXH5REI1CtjNri6il9xTu~ZuLINjcD73s12DpnvzmDgp5qA__"--}}{{--

--}}
{{--                                class="card-img-top"--}}{{--

--}}
{{--                                alt="Pay-per-attendance Model"--}}{{--

--}}
{{--                        />--}}{{--

--}}
{{--                        <div class="card-body">--}}{{--

--}}
{{--                            <h5 class="card-title">Pay-per-attendance Model</h5>--}}{{--

--}}
{{--                            <p class="card-text">--}}{{--

--}}
{{--                                Only pay when your child attends.--}}{{--

--}}
{{--                                Flexible, fair, and budget-friendly option.--}}{{--

--}}
{{--                            </p>--}}{{--

--}}
{{--                        </div>--}}{{--

--}}
{{--                    </div>--}}{{--

--}}
{{--                </div>--}}{{--

--}}
{{--                <div class="col col-12 col-md-4 col-sm-12">--}}{{--

--}}
{{--                    <div class="card">--}}{{--

--}}
{{--                        <img--}}{{--

--}}
{{--                                src="https://s3-alpha-sig.figma.com/img/edd5/3f36/803c4371bd7168130b7c3b525358b79c?Expires=1745798400&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=V2GzzX3BjiEwoOTlPZsyfb5YqUhrFL1msihUzuSxP7ZlwVoPoKw-7WUGuOzOVXisatHGWXT~baJwO8loKQbtiBJ6kQz1ZW-e6vJVazXlLnw-FQetJ3xkxjD3j7GZWdfdIyuOJHUJv3Thb3h0ou0TFQRtK-14IJnaf5ApUwwKsOUK3l7KT2dnWdBSjxFeNzNaO5JF~CSAZWYL3SFZ7BUDm-U-wpkyDPYY7hH0X-5aKIbWruGv3v0zkkUky-M--vapgOzhuXyB1JSObM6V28pnVN3yNVuZh-gZLS1kiTLhPUNA0-WUkuK5CwJP2vhgQRUuIDAduTuvTys5VAj~avh5Yw__"--}}{{--

--}}
{{--                                class="card-img-top"--}}{{--

--}}
{{--                                alt="Flexible Learning Modules"--}}{{--

--}}
{{--                        />--}}{{--

--}}
{{--                        <div class="card-body">--}}{{--

--}}
{{--                            <h5 class="card-title">Flexible Learning Modules</h5>--}}{{--

--}}
{{--                            <p class="card-text">--}}{{--

--}}
{{--                                Lessons adapt to each child's pace.--}}{{--

--}}
{{--                                Engaging content keeps learning exciting daily.--}}{{--

--}}
{{--                            </p>--}}{{--

--}}
{{--                        </div>--}}{{--

--}}
{{--                    </div>--}}{{--

--}}
{{--                </div>--}}{{--

            </div>
        </div>
    </section>

    <!-- Requirements Section -->
    <section>
        <div class="container">
            <h2 class="section-title">{{$franchise->requirement_heading}}</h2>
            <p class="section-subtitle">
                {{$franchise->requirement_para}}
            </p>
            <div class="row">
                <div class="col col-12 col-md-6 col-sm-12 requirement-box">
                    <div class="requirement-item">
                        <img src="{{asset($franchise->requirement_image1)}}"     class="requirement-icon"
                                alt="Land Requirement"
                        />
                        <h5>{{$franchise->requirement_title1}}</h5>
                    </div>
                </div>
                <div class="col col-12 col-md-6 col-sm-12 requirement-box">
                    <div class="requirement-item">
                        <img  src="{{asset($franchise->requirement_image2)}}"  class="requirement-icon"
                                alt="Investment Requirement"
                        />
                        <h5>
                            {{$franchise->requirement_title2}}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
--}}



{{--    <!-- Steps to Get a Franchise -->--}}
{{--    <div class="steps-container">--}}
{{--        <header class="steps-header">--}}
{{--            <h2 class="section-title">{{$franchise->steps_heading}}</h2>--}}
{{--            <p class="section-subtitle">--}}
{{--                {{$franchise->steps_para}}--}}
{{--            </p>--}}
{{--        </header>--}}

{{--        <div class="timeline">--}}
{{--            <div class="timeline-line"></div>--}}

{{--            <!-- Step 1 -->--}}
{{--            <div class="timeline-item left">--}}
{{--                <div class="timeline-content">--}}
{{--                    <h2>{{$franchise->step1}}</h2>--}}
{{--                    <div class="arrow right">→</div>--}}
{{--                </div>--}}
{{--                <div class="timeline-marker">--}}
{{--                    <span>1</span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Step 2 -->--}}
{{--            <div class="timeline-item right">--}}
{{--                <div class="timeline-marker">--}}
{{--                    <span>2</span>--}}
{{--                </div>--}}
{{--                <div class="timeline-content">--}}
{{--                    <h2>{{$franchise->step2}}</h2>--}}
{{--                    <div class="arrow left">←</div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Step 3 -->--}}
{{--            <div class="timeline-item left">--}}
{{--                <div class="timeline-content">--}}
{{--                    <h2>{{$franchise->step3}}</h2>--}}
{{--                    <div class="arrow right">→</div>--}}
{{--                </div>--}}
{{--                <div class="timeline-marker">--}}
{{--                    <span>3</span>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Step 4 -->--}}
{{--            <div class="timeline-item right">--}}
{{--                <div--}}
{{--                        class="timeline-marker"--}}
{{--                        style="margin-bottom: 0; padding-bottom: 0"--}}
{{--                >--}}
{{--                    <span>4</span>--}}
{{--                </div>--}}
{{--                <div class="timeline-content">--}}
{{--                    <h2>{{$franchise->step4}}</h2>--}}
{{--                    <div class="arrow left">←</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <!-- Available Locations -->
{{--    <section>--}}
{{--        <div class="container">--}}
{{--            <h2 class="section-title">{{$franchise->location_heading}}</h2>--}}
{{--            <p class="section-subtitle">--}}
{{--                {{$franchise->location_para}}--}}
{{--            </p>--}}

{{--            <div--}}
{{--                    class="row"--}}
{{--                    style="--}}
{{--            display: flex;--}}
{{--            align-items: center;--}}
{{--            justify-content: space-evenly;--}}
{{--          "--}}
{{--            >--}}
{{--                <div class="grid">--}}
{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Chennai</div>--}}
{{--                            <span class="location-badge">5 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Chennai</button>--}}
{{--                    </div>--}}

{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Pune</div>--}}
{{--                            <span class="location-badge">3 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Pune</button>--}}
{{--                    </div>--}}

{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Delhi</div>--}}
{{--                            <span class="location-badge">7 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Delhi</button>--}}
{{--                    </div>--}}

{{--                    <!-- Add more cards as needed -->--}}
{{--                </div>--}}
{{--                <div class="grid">--}}
{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Chennai</div>--}}
{{--                            <span class="location-badge">5 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Bangalore</button>--}}
{{--                    </div>--}}

{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Pune</div>--}}
{{--                            <span class="location-badge">3 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Mumbai</button>--}}
{{--                    </div>--}}

{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Delhi</div>--}}
{{--                            <span class="location-badge">7 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Hyderabad</button>--}}
{{--                    </div>--}}

{{--                    <!-- Add more cards as needed -->--}}
{{--                </div>--}}
{{--                <div class="grid">--}}
{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Chennai</div>--}}
{{--                            <span class="location-badge">5 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Kolkata</button>--}}
{{--                    </div>--}}

{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Pune</div>--}}
{{--                            <span class="location-badge">3 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Ahmedabad</button>--}}
{{--                    </div>--}}

{{--                    <div class="location-card">--}}
{{--                        <div class="location-header">--}}
{{--                            <div class="location-title">Delhi</div>--}}
{{--                            <span class="location-badge">7 available</span>--}}
{{--                        </div>--}}
{{--                        <button class="apply-btn">Apply for Ayodhya</button>--}}
{{--                    </div>--}}

{{--                    <!-- Add more cards as needed -->--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

    <!-- Recent Blog Section -->
{{--    <section>--}}
{{--        <div class="container">--}}
{{--            <h2 class="section-title">{{ $franchise->blog_heading }}</h2>--}}
{{--            <div class="row">--}}
{{--                <!-- Blog Card 1 -->--}}
{{--                @foreach($blogs as $blog)--}}
{{--                <div class="col-12 col-md-4">--}}
{{--                    <div class="blog-card">--}}
{{--                        <div class="blog-image-container position-relative">--}}
{{--                            <img src="{{asset($blog->image)}}" class="blog-image img-fluid w-100"--}}
{{--                                    alt="School supplies"--}}
{{--                            />--}}
{{--                            <span class="blog-tag position-absolute top-0 start-0 m-2 px-2 py-1 bg-primary text-white rounded">Blog</span>--}}
{{--                            <span class="blog-bookmark position-absolute top-0 end-0 m-2">--}}
{{--                            <i class="bi bi-bookmark"></i>--}}
{{--                        </span>--}}
{{--                        </div>--}}
{{--                        <div class="blog-content p-3">--}}
{{--                            <h3 class="blog-title fs-5 fw-bold">--}}
{{--                                {{$blog->heading}}--}}
{{--                            </h3>--}}
{{--                            <div class="blog-footer d-flex justify-content-between align-items-center mt-3">--}}
{{--                                <div class="blog-author d-flex align-items-center">--}}
{{--                                    <img--}}
{{--                                            src="https://s3-alpha-sig.figma.com/img/8362/89d6/df84eab2ac2d1f2d0f1dcd527f30304d?Expires=1745193600&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=K2Tta0yx3JVx3g83qQj5QG3mvQSJdGkdYMAFJWPJDh6DhD58GUlOgmnACM5FG9lSQH3QNWVzkCy-feFg4ymoQDx2--rX4r5UwgdNMgBfuQsWsjjQBstUme6Dm1kUsqt19XKHZe2mCs0VsfGpOjZzG8hjv5ZH-EeQVE2bnjGbS-ty2QYBbBfv200b~lAlEH8v0tTRHeoKEWAkhA4b-IEkHwmwLg7Iq-9PMIZHrjhejJyPSVhKQUKcFCk6GfmDXvS9QWM3c8MItoiWpNcek6llGtiIKSb5ztHafpmQozn7yBPYEnBdrqaPE0zVaUeXcrU0yEJP7sEppXOGRViDABcGxQ__"--}}
{{--                                            class="author-image rounded-circle me-2"--}}
{{--                                            alt="Author"--}}
{{--                                            width="32"--}}
{{--                                            height="32"--}}
{{--                                    />--}}
{{--                                    <span class="author-name">Education Expert</span>--}}
{{--                                </div>--}}
{{--                                <a href="#" class="read-more text-decoration-none">Read More</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


    <!-- CTA Section -->
    {{--<div class="cta-section">
        <h3 class="cta-title">{{$franchise->get_start_heading}}</h3>
        <p class="cta-text">
            {{$franchise->get_start_para}}
        </p>
        <button class="cta-button">
            {{$franchise->get_start_btn_name}}
            <i class="bi bi-arrow-right"></i>
        </button>
    </div>--}}

    <section class="bg-gray-50 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-4xl bg-gradient-to-r from-purple-500 via-purple-600 to-pink-500 rounded-2xl text-center py-10 px-4 md:px-8">
        <h2 class="text-2xl md:text-3xl font-bold text-white mb-4">{{$franchise->get_start_heading}}</h2>
        <p class="text-white mb-8 text-base md:text-lg">
            {{$franchise->get_start_para}}
        </p>
        <a target="_blank" href="https://wa.me/919990318880?text=Hi%20I%20am%20interested%20in%20your%20school%20franchise" class="inline-block bg-white text-purple-600 font-semibold px-6 py-3 rounded-full hover:bg-purple-100 transition-colors">
            {{$franchise->get_start_btn_name}} <i class="bi bi-arrow-right"></i>
        </a>
    </div>
    </section>

    <!-- Contact Form Section -->

<section class="min-h-screen bg-[#fdf9dc] flex items-center justify-center px-4 py-12">
  <div class="container mx-auto flex flex-col md:flex-row items-center justify-center gap-10 max-w-7xl">

    <!-- Left Content (60%) -->
    <div class="md:w-3/5 w-full space-y-6">
      <img class="w-full" src="https://i.pinimg.com/originals/68/6a/f2/686af2b16e1b988ff212e8016eeff8b9.gif" alt="Animated Illustration">
    </div>

    <!-- Right Form (40%) -->
    <div class="md:w-2/5 w-full bg-white rounded-3xl shadow-xl p-8 space-y-6 text-[#333]">
      <!-- Attractive Heading -->
      <div class="text-center">
        <h2 class="text-3xl font-extrabold text-indigo-900">Start Your Journey with 9to9Schools</h2>
        <p class="text-sm text-gray-500 mt-1">Fill in the details below to enquire about our franchise opportunity</p>
      </div>

        <form class="space-y-5" method="POST" action="{{ route('enquiry.submit') }}">
            <input type="hidden" name="page" value="franchise">
            @csrf
            <!-- Full Name -->
            <div>
                <input type="text" name="name" value="{{ old('name') }}"
                       required minlength="3" maxlength="30"
                       placeholder="Full Name"
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

            <!-- Select State & City -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <input type="text" name="state" value="{{ old('state') }}"
                           placeholder="State"
                           onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                           class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                        {{ $errors->has('state') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
                    @error('state')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <input type="text" name="city" value="{{ old('city') }}"
                           placeholder="City"
                           onkeypress="return /^[a-zA-Z ]+$/i.test(event.key)"
                           class="w-full border-b border-gray-300 focus:border-indigo-400 outline-none py-2
                                        {{ $errors->has('city') ? 'border-red-500 ring-red-300' : 'border-black/10' }}">
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
</section>

    <!-- !-- Modal --> 
    <div class="modal fade" id="franchiseModal" tabindex="-1" aria-labelledby="franchiseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="franchiseModalLabel">Franchisee Application Form</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="post" action="{{route('apply.fren')}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="fullName" class="form-label">Full Name *</label>
                            <input type="text" class="form-control" id="fullName" required name="fullName">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" required  name="email">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" id="phone" required name="phone">
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label">City & State *</label>
                            <input type="text" class="form-control" id="location" required name="location">
                        </div>
                        <div class="col-12">
                            <label for="preferredLocation" class="form-label">Preferred Franchise Location *</label>
                            <input type="text" class="form-control" id="preferredLocation" required name="preferredLocation">
                        </div>
                        <div class="col-12">
                            <label for="investment" class="form-label">Investment Capacity (in INR) *</label>
                            <input type="number" class="form-control" id="investment" required name="investment">
                        </div>
                        <div class="col-12">
                            <label for="background" class="form-label">Business Background / Experience *</label>
                            <textarea class="form-control" id="background" rows="3" required name="bus_background"></textarea>
                        </div>
                        <div class="col-12">
                            <label for="comments" class="form-label">Additional Comments</label>
                            <textarea class="form-control" id="comments" rows="3"  name="comments"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-success">Submit Application</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@stop

@section('js')
    <!-- Bootstrap Bundle JS (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stop
