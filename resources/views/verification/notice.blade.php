@extends('layouts.layout')

@section('title') {{ $title ?? 'Подтверждение Email' }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('layouts.page-header')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title ?? 'Подтверждение Email' }}</h3>
                        </div>

                        <div class="card-body">
                            <p>На вашу почту отправлено письмо для подтверждения аккаунта.</p>
                            <p>Если письмо не пришло, нажмите кнопку ниже, чтобы отправить его повторно.</p>

                            <form action="{{ route('verification.send') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">
                                    Отправить письмо повторно
                                </button>
                            </form>
                        </div>

                        <div class="card-footer">
                            <a href="{{ route('user.home') }}" class="btn btn-secondary">
                                На главную
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
