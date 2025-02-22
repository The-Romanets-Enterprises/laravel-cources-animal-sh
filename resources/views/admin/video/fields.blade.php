@php
    use App\Enums\Sex;
@endphp


@include('layouts.form.select', [
    'title' => 'Животное*',
    'name' => 'animal_pet_id',
    'items' => $animal_pets,
    'value' => $video->animal_pet_id ?? null,
    'pre_text' => 'Выбрать животного',
    'print_attribute' => 'name',
])

@include('layouts.form.filepond-file', [
    'title' => 'Видео*',
    'name' => 'files[]',
    'multiple' => true,
    'value' => isset($video) ? $video->getVideo() : null,
])
