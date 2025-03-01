<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? ''  }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    @vite('resources/assets/admin/css/admin.css')
    <!-- Theme style -->
    {{--    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">--}}
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">My Site</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.show') }}">{{ __('messages.auth.login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register.show') }}">{{ __('messages.register.register') }}</a>
                    </li>
                @endguest
                @auth
                    @if (Auth::user()->role == \App\Enums\Role::ADMIN)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home') }}">{{ __('messages.auth.admin_panel') }}</a>
                        </li>
                    @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}">{{ __('messages.auth.logout.logout') }}</a>
                        </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1>Welcome to My Site!</h1>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <p>This is the main page content.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
