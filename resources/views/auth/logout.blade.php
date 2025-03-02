@extends('layouts.action-page')

@section('title') {{ __('auth.titles.logout') }} @endsection

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="text-center">
                <img class="d-block mx-auto mb-4" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/45.png') }}" alt="shield" width="100" />
                <h4>{{ __('auth.pages.logout.page-title') }}</h4>
                <p>{{ __('auth.pages.logout.page-text-before') }} {{ __('general.project-name') }}. <br />
                    {{ __('auth.pages.logout.page-text-after') }}</p>
                <a class="btn btn-primary btn-sm mt-3" href="{{ route('login') }}">
                    <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span>{{ __('auth.pages.logout.button') }}
                </a>
            </div>
        </div>
    </div>
@endsection
