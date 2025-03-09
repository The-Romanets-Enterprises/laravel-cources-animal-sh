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
        <b>{{ $title ?? ''  }}</b>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('messages.auth.email') }}</label>
                    <input type="email"
                           placeholder="{{ __('messages.auth.email_placeholder') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           name="email"
                           value="{{ old('email', $email ?? '') }}"
                           required>
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.auth.verify_email_resend_button') }}</button>
                <a href="{{ route('login.show') }}" class="btn btn-link">{{ __('messages.auth.login') }}</a>
            </form>
        </div>
    </div>


</div>
</body>
</html>
