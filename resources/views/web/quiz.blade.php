@extends('layouts.web')
@section('css')
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <style>
        #page-header {
            transition: transform 0.4s ease, opacity 0.4s ease;
            transform: translateY(0);
            opacity: 1;
        }

        /* hero section */
        .hero-image {
            background-image: url("https://s3-alpha-sig.figma.com/img/7ff4/cd9c/47dd5f9ae58f64e48f554e7ad68ccd90?Expires=1744588800&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=HNQgV6Gc741MBeOm8dUolbgysHQyvKe7Q40H6PEDR8tglIpGrP9pHlT10ILHVX5Ex56RPr5R-VvsebXVK8evMy7yum8mTLy3j8UH20Z3yJdoADTmWmLYArwq7e6qpd5OH5L5jHhJsTRkh5jmM~MIBpLIkZt2iY4M2DCJfdmVMZOpwsd94Mcb18WOd~O46~PbgL8qRpvt6LGTKBvJCwhrDbdwXF4xh4huL5ox8kDQLFN1NC-GbbAF8QozzqykuEPGRNBzPi-BwtysvzClQq0SR3Gxsr7qjd4wT-Ud8iGLbCIoz1Y4HQr64SPi1g~Omtgye6kAfV~sTm9oUjxAGDVQxg__");
            background-size: cover;
            background-position: center;
            padding: 150px 20px;
            text-align: center;
            position: relative;
        }
        .hero-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 0;
        }
        .hero-content {
            max-width: 900px;
            margin: 0 auto;
            padding: 40px 30px;
            border-radius: 12px;
            position: relative;
            z-index: 1;
        }
        .hero-content h1 {
            color: #ffffff;
            font-size: 3em;
            margin-bottom: 10px;
            font-weight: 600;
        }
        .hero-content h2 {
            color: #07c0de;
            font-size: 4em;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .hero-content p {
            color: #ffffff;
            font-size: 1.3em;
            line-height: 1.6;
            margin-bottom: 35px;
        }
        .more-about-us-btn {
            background-color: #07c0de;
            color: #fff;
            border: none;
            padding: 15px 30px;
            font-size: 1em;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Newes letter css */
        .newsletter-section {
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            box-sizing: border-box;
            padding: 0 20px;
        }

        .newsletter-content {
            flex: 1 1 400px;
            background-color: #0144ca;
            padding: 40px;
            border-radius: 10px;
            color: white;
            z-index: 1;
            box-sizing: border-box;
            margin-right: -100px;
        }

        .newsletter-heading {
            margin: 0 0 10px;
            font-size: 24px;
            color: #ffffff;
        }

        .newsletter-text {
            margin: 0 0 20px;
            font-size: 14px;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .newsletter-input {
            flex: 1 1 250px;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            min-width: 200px;
        }

        .newsletter-button {
            padding: 12px 20px;
            background-color: #000000;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .newsletter-image-container {
            flex: 1 1 400px;
            text-align: center;
        }

        .newsletter-image {
            width: 100%;
            max-width: 500px;
            height: auto;
            border-radius: 10px;
        }
        /* Why Choose */
        .why-choose {
            padding: 60px 0;
        }
        .why-choose .know-about-btn {
            color: #fb6b47;
            background-color: #fed6d6;
            border-radius: 20px;
            padding: 6px 15px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
            border: none;
        }
        .why-choose h2{

            font-size: 32px;
            font-weight: 700;
            color:#18191f;
            margin-bottom: 20px;
        }
        .why-choose p{

            font-size:18px;
            line-height: 28px;
            font-weight: 400;
        }

        /* We Work */
        .we-work .how-we-work-btn {
            color: #fb6b47;
            background-color: #fed6d6;
            border-radius: 20px;
            padding: 6px 15px;
            font-size: 14px;
            font-weight: 500;
            display: inline-block;
            margin-bottom: 15px;
            border: none;
        }
        .we-work h2{

            font-size: 32px;
            font-weight: 700;
            color:#18191f;
            margin-bottom: 20px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            /* display: flex;
            align-items: center;
            justify-content: center; */
            margin-right: 15px;
        }

        .feature-icon i {
            color: #000000;
            font-size: 16px;
            background: #ffc0cb54;
            padding: 9px;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            text-align: center;
        }
        .feature-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }

        .feature-content h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .feature-content p {
            color: #666;
            margin-bottom: 0;
        }

        .image-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            height: 100%;
        }

        .image-grid img {
            width: 80%;
            height: 80%;
            object-fit: cover;
            border-radius: 10px;
        }

        .image-grid .img-1 {
            grid-row: 1 / 2;
            margin-top: 50px;
        }

        .image-grid .img-2 {
            grid-column: 2;
            grid-row: 1;
        }

        .image-grid .img-3 {
            grid-column: 2;
            grid-row: 2;
            margin-left: -80px;
            margin-top: -60px;
        }

        .video-container {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
        }

        .video-container img {
            width: 100%;
            height: auto;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background-color: #ff0000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .play-button i {
            color: white;
            font-size: 24px;
        }

        /* Testimonials */

        .testimonial-section {
            text-align: center;
            padding: 60px 0;
        }
        .testimonial-section .section-header {
            margin-bottom: 22px;
        }
        .testimonial-section h2 {

            font-weight:700 ;
            font-size: 32px;
            margin-bottom: 10px;
        }

        .testimonial-section .section-description {

            font-size:18px;
            line-height: 18px;
            color: #666;
            margin-bottom: 40px;
        }

        .testimonial-card {
            background-color: #f5f5f5;
            border-radius: 6px;
            padding: 43px 20px;
            /*box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);*/
        }
        .testimonial-card .testimonial-author {
            display: flex;
            align-items: center;
            gap: 23px;
            margin-bottom: 31px;
        }
        .testimonial-card .testimonial-author .author-image {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            object-fit: cover;
        }
        .testimonial-card .testimonial-author .author-name {
            font-family: "Poppins", Helvetica;
            font-weight: 700;
            font-size: 24px;
            color: #262626;
        }
        .testimonial-card .testimonial-content .author-description {
            font-family: "Poppins", Helvetica;
            font-weight: 500;
            font-size: 16px;
            color: #737373;
        }
        .testimonial-card .testimonial-content .testimonial-text {
            font-family: "Poppins", Helvetica;
            font-weight: 400;
            font-size: 18px;
            line-height: 1.65;
            color: #000000;
        }

        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 15px;
        }

        .testimonial-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .testimonial-author h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #262626;
        }

        .testimonial-author p {
            color: #737373;
            margin-bottom: 0;
            font-size: 14px;
        }

        .testimonial-content p {
            color: #000000;
            line-height: 1.6;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
            background-color: #d9d9d9;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 1;
        }

        .carousel-control-prev {
            left: -20px;
        }

        .carousel-control-next {
            right: -20px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            width: 20px;
            height: 20px;
            background-color: #333;
            -webkit-mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
            mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z'/%3e%3c/svg%3e");
        }

        .carousel-control-next-icon {
            -webkit-mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            mask-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .image-grid {
                margin-bottom: 30px;
            }

            .video-container {
                margin-top: 30px;
            }
        }

        @media (max-width: 767px) {

            .carousel-control-prev {left: -10px;}
            .newsletter-content {margin-right: 0;}
            .carousel-control-next {right: -10px;}
            .testimonial-card {margin: 0 5px;}
            .sub_titless {
                letter-spacing: 0px;
                padding-right: 20px !important;
            }
            .hero-image {
                padding: 20px 20px;
            }
            .p-sm{
                padding: 20px !important;
            }
            .hero-content h1{
                fonts-size:32px;
            }
            .hero-content p {
                font-size: 16px;
            }
        }
    </style>

