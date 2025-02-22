<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Class work with authentication
class AuthController extends Controller
{
    // Dashboard Main Page
    public function index()
    {
        $title = __('messages.main_page');

        return view('dashboard.index', compact('title'));
    }

    // Enter into an account page (ONLY VIEW)
    public function login()
    {
        $title = __('messages.auth.login');

        return view('auth.login', compact('title'));
    }

    // Store information in session
    public function auth(LoginRequest $request)
    {
        $is_accepted = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember);

        return to_route('dashboard.home')->with('success', __('messages.auth.success'));
    }

    // Logout from the account
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.logout');
    }
}
