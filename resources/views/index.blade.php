<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('messages.main_page') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @vite('resources/assets/admin/css/admin.css')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('resources/assets/admin/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <h1><b>{{ __('messages.welcome_to') }} {{ __('messages.site_name') }}</b></h1>
        </div>
        <div class="card-body">
            @if (Auth::check())
                <p class="mb-3">{{ __('messages.logged_in_as') }} {{ Auth::user()->name }}</p>
                <a href="{{ route('logout') }}" class="btn btn-block btn-danger">
                    <i class="fas fa-sign-out-alt"></i> {{ __('messages.logout') }}
                </a>
            @else
                <a href="{{ route('login.show') }}" class="btn btn-block btn-success mb-2">
                    <i class="fas fa-sign-in-alt"></i> {{ __('messages.login') }}
                </a>
                <a href="{{ route('register.show') }}" class="btn btn-block btn-info">
                    <i class="fas fa-user-plus"></i> {{ __('messages.register') }}
                </a>
            @endif
        </div>
    </div>
</div>
</body>
</html>
