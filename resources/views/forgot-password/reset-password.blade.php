<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reset Password | 9to9Schools</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets-reset/img/favicon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets-reset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-reset/plugins/icons/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-reset/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-reset/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-reset/plugins/tabler-icons/tabler-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-reset/css/style.css') }}">
</head>

<body class="account-page">
    <div class="main-wrapper">
        <div class="container-fuild">
            <div class="login-wrapper w-100 vh-100 d-flex align-items-center justify-content-center">
                <div class="row w-100">
                    <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
                        <div class="text-center mb-4">
                            <img src="{{ asset('assets-reset/img/authentication/authentication-logo.svg') }}" alt="Logo" class="img-fluid" width="120">
                            <h2 class="mt-3">Reset Password</h2>
                            <p>Enter your new password below.</p>
                        </div>

                        @if (session('status'))
                            <div class="alert alert-success">{{ session('status') }}</div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="form-group mb-3">
                                <label>New Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label>Confirm Password</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Change Password</button>

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

    <!-- JS Files -->
    <script src="{{ asset('assets-reset/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets-reset/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-reset/js/feather.min.js') }}"></script>
    <script src="{{ asset('assets-reset/js/script.js') }}"></script>
</body>
</html>
