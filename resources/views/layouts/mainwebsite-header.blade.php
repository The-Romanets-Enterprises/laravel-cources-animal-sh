<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="{{ route('mainwebsite.index') }}" class="logo d-flex align-items-center me-auto">
            <img src="{{ asset('assets/mainwebsite/img/logo.png') }}" alt="">
            <h1 class="sitename">{{ __('general.project-name') }}</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li>
                    <a class="{{ Route::is('mainwebsite.index') ? 'active' : '' }}" href="{{ route('mainwebsite.index') }}" >{{ __('mainwebsite.header.home') }}</a>
                </li>
                <li class="dropdown">
                    <a class="" href="">
                        <span>{{ __('mainwebsite.header.about-drop-links.about-us') }}</span>
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('mainwebsite.our-specialists') }}">{{ __('mainwebsite.header.about-drop-links.our-specialists') }}</a>
                        </li>
                        <li>
                            <a href="">{{ __('mainwebsite.header.about-drop-links.about-company') }}</a>
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
                    <a class="{{ Route::is('mainwebsite.contacts') ? 'active' : '' }}" href="{{ route('mainwebsite.contacts') }}">{{ __('mainwebsite.header.contacts') }}</a>
                </li>
                <li class="dropdown">
                    <a href="">
                        <span>{{ __('general.language-drop-links.language') }}: {{ __('general.language-drop-links.russian') }}</span>
                        <div class="ms-1 mb-1">
                            <img src="{{ asset('assets/mainwebsite/img/flags/russian.png') }}" width="18" height="18" alt="" />
                        </div>
                        <i class="bi bi-chevron-down toggle-dropdown"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="">
                                {{ __('general.language-drop-links.russian') }}
                                <img src="{{ asset('assets/mainwebsite/img/flags/russian.png') }}" width="18" height="18" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="">
                                {{ __('general.language-drop-links.belarusian') }}
                                <img src="{{ asset('assets/mainwebsite/img/flags/belarusian.png') }}" width="18" height="18" alt="" />
                            </a>
                        </li>
                        <li>
                            <a href="">
                                {{ __('general.language-drop-links.english') }}
                                <img src="{{ asset('assets/mainwebsite/img/flags/english.png') }}" width="18" height="18" alt="" />
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        @if(Auth::guest())
            <!-- Видно только для НЕавторизованных пользователей -->
            <a class="btn-getstarted" href="{{ route('auth.sign-in') }}">{{ __('mainwebsite.header.button') }}</a>
        @else
            <!-- Видно только для авторизованных пользователей -->
            <a class="btn-getstarted" href="{{ route(auth()->user()->isAdmin() ? 'dashboard.admin.home' : (auth()->user()->isEmployee() ? 'dashboard.employee.home' : 'dashboard.user.home')) }}">
                <i class="bi bi-person-fill"></i>
                {{ __('general.deal-you') }}: <strong>{{ auth()->user()->name }}</strong>
            </a>
        @endif
    </div>
</header>
