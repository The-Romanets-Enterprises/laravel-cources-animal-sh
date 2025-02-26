@extends('layouts.action-page')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="row flex-between-center mb-2">
                <div class="col-auto">
                    <h5>Регистрация</h5>
                </div>
                <div class="col-auto fs-10 text-600">
                    <span class="mb-0 undefined">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 2 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16h13M4 16l4-4m-4 4 4 4M20 8H7m13 0-4 4m4-4-4-4"/>
                        </svg>
                    </span>
                    <span>
                        <a href="{{ route('auth.sign-in') }}">Авторизация</a>
                    </span>
                </div>
            </div>
            <form>
                @csrf
                <small class="required-field-text">* обязательное поле</small>
                <div class="mb-3">
                    <input class="form-control" type="text" autocomplete="on" placeholder="Ваше имя*" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" autocomplete="on" placeholder="Ваша фамилия*" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="text" autocomplete="on" placeholder="Электронная почта*" />
                </div>
                <div class="row gx-2">
                    <div class="mb-3">
                        <input class="form-control" type="password" autocomplete="on" placeholder="Пароль*" />
                    </div>
                </div>
                <div class="row gx-2">
                    <div class="mb-3">
                        <input class="form-control" type="password" autocomplete="on" placeholder="Подтвердите пароль*" />
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="basic-register-checkbox" />
                    <label class="form-label" for="basic-register-checkbox">Я принимаю <a href="{{ route('mainwebsite.terms') }}">условия </a>и <a class="white-space-nowrap" href="{{ route('mainwebsite.privacy-policy') }}">политику конфиденциальности</a></label>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
@endsection