@stop

@section('body')
    <!-- Why Choose Us Section -->
   <style>
        body {
            background: #FFF8F0;
        }
        .quiz-step.active.row h4 {
            font-size: 32px;
        }
        .form-check {
            font-size: 20px;
            margin: 20px 0;
        }
        .quiz-section {
            background: #FFFBF5;
            border-radius: 15px;
            padding: 30px;
        }
        .quiz-section h2 {
            font-size: 36px;
        }

        .quiz-step {
            display: none;
        }

        .quiz-step.active {
            display: block;
        }

        .btn-custom {
            background-color: #FF9A8B;
            color: white;
        }

        .btn-custom:hover {
            background-color: #FF7A6B;
            color: white;
        }

        .question-img {
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
    <section class="py-5">
        <div class="container quiz-section">

            <h2 class="text-center fw-bold mb-4" style="color:#FF6B6B">What Kind of Preschool Parent Are You?</h2>

            <form id="quizForm">
<form id="quizForm">

@foreach($quizQuestions as $index => $question)
    <div class="quiz-step row {{ $index == 0 ? 'active' : '' }}" data-step="{{ $index + 1 }}">
        <div class="col-md-8">
            <h4>{{ $index + 1 }}. {{ $question->question }}</h4>
            @if($question->option1)
                <div class="form-check">
                    <input type="radio" name="q{{ $index + 1 }}" value="1" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option1 }}</label>
                </div>
            @endif
            @if($question->option2)
                <div class="form-check">
                    <input type="radio" name="q{{ $index + 1 }}" value="2" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option2 }}</label>
                </div>
            @endif
            @if($question->option3)
                <div class="form-check">
                    <input type="radio" name="q{{ $index + 1 }}" value="3" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option3 }}</label>
                </div>
            @endif
            @if($question->option4)
                <div class="form-check">
                    <input type="radio" name="q{{ $index + 1 }}" value="4" class="form-check-input" required>
                    <label class="form-check-label">{{ $question->option4 }}</label>
                </div>
            @endif

           

            @if($index < count($quizQuestions) - 1)
                <button type="button" class="btn btn-custom mt-3 next-step">Next</button>
            @else
                <button type="button" class="btn btn-custom mt-3 next-step">Finish</button>
            @endif
        </div>
        <div class="col-md-4">
            @if($question->image)
                <img src="{{ asset('uploads/quiz/' . $question->image) }}" class="img-fluid question-img" alt="Quiz Image">
            @endif
        </div>
    </div>
