@extends('layouts.dashboard')

@section('title') {{ $title ?? 'Новости' }} @endsection

@section('content')
    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-header bg-body-tertiary overflow-hidden">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-m">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                        </div>
                        <div class="flex-1 ms-2">
                            <h5 class="mb-0 fs-9">Создать пост</h5>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <form>
                        <textarea class="shadow-none form-control rounded-0 resize-none px-x1 border-y-0 border-200" placeholder="What do you want to talk about?" rows="4"></textarea>
                        <div class="d-flex align-items-center ps-x1 border border-200">
                            <label class="text-nowrap mb-0 me-2" for="hash-tags">
                                <span class="fas fa-plus me-1 fs-11"></span>
                                <span class="fw-medium fs-10">Добавьте хештеги</span>
                            </label>
                            <input class="form-control border-0 fs-10 shadow-none" id="hash-tags" type="text" placeholder="Help the right person to see" />
                        </div>
                        <div class="row g-0 justify-content-between mt-3 px-x1 pb-3">
                            <div class="col">
                                <button class="btn btn-tertiary btn-sm rounded-pill shadow-none d-inline-flex align-items-center fs-10 mb-0 me-1" type="button">
                                    <img class="cursor-pointer" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/image.svg') }}" width="17" alt="" />
                                    <span class="ms-2 d-none d-md-inline-block">Добавить изображение</span>
                                </button>
                            </div>
                            <div class="col-auto">
                                <div class="dropdown d-inline-block me-1">
                                    <button class="btn btn-sm dropdown-toggle px-1" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="fas fa-globe-americas"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="">Для всех</a>
                                        <a class="dropdown-item" href="">Для друзей</a>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm px-4 px-sm-5" type="submit">Опубликовать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                    <div class="row justify-content-between">
                        <div class="col">
                            <div class="d-flex">
                                <div class="avatar avatar-2xl status-online">
                                    <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                                </div>

                                <div class="flex-1 align-self-center ms-2">
                                    <p class="mb-1 lh-1">
                                        <a class="fw-semi-bold" href="">Иван Иванов</a> опубликовал новый пост</p>
                                    <p class="mb-0 fs-10">3 часа назад</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="dropdown font-sans-serif btn-reveal-trigger">
                                <button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="post-album-action" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fas fa-ellipsis-h fs-10"></span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end py-3" aria-labelledby="post-album-action">
                                    <a class="dropdown-item" href="">Уже видел</a>

                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item text-warning" href="">Архивировать</a>
                                    <a class="dropdown-item text-danger" href="">Пожаловаться</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body overflow-hidden">
                    <p>Шаблонный текст поста.</p>
                    <div class="row mx-n1">
                        <div class="col-6 p-1">
                            <a href="{{ asset('assets/dashboard/img/generic/4.jpg') }}" data-gallery="gallery-1">
                                <img class="img-fluid rounded" src="{{ asset('assets/dashboard/img/generic/4.jpg') }}" alt="" />
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-body-tertiary pt-0">
                    <div class="border-bottom border-200 fs-10 py-3">
                        <a class="text-700" href="">10 Лайков</a> &bull; <a class="text-700" href="">2 Комментария</a>
                    </div>
                    <div class="row g-0 fw-semi-bold text-center py-2 fs-10">
                        <div class="col-auto">
                            <a class="rounded-2 d-flex align-items-center me-3" href="">
                                <img src="{{ asset('assets/dashboard/img/icons/spot-illustrations/like-active.png') }}" width="20" alt="" />
                                <span class="ms-1">Нравится</span>
                            </a>
                        </div>
                        <div class="col-auto">
                            <a class="rounded-2 d-flex align-items-center me-3" href="">
                                <img src="{{ asset('assets/dashboard/img/icons/spot-illustrations/comment-active.png') }}" width="20" alt="" />
                                <span class="ms-1">Комментарий</span>
                            </a>
                        </div>
                        <div class="col-auto d-flex align-items-center">
                            <a class="rounded-2 text-700 d-flex align-items-center" href="">
                                <img src="{{ asset('assets/dashboard/img/icons/spot-illustrations/share-inactive.png') }}" width="20" alt="" />
                                <span class="ms-1">Поделиться</span>
                            </a>
                        </div>
                    </div>
                    <form class="d-flex align-items-center border-top border-200 pt-3">
                        <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                        </div>
                        <input class="form-control rounded-pill ms-2 fs-10" type="text" placeholder="Оставьте комментарий..." />
                    </form>
                    <div class="d-flex mt-3">
                        <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                        </div>

                        <div class="flex-1 ms-2 fs-10">
                            <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="">Иван Иванов</a> Текст комментария №1</p>
                            <div class="px-2"><a href="">Ответить</a> &bull; 7 минут назад </div>
                        </div>
                    </div>
                    <div class="d-flex mt-3">
                        <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />

                        </div>
                        <div class="flex-1 ms-2 fs-10">
                            <p class="mb-1 bg-200 rounded-3 p-2"><a class="fw-semi-bold" href="">Анна Алексеевна</a> Текст комментария №2</p>
                            <div class="px-2"><a href="">Ответить</a> &bull; 21 минуту назад </div>
                        </div>
                    </div>
                    <a class="fs-10 text-700 d-inline-block mt-2" href="">Показать больше комментариев (2 из 8)</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-body fs-10">
                    <div class="d-flex">
                        <span class="fas fa-gift fs-9 text-warning"></span>
                        <div class="flex-1 ms-2"><a class="fw-semi-bold" href="">Иван Иванов</a> празднует сегодня день рождения!</div>
                    </div>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-header bg-body-tertiary d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Возможно Вы знакомы</h5>
                    <a class="fs-10" href="">Показать всех</a>
                </div>

                <div class="card-body">
                    <div class="d-flex">
                        <div class="avatar avatar-3xl">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                        </div>
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0">
                                <a href="">Иван Иванов</a>
                            </h6>
                            <button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button">
                                <span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span>
                                <span class="fs-10">Добавить в друзья</span>
                            </button>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="avatar avatar-3xl">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                        </div>
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0">
                                <a href="">Иван Иванов</a>
                            </h6>
                            <button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button">
                                <span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span>
                                <span class="fs-10">Добавить в друзья</span>
                            </button>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="avatar avatar-3xl">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                        </div>
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0">
                                <a href="">Иван Иванов</a>
                            </h6>
                            <button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button">
                                <span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span>
                                <span class="fs-10">Добавить в друзья</span>
                            </button>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="avatar avatar-3xl">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                        </div>
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0">
                                <a href="">Иван Иванов</a>
                            </h6>
                            <button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button">
                                <span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span>
                                <span class="fs-10">Добавить в друзья</span>
                            </button>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="avatar avatar-3xl">
                            <img class="rounded-circle" src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" alt="" />
                        </div>
                        <div class="flex-1 ms-2">
                            <h6 class="mb-0">
                                <a href="">Иван Иванов</a>
                            </h6>
                            <button class="btn btn-tertiary btn-sm py-0 mt-1 border" type="button">
                                <span class="fas fa-user-plus" data-fa-transform="shrink-5 left-2"></span>
                                <span class="fs-10">Добавить в друзья</span>
                            </button>
                            <div class="border-bottom border-dashed my-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/vendors/plyr/plyr.polyfilled.min.js') }}"></script>
@endsection
