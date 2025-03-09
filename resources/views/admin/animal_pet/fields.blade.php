@php
    use App\Enums\Sex;
@endphp

@include('layouts.form.select', [
    'title' => 'Животное*',
    'name' => 'animal_id',
    'items' => $animals,
    'value' => $animalPet->animal_id ?? null,
    'key_value' => 'id',
    'pre_text' => 'Выберите животное'
])

<div class="form-group">
    <label for="sex">Пол*</label>
    <div class="form-check">
        @foreach(\App\Enums\Sex::cases() as $sex)
            <div class="form-check">
                <input class="form-check-input @error('sex') is-invalid @enderror"
                       type="radio"
                       name="sex"
                       id="sex-{{ $sex->value }}"
                       value="{{ $sex->value }}"
                    @checked(old('sex', $animalPet->sex?->value ?? $animalPet->sex) === $sex->value)>
                <label class="form-check-label" for="sex-{{ $sex->value }}">
                    {{ $sex->getTitle() }}
                </label>
            </div>
        @endforeach
    </div>
    @error('sex')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>

@include('layouts.form.text', [
    'title' => 'Кличка',
    'name' => 'name',
    'placeholder' => "Кличка",
    'value' => $animalPet->name ?? null,
])

@include('layouts.form.textarea', [
    'title' => 'Описание*',
    'name' => 'description',
    'placeholder' => "Описание животного",
    'value' => $animalPet->description ?? null,
])

@include('layouts.form.date', [
    'title' => 'Дата рождения*',
    'name' => 'birth_date',
    'value' => isset($animalPet) ? ($animalPet->birth_date ? $animalPet->birth_date->toDateString() : null) : null,
])

@include('layouts.form.switch', [
    'title' => 'Стерилизован*',
    'name' => 'is_sterilized',
    'value' => $animalPet->is_sterilized ?? false,
])

@include('layouts.form.switch', [
    'title' => 'Вакцинация*',
    'name' => 'has_vaccination',
    'value' => $animalPet->has_vaccination ?? false,
])

@include('layouts.form.switch', [
    'title' => 'Подтверждение заявки*',
    'name' => 'is_confirmed',
    'value' => $animalPet->is_confirmed ?? false,
])

@include('layouts.form.text', [
    'title' => 'Тип шерсти',
    'name' => 'wool_type',
    'placeholder' => "Тип шерсти",
    'value' => $animalPet->wool_type ?? null,
])

@include('layouts.form.textarea', [
    'title' => 'Характер',
    'name' => 'character',
    'placeholder' => "Характер животного",
    'value' => $animalPet->character ?? null,
])

@include('layouts.form.file', [
    'title' => 'Фотографии',
    'name' => 'photos[]',
    'multiple' => true,
    'pre_text' => 'Перетащите фото сюда или выберите файлы',
    'value' => isset($animalPet) ? optional($animalPet->photos->first())->path : null,
])


@if ($animalPet->photos->isNotEmpty())
    <div>
        <strong>Выберите фото для удаления:</strong>
        @foreach ($animalPet->photos as $photo)
            <label>
                <input type="checkbox" name="photos_to_delete[]" value="{{ $photo->id }}">
                <img src="{{ asset('storage/' . $photo->path) }}" width="150" height="150" alt="Фото {{ $animalPet->name }}">
            </label><br>
        @endforeach
    </div>
@else
    <p>Нет доступных фотографий.</p>
@endif

@include('layouts.form.file', [
    'title' => 'Видео',
    'name' => 'videos[]',
    'multiple' => true,
    'pre_text' => 'Перетащите видео сюда или выберите файлы',
    'value' => isset($animalPet) ? optional($animalPet->videos->first())->path : null,
])

@if ($animalPet->videos->isNotEmpty())
    <div>
        <strong>Выберите видео для удаления:</strong>
        @foreach ($animalPet->videos as $video)
            <label>
                <input type="checkbox" name="videos_to_delete[]" value="{{ $video->id }}">
                <video width="150" height="150" controls>
                    <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                </video>
            </label><br>
        @endforeach
    </div>
@else
    <p>Нет доступных видео.</p>
@endif
