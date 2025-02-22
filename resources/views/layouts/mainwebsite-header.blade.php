<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('assets/mainwebsite/img/logo.png') }}" alt="">
            <h1 class="sitename">AnimalSafe</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <a href="#home" class="active">Главная</a>
                </li>
                <li class="dropdown">
                    <a href="">
                        <span>О нас</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="">Наши специалисты</a>
                        </li>
                        <li>
                            <a href="">О компании</a>
                        </li>
                        <!-- <li class="dropdown">
                            <a href="">
                                <span>Deep Dropdown</span>
                                <i class="bi bi-chevron-down toggle-dropdown"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="">Deep Dropdown 1</a>
                                </li>
                                <li>
                                    <a href="">Deep Dropdown 2</a>
                                </li>
                                <li>
                                    <a href="">Deep Dropdown 3</a>
                                </li>
                                <li>
                                    <a href="">Deep Dropdown 4</a>
                                </li>
                                <li>
                                    <a href="">Deep Dropdown 5</a>
                                </li>
                            </ul>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="">Контакты</a>
                </li>
                <li class="dropdown">
                    <a href="">
                        <span>Язык: Русский</span>
                        <div class="ms-1 mb-1">
                            <img src="{{ asset('assets/mainwebsite/css/flags/1x1/ru.svg') }}" width="16" height="16" alt="" />
                        </div>
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                                <div class="mb-1">
                                    <img src="{{ asset('assets/mainwebsite/css/flags/1x1/ru.svg') }}" width="16" height="16" alt="" />
                                </div>
                                Русский (Russian)
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="mb-1">
                                    <img src="{{ asset('assets/mainwebsite/css/flags/1x1/by.svg') }}" width="16" height="16" alt="" />
                                </div>
                                Белорусский (BE)
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <div class="mb-1">
                                    <img src="{{ asset('assets/mainwebsite/css/flags/1x1/us.svg') }}" width="16" height="16" alt="" />
                                </div>
                                Английский (ENG)
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="btn-getstarted" href="{{ route('auth.login') }}">Войти / Регистрация</a>
    </div>
</header>
