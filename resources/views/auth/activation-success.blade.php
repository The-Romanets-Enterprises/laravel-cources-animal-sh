@extends('layouts.action-page')

@section('title', 'Активация успешна')

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="text-center">
                <img class="d-block mx-auto mb-4" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/like-active.png') }}" alt="Email" width="100" />
                <h4 class="mb-2">Аккаунт активирован!</h4>
                <p>Ваш аккаунт успешно <strong>активирован</strong>. <br>
                    Теперь вы можете войти в систему.
                </p>
                <a class="btn btn-primary btn-sm mt-3" href="{{ route('auth.login') }}">
                    <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span>Перейти к авторизации
                </a>
            </div>
        </div>
    </div>
@endsection
