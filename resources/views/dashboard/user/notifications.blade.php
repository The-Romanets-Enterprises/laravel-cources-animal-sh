@extends('layouts.dashboard')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="card overflow-hidden">
        <div class="card-header bg-body-tertiary">
            <div class="row flex-between-center">
                <div class="col-sm-auto">
                    <h5 class="mb-1 mb-md-0">Ваши уведомления</h5>
                </div>
                <div class="col-sm-auto fs-10">
                    <a class="font-sans-serif" href="">Отметить все как прочитанные</a>
                </div>
            </div>
        </div>

        <div class="card-body fs-10 p-0">
            <a class="border-bottom-0 notification-unread notification rounded-0 border-x-0 border-300" href="">
                <div class="notification-avatar">
                    <div class="avatar avatar-xl me-3">
                        <img class="rounded-circle" src="{{ asset('assets/mainwebsite/img/logo_admin.png') }}" alt="" />
                    </div>
                </div>
                <div class="notification-body">
                    <p class="mb-1"><strong>Администрация</strong> одобрила вашу заявку на смену ваших личных данных.</p>
                    <span class="notification-time">Только что</span>
                </div>
            </a>

            <a class="border-bottom-0 notification rounded-0 border-x-0 border-300" href="">
                <div class="notification-avatar">
                    <div class="avatar avatar-xl me-3">
                        <img class="rounded-circle" src="{{ asset('assets/mainwebsite/img/logo_admin.png') }}" alt="" />
                    </div>
                </div>
                <div class="notification-body">
                    <p class="mb-1"><strong>Администрация</strong> отклонила вашу заявку на смену ваших личных данных. Причина: причина.</p>
                    <span class="notification-time">10мин. назад</span>
                </div>
            </a>

            <a class="border-bottom-0 notification rounded-0 border-x-0 border-300" href="">
                <div class="notification-avatar">
                    <div class="avatar avatar-xl me-3">
                        <img class="rounded-circle" src="{{ asset('assets/mainwebsite/img/logo.png') }}" alt="" />
                    </div>
                </div>
                <div class="notification-body">
                    <p class="mb-1"><strong>Добро пожаловать!</strong> Вы подтвердили свою эл.почту.</p>
                    <span class="notification-time">1д. назад</span>
                </div>
            </a>
        </div>
    </div>
@endsection
