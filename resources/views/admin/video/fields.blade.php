@include('layouts.form.file', [
    'title' => 'Видео животного*',
    'name' => 'path',
    'placeholder' => "Видео животного",
    'value' => $video->path ?? null,
    'pre_text' => 'Выберите файл с видео'
])

@include('layouts.form.select', [
    'title' => 'Животное*',
    'name' => 'animal_pet_id',
    'items' => $animal_pets,
    'value' => $video->animal_pet_id ?? null,
    'key_value' => 'id',
    'display_name' => 'description',
    'pre_text' => 'Выберите животное'
])


