<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {
        $title = __('dashboard.titles.user.home');
        return view('dashboard.user.home', compact('title'));
    }

    public function profile($id)
    {
        $user = User::whereNotNull('email_verified_at')->find($id);

        if (!$user) {
            abort(404);
        }

        $title = $user->name . ' ' . $user->lastname;

        return view('dashboard.user.profile', compact('user', 'title'));
    }
}
