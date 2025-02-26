@extends('layouts.action-page')

@section('title') {{ __('auth.titles.sign-out') }} @endsection

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <div class="text-center">
                <img class="d-block mx-auto mb-4" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/45.png') }}" alt="shield" width="100" />
                <h4>{{ __('auth.pages.sign-out.page-title') }}</h4>
                <p>{{ __('auth.pages.sign-out.page-text-before') }} {{ __('general.project-name') }}. <br />
                    {{ __('auth.pages.sign-out.page-text-after') }}</p>
                <a class="btn btn-primary btn-sm mt-3" href="{{ route('auth.sign-in') }}">
                    <span class="fas fa-chevron-left me-1" data-fa-transform="shrink-4 down-1"></span>{{ __('auth.pages.sign-out.button') }}
                </a>
            </div>
        </div>
    </div>
@endsection
