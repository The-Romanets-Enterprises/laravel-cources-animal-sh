<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? '' }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    @vite('resources/assets/admin/css/admin.css')
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <b>{{ $title ?? '' }}</b>
    </div>

    <div class="card">
        <div class="card-body register-card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                    @if (session('email'))
                        <br>
                        <small>
                            {{ __('messages.auth.verify_email_not_received') }}
                            <a href="{{ route('verification.resend.show') }}?email={{ urlencode(session('email')) }}">
                                {{ __('messages.auth.verify_email_resend_link') }}
                            </a>
                        </small>
                    @endif
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                    @if (session('email'))
                        <br>
                        <small>
                            {{ __('messages.auth.verify_email_not_received') }}
                            <a href="{{ route('verification.resend.show') }}?email={{ urlencode(session('email')) }}">
                                {{ __('messages.auth.verify_email_resend_link') }}
                            </a>
                        </small>
                    @endif
                </div>
            @endif

            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="{{ __('messages.auth.email_placeholder') }}"
                           value="{{ old('email', session('email')) }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ __('messages.auth.password') }}" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                {{ __('messages.auth.remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('messages.auth.login') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <div class="login-link">
                {{ __('messages.auth.no_have_account') }}
                <a href="{{ route('register.show') }}">{{ __('messages.register.register') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
</body>
</html>
