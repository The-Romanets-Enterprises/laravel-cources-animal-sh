@php

@endphp


@include('layouts.form.text', [
           'title' => 'Название животного*',
           'name' => 'name',
           'placeholder' => "Название животного",
           'value' => $animal->name ?? null,
       ])

@include('layouts.form.file', [
    'title' => 'Фото*',
    'name' => 'photo',
    'pre_text' => 'Выберите изображение',
    'value' => $photo -> path ?? null,
])

