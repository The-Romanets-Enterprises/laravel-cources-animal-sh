@php
    use App\Enums\Sex;
@endphp

@include('layouts.form.select', [
    'title' => 'Животное*',
    'name' => 'animal_id',
    'items' => $animals,
    'value' => $animalPet->animal_id ?? null,
    'key_value' => 'id',
    'display_name' => 'name',
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

@include('layouts.form.textarea', [
    'title' => 'Описание*',
    'name' => 'description',
    'placeholder' => "Описание животного",
    'value' => $animalPet->description ?? null,
])

@include('layouts.form.select', [
    'title' => 'Пользователь*',
    'name' => 'user_id',
    'items' => $users,
    'value' => $animalPet->user_id ?? null,
    'key_value' => 'id',
    'display_name' => 'full_name',
    'pre_text' => 'Выберите пользователя'
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
