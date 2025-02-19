<!DOCTYPE html>
<html data-bs-theme="light" lang="ru-RU" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@section('title')@show</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/dashboard/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/dashboard/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/dashboard/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/dashboard/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/dashboard/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/favicons/mstile-150x150.png') }}">
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
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
            <script>
                var navbarStyle = localStorage.getItem("navbarStyle");
                if (navbarStyle && navbarStyle !== 'transparent') {
                    document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                }
            </script>
            <div class="d-flex align-items-center">
                <div class="toggle-icon-wrapper">
                    <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation">
                        <span class="navbar-toggle-icon">
                            <span class="toggle-line"></span>
                        </span>
                    </button>
                </div>
                <a class="navbar-brand" href="">
                    <div class="d-flex align-items-center py-3">
                        <img class="me-2" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" />
                        <span class="font-sans-serif text-primary">Test</span>
                    </div>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                <div class="navbar-vertical-content scrollbar">
                    <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#dashboard" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-chart-pie"></span>
                                    </span>
                                    <span class="nav-link-text ps-1">Dashboard</span>
                                </div>
                            </a>
                            <ul class="nav collapse show" id="dashboard">
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text ps-1">E commerce</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text ps-1">LMS</span>
                                            <span class="badge rounded-pill ms-2 badge-subtle-success">New</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                <div class="col-auto navbar-vertical-label">Modules
                                </div>
                                <div class="col ps-0">
                                    <hr class="mb-0 navbar-vertical-divider" />
                                </div>
                            </div>
                            <a class="nav-link dropdown-indicator" href="#forms" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-file-alt"></span>
                                    </span>
                                    <span class="nav-link-text ps-1">Forms</span>
                                </div>
                            </a>
                            <ul class="nav collapse" id="forms">
                                <li class="nav-item">
                                    <a class="nav-link dropdown-indicator" href="#basic" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text ps-1">Basic</span>
                                        </div>
                                    </a>
                                    <ul class="nav collapse" id="basic">
                                        <li class="nav-item">
                                            <a class="nav-link" href="">
                                                <div class="d-flex align-items-center">
                                                    <span class="nav-link-text ps-1">Form control</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">
                                        <div class="d-flex align-items-center">
                                            <span class="nav-link-text ps-1">Floating labels</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
                <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                    <span class="navbar-toggle-icon">
                        <span class="toggle-line"></span>
                    </span>
                </button>
                <a class="navbar-brand me-1 me-sm-3" href="">
                    <div class="d-flex align-items-center">
                        <img class="me-2" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" />
                        <span class="font-sans-serif text-primary">falcon</span>
                    </div>
                </a>
                <ul class="navbar-nav align-items-center d-none d-lg-block">
                    <li class="nav-item">
                        <div class="search-box" data-list='{"valueNames":["title"]}'>
                            <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                                <input class="form-control search-input fuzzy-search" type="search" placeholder="Search..." aria-label="Search" />
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                            <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                                <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
                            </div>
                            <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                                <div class="scrollbar list py-3" style="max-height: 24rem;">
                                    <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs-11 pt-0 pb-2">Recently Browsed</h6>
                                    <a class="dropdown-item fs-10 px-x1 py-1 hover-primary" href="">
                                        <div class="d-flex align-items-center">
                                            <span class="fas fa-circle me-2 text-300 fs-11"></span>
                                            <div class="fw-normal title">Pages
                                                <span class="fas fa-chevron-right mx-1 text-500 fs-11" data-fa-transform="shrink-2"></span>Events
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item fs-10 px-x1 py-1 hover-primary" href="">
                                        <div class="d-flex align-items-center">
                                            <span class="fas fa-circle me-2 text-300 fs-11"></span>
                                            <div class="fw-normal title">E-commerce
                                                <span class="fas fa-chevron-right mx-1 text-500 fs-11" data-fa-transform="shrink-2"></span>Customers
                                            </div>
                                        </div>
                                    </a>

                                    <hr class="text-200 dark__text-900" />

                                    <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs-11 pt-0 pb-2">Members</h6>
                                    <a class="dropdown-item px-x1 py-2" href="">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-l status-online me-2">
                                                <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/1.jpg') }}" alt="" />
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 title">Anna Karinina</h6>
                                                <p class="fs-11 mb-0 d-flex">Technext Limited</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item px-x1 py-2" href="">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-l me-2">
                                                <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/2.jpg') }}" alt="" />
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 title">Antony Hopkins</h6>
                                                <p class="fs-11 mb-0 d-flex">Brain Trust</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item px-x1 py-2" href="">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-l me-2">
                                                <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/3.jpg') }}" alt="" />
                                            </div>
                                            <div class="flex-1">
                                                <h6 class="mb-0 title">Emma Watson</h6>
                                                <p class="fs-11 mb-0 d-flex">Google</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="text-center mt-n3">
                                    <p class="fallback fw-bold fs-8 d-none">No Result Found.</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                    <li class="nav-item ps-2 pe-0">
                        <div class="dropdown theme-control-dropdown">
                            <a class="nav-link d-flex align-items-center dropdown-toggle fa-icon-wait fs-9 pe-1 py-0" href="#" role="button" id="themeSwitchDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fas fa-sun fs-7" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="light"></span>
                                <span class="fas fa-moon fs-7" data-fa-transform="shrink-3" data-theme-dropdown-toggle-icon="dark"></span>
                                <span class="fas fa-adjust fs-7" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="auto"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-caret border py-0 mt-3" aria-labelledby="themeSwitchDropdown">
                                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                    <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="light" data-theme-control="theme">
                                        <span class="fas fa-sun"></span>Light<span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                                    </button>
                                    <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="dark" data-theme-control="theme">
                                        <span class="fas fa-moon" data-fa-transform=""></span>Dark<span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                                    </button>
                                    <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="auto" data-theme-control="theme">
                                        <span class="fas fa-adjust" data-fa-transform=""></span>Auto<span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item d-none d-sm-block">
                        <a class="nav-link px-0 notification-indicator notification-indicator-warning notification-indicator-fill fa-icon-wait" href="">
                            <span class="fas fa-shopping-cart" data-fa-transform="shrink-7" style="font-size: 33px;"></span>
                            <span class="notification-indicator-number">1</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll">
                            <span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span>
                        </a>
                        <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                            <div class="card card-notification shadow-none">
                                <div class="card-header">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <h6 class="card-header-title mb-0">Notifications</h6>
                                        </div>
                                        <div class="col-auto ps-0 ps-sm-3">
                                            <a class="card-link fw-normal" href="">Mark all as read</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="scrollbar-overlay" style="max-height:19rem">
                                    <div class="list-group list-group-flush fw-normal fs-10">
                                        <div class="list-group-title border-bottom">NEW</div>
                                        <div class="list-group-item">
                                            <a class="notification notification-flush notification-unread" href="">
                                                <div class="notification-avatar">
                                                    <div class="avatar avatar-2xl me-3">
                                                        <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/1-thumb.png') }}" alt="" />
                                                    </div>
                                                </div>
                                                <div class="notification-body">
                                                    <p class="mb-1">
                                                        <strong>Emma Watson</strong> replied to your comment : "Hello world"
                                                    </p>
                                                    <span class="notification-time">
                                                        <span class="me-2" role="img" aria-label="Emoji">💬</span>Just now
                                                    </span>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="list-group-title border-bottom">EARLIER</div>
                                        <div class="list-group-item">
                                            <a class="notification notification-flush" href="">
                                                <div class="notification-avatar">
                                                    <div class="avatar avatar-2xl me-3">
                                                        <img class="rounded-circle" src="{{ asset('assets/dashboard/img/icons/weather-sm.jpg') }}" alt="" />
                                                    </div>
                                                </div>
                                                <div class="notification-body">
                                                    <p class="mb-1">The forecast today shows a low of 20&#8451; in California. See today's weather.</p>
                                                    <span class="notification-time"><span class="me-2" role="img" aria-label="Emoji">🌤️</span>1d</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center border-top">
                                    <a class="card-link d-block" href="">View all</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown px-1">
                        <a class="nav-link fa-icon-wait nine-dots p-1" id="navbarDropdownMenu" role="button" data-hide-on-body-scroll="data-hide-on-body-scroll" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="43" viewBox="0 0 16 16" fill="none">
                                <circle cx="2" cy="2" r="2" fill="#6C6E71"></circle>
                                <circle cx="2" cy="8" r="2" fill="#6C6E71"></circle>
                                <circle cx="2" cy="14" r="2" fill="#6C6E71"></circle>
                                <circle cx="8" cy="8" r="2" fill="#6C6E71"></circle>
                                <circle cx="8" cy="14" r="2" fill="#6C6E71"></circle>
                                <circle cx="14" cy="8" r="2" fill="#6C6E71"></circle>
                                <circle cx="14" cy="14" r="2" fill="#6C6E71"></circle>
                                <circle cx="8" cy="2" r="2" fill="#6C6E71"></circle>
                                <circle cx="14" cy="2" r="2" fill="#6C6E71"></circle>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-caret-bg" aria-labelledby="navbarDropdownMenu">
                            <div class="card shadow-none">
                                <div class="scrollbar-overlay nine-dots-dropdown">
                                    <div class="card-body px-3">
                                        <div class="row text-center gx-0 gy-0">
                                            <div class="col-4">
                                                <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                                    <div class="avatar avatar-2xl">
                                                        <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/3.jpg') }}" alt="" />
                                                    </div>
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs-11">Account</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                                    <img class="rounded" src="{{ asset('assets/dashboard/img/nav-icons/discord.png') }}" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Discord</p>
                                                </a>
                                            </div>
                                            <div class="col-12">
                                                <hr class="my-3 mx-n3 bg-200" />
                                            </div>
                                            <div class="col-4">
                                                <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                                    <img class="rounded" src="{{ asset('assets/dashboard/img/nav-icons/linkedin.png') }}" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Linkedin</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                                    <img class="rounded" src="{{ asset('assets/dashboard/img/nav-icons/twitter.png') }}" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Twitter</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                                    <img class="rounded" src="{{ asset('assets/dashboard/img/nav-icons/facebook.png') }}" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Facebook</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                                    <img class="rounded" src="{{ asset('assets/dashboard/img/nav-icons/instagram.png') }}" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Instagram</p>
                                                </a>
                                            </div>
                                            <div class="col-4">
                                                <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                                    <img class="rounded" src="{{ asset('assets/dashboard/img/nav-icons/pinterest.png') }}" alt="" width="40" height="40" />
                                                    <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Pinterest</p>
                                                </a>
                                            </div>
                                            <div class="col-12">
                                                <a class="btn btn-outline-primary btn-sm mt-4" href="">Show more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="avatar avatar-xl">
                                <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/3-thumb.png') }}" alt="" />
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                            @auth
                                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                                    <a class="dropdown-item fw-bold text-warning" href="">
                                        <span class="fas fa-crown me-1"></span>
                                        <span>Go Pro</span>
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="">Set status</a>
                                    <a class="dropdown-item" href="">Profile &amp; account</a>
                                    <a class="dropdown-item" href="">Feedback</a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="">Settings</a>
                                    <a class="dropdown-item" href="{{ route('auth.logout') }}">Выйти</a>
                                </div>
                            @endauth
                        </div>
                    </li>
                </ul>
            </nav>

            @yield('content')

            <footer class="footer">
                <div class="row g-0 justify-content-between fs-10 mt-4 mb-3">
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2024 &copy; <a href="">Themewagon</a></p>
                    </div>
                    <div class="col-12 col-sm-auto text-center">
                        <p class="mb-0 text-600">v3.23.0</p>
                    </div>
                </div>
            </footer>
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
<script src="{{ asset('assets/dashboard/vendors/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/vendors/list.js/list.min.js') }}"></script>

<script src="{{ asset('assets/dashboard/js/theme.js') }}"></script>

@yield('scripts')

</body>

</html>
