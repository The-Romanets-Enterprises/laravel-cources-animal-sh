<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Animal_pet;
use App\Models\Animal;
use App\Models\Address;
use App\Models\Photo;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Class work with authentication and Admin main page
class AuthController extends Controller
{
    // Admin Main Page
    public function index()
    {
        $title = __('messages.main_page');
        $address_count = Address::query()->count();
        $video_count = Video::query()->count();
        $photo_count = Photo::query()->count();
        $animal_pet_count = Animal_pet::query()->count();
        $animal_count = Animal::query()->count();
        $user_count = User::query()->count();

        return view('admin.index', compact(
                'title',
                'user_count',
                'animal_count',
                'animal_pet_count',
                'address_count',
                'video_count',
                'photo_count',
            )
        );
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

        return to_route('admin.home')->with('success', __('messages.auth.success'));
    }

    // Logout from the account
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.show');
    }
}
