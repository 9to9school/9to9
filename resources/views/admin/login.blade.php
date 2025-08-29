<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
  <meta name="description" content="Preskool - Bootstrap Admin Template">
  <meta name="keywords" content="admin, estimates, bootstrap, business, html5, responsive, Projects">
  <meta name="author" content="Dreams technologies - Bootstrap Admin Template">
  <meta name="robots" content="noindex, nofollow">
  <title>9to9Schools Admin</title>
   <!-- <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/icons/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/tabler-icons/tabler-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/daterangepicker/daterangepicker.css') }}">
  

  <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap-datetimepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/owlcarousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/owlcarousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}"> -->

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">

  <!-- Feather CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/icons/feather/feather.css') }}">

  <!-- Tabler Icon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/tabler-icons/tabler-icons.css') }}">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome/css/all.min.css') }}">

  <!-- Select2 CSS -->
 <link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2/css/select2.min.css') }}">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}">

</head>

<body class="account-page">

  <!-- Main Wrapper -->
  @if(Session::has('error'))
  <p class="text-danger">{{Session::get('error')}}</p>
  </div>
  @endif
  <div class="main-wrapper">

    <div class="container-fuild">
      <div class="login-wrapper w-100 overflow-hidden position-relative flex-wrap d-block vh-100">
        <div class="row">
          <div class="col-lg-6">
            <div
              class="d-lg-flex align-items-center justify-content-center bg-light-300 d-lg-block d-none flex-wrap vh-100 overflowy-auto bg-01">
              <div>
                <img src="{{ asset('assets/web/images/logo.png') }}" alt="Img">
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="row justify-content-center align-items-center vh-100 overflow-auto flex-wrap ">
              <div class="col-md-8 mx-auto p-4">
                <form action="{{ route('admin.login') }}" method="POST">
                  @csrf
                  <div>
                    <input type="hidden" name="role" value="admin">
                    <div class=" mx-auto mb-5 text-center">
                      <!--<img src="{{ asset('assets/web/images/logo.png') }}"-->
                      <!--  class="img-fluid" alt="Logo" style="width:100px;">-->
                    </div>
                    <div class="card">
                      <div class="card-body p-4">
                        <div class=" mb-4">
                          <h2 class="mb-2">Welcome</h2>
                          <p class="mb-0">Please enter your details to sign in</p>
                        </div>
                        <div class="mt-4">
                        <!--  <div class="d-flex align-items-center justify-content-center flex-wrap">-->
                        <!--    <div class="text-center me-2 flex-fill">-->
                        <!--      <a href="javascript:void(0);"-->
                        <!--        class="bg-primary br-10 p-2 btn btn-primary  d-flex align-items-center justify-content-center">-->
                        <!--        <img class="img-fluid m-1" src="{{ asset('assets/login/img/icons/facebook-logo.svg')}}"-->
                        <!--          alt="Facebook">-->
                        <!--      </a>-->
                        <!--    </div>-->
                        <!--    <div class="text-center me-2 flex-fill">-->
                        <!--      <a href="javascript:void(0);"-->
                        <!--        class=" br-10 p-2 btn btn-outline-light  d-flex align-items-center justify-content-center">-->
                        <!--        <img class="img-fluid  m-1" src="{{ asset('assets/login/img/icons/google-logo.svg')}}"-->
                        <!--          alt="Facebook">-->
                        <!--      </a>-->
                        <!--    </div>-->
                        <!--    <div class="text-center flex-fill">-->
                        <!--      <a href="javascript:void(0);"-->
                        <!--        class="bg-dark br-10 p-2 btn btn-dark d-flex align-items-center justify-content-center">-->
                        <!--        <img class="img-fluid  m-1" src="{{ asset('assets/login/img/icons/apple-logo.svg')}}"-->
                        <!--          alt="Apple">-->
                        <!--      </a>-->
                        <!--    </div>-->
                        <!--  </div>-->
                        <!--</div>-->
                        <!--<div class="login-or">-->
                        <!--  <span class="span-or">Or</span>-->
                        <!--</div>-->

                        <div class="mb-3 ">
                          <label class="form-label">Email Address</label>
                          <div class="input-icon mb-3 position-relative">
                            <span class="input-icon-addon">
                              <i class="ti ti-mail"></i>
                            </span>
                            <input type="text" class="form-control" name="email">
                          </div>
                          @error('email')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                          <label class="form-label">Password</label>
                          <div class="pass-group">
                            <input type="password" class="pass-input form-control" name="password">
                            <span class="ti toggle-password ti-eye-off"></span>
                          </div>
                          @error('email')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>

                        <div class="form-wrap form-wrap-checkbox mb-3">
                          <div class="d-flex align-items-center">
                            <div class="form-check form-check-md mb-0">
                              <input class="form-check-input mt-0" type="checkbox">
                            </div>
                            <p class="ms-1 mb-0 ">Remember Me</p>
                          </div>
                          <div class="text-end ">
                           <a href="{{ route('admin.password.emailform') }}" class="link-danger">Forgot
                             Password</a>
                          </div>
                        </div>
                        <div class="mb-3">
                          <button type="submit" class="btn btn-primary w-100">Sign In</button>
                        </div>
                </form>
                <!--<div class="text-center">-->
                <!--  <h6 class="fw-normal text-dark mb-0">Don’t have an account? <a href="register-2.html"-->
                <!--      class="hover-a "> Create Account</a>-->
                <!--  </h6>-->
                <!--</div>-->
              </div>
            </div>
            <div class="mt-5 text-center">
              <p class="mb-0 ">Copyright &copy; 2025 - 9to9Schools</p>
            </div>
          </div>
          </form>
        </div>

      </div>
    </div>
  </div>



  </div>
  </div>

  </div>
  <!-- /Main Wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('assets-admin/js/jquery-3.7.1.min.js') }}"></script>

  <!-- Bootstrap Core JS -->
<script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>

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

  <script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
    data-cf-settings="cc23bd34224afba88ff4e115-|49" defer></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"rayId":"925c2e74fc4ef4df","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2025.1.0","token":"3ca157e612a14eccbb30cf6db6691c29"}'
    crossorigin="anonymous"></script>
</body>

</html>