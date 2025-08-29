<!DOCTYPE html>
<html lang="en">
<?php
    $common = getCommonSetting();
?>
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
  <!-- CSS Dependencies -->
  <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/icons/feather/feather.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('assets-admin/plugins/tabler-icons/tabler-icons.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <!-- <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome/css/all.min.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/owlcarousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/owlcarousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
  <!-- Bootstrap Tags Input CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">


  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
 	



  

   <style>
     a.btn.btn-outline-light.bg-white.btn-icon.me-1 {
        display: none;
    } 

    button.btn.btn-outline-light.bg-white.btn-icon.me-1 {
      display: none;
    } 

    .dropdown.me-2.mb-2 {
        display: none;
    }
    .input-icon-start.mb-3.me-2.position-relative{
    display: none !important;
    }
   .dropdown.mb-3.me-2 {
    display: none !important;
    } 
    .d-flex.align-items-center.bg-white.border.rounded-2.p-1.mb-3.me-2  {
    display: none !important;
    } 
    .dropdown.mb-3 {
        display: none;
    }

    .bootstrap-tagsinput {
      width: 100%;
      min-height: 38px;
      line-height: 1.5;
      border: 1px solid #ced4da;
      padding: 0.375rem 0.75rem;
      display: block;
    }
    .bootstrap-tagsinput .tag {
      margin-right: 2px;
      color: white;
      background-color: #0d6efd;
      padding: 0.2em 0.5em;
      border-radius: 0.2em;
    }
   </style>

  @yield('styles')
</head>

<body>
  <div id="global-loader">
    <div class="page-loader"></div>
  </div>

  <!-- Main Wrapper -->
  <div class="main-wrapper">
    <!-- Header -->
    @include('partials.admin.header')
    <!-- /Header -->

    <!-- Sidebar -->
    @include('partials.admin.sidebar')

    <!-- /Sidebar -->


  </div>
  <!-- /Main Wrapper -->

  <!-- Scripts -->
  <div class="content">
    @yield('content')
    <!-- This is where content from child views will be injected -->
  </div>
  <!-- <script src="{{ asset('assets-admin/js/jquery-3.7.1.min.js') }}"></script> -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


  <!-- Bootstrap Core JS -->
  <script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Daterangepicker JS -->
  <script src="{{ asset('assets-admin/js/moment.js') }}"></script>
  <script src="{{ asset('assets-admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('assets-admin/js/bootstrap-datetimepicker.min.js') }}"></script>

  <!-- Feather Icon JS -->
  <script src="{{ asset('assets-admin/js/feather.min.js') }}"></script>

  <!-- Slimscroll JS -->
  <script src="{{ asset('assets-admin/js/jquery.slimscroll.min.js') }}"></script>

  <!-- Chart JS -->
  <script src="{{ asset('assets-admin/plugins/apexchart/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets-admin/plugins/apexchart/chart-data.js') }}"></script>

  <!-- Owl JS -->
  <script src="{{ asset('assets-admin/plugins/owlcarousel/owl.carousel.min.js') }}"></script>

  <!-- Select2 JS -->
  <script src="{{ asset('assets-admin/plugins/select2/js/select2.min.js') }}"></script>

  <!-- Counter JS -->
  <script src="{{ asset('assets-admin/plugins/countup/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('assets-admin/plugins/countup/jquery.waypoints.min.js') }}"></script>

  <!-- Custom JS -->
  <script src="{{ asset('assets-admin/js/script.js') }}"></script>
  <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

 

  <script>
    // $(document).ready(function () {
    //   // handle submenu toggle
    //   $('.submenu > a').click(function (e) {
    //     e.preventDefault();
    //     const $submenu = $(this).next('ul');

    //     // slideToggle submenu
    //     if ($submenu.is(':visible')) {
    //       $submenu.slideUp();
    //       $(this).removeClass('subdrop');
    //     } else {
    //       // Close all other open submenus
    //       $('.submenu ul:visible').slideUp();
    //       $('.submenu > a').removeClass('subdrop');

    //       // Open current
    //       $submenu.slideDown();
    //       $(this).addClass('subdrop');
    //     }
    //   });

    //   // Show submenu if .subdrop class is already present (on page load)
    //   $('.submenu > a.subdrop').next('ul').show();
    // });
  </script>

  <!-- Quill Core CSS -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

  <!-- Quill JS -->
  <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Bootstrap Tags Input JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

 

  <script>
    
    // $(function() {
    //     $("#example1").DataTable({
    //         "responsive": true,
    //         "lengthChange": true,
    //         "lengthMenu": [25, 50, 100, 500], // Customize length change menu options
    //         "autoWidth": false,
    //         "searching": true,
    //           "stateSave": true, // Enable state saving
    //         // "buttons": ["csv", "excel", "pdf", "print", "colvis"]
    //     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    // });
    document.addEventListener('DOMContentLoaded', function () {
      const editors = document.querySelectorAll('.editor');

      editors.forEach(function (editorDiv) {
        const name = editorDiv.getAttribute('data-name');
        const hiddenInput = document.querySelector(`input[name="${name}"]`);

        const quill = new Quill(editorDiv, {
          theme: 'snow',
          modules: {
            toolbar: [
              ['bold', 'italic', 'underline'],
              [{ 'list': 'ordered' }, { 'list': 'bullet' }],
              ['link', 'image']
            ]
          }
        });

        // Sync content to hidden input on change
        quill.on('text-change', function () {
          hiddenInput.value = quill.root.innerHTML;
        });
      });
    });
  </script>




  @yield('scripts')
</body>

</html>
