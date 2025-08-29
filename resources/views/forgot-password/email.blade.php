<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Preskool - Bootstrap password Template">
  <meta name="keywords" content="password, estimates, bootstrap, business, html5, responsive, Projects">
  <meta name="author" content="Dreams technologies - Bootstrap password Template">
  <meta name="robots" content="noindex, nofollow">
  <title>password Forgot Password</title>
   <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

  <!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.min.css') }}">

  <!-- Feather CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/icons/feather/feather.css') }}">

  <!-- Tabler Icon CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/tabler-icons/tabler-icons.css') }}">

  <!-- Fontawesome CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome/css/fontawesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets-admin/plugins/fontawesome/css/all.min.css') }}">

  <!-- Select2 CSS -->
 <link rel="stylesheet" href="{{ asset('assets-admin/plugins/select2/css/select2.min.css') }}">

  <!-- Main CSS -->
  <link rel="stylesheet" href="{{ asset('assets-admin/css/style.css') }}">
</head>

<body class="account-page">

  <div class="main-wrapper">
    <div class="container-fuild">
      <div class="login-wrapper w-100 vh-100 d-flex align-items-center justify-content-center">
        <div class="row w-100">
          <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
            <div class="text-center mb-4">
              <img src="{{ asset('assets-admin/img/authentication/authentication-logo.svg') }}" alt="Logo" class="img-fluid" width="120">
              <h2 class="mt-3">Forgot Password</h2>
              <p>We'll send an OTP to your email to reset your password.</p>
            </div>

            @if(session('error'))
              <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
              @csrf
              <div class="form-group mb-3">
                <label>Email Address</label>
                <div class="inputadmin
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" name="email" class="form-control" required>
                </div>
                @error('email')
                  <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <button type="submit" class="btn btn-primary w-100">Send reset-password link</button>

              <div class="text-center mt-3">
                <a href="{{ route('admin.loginform') }}">Return to Login</a>
              </div>
            </form>

            <div class="text-center mt-4">
              <small>&copy; 2025 - 9to9Schools</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
 <script src="{{ asset('assets-admin/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/feather.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('assets-admin/plugins/select2/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets-admin/js/script.js') }}"></script>
</body>

</html>
