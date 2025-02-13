@php
    use App\Enums\Role;
@endphp


@include('layouts.form.text', [
           'title' => 'Название категории*',
           'name' => 'name',
           'placeholder' => "Название категории",
           'value' => $animal->name ?? null,
       ])

@include('layouts.form.file', [
    'title' => 'Фото*',
    'name' => 'photo',
    'pre_text' => 'Выберите изображение',
    'value' => isset($animal) ? $animal->getPhoto() : null,
])
