@extends('layouts.action-page')

@section('title') {{ __('auth.titles.sign-out') }} @endsection

@section('content')
    <div class="row flex-center min-vh-100 py-6">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            <a class="d-flex flex-center mb-4" href="{{ route('mainwebsite.index') }}">
                <img class="me-2" src="{{ asset('assets/dashboard/img/icons/spot-illustrations/animalsafe.png') }}" alt="" width="58" />
                <span class="font-sans-serif text-primary fw-bolder fs-4 d-inline-block">{{ __('general.project-name') }}</span>
            </a>
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
        </div>
    </div>
@endsection
