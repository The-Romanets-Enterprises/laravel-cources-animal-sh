<div>Был создан пользователь на сайте: {{ env('APP_NAME') }}</div>
<div>Ссылка для входа в аккаунт: <a href="{{ route('admin.login.show') }}">{{ route('admin.login.show') }}</a></div>
<div>
    <p>Email: </p>
    <p>{{ $user->email }}</p>
</div>
<div>
    <p>Password: </p>
    <p>{{ $password }}</p>
</div>

