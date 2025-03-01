<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show()
    {
        return view('auth.verify-email');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();  // Подтверждаем email

        // После успешной активации, показываем страницу успешной активации
        return view('auth.activation-success');
    }

    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('message', 'Ссылка на подтверждение отправлена!');
    }
}
