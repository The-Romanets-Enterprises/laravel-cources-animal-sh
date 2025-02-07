@include('layouts.form.text', [
    'title' => 'Название города*',
    'name' => 'name',
    'placeholder' => "Название города",
    'value' => $city->name ?? null,
])

@include('layouts.form.select', [
    'title' => 'Страна*',
    'name' => 'country_id',
    'items' => $countries,
    'value' => $city->country_id ?? null,
    'key_value' => 'id',
    'pre_text' => 'Выберите страну'
])


