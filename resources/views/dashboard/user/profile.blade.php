@extends('layouts.dashboard')

@section('title') {{ $title ?? 'Профиль' }} @endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{ asset('assets/dashboard/img/generic/template.jpg') }});">
            </div>
            <div class="avatar avatar-5xl avatar-profile">
                <img class="rounded-circle img-thumbnail shadow-sm" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" width="200" alt="" />
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">{{ ucfirst($user->name) }} {{ ucfirst($user->lastname) }}
                        <span data-bs-toggle="tooltip" data-bs-placement="right" title="Верифицированная страница">
                                <small class="fa fa-check-circle text-primary-verif" data-fa-transform="shrink-4 down-2"></small>
                        </span>
                    </h4>
                    <h5 class="fs-9 fw-normal">Место для цитаты</h5>
                    <p class="text-500">Был в сети: 5 минут назад</p>
                    <button class="btn btn-falcon-primary btn-sm px-3" type="button">Подписаться</button>
                    <button class="btn btn-falcon-default btn-sm px-3 ms-2" type="button">Написать сообщение</button>
                    <div class="border-bottom border-dashed my-4 d-lg-none"></div>
                </div>
                <div class="col ps-2 ps-lg-3">
                    <a class="d-flex align-items-center mb-2" href="">
                        <span class="fas fa-user-circle fs-6 me-2 text-700" data-fa-transform="grow-2"></span>
                        <div class="flex-1">
                            <h6 class="mb-0">Подписчиков (15)</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
                <h5 class="mb-0">О себе</h5>
            </div>
            <div class="card-body text-justify">
                <p class="mb-0 text-1000">Описание профиля, шаблон текста.</p>
                <div class="collapse show" id="profile-intro">
                    <p class="mt-3 text-1000">Абзац текста №1.</p>
                    <p class="text-1000">Абзац текста №2.</p>
                    <p class="text-1000 mb-0">Абзац текста №3.</p>
                </div>
            </div>
            <div class="card-footer bg-body-tertiary p-0 border-top">
                <button class="btn btn-link d-block w-100 btn-intro-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#profile-intro" aria-expanded="true" aria-controls="profile-intro">Показать
                    <span class="less">меньше<span class="fas fa-chevron-up ms-2 fs-11"></span></span>
                    <span class="full">больше<span class="fas fa-chevron-down ms-2 fs-11"></span></span>
                </button>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header bg-body-tertiary d-flex justify-content-between">
                <h5 class="mb-0">Журнал активностей</h5>
                <a class="font-sans-serif" href="">Все активности</a>
            </div>
            <div class="card-body fs-10 p-0">
                <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="">
                    <div class="notification-body">
                        <p class="mb-1">Активность №1</p>
                        <span class="notification-time">Сегодня, 15:15</span>
                    </div>
                </a>

                <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="">
                    <div class="notification-body">
                        <p class="mb-1">Активность №2</p>
                        <span class="notification-time">Сегодня, 15:10</span>
                    </div>
                </a>

                <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="">
                    <div class="notification-body">
                        <p class="mb-1">Активность №3</p>
                        <span class="notification-time">Сегодня, 15:05</span>
                    </div>
                </a>

                <a class="notification border-x-0 border-bottom-0 border-300 rounded-top-0" href="">
                    <div class="notification-body">
                        <p class="mb-1">Активность №4</p>
                        <span class="notification-time">Сегодня, 15:00</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-body-tertiary">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0" id="followers">На кого подписан {{ ucfirst($user->name) }}!</h5>
                </div>
                <div class="col text-end">
                    <a class="font-sans-serif" href="">Просмотреть всех</a>
                </div>
            </div>
        </div>
        <div class="card-body bg-body-tertiary px-1 py-0">
            <div class="row g-0 text-center fs-10">
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100">
                        <a href="">
                            <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" width="100" />
                        </a>
                        <h6 class="mb-1">
                            <a href="">Иван Иванов</a>
                        </h6>
                        <p class="fs-11 mb-1">
                            <a class="text-700" href="">Пользователь</a>
                        </p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100">
                        <a href="">
                            <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" width="100" />
                        </a>
                        <h6 class="mb-1">
                            <a href="">Иван Иванов</a>
                        </h6>
                        <p class="fs-11 mb-1">
                            <a class="text-700" href="">Пользователь</a>
                        </p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100">
                        <a href="">
                            <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" width="100" />
                        </a>
                        <h6 class="mb-1">
                            <a href="">Иван Иванов</a>
                        </h6>
                        <p class="fs-11 mb-1">
                            <a class="text-700" href="">Пользователь</a>
                        </p>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white dark__bg-1100 p-3 h-100">
                        <a href="">
                            <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" width="100" />
                        </a>
                        <h6 class="mb-1">
                            <a href="">Иван Иванов</a>
                        </h6>
                        <p class="fs-11 mb-1">
                            <a class="text-700" href="">Пользователь</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/vendors/glightbox/glightbox.min.js') }}"></script>
@endsection
