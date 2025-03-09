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
<nav class="navbar navbar-expand-lg navbar-teal">
    <div class="container d-flex">
        <!-- logo -->
        <a class="navbar-brand text-white" href="{{ route('index') }}">
            <img src="{{ asset('assets/admin/img/dog-house.png') }}" alt="Dog-House Logo " class="brand-image img-circle img-size-50 elevation-4" style="opacity: .9">
            <b>Animal Shelter</b>
        </a>
        <!-- buttons -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav mt-sm-auto">
                @guest
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link text-white font-weight-bold" href="{{ route('login.show') }}" style="font-size: 1.25rem;">{{ __('messages.auth.login') }}</a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a class="nav-link text-white font-weight-bold" href="{{ route('register.show') }}" style="font-size: 1.25rem;">{{ __('messages.register.register') }}</a>
                    </li>
                @endguest
                @auth
                    @if (Auth::user()->role == \App\Enum\Role::ADMIN)
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-bold" href="{{ route('admin.home') }}" style="font-size: 1.25rem;">{{ __('messages.auth.admin-panel') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="{{ route('admin.logout') }}" style="font-size: 1.25rem;">{{ __('messages.auth.logout') }}</a>
                    </li>
                @endauth
            </ul>
        </div>

        <div class="card">

            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
</nav>
<!-- /.register-box -->
{{--<script src="{{ asset('assets/admin/js/admin.js') }}"></script>--}}
</body>
</html>
