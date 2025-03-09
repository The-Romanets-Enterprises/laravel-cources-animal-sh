@php
    use App\Enum\Sex;
@endphp


@include('layouts.form.select', [
    'title' => 'Вид животного*',
    'name' => 'animal_id',
    'items' => $animals,
    'value' => $animalPet->animal_id ?? null,
    'key_value' => 'id',
    'display_name' => 'name',
    'pre_text' => 'Вид'
])

<div class="form-group">
    <label for="sex">Пол*</label>
    <select class="form-control select2 select2-danger select2-hidden-accessible @error('sex') is-invalid @enderror"
            name="sex" id="sex"
            data-dropdown-css-class="select2-danger" style="width: 100%;">
        <option value="">Выбрать пол</option>
        @foreach(Sex::cases() as $sex)
            <option value="{{ $sex->value }}" @selected(old('sex', $animalPet->sex ?? null) === $sex)>
                {{ $sex->getTitle() }}
            </option>
        @endforeach
    </select>
</div>

@include('layouts.form.select', [
    'title' => 'Заявитель*',
    'name' => 'user_id',
    'items' => $users,
    'value' => $animalPet->user_id?? null,
    'key_value' => 'id',
    'display_name' => 'name',
    'pre_text' => 'Выберите заявителя'
])


@include('layouts.form.textarea', [
           'title' => 'Описание*',
           'name' => 'description',
           'placeholder' => "Описание животного",
           'value' => $animalPet->description ?? null,
])

<div class="row">
    <div class="col-6">
        @include('layouts.form.file', [
            'title' => 'Видео',
            'multiple' => true,
            'name' => 'videos[]',
            'data_files' => $videosFiles ?? null,
            'hidden' => 'video-paths',
            'pre_text' => 'Добавьте видео',
        ])
    </div>
    <div class="col-6">
        @include('layouts.form.file', [
            'title' => 'Фото*',
            'multiple' => true,
            'name' => 'photos[]',
            'data_files' => $photosFiles ?? null,
            'hidden' => 'photo-paths',
            'pre_text' => 'Добавьте фото',
        ])
    </div>
</div>

@include('layouts.form.textarea', [
    'title' => 'Характер*',
    'name' => 'character',
    'placeholder' => "Характер животного",
    'value' => $animalPet->character ?? null,
])

@include('layouts.form.date', [
    'title' => 'Дата рождения*',
    'name' => 'birth_date',
    'value' => $animalPet->birth_date ?? null,
])

@include('layouts.form.text', [
    'title' => 'Тип шерсти',
    'name' => 'wool_type',
    'placeholder' => "Тип шерсти",
    'value' => $animalPet->wool_type ?? null,
])

@include('layouts.form.switch', [
    'title' => 'Стерилизован*',
    'name' => 'is_sterilized',
    'value' => $animal_pet->is_sterilized ?? false,
])

@include('layouts.form.switch', [
    'title' => 'Вакцинирован*',
    'name' => 'has_vaccination',
    'value' => $animal_pet->has_vaccination ?? false,
])

@include('layouts.form.switch', [
    'title' => 'Одобрена*',
    'name' => 'is_confirmed',
    'value' => $animal_pet->is_confirmed ?? false,
])

