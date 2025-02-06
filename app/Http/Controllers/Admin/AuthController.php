<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Animal;
use App\Models\AnimalPet;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Class work with authentication and Admin main page
class AuthController extends Controller
{
    // Admin Main Page
    public function index()
    {
        $title = __('messages.main_page');

        $user_count = User::query()->count();

        $country_count = Country::query()->count();

        $city_count = City::query()->count();

        $animal_count = Animal::query()->count();

        $animal_pet_count = AnimalPet::query()->count();

        return view('admin.index', compact(
                'title',

                'user_count',
                'country_count',
                'city_count',
                'animal_count',
                'animal_pet_count',
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
