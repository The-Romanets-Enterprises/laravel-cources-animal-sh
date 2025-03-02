@extends('layouts.action-page')

@section('title') Активирован аккаунт @endsection

@section('content')
    <div class="card">
        <div class="card-body p-4 p-sm-5">
            <h2>Ваш аккаунт уже активирован!</h2>
            <p>Вы уже активировали ваш аккаунт. Вы можете <a href="{{ route('login') }}">войти</a>.</p>
        </div>
    </div>
@endsection
