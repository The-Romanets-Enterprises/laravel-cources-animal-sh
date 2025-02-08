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
    <select class="form-control select2 select2-danger select2-hidden-accessible @error('sex') is-invalid @enderror"
            name="sex" id="sex"
            data-dropdown-css-class="select2-danger" style="width: 100%;">
        <option value="">Выбрать пол</option>
        @foreach(Sex::cases() as $sex)
            <option value="{{ $sex->value }}" @selected(old('sex', $animalPet->sex ?? null) === $sex->value)>
                {{ $sex->getTitle() }}
            </option>
        @endforeach
    </select>
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
    'value' => $animalPet->birth_date ?? null,
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
