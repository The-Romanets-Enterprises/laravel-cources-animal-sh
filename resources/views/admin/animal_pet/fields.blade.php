@php
    use App\Enums\Sex;
@endphp


@include('layouts.form.text', [
           'title' => 'Кличка*',
           'name' => 'name',
           'placeholder' => "Введите кличку животного",
           'value' => $animal_pet->name ?? null,
       ])

<div class="row">
    <div class="col-6">
        @include('layouts.form.select', [
            'title' => 'Категория*',
            'name' => 'animal_id',
            'items' => $animals,
            'value' => $animal_pet->animal_id ?? null,
            'pre_text' => 'Выбрать категорию',
            'print_attribute' => 'name',
        ])
    </div>

    <div class="col-6">
        <div class="form-group">
            <label for="role">Пол*</label>
            <select class="form-control select2 select2-danger select2-hidden-accessible @error('sex') is-invalid @enderror"
                    name="sex" id="sex" data-dropdown-css-class="select2-danger" style="width: 100%;">
                <option value="">Выбрать пол</option>
                @foreach(Sex::cases() as $sex)
                    <option value="{{ $sex->value }}" @selected(old('sex', $animal_pet->sex ?? null) === $sex)>
                        {{ $sex->getTitle() }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

@include('layouts.form.textarea',[
    'title' => 'Описание*',
    'name' => 'description',
    'placeholder' => 'Введите описание животного',
    'value' => $animal_pet->description ?? null,
])

<div class="row">
    <div class="col-6">
        @include('layouts.form.date', [
            'title' => 'Дата рождения*',
            'name' => 'birth_date',
            'value' => isset($animal_pet) ? $animal_pet->birth_date->format('Y-m-d') : null,
        ])
    </div>

    <div class="col-6">
        @include('layouts.form.select', [
            'title' => 'Пользователь*',
            'name' => 'user_id',
            'items' => $users,
            'value' => $animal_pet->user_id ?? null,
            'pre_text' => 'Выбрать пользователя',
            'print_attribute' => 'full_name',
        ])
    </div>
</div>


@include('layouts.form.textarea',[
    'title' => 'Характер*',
    'name' => 'character',
    'placeholder' => 'Опишите характер животного',
    'value' => $animal_pet->character ?? null,
])

@include('layouts.form.text', [
           'title' => 'Тип шерсти*',
           'name' => 'wool_type',
           'placeholder' => "Введите тип шерсти",
           'value' => $animal_pet->wool_type ?? null,
       ])

<div class="row">
    <div class="col-4">
        @include('layouts.form.switch', [
           'title' => 'Кастрирован',
           'name' => 'is_sterilized',
           'value' => $animal_pet->is_sterilized ?? null,
       ])
    </div>
    <div class="col-4">
        @include('layouts.form.switch', [
           'title' => 'Вакцинирован',
           'name' => 'has_vaccination',
           'value' => $animal_pet->has_vaccination ?? null,
       ])
    </div>
    <div class="col-4">
        @include('layouts.form.switch', [
           'title' => 'Подтвержден',
           'name' => 'is_confirmed',
           'value' => $animal_pet->is_confirmed ?? null,
       ])
    </div>
</div>



