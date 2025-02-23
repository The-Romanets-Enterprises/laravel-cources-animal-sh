@extends('layouts.action-page')

@section('title') {{ $title ?? 'Ошибка 404' }} @endsection

@section('content')
    <div class="row flex-center min-vh-100 py-6 text-center">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xxl-5">
            <a class="d-flex flex-center mb-4" href="{{ route('mainwebsite.home') }}">
                <img class="me-2" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/falcon.png') }}" alt="" width="58" />
                <span class="font-sans-serif text-primary fw-bolder fs-4 d-inline-block">AnimalSafe</span>
            </a>
            <div class="card">
                <div class="card-body p-4 p-sm-5">
                    <div class="fw-black lh-1 text-300 fs-error">404</div>
                    <p class="lead mt-4 text-800 font-sans-serif fw-semi-bold w-md-75 w-xl-100 mx-auto">Страница, которую вы ищете, не найдена.</p>
                    <hr />
                    <p>Убедитесь, что адрес правильный и страница не перемещена. Если вы считаете, что это ошибка,
                        <a href="">свяжитесь с нами</a>.
                    </p>
                    <!-- Видно только для НЕавторизованных пользователей -->
                    <a class="btn btn-primary btn-sm mt-3" href="{{ route('mainwebsite.home') }}">
                        <span class="fas fa-home me-2"></span>Вернуться на главную страницу сайта
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
