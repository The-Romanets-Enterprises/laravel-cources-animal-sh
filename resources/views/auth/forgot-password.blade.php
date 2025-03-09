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
        <b>Смена пароля</b>
        <img src="{{ asset('assets/admin/img/dog-house.png') }}" alt="Dog-House Logo " class="brand-image img-circle img-size-64 elevation-4" style="opacity: .9">
    </div>

    <div class="card">
        <div class="card-body register-card-body">

            @include('layouts.message')

            <form action="{{ route('admin.login.auth') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Логин(почта)"
                           value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Старый пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Новый пароль">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Сменить пароль</button>
                    </div>
                    <!-- /.col -->
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
