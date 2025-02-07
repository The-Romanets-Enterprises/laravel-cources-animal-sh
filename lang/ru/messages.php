<?php

// lang/en/messages.php

return [
    'site_name' => 'Template',
    'main' => 'Главная',
    'main_page' => 'Главная страница',
    'search' => 'Поиск',
    'more' => 'Подробнее',
    'published' => 'Опубликовано',
    'unpublished' => 'Снято с публикации',
    'save' => 'Сохранить',
    'update' => 'Обновить',
    'copy' => 'Скопировано',

    'year_graduation_from' => 'Год начала',
    'year_graduation_to' => 'Год окончания',
    'gave_super_admin' => 'Пользователю :user_name даны права супер администратора',
    'take_super_admin' => 'У пользователя :user_name отобраны права супер администратора',

    'article' => [
        'plural' => 'Новости',
        'single' => 'Новость',
        'list' => 'Список новостей',
        'create' => 'Создать новость',
        'edit' => 'Редактировать новость',
        'none' => 'Новостей пока что не создано...',
        'success' => [
            'store' => 'Новость создана',
            'update' => 'Новость изменена',
            'destroy' => 'Новость удалена',
        ],
        'error' => [
            'store' => 'Новость не создана',
            'update' => 'Новость не изменена',
            'destroy' => 'Новость не удалена',
        ],
    ],

    'photo' => [
        'plural' => 'Фотографии',
        'single' => 'Фотография',
        'list' => 'Список фотографий',
        'create' => 'Создать фотографию',
        'edit' => 'Редактировать фотографию',
        'none' => 'Фотографий пока что не создано...',
        'success' => [
            'store' => 'Фотография создана',
            'update' => 'Фотография изменена',
            'destroy' => 'Фотография удалена',
        ],
        'error' => [
            'store' => 'Фотография не создана',
            'update' => 'Фотография не изменена',
            'destroy' => 'Фотография не удалена',
        ],
    ],

    'token' => [
        'plural' => 'Токены',
        'single' => 'Токен',
        'list' => 'Список токенов',
        'create' => 'Создать токен',
        'edit' => 'Редактировать токен :token',
        'none' => 'Токенов пока что не создано...',
        'success' => [
            'store' => 'Токен создан',
            'update' => 'Токен изменён',
            'destroy' => 'Токен удалён',
        ],
        'error' => [
            'store' => 'Токен не создан',
            'update' => 'Токен не изменён',
            'destroy' => 'Токен не удалён',
        ],
    ],

    'user' => [
        'plural' => 'Пользователи',
        'single' => 'Пользователь',
        'list' => 'Список пользователей',
        'create' => 'Создать пользователя',
        'edit' => 'Редактировать пользователя :user',
        'none' => 'Пользователей пока что не создано...',
        'change-password' => 'Сменить пароль',
        'success' => [
            'store' => 'Пользователь создан',
            'update' => 'Пользователь изменен',
            'destroy' => 'Пользователь удалён',
            'change-password' => 'Пароль изменён',
        ],
        'error' => [
            'store' => 'Пользователь не создан',
            'update' => 'Пользователь не изменен',
            'destroy' => 'Пользователь не удалён',
            'restricted' => 'Недостаточно прав для удаления пользователей',
            'my-self' => 'Нельзя удалить самого себя',
            'wrong-password' => 'Неверный логин и/или пароль',
            'no-user' => 'Такого пользователя не существует',
        ],
    ],

    'city' => [
        'plural' => 'Города',
        'single' => 'Город',
        'create' => 'Создать город',
        'edit' => 'Редактировать город :city',
        'success' => [
            'store' => 'Город создан',
            'update' => 'Город изменен',
            'destroy' => 'Город удалён',
        ],
        'error' => [
            'store' => 'Город не создан',
            'update' => 'Город не изменен',
            'destroy' => 'Город не удалён',
            'no-city' => 'Такого города не существует',
        ],
    ],

    'country' => [
        'plural' => 'Страны',
        'single' => 'Страна',
        'create' => 'Создать страну',
        'edit' => 'Редактировать страну :country',
        'success' => [
            'store' => 'Страна создана',
            'update' => 'Страна изменена',
            'destroy' => 'Страна удалёна',
        ],
        'error' => [
            'store' => 'Страна не создана',
            'update' => 'Страна не изменена',
            'destroy' => 'Страна не удалёна',
            'no-city' => 'Такой страны не существует',
        ],
    ],

    'auth' => [
        'login' => 'Вход в аккаунт',
        'logout' => 'Выход из аккаунта',
        'success' => 'Вы авторизованы',
        'error' => 'Неправильный логин и/или пароль',
    ],
];
