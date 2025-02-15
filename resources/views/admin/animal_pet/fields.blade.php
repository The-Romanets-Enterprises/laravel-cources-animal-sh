@php
    use App\Enum\Sex;
@endphp


@include('layouts.form.select', [
    'title' => 'Вид животного*',
    'name' => 'animal_id',
    'items' => $animals,
    'value' => $animal_pet->animal_id ?? null,
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
            <option value="{{ $sex->value }}" @selected(old('$sex', $animal_pet->$sex ?? null) === $sex)>
                {{ $sex->getTitle() }}
            </option>
        @endforeach
    </select>
</div>

@include('layouts.form.select', [
    'title' => 'Заявитель*',
    'name' => 'user_id',
    'items' => $users,
    'value' => $animal_pet->user_id ?? null,
    'key_value' => 'id',
    'display_name' => 'full_name',
    'pre_text' => 'Выберите заявителя'
])


@include('layouts.form.text', [
           'title' => 'Описание*',
           'name' => 'description',
           'placeholder' => "Описание животного",
           'value' => $animal_pet->description ?? null,
])

@include('layouts.form.text', [
    'title' => 'Характер*',
    'name' => 'character',
    'placeholder' => "Характер животного",
    'value' => $animal_pet->character ?? null,
])

@include('layouts.form.date', [
    'title' => 'Дата рождения*',
    'name' => 'birth_date',
    'value' => $animal_pet->birth_date ?? null,
])

@include('layouts.form.text', [
    'title' => 'Тип шерсти',
    'name' => 'wool_type',
    'placeholder' => "Тип шерсти",
    'value' => $animal_pet->wool_type ?? null,
])

@include('layouts.form.switch', [
    'title' => 'Стерилизован*',
    'name' => 'is_sterilized',
    'value' => $animal_pet->is_sterilized ?? false,
])

@include('layouts.form.switch', [
    'title' => 'Вакцинацинирован*',
    'name' => 'has_vaccination',
    'value' => $animal_pet->has_vaccination ?? false,
])

@include('layouts.form.switch', [
    'title' => 'Подтверждение заявки*',
    'name' => 'is_confirmed',
    'value' => $animal_pet->is_confirmed ?? false,
])