@endforeach

        <!-- Final Result -->
        <div class="quiz-step text-center" data-step="result">
            <h3 class="fw-bold mb-3" style="color:#FF6B6B">Your Parenting Style is:</h3>
            <h2 id="resultTitle"></h2>
            <p id="resultDescription"></p>
            <a href="#" class="btn btn-success mt-3">Join the 9to9 Community</a>
        </div>
    </form>
        </div>
    </section>

@stop


@section('js')
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        const nextButtons = document.querySelectorAll('.next-step');

        nextButtons.forEach(button => {
            button.addEventListener('click', () => {

                const currentStepElement = document.querySelector(`[data-step="${currentStep}"]`);
                currentStepElement.classList.remove('active');

                currentStep++;

                if (currentStep <= totalSteps) {
                    const nextStepElement = document.querySelector(`[data-step="${currentStep}"]`);
                    nextStepElement.classList.add('active');
                } else {
                    calculateResult();
                    document.querySelector(`[data-step="result"]`).classList.add('active');
                }
            });
        });

        function calculateResult() {
            const answers = { planner: 0, playful: 0, gowithflow: 0, curious: 0 };

            document.querySelectorAll('input[type=radio]:checked').forEach(input => {
                answers[input.value]++;
            });

            const resultType = Object.keys(answers).reduce((a, b) => answers[a] > answers[b] ? a : b);

            document.getElementById('resultTitle').innerText = formatTitle(resultType);

            const descriptions = {
                planner: "You love a good schedule! Try adding flexibility for creativity.",
                playful: "You’re your kid’s best playmate! Balance fun with habits.",
                gowithflow: "You’re chill & adaptable! Add small routines for security.",
                curious: "You learn with your child! Encourage more discovery time."
            };

            document.getElementById('resultDescription').innerText = descriptions[resultType];
        }

        function formatTitle(type) {
            const titles = {
                planner: "The Planner Parent",
                playful: "The Playful Partner",
                gowithflow: "The Go-With-The-Flow Parent",
                curious: "The Curious Co-Explorer"
            };
            return titles[type] || "Parent Type";
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.testimonialSwiper', {
                slidesPerView: 1,
                spaceBetween: 30,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    768: {
                        slidesPerView: 2,
                    },
                    992: {
                        slidesPerView: 3,
                    },
                },
            });
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

@stop
