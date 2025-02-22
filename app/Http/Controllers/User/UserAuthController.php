<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function index()
    {
        $title = __('messages.main_page');

        return view('user.index', compact('title'));
    }

    public function login()
    {
        $title = __('messages.auth.login');

        return view('auth.login', compact('title'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function auth(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            return redirect()->route('user.home')->with('success', __('messages.auth.success'));
        }

        return back()->withErrors(['email' => __('messages.auth.failed')])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('user.login.show');
    }
}
