@extends('layouts.dashboard')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-3 btn-reveal-trigger">
                <div class="card-header position-relative min-vh-25 mb-8">
                    <div class="cover-image">
                        <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{ asset('assets/dashboard/img/generic/template.jpg') }});"></div>

                        <input class="d-none" id="upload-cover-image" type="file" />
                        <label class="cover-image-file-input" for="upload-cover-image">
                            <span class="fas fa-camera me-2"></span>
                            <span>Change cover photo</span>
                        </label>
                    </div>
                    <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                        <div class="h-100 w-100 rounded-circle overflow-hidden position-relative">
                            <img src="{{ asset('assets/dashboard/img/team/avatar.jpg') }}" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail" />
                            <input class="d-none" id="profile-image" type="file" />
                            <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image">
                                <span class="bg-holder overlay overlay-0"></span>
                                <span class="z-1 text-white dark__text-white text-center fs-10">
                                    <span class="fas fa-camera"></span>
                                    <span class="d-block">Update</span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-8 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Настройки профиля</h5>
                </div>
                <div class="card-body bg-body-tertiary">
                    <form class="row g-3">
                        <div class="col-lg-6">
                            <label class="form-label" for="first-name">Имя</label>
                            <label class="form-label text-success">*</label>
                            <input class="form-control" id="first-name" type="text" value="" />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="last-name">Фамилия</label>
                            <label class="form-label text-success">*</label>
                            <input class="form-control" id="last-name" type="text" value="" />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="email">Почта</label>
                            <label class="form-label text-success">*</label>
                            <input class="form-control" id="email" type="text" value="" />
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label" for="phone">Телефон</label>
                            <input class="form-control" id="phone" type="text" value="" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="status">Статус</label>
                            <input class="form-control" id="status" type="text" value="" />
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="status">Часовой пояс</label>
                            <label class="form-label text-success">*</label>
                            <select class="form-select form-select-sm" aria-label="Bulk actions">
                                <option value="Delete">GMT+3 (Москва, Россия)</option>
                            </select>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label" for="about">О себе</label>
                            <textarea class="form-control" id="about" name="intro" cols="30" rows="13">Шаблон текста о себе</textarea>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Обновить информацию</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Удалить учётную запись</h5>
                </div>
                <div class="card-body bg-body-tertiary">
                    <h5 class="fs-9">Я хочу удалить свой аккаунт</h5>
                    <p class="fs-10">Удалённая учётная запись восстановлению не подлежит. Будьте внимательны.</p>
                    <a class="btn btn-falcon-danger d-block" href="">Удалить аккаунт</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4 ps-lg-2">
            <div class="sticky-sidebar">
                <div class="card mb-3 overflow-hidden">
                    <div class="card-header">
                        <h5 class="mb-0">Приватность <span class="badge rounded-pill ms-2 badge-subtle-dark">BETA</span></h5>
                    </div>
                    <div class="card-body bg-body-tertiary">
                        <h6 class="fw-bold">Who can see your profile ?<span class="fs-11 ms-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Only The group of selected people can see your profile"><span class="fas fa-question-circle"></span></span></h6>
                        <div class="ps-2">
                            <div class="form-check mb-0 lh-1">
                                <input class="form-check-input" type="radio" value="" id="everyone" name="view-settings" />
                                <label class="form-check-label mb-0" for="everyone">Everyone
                                </label>
                            </div>
                            <div class="form-check mb-0 lh-1">
                                <input class="form-check-input" type="radio" value="" id="my-followers" checked="checked" name="view-settings" />
                                <label class="form-check-label mb-0" for="my-followers">My followers
                                </label>
                            </div>
                            <div class="form-check mb-0 lh-1">
                                <input class="form-check-input" type="radio" value="" id="only-me" name="view-settings" />
                                <label class="form-check-label mb-0" for="only-me">Only me
                                </label>
                            </div>
                        </div>
                        <h6 class="mt-2 fw-bold">Who can tag you ?<span class="fs-11 ms-1 text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Only The group of selected people can tag you"><span class="fas fa-question-circle"></span></span></h6>
                        <div class="ps-2">
                            <div class="form-check mb-0 lh-1">
                                <input class="form-check-input" type="radio" value="" id="tag-everyone" name="tag-settings" />
                                <label class="form-check-label mb-0" for="tag-everyone">Everyone
                                </label>
                            </div>
                            <div class="form-check mb-0 lh-1">
                                <input class="form-check-input" type="radio" value="" id="group-members" checked="checked" name="tag-settings" />
                                <label class="form-check-label mb-0" for="group-members">Group Members
                                </label>
                            </div>
                        </div>
                        <div class="border-dashed-bottom my-3"></div>
                        <div class="form-check mb-0 lh-1">
                            <input class="form-check-input" type="checkbox" id="userSettings1" checked="checked" />
                            <label class="form-check-label mb-0" for="userSettings1">Allow users to show your followers
                            </label>
                        </div>
                        <div class="form-check mb-0 lh-1">
                            <input class="form-check-input" type="checkbox" id="userSettings2" checked="checked" />
                            <label class="form-check-label mb-0" for="userSettings2">Allow users to show your email
                            </label>
                        </div>
                        <div class="form-check mb-0 lh-1">
                            <input class="form-check-input" type="checkbox" id="userSettings3" />
                            <label class="form-check-label mb-0" for="userSettings3">Allow users to show your experiences
                            </label>
                        </div>
                        <div class="border-bottom border-dashed my-3"></div>
                        <div class="form-check form-switch mb-0 lh-1">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" checked="checked" />
                            <label class="form-check-label mb-0" for="flexSwitchCheckDefault">Make your phone number visible
                            </label>
                        </div>
                        <div class="form-check form-switch mb-0 lh-1">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" />
                            <label class="form-check-label mb-0" for="flexSwitchCheckChecked">Allow user to follow you
                            </label>
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Сменить пароль</h5>
                    </div>
                    <div class="card-body bg-body-tertiary">
                        <form>
                            <div class="mb-3">
                                <label class="form-label" for="old-password">Старый пароль</label>
                                <input class="form-control" id="old-password" type="password" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="new-password">Новый пароль</label>
                                <input class="form-control" id="new-password" type="password" />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="confirm-password">Подтвердите пароль</label>
                                <input class="form-control" id="confirm-password" type="password" />
                            </div>
                            <button class="btn btn-primary d-block w-100" type="submit">Обновить пароль</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/dashboard/vendors/flatpickr/flatpickr.min.js') }}"></script>
@endsection
