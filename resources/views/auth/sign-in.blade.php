@extends('layouts.action-page')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="row flex-between-center mb-2">
                <div class="col-auto">
                    <h5>{{ __('auth.pages.sign-in.authorization') }}</h5>
                </div>
                <div class="col-auto fs-10 text-600">
                    <span class="mb-0 undefined">
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 2 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16h13M4 16l4-4m-4 4 4 4M20 8H7m13 0-4 4m4-4-4-4"/>
                        </svg>
                    </span>
                    <span>
                        <a href="{{ route('auth.show-sign-up') }}">{{ __('auth.pages.sign-in.registration') }}</a>
                    </span>
                </div>
            </div>
            <form action="{{ route('auth.auth') }}" method="post">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="email" placeholder="{{ __('auth.pages.sign-in.forms.mail') }}" value="{{ old('email') }}" />
                </div>
                <div class="mb-3">
                    <input class="form-control" type="password" name="password" placeholder="{{ __('auth.pages.sign-in.forms.password') }}" />
                </div>
                <div class="row flex-between-center">
                    <div class="col-auto">
                        <div class="form-check mb-0">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember" checked="checked" />
                            <label class="form-check-label mb-0" for="remember">{{ __('auth.pages.sign-in.remember') }}</label>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a class="fs-10" href="">{{ __('auth.pages.sign-in.forgot-password') }}</a>
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">{{ __('auth.pages.sign-in.button') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
