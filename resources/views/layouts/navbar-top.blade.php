<nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
        <span class="navbar-toggle-icon">
            <span class="toggle-line"></span>
        </span>
    </button>
    <a class="navbar-brand me-1 me-sm-3" href="">
        <div class="d-flex align-items-center">
            <img class="me-2" src="{{ asset('assets/admin/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" />
            <span class="font-sans-serif text-primary">Меню</span>
        </div>
    </a>

    <ul class="navbar-nav align-items-center d-none d-lg-block">
        <li class="nav-item">
            <div class="search-box" data-list='{"valueNames":["title"]}'>
                <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input fuzzy-search" type="search" placeholder="Поиск..." aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>
                </form>
                <div class="btn-close-falcon-container position-absolute end-0 top-50 translate-middle shadow-none" data-bs-dismiss="search">
                    <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
                </div>
                <div class="dropdown-menu border font-base start-0 mt-2 py-0 overflow-hidden w-100">
                    <div class="scrollbar list py-3" style="max-height: 24rem;">
                        <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs-11 pt-0 pb-2">Недавно просмотренные</h6>
                        <a class="dropdown-item fs-10 px-x1 py-1 hover-primary" href="">
                            <div class="d-flex align-items-center">
                                <span class="fas fa-circle me-2 text-300 fs-11"></span>
                                <div class="fw-normal title">Аналитика</div>
                            </div>
                        </a>
                        <a class="dropdown-item fs-10 px-x1 py-1 hover-primary" href="">
                            <div class="d-flex align-items-center">
                                <span class="fas fa-circle me-2 text-300 fs-11"></span>
                                <div class="fw-normal title">Пример 2
                                    <span class="fas fa-chevron-right mx-1 text-500 fs-11" data-fa-transform="shrink-2"></span>Пример 3.2
                                </div>
                            </div>
                        </a>

                        <hr class="text-200 dark__text-900" />
                        <h6 class="dropdown-header fw-medium text-uppercase px-x1 fs-11 pt-0 pb-2">Members</h6>
                        <a class="dropdown-item px-x1 py-2" href="">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-l status-online me-2">
                                    <img class="rounded-circle" src="{{ asset('assets/admin/img/team/1.jpg') }}" alt="" />
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 title">Павел Романец</h6>
                                    <p class="fs-11 mb-0 d-flex">Технический руководитель</p>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item px-x1 py-2" href="">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-l me-2">
                                    <img class="rounded-circle" src="{{ asset('assets/admin/img/team/2.jpg') }}" alt="" />
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 title">Владислав Яковицкий</h6>
                                    <p class="fs-11 mb-0 d-flex">Разработчик</p>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item px-x1 py-2" href="">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-l me-2">
                                    <img class="rounded-circle" src="{{ asset('assets/admin/img/team/3.jpg') }}" alt="" />
                                </div>
                                <div class="flex-1">
                                    <h6 class="mb-0 title">Вероника Степановна</h6>
                                    <p class="fs-11 mb-0 d-flex">Модератор</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="text-center mt-n3">
                        <p class="fallback fw-bold fs-8 d-none">Результат не найден.</p>
                    </div>
                </div>
            </div>
        </li>
    </ul>
    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
        <li class="nav-item ps-2 pe-0">
            <div class="dropdown theme-control-dropdown">
                <a class="nav-link d-flex align-items-center dropdown-toggle fa-icon-wait fs-9 pe-1 py-0" href="" role="button" id="themeSwitchDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-sun fs-7" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="light"></span>
                    <span class="fas fa-moon fs-7" data-fa-transform="shrink-3" data-theme-dropdown-toggle-icon="dark"></span>
                    <span class="fas fa-adjust fs-7" data-fa-transform="shrink-2" data-theme-dropdown-toggle-icon="auto"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-caret border py-0 mt-3" aria-labelledby="themeSwitchDropdown">
                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                        <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="light" data-theme-control="theme">
                            <span class="fas fa-sun"></span>Light
                            <span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                        </button>

                        <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="dark" data-theme-control="theme">
                            <span class="fas fa-moon" data-fa-transform=""></span>Dark
                            <span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                        </button>

                        <button class="dropdown-item d-flex align-items-center gap-2" type="button" value="auto" data-theme-control="theme">
                            <span class="fas fa-adjust" data-fa-transform=""></span>Auto
                            <span class="fas fa-check dropdown-check-icon ms-auto text-600"></span>
                        </button>
                    </div>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-hide-on-body-scroll="data-hide-on-body-scroll"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end dropdown-menu-card dropdown-menu-notification dropdown-caret-bg" aria-labelledby="navbarDropdownNotification">
                <div class="card card-notification shadow-none">
                    <div class="card-header">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-auto">
                                <h6 class="card-header-title mb-0">Уведомления</h6>
                            </div>
                            <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="">Отметить все как прочитанное</a></div>
                        </div>
                    </div>
                    <div class="scrollbar-overlay" style="max-height:19rem">
                        <div class="list-group list-group-flush fw-normal fs-10">
                            <div class="list-group-title border-bottom">НОВОЕ</div>
                            <div class="list-group-item">
                                <a class="notification notification-flush notification-unread" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                            <img class="rounded-circle" src="{{ asset('assets/admin/img/team/1-thumb.png') }}" alt="" />
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1"><strong>Вероника Степановна</strong> ответил(-а) на ваш комментарий : "Наконец-то 😍"</p>
                                        <span class="notification-time">
                                            <span class="me-2" role="img" aria-label="Emoji">💬</span>Только что
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="list-group-item">
                                <a class="notification notification-flush notification-unread" href="#!">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                            <div class="avatar-name rounded-circle"><span>ИА</span></div>
                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1">
                                            <strong>Иван Антонов</strong> отреагировал на
                                            <strong>Ваш</strong> статус
                                        </p>
                                        <span class="notification-time">
                                            <span class="me-2 fab fa-gratipay text-danger"></span>9ч. назад
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <div class="list-group-title border-bottom">РАНЕЕ</div>
                            <div class="list-group-item">
                                <a class="notification notification-flush" href="">
                                    <div class="notification-avatar">
                                        <div class="avatar avatar-2xl me-3">
                                            <img class="rounded-circle" src="{{ asset('assets/admin/img/icons/weather-sm.jpg') }}" alt="" />

                                        </div>
                                    </div>
                                    <div class="notification-body">
                                        <p class="mb-1">Прогноз на сегодня показывает минимум 20&#8451; в Минске. Смотрите сегодняшнюю погоду.</p>
                                        <span class="notification-time">
                                            <span class="me-2" role="img" aria-label="Emoji">🌤️</span>1д.
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center border-top">
                        <a class="card-link d-block" href="">Показать все</a>
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
                                        <img class="rounded" src="{{ asset('assets/admin/img/nav-icons/github-light.png') }}" alt="" width="40" height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Github</p>
                                    </a>
                                </div>

                                <div class="col-12">
                                    <hr class="my-3 mx-n3 bg-200" />
                                </div>

                                <div class="col-4">
                                    <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                        <img class="rounded" src="{{ asset('assets/admin/img/nav-icons/linkedin.png') }}" alt="" width="40" height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Linkedin</p>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a class="d-block hover-bg-200 px-2 py-3 rounded-3 text-center text-decoration-none" href="" target="_blank">
                                        <img class="rounded" src="{{ asset('assets/admin/img/nav-icons/twitter.png') }}" alt="" width="40" height="40" />
                                        <p class="mb-0 fw-medium text-800 text-truncate fs-11 pt-1">Twitter</p>
                                    </a>
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
                    <img class="rounded-circle" src="{{ asset('assets/admin/img/team/3-thumb.png') }}" alt="" />
                </div>
            </a>
            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                @auth
                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                        <a class="dropdown-item fw-bold text-warning" href="">
                            <span class="fas fa-crown me-1"></span>
                            <span>Администратор</span>
                        </a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="">Статус заявки</a>
                        <a class="dropdown-item" href="">Профиль &amp; аккаунт</a>
                        <a class="dropdown-item" href="">Обратная связь</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="">Настройки</a>
                        <a class="dropdown-item" href="{{ route('admin.logout') }}">Выйти</a>
                    </div>
                @endauth
            </div>
        </li>
    </ul>
</nav>
