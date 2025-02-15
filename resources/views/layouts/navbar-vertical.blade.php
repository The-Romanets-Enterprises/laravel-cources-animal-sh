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
                <img class="me-2" src="{{ asset('assets/admin/img/icons/spot-illustrations/falcon.png') }}" alt="" width="40" />
                <span class="font-sans-serif text-primary">Меню</span>
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
                            <span class="nav-link-text ps-1">Администрирование</span>
                        </div>
                    </a>
                    <ul class="nav collapse show" id="dashboard">
                        <li class="nav-item">
                            <a class="nav-link active" href="">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Главная</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Аналитика</span>
                                    <span class="badge rounded-pill ms-2 badge-subtle-success">Новое</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Пример блока</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>

                    <a class="nav-link" href="" role="button">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-calendar-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Пример</span>
                        </div>
                    </a>

                    <a class="nav-link dropdown-indicator" href="#example2" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-learning">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="fas fa-graduation-cap"></span>
                            </span>
                            <span class="nav-link-text ps-1">Пример 2</span>
                        </div>
                    </a>
                    <ul class="nav collapse" id="example2">
                        <li class="nav-item">
                            <a class="nav-link dropdown-indicator" href="#example4" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-learning">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Пример 3.1</span>
                                </div>
                            </a>
                            <ul class="nav collapse" id="example4">
                                <li class="nav-item"><a class="nav-link" href="">
                                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Пример 4</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-text ps-1">Пример 3.2</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
