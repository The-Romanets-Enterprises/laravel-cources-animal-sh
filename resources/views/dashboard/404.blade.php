<!DOCTYPE html>
<html data-bs-theme="light" lang="ru-RU" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ $title ?? 'Ошибка 404' }}</title>


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
        <div class="row flex-center min-vh-100 py-6 text-center">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5">
                <a class="d-flex flex-center mb-4" href="">
                    <img class="me-2" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/falcon.png') }}" alt="" width="58" />
                    <span class="font-sans-serif text-primary fw-bolder fs-4 d-inline-block">AnimalSafe</span>
                </a>
                <div class="card">
                    <div class="card-body p-4 p-sm-5">
                        <div class="fw-black lh-1 text-300 fs-error">404</div>
                        <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">Страница, которую вы ищете, не найдена.</p>
                        <hr />
                        <p>Убедитесь, что адрес правильный и страница не перемещена. Если вы считаете, что это ошибка,
                            <a href="">свяжитесь с нами</a>.
                        </p>
                        <a class="btn btn-primary btn-sm mt-3" href="{{ route('dashboard.home') }}">
                            <span class="fas fa-home me-2"></span>Вернуться на главную
                        </a>
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
