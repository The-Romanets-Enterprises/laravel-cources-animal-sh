<!DOCTYPE html>
<html data-bs-theme="light" lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/admin/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/admin/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/admin/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/admin/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('assets/admin/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">
    <script src="{{ asset('assets/admin/js/config.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/simplebar/simplebar.min.js') }}"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">

    @vite([
        'public/assets/admin/vendors/simplebar/simplebar.min.css',

        'public/assets/admin/css/theme-rtl.css',
        'public/assets/admin/css/theme.css',
        'public/assets/admin/css/user-rtl.css',
        'public/assets/admin/css/user.css',
    ])
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
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4"><a class="d-flex flex-center mb-4" href="../../../index.html"><img class="me-2" src="../../../assets/img/icons/spot-illustrations/falcon.png" alt="" width="58" /><span class="font-sans-serif text-primary fw-bolder fs-4 d-inline-block">falcon</span></a>
                <div class="card">
                    <div class="card-body p-4 p-sm-5">
                        <div class="row flex-between-center mb-2">
                            <div class="col-auto">
                                <h5>Log in</h5>
                            </div>
                            <div class="col-auto fs-10 text-600"><span class="mb-0 undefined">or</span> <span><a href="../../../pages/authentication/simple/register.html">Create an account</a></span></div>
                        </div>
                        <form>
                            <div class="mb-3">
                                <input class="form-control" type="email" placeholder="Email address" />
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" placeholder="Password" />
                            </div>
                            <div class="row flex-between-center">
                                <div class="col-auto">
                                    <div class="form-check mb-0">
                                        <input class="form-check-input" type="checkbox" id="basic-checkbox" checked="checked" />
                                        <label class="form-check-label mb-0" for="basic-checkbox">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-auto"><a class="fs-10" href="">Forgot Password?</a></div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Log in</button>
                            </div>
                        </form>
                        <div class="position-relative mt-4">
                            <hr />
                            <div class="divider-content-center">or log in with</div>
                        </div>
                        <div class="row g-2 mt-2">
                            <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                            <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
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


<div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
    <div class="offcanvas-header settings-panel-header justify-content-between bg-shape">
        <div class="z-1 py-1">
            <div class="d-flex justify-content-between align-items-center mb-1">
                <h5 class="text-white mb-0 me-2"><span class="fas fa-palette me-2 fs-9"></span>Settings</h5>
                <button class="btn btn-primary btn-sm rounded-pill mt-0 mb-0" data-theme-control="reset" style="font-size:12px"> <span class="fas fa-redo-alt me-1" data-fa-transform="shrink-3"></span>Reset</button>
            </div>
            <p class="mb-0 fs-10 text-white opacity-75"> Set your own customized style</p>
        </div>
        <div class="z-1" data-bs-theme="dark">
            <button class="btn-close z-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    </div>
    <div class="offcanvas-body scrollbar-overlay px-x1 h-100" id="themeController">
        <h5 class="fs-9">Color Scheme</h5>
        <p class="fs-10">Choose the perfect color mode for your app.</p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
            <div class="row gx-2">
                <div class="col-4">
                    <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme" />
                    <label class="btn d-inline-block btn-navbar-style fs-10" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/falcon-mode-default.jpg" alt=""/></span><span class="label-text">Light</span></label>
                </div>
                <div class="col-4">
                    <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" />
                    <label class="btn d-inline-block btn-navbar-style fs-10" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/falcon-mode-dark.jpg" alt=""/></span><span class="label-text"> Dark</span></label>
                </div>
                <div class="col-4">
                    <input class="btn-check" id="themeSwitcherAuto" name="theme-color" type="radio" value="auto" data-theme-control="theme" />
                    <label class="btn d-inline-block btn-navbar-style fs-10" for="themeSwitcherAuto"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../../../assets/img/generic/falcon-mode-auto.jpg" alt=""/></span><span class="label-text"> Auto</span></label>
                </div>
            </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-start"><img class="me-2" src="../../../assets/img/icons/left-arrow-from-left.svg" width="20" alt="" />
                <div class="flex-1">
                    <h5 class="fs-9">RTL Mode</h5>
                    <p class="fs-10 mb-0">Switch your language direction </p><a class="fs-10" href="../../../documentation/customization/configuration.html">RTL Documentation</a>
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL" />
            </div>
        </div>
        <hr />
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-start"><img class="me-2" src="../../../assets/img/icons/arrows-h.svg" width="20" alt="" />
                <div class="flex-1">
                    <h5 class="fs-9">Fluid Layout</h5>
                    <p class="fs-10 mb-0">Toggle container layout system </p><a class="fs-10" href="../../../documentation/customization/configuration.html">Fluid Documentation</a>
                </div>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid" />
            </div>
        </div>
        <hr />
        <div class="d-flex align-items-start"><img class="me-2" src="../../../assets/img/icons/paragraph.svg" width="20" alt="" />
            <div class="flex-1">
                <h5 class="fs-9 d-flex align-items-center">Navigation Position</h5>
                <p class="fs-10 mb-2">Select a suitable navigation system for your web application </p>
                <div>
                    <select class="form-select form-select-sm" aria-label="Navbar position" data-theme-control="navbarPosition">
                        <option value="vertical" data-page-url="../../../modules/components/navs-and-tabs/vertical-navbar.html">Vertical</option>
                        <option value="top" data-page-url="../../../modules/components/navs-and-tabs/top-navbar.html">Top</option>
                        <option value="combo" data-page-url="../../../modules/components/navs-and-tabs/combo-navbar.html">Combo</option>
                        <option value="double-top" data-page-url="../../../modules/components/navs-and-tabs/double-top-navbar.html">Double Top</option>
                    </select>
                </div>
            </div>
        </div>
        <hr />
        <h5 class="fs-9 d-flex align-items-center">Vertical Navbar Style</h5>
        <p class="fs-10 mb-0">Switch between styles for your vertical navbar </p>
        <p> <a class="fs-10" href="../../../modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See Documentation</a></p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
            <div class="row gx-2">
                <div class="col-6">
                    <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" />
                    <label class="btn d-block w-100 btn-navbar-style fs-10" for="navbar-style-transparent"> <img class="img-fluid img-prototype" src="../../../assets/img/generic/default.png" alt="" /><span class="label-text"> Transparent</span></label>
                </div>
                <div class="col-6">
                    <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle" />
                    <label class="btn d-block w-100 btn-navbar-style fs-10" for="navbar-style-inverted"> <img class="img-fluid img-prototype" src="../../../assets/img/generic/inverted.png" alt="" /><span class="label-text"> Inverted</span></label>
                </div>
                <div class="col-6">
                    <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle" />
                    <label class="btn d-block w-100 btn-navbar-style fs-10" for="navbar-style-card"> <img class="img-fluid img-prototype" src="../../../assets/img/generic/card.png" alt="" /><span class="label-text"> Card</span></label>
                </div>
                <div class="col-6">
                    <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle" />
                    <label class="btn d-block w-100 btn-navbar-style fs-10" for="navbar-style-vibrant"> <img class="img-fluid img-prototype" src="../../../assets/img/generic/vibrant.png" alt="" /><span class="label-text"> Vibrant</span></label>
                </div>
            </div>
        </div>
        <div class="text-center mt-5"><img class="mb-4" src="../../../assets/img/icons/spot-illustrations/47.png" alt="" width="120" />
            <h5>Like What You See?</h5>
            <p class="fs-10">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a class="mb-3 btn btn-primary" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a>
        </div>
    </div>
</div>


<!-- ===============================================-->
<!--    JavaScripts-->
<!-- ===============================================-->
<script src="{{ asset('assets/admin/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/is/is.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendors/list.js/list.min.js') }}"></script>

<script src="{{ asset('assets/admin/js/theme.js') }}"></script>

</body>

</html>
