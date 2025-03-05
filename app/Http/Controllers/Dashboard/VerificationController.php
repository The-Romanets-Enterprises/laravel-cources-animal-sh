<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        $title = __('mainwebsite.titles.verify-email');
        return view('auth.verify-email', compact('title'));
    }

    public function verify(EmailVerificationRequest $request)
    {
        $user = $request->user();

        // Проверяем, был ли уже активирован аккаунт
        if ($user->hasVerifiedEmail()) {
            return view('auth.activation-failed');
        }

        // Подтверждаем email
        $request->fulfill();

        return view('auth.activation-success');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Ссылка на подтверждение отправлена!');
    }
}
