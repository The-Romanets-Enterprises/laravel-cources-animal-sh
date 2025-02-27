@extends('layouts.action-page')

@section('title', 'Ошибка активации')

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="text-center">
                <img class="d-block mx-auto mb-4" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/share-active.png') }}" alt="Email" width="100" />
                <h4 class="mb-2">Ошибка активации!</h4>
                <p>Срок действия ссылки истёк <br>
                    или аккаунт уже активирован.</p>
                <a class="btn btn-primary btn-sm mt-3" href="{{ route('mainwebsite.index') }}">
                    <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span>Перейти на главную
                </a>
            </div>
        </div>
    </div>
@endsection
