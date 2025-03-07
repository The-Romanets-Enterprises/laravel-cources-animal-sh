@extends('layouts.layout')

@section('title') {{ $title ?? null }} @endsection

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
                            <h3 class="card-title">{{ $title ?? null }}</h3>
                        </div>
                        <!-- form start -->
                        <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        @include('layouts.form.text', [
                                            'title' => __('messages.user.name'),
                                            'name' => 'name',
                                            'placeholder' => __('messages.user.name'),
                                            'value' => old('name', Auth::user()->name),
                                            'required' => true
                                        ])
                                    </div>
                                    <div class="col-md-6">
                                        @include('layouts.form.text', [
                                            'title' => __('messages.user.lastname'),
                                            'name' => 'lastname',
                                            'placeholder' => __('messages.user.lastname'),
                                            'value' => old('lastname', Auth::user()->lastname),
                                            'required' => true
                                        ])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        @include('layouts.form.text', [
                                            'title' => __('messages.user.email'),
                                            'name' => 'email',
                                            'type' => 'email',
                                            'placeholder' => __('messages.user.email'),
                                            'value' => old('email', Auth::user()->email),
                                            'required' => true
                                        ])
                                    </div>
                                    <div class="col-md-6">
                                        @include('layouts.form.text', [
                                            'title' => __('messages.user.phone'),
                                            'name' => 'phone',
                                            'placeholder' => __('messages.user.phone'),
                                            'value' => old('phone', Auth::user()->phone)
                                        ])
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        @include('layouts.form.select', [
                                            'title' => __('messages.city.single'),
                                            'name' => 'city_id',
                                            'items' => $cities ?? [],
                                            'value' => Auth::user()->address?->city_id ?? null,
                                            'key_value' => 'id',
                                            'display_name' => 'name',
                                            'pre_text' => 'Выберите город'
                                        ])
                                    </div>
                                    <div class="col-md-6">
                                        @include('layouts.form.text', [
                                            'title' => __('messages.user.post_index'),
                                            'name' => 'post_index',
                                            'placeholder' => __('messages.user.post_index'),
                                            'value' => old('post_index', Auth::user()->address?->post_index ?? '')
                                        ])
                                    </div>
                                </div>

                                @include('layouts.form.text', [
                                    'title' => __('messages.address.single'),
                                    'name' => 'address',
                                    'placeholder' => __('messages.address.single'),
                                    'value' => old('address', Auth::user()->address?->address ?? '')
                                ])

                                @include('layouts.form.file', [
                                    'title' => __('messages.photo.single'),
                                    'name' => 'photo',
                                    'pre_text' => __('messages.photo.create'),
                                    'value' => Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : null
                                ])

                                @if ($user->photos->isNotEmpty())
                                    <div class="mb-3">
                                        <strong>Выберите фото для удаления:</strong>
                                        @foreach ($user->photos as $photo)
                                            <label class="d-block">
                                                <input type="checkbox" name="photos_to_delete[]" value="{{ $photo->id }}">
                                                <img src="{{ asset('storage/' . $photo->path) }}" width="100" height="75" alt="Фото {{ $user->name }}" class="mr-2">
                                            </label>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Нет доступных фотографий.</p>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">{{ __('messages.user.update-profile') }}</button>
                            </div>
                        </form>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <form action="{{ route('verification.notice') }}" method="GET">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('messages.auth.resend_email') }}
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
