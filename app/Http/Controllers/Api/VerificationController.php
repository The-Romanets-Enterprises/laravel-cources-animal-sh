<?php

namespace App\Http\Controllers\Api;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
   public function verificationNotice()
   {
       $title = 'Подтверждение аккаунта';
       /** @var User $user */
       $user = auth()->user();

       return view('verification.notice', compact('title', 'user'));
   }

    public function verificationVerify(EmailVerificationRequest $request)
    {
        $request->fulfill();
        $redirectRoute = Auth::user()->role == Role::ADMIN ? 'admin.home' : 'user.home';

        return to_route($redirectRoute);
    }

    public function verificationSend(Request $request)
    {
        /** @var User $user */
        $user = $request->user();
        $user->sendEmailVerificationNotification();

        return back()->with('success', 'Ссылка верификации отправлена');
    }
}
