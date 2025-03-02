@extends('layouts.action-page')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="text-center">
                <img class="d-block mx-auto mb-4" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/16.png') }}" alt="Email" width="100" />
                <h4 class="mb-2">Пожалуйста, проверьте свою электронную почту!</h4>
                <p>Письмо было отправлено на адрес <strong>{{ auth()->user()->email }}</strong>.
                    Пожалуйста, перейдите по ссылке,
                    <span class="white-space-nowrap">чтобы активировать аккаунт.</span>
                </p>

                <form action="{{ route('verification.send') }}" method="POST">
                    @csrf
                    <button class="btn btn-primary btn-sm mt-3" type="submit">Отправить письмо ещё раз</button>
                </form>

            </div>
        </div>
    </div>
@endsection
