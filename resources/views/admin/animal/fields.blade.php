@include('layouts.form.text', [
    'title' => 'Название животного*',
    'name' => 'name',
    'placeholder' => "Название животного",
    'value' => $animal->name ?? null,
])

@include('layouts.form.file', [
    'title' => 'Фото животного*',
    'name' => 'photo',
    'placeholder' => "Фото животного",
    'value' => $animal->photo ?? null,
    'pre_text' => 'Выберите файл'
])


