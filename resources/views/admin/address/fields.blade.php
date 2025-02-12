@php
    use App\Enums\Sex;
@endphp


<div class="row">
    <div class="col-6">
        @include('layouts.form.select', [
            'title' => 'Пользователь*',
            'name' => 'user_id',
            'items' => $users,
            'value' => $address->user_id ?? null,
            'pre_text' => 'Выбрать пользователя',
            'print_attribute' => 'full_name',
        ])
    </div>

    <div class="col-6">
        @include('layouts.form.select', [
            'title' => 'Город*',
            'name' => 'city_id',
            'items' => $cities,
            'value' => $address->city_id ?? null,
            'pre_text' => 'Выбрать город',
            'print_attribute' => 'name',
        ])
    </div>
</div>

<div class="row">
    <div class="col-6">
        @include('layouts.form.text', [
           'title' => 'Адрес*',
           'name' => 'address',
           'placeholder' => "Введите адрес",
           'value' => $address->address ?? null,
       ])
    </div>
    <div class="col-6">
        @include('layouts.form.text', [
           'title' => 'Почтовый индекс*',
           'name' => 'post_index',
           'placeholder' => "Введите почтовый индекс",
           'value' => $address->post_index ?? null,
       ])
    </div>
</div>

