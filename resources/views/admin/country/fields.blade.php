@php
    use App\Enums\Role;
@endphp


@include('layouts.form.text', [
           'title' => 'Название страны*',
           'name' => 'name',
           'placeholder' => "Название страны",
           'value' => $country->name ?? null,
       ])
