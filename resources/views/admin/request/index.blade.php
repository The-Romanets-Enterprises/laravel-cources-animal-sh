@extends('layouts.layout')

@section('title')
    {{ $title ?? null }}
@endsection

@section('content')
    @include('layouts.page-header')
    <h1>Запросы пользователей</h1>

    <form action="{{ route('requests.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Ваше имя" required>
        <textarea name="message" placeholder="Опишите проблему" required></textarea>
        <button type="submit">Отправить</button>
    </form>

    <h2>Список запросов</h2>
    <ul>
        @foreach ($requests as $request)
            <li><strong>{{ $request->name }}</strong>: {{ $request->message }}</li>
        @endforeach
    </ul>
@endsection
