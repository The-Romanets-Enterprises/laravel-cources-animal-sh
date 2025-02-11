@php
    use App\Enum\Sex;
@endphp



@include('layouts.form.text', [
    'title' => 'Название*',
    'name' => 'name',
    'placeholder' => "Название страны",
    'value' => $country->name ?? null,
])


