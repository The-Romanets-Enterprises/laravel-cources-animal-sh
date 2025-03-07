@extends('layouts.dashboard')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <h5 class="mb-2">
                        <a href="">Имя Фамилия</a>
                    </h5>
                </div>
                <div class="col-auto d-none d-sm-block">
                    <h6 class="text-uppercase text-600">Пользователь<span class="fas fa-user ms-2"></span></h6>
                </div>
            </div>
        </div>
        <div class="card-body border-top">
            <div class="d-flex">
                <span class="fas fa-user text-success me-2" data-fa-transform="down-5"></span>
                <div class="flex-1">
                    <p class="mb-0">Пользователь создал заявку на смену данных</p>
                    <p class="fs-10 mb-0 text-600">06.03.2025, 10:00</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0">Детали</h5>
                </div>
            </div>
        </div>
        <div class="card-body bg-body-tertiary border-top">
            <div class="row">
                <div class="col-lg col-xxl-5">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">Информация до</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Имя:</p>
                        </div>
                        <div class="col">Имя</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Фамилия:</p>
                        </div>
                        <div class="col">Фамилия</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Статус:</p>
                        </div>
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">О себе:</p>
                        </div>
                        <div class="col">Текст</div>
                    </div>
                </div>

                <div class="col-lg col-xxl-5 mt-4 mt-lg-0 offset-xxl-1">
                    <h6 class="fw-semi-bold ls mb-3 text-uppercase">Информация после</h6>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Имя:</p>
                        </div>
                        <div class="col">Иван</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Фамилия:</p>
                        </div>
                        <div class="col">Иванов</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">Статус:</p>
                        </div>
                        <div class="col">Крутой парень</div>
                    </div>
                    <div class="row">
                        <div class="col-5 col-sm-4">
                            <p class="fw-semi-bold mb-1">О себе:</p>
                        </div>
                        <div class="col">Ваня, взрослый!</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer border-top text-end">
            <a class="btn btn-falcon-default btn-sm text-danger" href="">
                <span class="fas fa-exclamation-triangle fs-11 me-1"></span>Отклонить
            </a>
            <a class="btn btn-falcon-default btn-sm ms-2 text-success" href="">
                <span class="fas fa-check fs-11 me-1"></span>Одобрить
            </a>
        </div>
    </div>
@endsection
