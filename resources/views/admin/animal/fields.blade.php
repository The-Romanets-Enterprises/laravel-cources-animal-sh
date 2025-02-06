@php
    use App\Enums\Role;
@endphp


@include('layouts.form.text', [
           'title' => 'Название категории*',
           'name' => 'name',
           'placeholder' => "Название категории",
           'value' => $animal->name ?? null,
       ])
