<div>Был создан аккаунт на сайте: {{ env('APP_NAME') }}</div>
<div>Ссылка для входа: <a href="{{route('admin.login.show') }}">{{route('admin.login.show') }} </a></div>
<div>
    <p>Email: </p>
    <p>{{ $user->email }}</p>
</div>
<div>
    <p>Password: </p>
    <p>{{ $password }}</p>
</div>
