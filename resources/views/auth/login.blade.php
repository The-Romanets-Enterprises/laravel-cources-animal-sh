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

{{--            @php--}}
{{--                $isAdmin = request()->routeIs('admin.*');--}}
{{--            @endphp--}}

            <form action="{{ route('login.auth') }}" method="post">
            @csrf
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Адрес эл. почты"
                           value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8 d-flex align-items-center">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Запомнить меня
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary w-100">Войти</button>
                    </div>
                    <a href="{{ route('user.forgot-password.show') }}">Забыли пароль?</a>
                </div>
                <div class="mt-3">
                    <a href="{{ route('register.show') }}" class="btn btn-success w-100">Зарегистрироваться</a>
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
{{--<script src="{{ asset('assets/admin/js/admin.js') }}"></script>--}}
</body>
</html>
