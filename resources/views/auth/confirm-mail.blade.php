<!DOCTYPE html>
<html data-bs-theme="light" lang="ru-RU" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ $title ?? 'Подтверждение почты' }}</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/dashboard/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/dashboard/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/dashboard/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dashboard/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/dashboard/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/dashboard/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/dashboard/js/config.js') }}"></script>
    <script src="{{ asset('assets/dashboard/vendors/simplebar/simplebar.min.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/vendors/simplebar/simplebar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/dashboard/css/theme-rtl.css') }}" rel="stylesheet" id="style-rtl">
    <link href="{{ asset('assets/dashboard/css/theme.css') }}" rel="stylesheet" id="style-default">
    <link href="{{ asset('assets/dashboard/css/user-rtl.css') }}" rel="stylesheet" id="user-style-rtl">
    <link href="{{ asset('assets/dashboard/css/user.css') }}" rel="stylesheet" id="user-style-default">
    <script>
        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>


<body>

<!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">
    <div class="container" data-layout="container">
        <script>
            var isFluid = JSON.parse(localStorage.getItem('isFluid'));
            if (isFluid) {
                var container = document.querySelector('[data-layout]');
                container.classList.remove('container');
                container.classList.add('container-fluid');
            }
        </script>
        <div class="row flex-center min-vh-100 py-6">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <a class="d-flex flex-center mb-4" href="">
                    <img class="me-2" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/falcon.png') }}" alt="" width="58" />
                    <span class="font-sans-serif text-primary fw-bolder fs-4 d-inline-block">AnimalSafe</span>
                </a>
                <div class="card">
                    <div class="card-body p-4 p-sm-5">
                        <div class="text-center">
                            <img class="d-block mx-auto mb-4" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/16.png') }}" alt="Email" width="100" />
                            <h4 class="mb-2">Пожалуйста, проверьте свою электронную почту!</h4>
                            <p>Письмо было отправлено на адрес <strong>example@mail</strong>.
                                Нажмите на прилагаемую ссылку,
                                <span class="white-space-nowrap">чтобы сбросить пароль.</span>
                            </p>
                            <a class="btn btn-primary btn-sm mt-3" href="">
                                <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span>Вернуться к авторизации
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- ===============================================-->
<!--    End of Main Content-->
<!-- ===============================================-->


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{ asset('assets/dashboard/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/is/is.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/list.js/list.min.js') }}"></script>

<script src="{{ asset('assets/dashboard/js/theme.js') }}"></script>

</body>

</html>
