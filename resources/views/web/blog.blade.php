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
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            overflow-x: hidden;
            width: 100%;
            margin: 0;
            padding: 0;
            color: #333;
            line-height: 1.6;
        }

        img {
            max-width: 100%;
            height: auto;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        ul {
            list-style: none;
        }

        button {
            cursor: pointer;
        }

        /* Layout Utilities */
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -15px;
            margin-top: 10px;
        }

        .col {
            padding: 15px;
            flex: 1;
        }

        /* Responsive Columns */
        .col-1 {
            width: 8.33%;
        }
        .col-2 {
            width: 16.66%;
        }
        .col-3 {
            width: 25%;
        }
        .col-4 {
            width: 33.33%;
        }
        .col-5 {
            width: 41.66%;
        }
        .col-6 {
            width: 50%;
        }
        .col-7 {
            width: 58.33%;
        }
        .col-8 {
            width: 66.66%;
        }
        .col-9 {
            width: 75%;
        }
        .col-10 {
            width: 83.33%;
        }
        .col-11 {
            width: 91.66%;
        }
        .col-12 {
            width: 100%;
        }

        /* Header Styles */
        .header {
            background-color: #edf4ff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
            width: 100%;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .logo img {
            height: 60px;
            object-fit: contain;
            border-radius: 10px;
            margin-left: 20px;
        }

        .nav {
            display: flex;
            gap: 15px;
            align-items: center;
            margin-right: 20px;
        }

        .nav button {
            background-color: #ffffff;
            color: #0ac0df;
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 14px;
            transition: background 0.3s;
        }

        .appointment-btn {
            background-color: #07c0de !important;
            color: #ffffff !important;
        }

        /* Hero Section */
        .hero-image {
            background-image: url("https://s3-alpha-sig.figma.com/img/562e/ce26/d4254d1f20b103ef1109a6d41df6df20?Expires=1745193600&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=FdFWd69pkkT6HEXRUlZ4oqSd1XT1E5Raf4SF3RTZpv7qubkXEDuzFujgogzu0fyb7ssJeSANMNy4ZUNMPKpAUfDVki5DK~Dhwub3f9OBvfw2IWM3BVBedmPeen9R21EL-8e6TAzuNKnV7kaToEOrJdqHWrk0EYprvFgKXzwR4P5hKaV1AvqIxCbsNX5XI4tDeuB0hpnLtahfPw~FJLYQKTFoo2qNlDjZ-RylmbD65aelCT5Up7etKp4QVUWDT8U~6UtsEHzjc2v~3MnYyFHmd2vxP7VyUaM7D~yAKBCTsffToJ9wv5qgwpamMqtomxAjnqzW~xAHvA9ejJR6DXsHQA__");
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
            text-align: left;
        }

        .hero-content h1 {
            color: #ffffff;
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .hero-content h2 {
            color: #07c0de;
            font-size: 2em;
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

        .more-about-us-btn:hover {
            background-color: #059bb1;
        }

        /* Section Styles */
        section {
            padding: 60px 0;
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
            font-size: 2em;
        }

        .section-subtitle {
            text-align: center;
            margin-bottom: 3rem;
            color: #666;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Card Styles */
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            height: 100%;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-img-top {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            font-weight: 600;
            margin-bottom: 0.75rem;
            font-size: 1.1em;
        }

        .card-text {
            color: #666;
            font-size: 0.9em;
        }

        /* Requirements Section */

        .section-title {
            text-align: center;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .section-subtitle {
            text-align: center;
            font-size: 16px;
            color: #666;
            margin-bottom: 2rem;
        }

        .requirement-box {
            border: 1px solid #ddd;
            padding-top: 20px;
            padding-bottom: 20px;
            border-radius: 8px;
            margin-right: 30px;
        }

        .requirement-icon {
            width: 80px;
            height: 80px;
            margin-bottom: 1rem;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .requirement-item {
            text-align: center;
            margin-bottom: 2rem;
        }

        .requirement-item h5 {
            font-size: 20px;
            font-weight: 600;
            line-height: 1.4;
        }

        /* ROI Calculator */
        .roi-calculator {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            height: 100%;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.9em;
        }

        /* Steps Section */
        .steps-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .steps-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .steps-header h1 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .steps-header p {
            font-size: 20px;
            color: #757575;
        }

        .timeline {
            position: relative;
            padding: 40px 0;
        }

        .timeline-line {
            position: absolute;
            top: 70px; /* Adjust this to align with Step 1 marker */
            bottom: 180px; /* Adjust this to align with Step 4 marker */
            left: 50%;
            width: 4px;
            background-color: #0ac0df;
            transform: translateX(-50%);
            z-index: 0;
        }

        .timeline-item {
            display: flex;
            align-items: center;
            margin-bottom: 80px;
            position: relative;
        }

        .timeline-marker {
            width: 60px;
            height: 60px;
            background-color: #0ac0df;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 2;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .timeline-marker span {
            color: white;
            font-size: 32px;
            font-weight: 500;
        }

        .timeline-content {
            background-color: white;
            padding: 30px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 30%;
            position: relative;
        }

        .timeline-content h2 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        /* Left side items */
        .timeline-item.left .timeline-content {
            margin-right: auto;
            margin-left: 0;
        }

        /* Right side items */
        .timeline-item.right .timeline-content {
            margin-left: auto;
            margin-right: 0;
        }

        /* Arrows */
        .arrow {
            position: absolute;
            font-size: 24px;
            color: #0ac0df;
        }

        .arrow.right {
            right: 10px;
        }

        .arrow.left {
            left: 10px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .timeline-line {
                left: 15px;
            }

            .timeline-marker {
                left: 0px !important;
                transform: none;
            }

            .timeline-content {
                width: 70%;
                margin-left: 60px !important;
            }

            .timeline-item.left,
            .timeline-item.right {
                flex-direction: row;
            }

            .arrow.right,
            .arrow.left {
                display: none;
            }
        }

        /* Location Cards */

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .location-card {
            background-color: #fff;
            border-radius: 12px;
            border: 1px solid #e6f7ff;
            padding: 1.2rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .location-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.12);
        }

        .location-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .location-title {
            font-size: 1rem;
            font-weight: 600;
            color: #222;
            display: flex;
            align-items: center;
        }

        .location-title::before {
            content: "📍";
            margin-right: 6px;
        }

        .location-badge {
            background-color: #e6f7ff;
            color: #0d6efd;
            font-size: 0.75rem;
            padding: 4px 10px;
            border-radius: 999px;
            font-weight: 500;
        }

        .apply-btn {
            margin-top: auto;
            background-color: transparent;
            border: 1px solid #0d6efd;
            color: #0d6efd;
            padding: 0.6rem;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .apply-btn:hover {
            background-color: #0d6efd;
            color: #fff;
        }

        /* Blog Cards */
        .blog-card {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            height: 100%;
            background: white;
            transition: transform 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-5px);
        }

        .blog-image-container {
            position: relative;
        }

        .blog-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .blog-tag {
            position: absolute;
            top: 10px;
            left: 10px;
            background: white;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .blog-bookmark {
            position: absolute;
            top: 10px;
            right: 10px;
            background: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .blog-content {
            padding: 1.5rem;
        }

        .blog-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 1rem;
            line-height: 1.4;
        }

        .blog-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .blog-author {
            display: flex;
            align-items: center;
        }

        .author-image {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .author-name {
            font-size: 14px;
            font-weight: 500;
        }

        .read-more {
            color: #0d6efd;
            font-size: 14px;
            font-weight: 500;
        }

        /* Testimonials */
        .testimonial-card {
            text-align: center;
            padding: 1.5rem;
            height: 100%;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .testimonial-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            object-fit: cover;
            border: 3px solid #f0f0f0;
        }

        .testimonial-text {
            font-size: 15px;
            line-height: 1.6;
            color: #555;
            margin-bottom: 1.5rem;
        }

        .testimonial-name {
            font-weight: 600;
            color: #e1ab20;
            margin-bottom: 0.2rem;
        }

        .testimonial-position {
            font-size: 14px;
            color: #000000;
        }
        .testimonial-carousel-wrapper {
            position: relative;
            overflow: hidden;
            width: 100%;
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 40px;
        }

        .testimonial-carousel {
            display: flex;
            overflow-x: auto;
            scroll-behavior: smooth;
            gap: 20px;
            padding: 20px 0;
        }

        .testimonial-carousel::-webkit-scrollbar {
            display: none;
        }

        .testimonial-card {
            flex: 0 0 auto;
            width: 300px;
            background-color: #f7f7f7;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .testimonial-image {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }

        .testimonial-name {
            font-size: 1.1rem;
            margin-top: 10px;
            font-weight: bold;
        }

        .testimonial-position {
            font-size: 0.9rem;
            color: #777;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            border: none;
            font-size: 1rem;
            cursor: pointer;
            padding: 0 10px;
            z-index: 10;
            border-radius: 50%;
        }

        .carousel-btn.prev {
            left: 10px;
            color: #1ba884;
        }

        .carousel-btn.next {
            right: 10px;
            color: #1ba884;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(to right, #8a4fff, #ff4f8a);
            border-radius: 15px;
            padding: 3rem 2rem;
            text-align: center;
            color: white;
            margin: 3rem auto;
            max-width: 1200px;
            width: 90%;
        }

        .cta-title {
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.5em;
        }

        .cta-text {
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            background: white;
            color: #8a4fff;
            border: none;
            border-radius: 30px;
            padding: 0.8rem 2rem;
            font-weight: 600;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .cta-button:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
        }

        .cta-button i {
            margin-left: 8px;
        }

        /* Contact Form */
        .contact-section {
            padding: 3rem 0;
        }

        .contact-title {
            text-align: center;
            margin-bottom: 2.5rem;
            font-weight: 700;
        }

        .contact-form {
            background: white;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            max-width: 700px;
            margin: 0 auto;
        }

        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 1.5rem;
        }

        .form-col {
            flex: 1;
        }

        .submit-btn {
            background: #0ac0df;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.8rem 2rem;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background: #1ba884;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Footer */
        footer {
            background-color: #f8f9fa;
            padding: 3rem 5%;
            width: 100%;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-row {
            display: flex;
            flex-wrap: wrap;
            margin: -15px;
        }

        .footer-col {
            padding: 15px;
            flex: 1;
            min-width: 250px;
        }

        .app-section {
            margin-bottom: 2rem;
        }

        .app-logo {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .app-logo img {
            height: 70px;
            margin-right: 10px;
            border-radius: 10px;
        }

        .app-logo h3 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }

        .app-description {
            max-width: 300px;
            font-size: 14px;
            color: #444;
            line-height: 1.5;
            margin-bottom: 15px;
        }

        .download-buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .download-buttons button {
            background: none;
            border: none;
            padding: 0;
        }

        .download-buttons img {
            height: 30px;
        }

        .footer-title {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: 600;
        }

        .footer-links {
            list-style: none;
            padding-left: 0;
            font-size: 16px;
            color: #444;
            line-height: 1.5;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .gallery-images {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .gallery-images img {
            width: calc(33.33% - 8px);
            border-radius: 8px;
            height: 80px;
            object-fit: cover;
        }

        hr {
            margin: 2rem 0;
            opacity: 0.2;
            border: none;
            border-top: 1px solid #ccc;
        }

        .copyright {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .copyright-links {
            display: flex;
            flex-wrap: wrap;
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .copyright-links li {
            padding: 10px;
        }

        .copyright-text {
            padding: 10px;
            color: #444;
            font-size: 16px;
            margin-bottom: 0;
        }

        /* Responsive Styles */
        @media (max-width: 1200px) {
            .hero-content h1 {
                font-size: 2.5em;
            }
            .hero-content h2 {
                font-size: 3.5em;
            }
        }

        @media (max-width: 992px) {
            .col-md-6 {
                width: 50%;
            }
            .col-md-4 {
                width: 33.33%;
            }
            .col-md-3 {
                width: 25%;
            }

            .hero-content h1 {
                font-size: 2em;
            }
            .hero-content h2 {
                font-size: 3em;
            }
            .hero-content p {
                font-size: 1.1em;
            }

            .section-title {
                font-size: 1.8em;
            }
        }

        @media (max-width: 768px) {
            .col-sm-12 {
                width: 100%;
            }
            .col-sm-6 {
                width: 50%;
            }

            .nav {
                gap: 10px;
            }

            .talk-expert-btn,
            .appointment-btn {
                display: none;
            }

            .hero-content h1 {
                font-size: 1.8em;
            }
            .hero-content h2 {
                font-size: 2.5em;
            }
            .hero-content p {
                font-size: 1em;
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .footer-row {
                flex-direction: column;
            }

            .copyright {
                flex-direction: column;
                text-align: center;
            }

            .copyright-links {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .col-xs-12 {
                width: 100%;
            }

            .hero-image {
                padding: 100px 15px;
            }

            .hero-content {
                padding: 20px 15px;
            }

            .hero-content h1 {
                font-size: 1.5em;
            }
            .hero-content h2 {
                font-size: 2em;
            }

            .section-title {
                font-size: 1.5em;
            }

            .card-img-top {
                height: 180px;
            }

            .contact-form {
                padding: 1.5rem;
            }

            .gallery-images img {
                width: calc(50% - 8px);
            }
        }
        /* Mobile Responsive Enhancements */

        /* Base responsive improvements */
        @media (max-width: 767px) {
            /* Improve header for mobile */
            .header {
                padding: 10px;
            }

            .logo img {
                height: 40px;
                margin-left: 0;
            }

            /* Add hamburger menu button */
            .nav {
                margin-right: 0;
            }

            /* Hero section adjustments */
            .hero-content h1 {
                font-size: 1.8rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .hero-content .btn {
                width: 80% !important;
            }

            /* Age filter buttons */
            .age-filter {
                flex-wrap: wrap;
                gap: 0.5rem;
            }

            .age-btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
                flex: 1 0 calc(50% - 0.5rem);
                text-align: center;
            }

            /* Event grid adjustments */
            .event-grid {
                grid-template-columns: 1fr;
            }

            /* Storytelling section */
            .storytelling {
                margin: 0 10px 2rem;
                padding: 2rem 0;
            }

            .story-content {
                flex-direction: column;
                gap: 1.5rem;
            }

            .video-container {
                padding-bottom: 56.25%; /* Maintain 16:9 aspect ratio */
            }

            .story-details h3 {
                font-size: 1.1rem;
            }

            .info-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 0.5rem;
            }

            .info-grid-item button {
                width: 100%;
                padding: 8px;
            }

            /* Registration form */
            .registration {
                padding: 2rem 0.5rem;
            }

            .registration-image {
                width: 100%;
                max-width: 250px;
                height: auto;
            }

            .registration-form {
                padding: 1.5rem;
            }

            .form-group {
                margin-bottom: 1rem;
            }

            .form-group label {
                font-size: 0.9rem;
            }

            .form-group input,
            .form-group textarea {
                padding: 0.6rem;
            }

            /* Footer adjustments */
            .footer {
                padding: 2rem 0 1rem;
            }

            .footer-content {
                gap: 2rem;
            }

            .footer-about {
                max-width: 100%;
            }

            .footer-logo img {
                height: 40px;
            }

            .footer-column h3 {
                margin-bottom: 1rem;
            }

            .gallery-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .gallery-grid img {
                height: 60px;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }

            .footer-legal ul {
                justify-content: center;
                gap: 1rem;
                font-size: 0.8rem;
            }
        }

        /* Extra small devices */
        @media (max-width: 575px) {
            /* Container padding */
            .container {
                padding: 0 10px;
            }

            /* Section titles */
            .section-title {
                font-size: 1.5rem;
            }

            .section-subtitle {
                font-size: 0.9rem;
            }

            /* Hero section */
            .hero {
                padding: 4rem 0;
            }

            /* Event cards */
            .event-card {
                margin-bottom: 1rem;
            }

            .event-content h3 {
                font-size: 1rem;
            }

            .info-item {
                font-size: 0.8rem;
            }

            /* Gallery grid */
            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            /* App buttons */
            .app-buttons {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }

            /* Footer links */
            .footer-links {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        /* Fix for navigation on small screens */
        @media (max-width: 767px) {
            .header-container {
                position: relative;
            }

            /* Add mobile menu button styling */
            .menu-btn {
                display: block;
                background-color: var(--primary-color);
                color: white;
                padding: 8px 12px;
                border-radius: 4px;
            }

            /* Show at least one important button on mobile */
            .appointment-btn {
                display: inline-block !important;
                padding: 6px 10px !important;
                font-size: 0.8rem !important;
            }
        }

        /* Fix for registration section on small screens */
        @media (max-width: 480px) {
            .registration-image {
                max-width: 200px;
                margin: 0 auto 1.5rem;
            }

            .registration-form {
                width: 100%;
                padding: 1rem;
            }

            .btn-register {
                font-size: 0.9rem;
            }

            /* Improve form spacing */
            .form-group {
                margin-bottom: 0.8rem;
            }
        }

        /* Ensure proper spacing in storytelling section */
        @media (max-width: 767px) {
            .info-grid-item .label {
                font-size: 0.7rem;
            }

            .info-grid-item .value {
                font-size: 0.8rem;
            }

            .story-details p {
                font-size: 0.9rem;
                margin-bottom: 1rem;
            }
        }

        /* Fix for event cards on small screens */
        @media (max-width: 767px) {
            .event-img img {
                height: 180px;
            }

            .event-content {
                padding: 0.8rem;
            }

            .btn-register {
                padding: 0.6rem;
            }
        }

        /* Enhanced Mobile Responsiveness CSS */

        /* Fix for the hero section on mobile */
        @media (max-width: 768px) {
            .hero-image {
                flex-direction: column;
                padding: 60px 15px !important;
            }

            .hero-image img {
                max-width: 100%;
                margin-top: 30px;
            }

            .hero-content {
                padding: 20px 15px;
                text-align: center;
            }

            .hero-content h1 {
                font-size: 1.5em;
            }

            .more-about-us-btn {
                padding: 12px 24px;
                font-size: 0.9em;
                width: 80%;
                margin: 0 auto;
                display: block;
            }
        }

        /* Fix for the grid layout in Available Locations section */
        @media (max-width: 992px) {
            .row .grid {
                display: flex;
                flex-direction: column;
                width: 100%;
                margin-bottom: 20px;
            }

            .location-card {
                width: 100%;
                margin-bottom: 15px;
            }
        }

        /* Improve testimonial carousel on mobile */
        @media (max-width: 768px) {
            .testimonial-carousel-wrapper {
                padding: 0 20px;
            }

            .testimonial-carousel {
                gap: 10px;
                padding: 10px 0;
            }

            .testimonial-card {
                width: 85%;
                min-width: 250px;
                padding: 15px;
            }

            .carousel-btn {
                width: 30px;
                height: 30px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.8rem;
            }

            .carousel-btn.prev {
                left: 5px;
            }

            .carousel-btn.next {
                right: 5px;
            }
        }

        /* Fix for the timeline on smaller screens */
        @media (max-width: 768px) {
            .timeline-line {
                left: 0px;
                top: 0px;
                bottom: 30px;
            }

            .timeline-marker {
                left: 30px;
                transform: none;
                width: 50px;
                height: 50px;
            }

            .timeline-marker span {
                font-size: 24px;
            }

            .timeline-content {
                width: calc(100% - 80px);
                margin-left: 60px !important;
                padding: 20px;
            }

            .timeline-content h2 {
                font-size: 14px;
            }

            .timeline-item {
                margin-bottom: 40px;
            }
        }

        /* Fix for the header on mobile */
        @media (max-width: 767px) {
            .header-container {
                padding: 10px;
            }

            .logo img {
                height: 40px;
                margin-left: 0;
            }

            /* Add hamburger menu button */
            .nav {
                position: relative;
            }

            .nav::before {
                content: "☰";
                display: block;
                font-size: 24px;
                color: #0ac0df;
                cursor: pointer;
            }

            /* Show at least one important button on mobile */
            .appointment-btn {
                display: none;
            }

            .talk-expert-btn {
                display: none;
            }
        }

        /* Fix for the cards in Why Choose section */
        @media (max-width: 767px) {
            .card {
                margin-bottom: 20px;
            }

            .card-img-top {
                height: 180px;
            }
        }

        /* Fix for the requirements section */
        @media (max-width: 767px) {
            .requirement-box {
                margin-right: 0;
                margin-bottom: 20px;
            }
        }

        /* Fix for the ROI calculator section */
        @media (max-width: 767px) {
            .roi-calculator {
                margin-bottom: 30px;
            }
        }

        /* Fix for the blog cards */
        @media (max-width: 767px) {
            .blog-card {
                margin-bottom: 30px;
            }

            .blog-title {
                font-size: 15px;
            }
        }

        /* Fix for the CTA section */
        @media (max-width: 576px) {
            .cta-section {
                padding: 2rem 1rem;
            }

            .cta-title {
                font-size: 1.3em;
            }

            .cta-button {
                width: 100%;
                padding: 0.7rem 1.5rem;
                font-size: 0.9rem;
            }
        }

        /* Fix for the contact form */
        @media (max-width: 576px) {
            .contact-form {
                padding: 1.5rem;
            }

            .form-group {
                margin-bottom: 0.8rem;
            }

            .submit-btn {
                padding: 0.7rem;
            }
        }

        /* Fix for the footer */
        @media (max-width: 576px) {
            .footer-col {
                padding: 10px;
            }

            .app-logo img {
                height: 50px;
            }

            .app-logo h3 {
                font-size: 18px;
            }

            .footer-title {
                margin-bottom: 15px;
                font-size: 18px;
            }

            .gallery-images img {
                height: 60px;
            }

            .copyright-links li {
                padding: 5px;
            }

            .copyright-text {
                padding: 5px;
                font-size: 14px;
            }
        }

        /* Extra small devices */
        @media (max-width: 480px) {
            .container {
                width: 95%;
                padding: 0 10px;
            }

            .section-title {
                font-size: 1.3em;
            }

            .section-subtitle {
                font-size: 0.9em;
            }

            .hero-content h1 {
                font-size: 1.3em;
            }

            .hero-content p {
                font-size: 0.9em;
            }

            .card-title {
                font-size: 1em;
            }

            .card-text {
                font-size: 0.8em;
            }

            .requirement-item h5 {
                font-size: 16px;
            }

            .form-label {
                font-size: 0.8em;
            }

            .form-control {
                padding: 0.6rem 0.8rem;
                font-size: 0.8em;
            }

            .testimonial-text {
                font-size: 13px;
            }

            .testimonial-name {
                font-size: 0.9rem;
            }

            .testimonial-position {
                font-size: 0.8rem;
            }
        }

        /* Fix for the testimonial carousel scrolling on mobile */
        @media (max-width: 767px) {
            .testimonial-carousel {
                -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
                scrollbar-width: none; /* Hide scrollbar for Firefox */
                padding-bottom: 20px;
            }

            .testimonial-carousel::-webkit-scrollbar {
                display: none; /* Hide scrollbar for Chrome/Safari */
            }
        }

        /* Ensure proper spacing and alignment for all sections */
        @media (max-width: 767px) {
            section {
                padding: 40px 0;
            }

            .row {
                margin: -10px;
            }

            .col {
                padding: 10px;
            }
        }
        /* Mobile Responsiveness Enhancements */
        @media (max-width: 767px) {
            /* Make cards stack vertically on mobile */
            .row .col {
                width: 100% !important;
                flex-basis: 100% !important;
            }

            /* Stack requirement boxes vertically */
            .requirement-box {
                width: 100%;
                margin-right: 0;
                margin-bottom: 20px;
            }

            /* Make ROI calculator section stack vertically */
            .roi-calculator {
                width: 100%;
                margin-bottom: 30px;
            }

            /* Improve steps container for mobile */
            .timeline-content {
                width: calc(100% - 80px);
                margin-left: 60px !important;
                padding: 20px;
            }

            /* Ensure proper spacing for all sections */
            section {
                padding: 40px 0;
            }

            .row {
                display: block;
            }
        }

        /* Extra small devices */
        @media (max-width: 480px) {
            .container {
                width: 95%;
                padding: 0 10px;
            }

            /* Further adjustments for very small screens */
            .timeline-marker {
                width: 40px;
                height: 40px;
            }

            .timeline-marker span {
                font-size: 20px;
            }

            .timeline-content {
                width: calc(100% - 60px);
                margin-left: 50px !important;
                padding: 15px;
            }
        }
    </style>
@stop

@section('body')
    <!-- hero section -->
    <main class="px-5 md:px-8 lg:px-10 py-10 md:py-10 relative md:min-h-screen flex items-center gsap-fade-up">
        <!-- background -->
        <div class="absolute inset-0 -z-10">
            <img src="https://img.freepik.com/free-photo/happy-kids-elementary-school_53876-138139.jpg?t=st=1745139491~exp=1745143091~hmac=f8d0b0b9fefc857f09f7d0193cdad8150af8cc966943a2ee2abb4b291c95f3ce&w=996" alt class="size-full object-cover">
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
            <!--<button class="text-white text-xl md:text-2xl bg-cyan-400 font-semibold px-5 py-2 rounded-lg block mx-auto cursor-pointer">
                More About us
            </button>-->
        </div>
    </main>


    <!-- Recent Blog Section -->
    <section>
        <div class="container">
            <h2 class="section-title">{{ $franchise->blog_heading }}</h2>
            <div class="row">
                <!-- Blog Card 1 -->
                @foreach($blogs as $blog)
                    <div class="col-4 col-md-4">
                        <div class="blog-card">
                            <div class="blog-image-container position-relative">
                                <img src="{{asset($blog->image)}}" class="blog-image img-fluid w-100"
                                     alt="School supplies"
                                />
                                <span class="blog-tag position-absolute top-0 start-0 m-2 px-2 py-1 bg-primary text-white rounded">Blog</span>
                                <span class="blog-bookmark position-absolute top-0 end-0 m-2">
                            <i class="bi bi-bookmark"></i>
                        </span>
                            </div>
                            <div class="blog-content p-3">
                                <h3 class="blog-title fs-5 fw-bold">
                                    Does a School Franchise Need to Own Premises? | A Guide for Franchise Owners
                                </h3>
                                <div class="blog-footer d-flex justify-content-between align-items-center mt-3">
                                    <div class="blog-author d-flex align-items-center">
                                        <img
                                                src="https://s3-alpha-sig.figma.com/img/8362/89d6/df84eab2ac2d1f2d0f1dcd527f30304d?Expires=1745193600&Key-Pair-Id=APKAQ4GOSFWCW27IBOMQ&Signature=K2Tta0yx3JVx3g83qQj5QG3mvQSJdGkdYMAFJWPJDh6DhD58GUlOgmnACM5FG9lSQH3QNWVzkCy-feFg4ymoQDx2--rX4r5UwgdNMgBfuQsWsjjQBstUme6Dm1kUsqt19XKHZe2mCs0VsfGpOjZzG8hjv5ZH-EeQVE2bnjGbS-ty2QYBbBfv200b~lAlEH8v0tTRHeoKEWAkhA4b-IEkHwmwLg7Iq-9PMIZHrjhejJyPSVhKQUKcFCk6GfmDXvS9QWM3c8MItoiWpNcek6llGtiIKSb5ztHafpmQozn7yBPYEnBdrqaPE0zVaUeXcrU0yEJP7sEppXOGRViDABcGxQ__"
                                                class="author-image rounded-circle me-2"
                                                alt="Author"
                                                width="32"
                                                height="32"
                                        />
                                        <span class="author-name">Education Expert</span>
                                    </div>
                                    <a href="#" class="read-more text-decoration-none">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@stop
@section('js')

@stop
