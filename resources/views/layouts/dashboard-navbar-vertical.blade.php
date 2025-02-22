<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Переключить навигацию">
                        <span class="navbar-toggle-icon">
                            <span class="toggle-line"></span>
                        </span>
            </button>
        </div>
        <a class="navbar-brand" href="">
            <div class="d-flex align-items-center py-3">
                <img class="me-2" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/falcon.png') }}" alt="" width="20" />
                <span class="font-sans-serif text-primary fs-8">AnimalSafe</span>
            </div>
        </a>
    </div>

    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">

                @if($role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#admin" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="dashboard">
                            <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-chart-pie"></span>
                                    </span>
                                <span class="nav-link-text ps-1">Администрирование</span>
                            </div>
                        </a>
                        <ul class="nav collapse show" id="admin">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Главная</span>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-indicator" href="#management" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Управление</span>
                                    </div>
                                </a>
                                <ul class="nav collapse" id="management">
                                    <li class="nav-item">
                                        <a class="nav-link dropdown-indicator" href="#main-site" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text ps-1">Основной сайт</span>
                                            </div>
                                        </a>
                                        <ul class="nav collapse" id="main-site">
                                            <li class="nav-item">
                                                <a class="nav-link dropdown-indicator" href="#template1" data-bs-toggle="collapse" aria-expanded="false" aria-controls="multi-level">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Шаблон №1</span>
                                                    </div>
                                                </a>
                                                <ul class="nav collapse" id="template1">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="">
                                                            <div class="d-flex align-items-center">
                                                                <span class="nav-link-text ps-1">Шаблон №1.1</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link dropdown-indicator" href="#template2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="level-four">
                                                            <div class="d-flex align-items-center">
                                                                <span class="nav-link-text ps-1">Шаблон №2</span>
                                                            </div>
                                                        </a>
                                                        <ul class="nav collapse" id="template2">
                                                            <li class="nav-item">
                                                                <a class="nav-link" href="">
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="nav-link-text ps-1">Шаблон №2.1</span>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link dropdown-indicator" href="#template3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="item-7">
                                                                    <div class="d-flex align-items-center">
                                                                        <span class="nav-link-text ps-1">Шаблон №3</span>
                                                                    </div>
                                                                </a>
                                                                <ul class="nav collapse" id="template3">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" href="">
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="nav-link-text ps-1">Шаблон №3.1</span>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                    <li class="nav-item">
                                                                        <a class="nav-link" href="">
                                                                            <div class="d-flex align-items-center">
                                                                                <span class="nav-link-text ps-1">Шаблон №3.2</span>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="">
                                                    <div class="d-flex align-items-center">
                                                        <span class="nav-link-text ps-1">Шаблон №4</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <a class="nav-link" href="">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text ps-1">Персонал</span>
                                            </div>
                                        </a>
                                        <a class="nav-link" href="">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-text ps-1">Пользователи</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Аналитика</span>
                                        <span class="badge rounded-pill ms-2 badge-subtle-dark">BETA</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif($role === 'employee')
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Раздел сотрудника</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link" href="" role="button">
                            <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <span class="fas fa-thumbtack"></span>
                                        </span>
                                <span class="nav-link-text ps-1">Главная</span>
                            </div>
                        </a>
                        <a class="nav-link dropdown-indicator" href="#applications" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                            <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-flag"></span>
                                    </span>
                                <span class="nav-link-text ps-1">Заявки</span>
                                <span class="badge rounded-pill ms-2 badge-subtle-dark">BETA</span>
                            </div>
                        </a>
                        <ul class="nav collapse" id="applications">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Все</span>
                                    </div>
                                </a>
                                <a class="nav-link" href="">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Новые</span>
                                        <span class="badge rounded-pill ms-2 badge-subtle-warning">3</span>
                                    </div>
                                </a>
                                <a class="nav-link" href="">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Одобренные</span>
                                        <span class="badge rounded-pill ms-2 badge-subtle-success">13</span>
                                    </div>
                                </a>
                                <a class="nav-link" href="">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Отклонённые</span>
                                        <span class="badge rounded-pill ms-2 badge-subtle-danger">5</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <a class="nav-link" href="" role="button">
                            <div class="d-flex align-items-center">
                                        <span class="nav-link-icon">
                                            <span class="fas fa-comments"></span>
                                        </span>
                                <span class="nav-link-text ps-1">Обращения</span>
                                <span class="badge rounded-pill ms-2 badge-subtle-warning">7</span>
                            </div>
                        </a>
                        <a class="nav-link dropdown-indicator" href="#moderation" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="forms">
                            <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-chalkboard-teacher"></span>
                                    </span>
                                <span class="nav-link-text ps-1">Модерация</span>
                                <span class="badge rounded-pill ms-2 badge-subtle-primary">Новое</span>
                            </div>
                        </a>
                        <ul class="nav collapse" id="moderation">
                            <li class="nav-item">
                                <a class="nav-link" href="">
                                    <div class="d-flex align-items-center">
                                        <span class="nav-link-text ps-1">Смена данных</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                            <div class="col-auto navbar-vertical-label">Пользователь</div>
                            <div class="col ps-0">
                                <hr class="mb-0 navbar-vertical-divider" />
                            </div>
                        </div>
                        <a class="nav-link" href="" role="button">
                            <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-user"></span>
                                    </span>
                                <span class="nav-link-text ps-1">Профиль</span>
                            </div>
                        </a>
                        <a class="nav-link" href="" role="button">
                            <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-edit"></span>
                                    </span>
                                <span class="nav-link-text ps-1">Мои заявки</span>
                            </div>
                        </a>
                        <a class="nav-link" href="" role="button">
                            <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="far fa-comment"></span>
                                    </span>
                                <span class="nav-link-text ps-1">Сообщения</span>
                                <span class="badge rounded-pill ms-2 badge-subtle-primary">Новое</span>
                            </div>
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-1 mb-1">
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="" role="button">
                        <div class="d-flex align-items-center">
                                    <span class="nav-link-icon">
                                        <span class="fas fa-question-circle"></span>
                                    </span>
                            <span class="nav-link-text ps-1">Помощь</span>
                            <span class="badge rounded-pill ms-2 badge-subtle-dark">BETA</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
