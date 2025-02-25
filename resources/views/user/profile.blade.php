@extends('layouts.layout')

@section('title', __('messages.user.profile'))

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ __('messages.user.profile') }}</h3>
        </div>
        <div class="card-body">
            @include('layouts.message')

            <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

{{--                <div class="form-group">--}}
{{--                    <label for="photo">{{ __('messages.photo.single') }}</label>--}}
{{--                    <input type="file" name="photo" id="photo" class="form-control-file">--}}
{{--                    @if (Auth::user()->photo)--}}
{{--                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" width="100" height="100" alt="Фото профиля">--}}
{{--                    @endif--}}
{{--                </div>--}}
                <div class="form-group">
                    <label for="name">{{ __('messages.user.name') }}</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="lastname">{{ __('messages.user.lastname') }}</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" value="{{ old('lastname', Auth::user()->lastname) }}" required>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('messages.user.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
                </div>
                <div class="form-group">
                    <label for="phone">{{ __('messages.user.phone') }}</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', Auth::user()->phone) }}">
                </div>
                <div class="form-group">
                    <label for="country">{{ __('messages.country.single') }}</label>
                    <input type="text" name="country" id="country" class="form-control" value="{{ old('country', Auth::user()->address?->city?->country?->name ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="city">{{ __('messages.city.single') }}</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city', Auth::user()->address?->city?->name ?? '') }}">
                </div>
                <div class="form-group">
                    <label for="address">{{ __('messages.address.single') }}</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address', Auth::user()->address?->address ?? '') }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('messages.user.update-profile') }}</button>
            </form>
        </div>
    </div>
@endsection
