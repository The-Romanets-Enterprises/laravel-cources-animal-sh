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
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <b>{{ $title ?? ''  }}</b>
    </div>

    <div class="card">
        <div class="card-body register-card-body">

            @include('layouts.message')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('signup') }}">
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('messages.auth.name') }}</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="name">{{ __('messages.auth.lastname') }}</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname') }}" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('messages.auth.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="password">{{ __('messages.auth.password') }}</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">{{ __('messages.auth.password_confirmation') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('messages.auth.phone') }}</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.register.register') }}</button>
            </form>
            <div class="login-link">
                {{ __('messages.auth.have_account') }}
                <a href="{{ route('login.show') }}">{{ __('messages.auth.login') }}</a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
{{--<script src="{{ asset('assets/admin/js/admin.js') }}"></script>--}}
</body>
</html>

