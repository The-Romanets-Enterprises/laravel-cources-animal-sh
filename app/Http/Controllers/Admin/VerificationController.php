<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Class work with authentication and Admin main page
class VerificationController extends Controller
{

    public function verificationNotice()
    {
        $title = 'Подтверждение аккаунта';
        $user = auth()->user();

        return view('auth.verification', compact('title', 'user'));
    }

    public function verificationVerify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return to_route('admin.home');
    }

    public function verificationSend(Request $request)
    {
        $user = $request->user();
        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Ссылка верификации отправлена');
    }


}
