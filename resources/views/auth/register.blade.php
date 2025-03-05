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
                        <a href="{{ route('auth.login') }}">Авторизация</a>
                    </span>
                </div>
            </div>

            <form action="{{ route('auth.register.post') }}" method="POST">
                @csrf
                <small class="required-field-text">* обязательное поле</small>

                <div class="mb-3">
                    <input class="form-control" type="text" name="name" autocomplete="on" placeholder="Ваше имя*" value="{{ old('name') }}" />
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <input class="form-control" type="text" name="lastname" autocomplete="on" placeholder="Ваша фамилия*" value="{{ old('lastname') }}" />
                    @error('lastname') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <input class="form-control" type="text" name="email" autocomplete="on" placeholder="Электронная почта*" value="{{ old('email') }}" />
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <input class="form-control" type="password" name="password" autocomplete="on" placeholder="Пароль*" />
                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <input class="form-control" type="password" name="password_confirmation" autocomplete="on" placeholder="Подтвердите пароль*" />
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="basic-register-checkbox" name="terms" />
                    <label class="form-label" for="basic-register-checkbox">
                        Я принимаю <a href="{{ route('mainwebsite.terms') }}" target="_blank">условия</a> и
                        <a class="white-space-nowrap" href="{{ route('mainwebsite.privacy-policy') }}" target="_blank">политику конфиденциальности</a>
                    </label>
                    @error('terms') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3 mt-3">
                    <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    @error('g-recaptcha-response') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Зарегистрироваться</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

