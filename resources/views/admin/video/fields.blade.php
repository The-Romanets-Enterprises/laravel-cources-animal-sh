@php
    use App\Enum\Sex;
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
    'value' => $video -> path ?? null,
])






