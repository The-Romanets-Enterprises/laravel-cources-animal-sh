@php
    use App\Enums\Role;
@endphp


@include('layouts.form.email', [
    'title' => 'Эл. почта*',
    'name' => 'email',
    'placeholder' => "Эл. почта",
    'value' => $user->email ?? null,
])

<div class="row">
    <div class="col-6">
        @include('layouts.form.text', [
           'title' => 'Имя пользователя*',
           'name' => 'name',
           'placeholder' => "Имя пользователя",
           'value' => $user->name ?? null,
       ])
    </div>
    <div class="col-6">
        @include('layouts.form.text', [
           'title' => 'Фамилия пользователя*',
           'name' => 'lastname',
           'placeholder' => "Фамилия пользователя",
           'value' => $user->lastname ?? null,
       ])
    </div>
</div>

@include('layouts.form.text', [
    'title' => 'Телефон*',
    'name' => 'phone',
    'placeholder' => "Телефон",
    'value' => $user->phone ?? null,
])

<div class="form-group">
    <label for="role">Роль*</label>
    <select class="form-control select2 select2-danger select2-hidden-accessible @error('role') is-invalid @enderror"
            @disabled(isset($user) && auth()->user()->id === $user->id) name="role" id="role"
            data-dropdown-css-class="select2-danger" style="width: 100%;">
        <option value="">Выбрать роль</option>
        @foreach(Role::cases() as $role)
            <option value="{{ $role->value }}" @selected(old('role', $user->role ?? null) === $role)>
                {{ $role->getTitle() }}
            </option>
        @endforeach
    </select>
</div>

@isset($have_password)
    <div class="row">
        <div class="col-md-6">
            @include('layouts.form.password', [
               'title' => 'Пароль',
               'name' => 'password',
               'placeholder' => "Пароль",
            ])
        </div>
        <div class="col-md-6">
            @include('layouts.form.password', [
               'title' => 'Подтверждение пароля',
               'name' => 'password_confirmation',
               'placeholder' => "Подтверждение пароля",
            ])
        </div>
    </div>
@endisset
