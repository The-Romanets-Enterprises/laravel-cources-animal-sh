@include('layouts.form.text', [
    'title' => 'Адрес*',
    'name' => 'address',
    'placeholder' => "Адрес",
    'value' => $address->address ?? null,
])

@include('layouts.form.text', [
    'title' => 'Почтовый индекс*',
    'name' => 'post_index',
    'placeholder' => "Почтовый индекс",
    'value' => $address->post_index ?? null,
])

@include('layouts.form.select', [
    'title' => 'Пользователь*',
    'name' => 'user_id',
    'items' => $users,
    'value' => $address->user_id ?? null,
    'key_value' => 'id',
    'display_name' => 'full_name',
    'pre_text' => 'Выберите пользователя'
])

@include('layouts.form.select', [
    'title' => 'Город*',
    'name' => 'city_id',
    'items' => $cities,
    'value' => $address->city_id ?? null,
    'key_value' => 'id',
    'display_name' => 'name',
    'pre_text' => 'Выберите город'
])

