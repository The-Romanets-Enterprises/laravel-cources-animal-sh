<?php

namespace App\Enums;

use Illuminate\Support\Collection;
enum Sex: string
{
    case MALE = 'male';
    case FEMALE = 'female';

    public static function getValues(): Collection
    {
        return collect(\App\Enums\Sex::cases())->pluck('value');
    }

    public function getTitle()
    {
        return match ($this) {
            self::MALE => 'Мужской',
            self::FEMALE => 'Женский',
        };
    }
}
