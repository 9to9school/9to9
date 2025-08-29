<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from preskool.dreamstechnologies.com/html/template/teacher-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Feb 2025 07:57:45 GMT -->
<head>
    <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="{{$common->site_title ?? ''}}">
        <meta name="keywords" content="{{$common->site_title ?? ''}}">
        <meta name="author" content="{{$common->site_title ?? ''}}">
        <meta name="robots" content="noindex, nofollow">
        <title>{{$common->site_title ?? ''}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicon.png') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/3.28.1/tabler-icons.min.css" integrity="sha512-UuL1Le1IzormILxFr3ki91VGuPYjsKQkRFUvSrEuwdVCvYt6a1X73cJ8sWb/1E726+rfDRexUn528XRdqrSAOw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Theme Script js -->
	<!-- <script src="{{ asset('assets-admin/js/theme-script.js') }}" type="7d225e00ab95471ee41422a8-text/javascript"></script> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">

    <!-- Feather CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/icons/feather/feather.css') }}">

    <!-- Tabler Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/tabler-icons/tabler-icons.css') }}">

    <!-- Daterangepikcer CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/daterangepicker/daterangepicker.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome/css/all.min.css') }}">

    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap-datetimepicker.min.css') }}">

    <!-- Owl carousel CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/plugins/owlcarousel/owl.carousel.min.css') }}">
     <link rel="stylesheet" href="{{ asset('assets-admin/plugins/owlcarousel/owl.theme.default.min.css') }}">

	<!-- Select2 CSS -->
	<link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2/css/select2.min.css') }}">

    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/dataTables.bootstrap5.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}">

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

</head>

<body>

    <div id="global-loader">
		<div class="page-loader"></div>
	</div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">

       <!-- Header -->
		@include('partials.teacher.header')
		<!-- /Header -->

        <!-- Sidebar -->
         @include('partials.teacher.sidebar')
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="content">
            @yield('content')
            <!-- This is where content from child views will be injected -->
        </div>
        <!-- /Page Wrapper -->

        <!-- Add Event -->
		
		<!-- /Add Event -->	

    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets-admin/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
     <script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Daterangepikcer JS -->
    <script src="{{ asset('assets-admin/js/moment.js') }}"></script>
    <script src="{{ asset('assets-admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets-admin/js/bootstrap-datetimepicker.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('assets-admin/js/feather.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('assets-admin/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Owl Carousel JS -->
    <script src="{{ asset('assets-admin/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('assets-admin/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-admin/plugins/apexchart/chart-data.js') }}"></script>

    <!-- Datatable JS -->
    <script src="{{ asset('assets-admin/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets-admin/js/dataTables.bootstrap5.min.js') }}"></script>

	<!-- Select2 JS -->
	  <script src="{{ asset('assets-admin/plugins/select2/js/select2.min.js') }}"></script>

    <!-- Custom JS -->
	<script src="{{ asset('assets-admin/js/script.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>


</body>


<!-- Mirrored from preskool.dreamstechnologies.com/html/template/teacher-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Feb 2025 07:57:45 GMT -->
</html>