<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class EmployeeController extends Controller
{
    public function home()
    {
        // Получаем временную зону пользователя или по умолчанию МСК
        $timezone = auth()->user()->timezone ?? 'Europe/Moscow';

        // Получаем текущее время по выбранной временной зоне
        $userTime = Carbon::now($timezone);
        $hour = $userTime->hour;

        // Определяем приветствие в зависимости от времени пользователя
        if ($hour >= 6 && $hour < 12) {
            $greeting = 'Доброе утро';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Добрый день';
        } elseif ($hour >= 18 && $hour < 23) {
            $greeting = 'Добрый вечер';
        } else {
            $greeting = 'Доброй ночи';
        }

        // Форматируем дату в нужном формате
        $date = $userTime->format('d.m.Y'); // "дд.мм.гггг"
        $dayName = __('general.days.' . $userTime->format('l')); // Локализованный день недели

        $title = __('dashboard.titles.employee.home');
        return view('dashboard.employee.home', compact('greeting', 'date', 'dayName', 'title'));
    }
}
