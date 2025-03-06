<?php

namespace App\Enums;

use Illuminate\Support\Collection;

enum Role: string
{
    case OWNER = 'chief';
    case ADMIN = 'admin';
    case EMPLOYEE = 'employee';
    case USER = 'user';

    public static function getValues(): Collection
    {
        return collect(\App\Enums\Role::cases())->pluck('value');
    }

    public function getTitle()
    {
        return match ($this) {
            self::OWNER => 'Владелец',
            self::ADMIN => 'Администратор',
            self::EMPLOYEE => 'Сотрудник',
            self::USER => 'Пользователь',
        };
    }
}
