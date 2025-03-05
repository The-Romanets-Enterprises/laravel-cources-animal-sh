<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Address;
use App\Models\Animal;
use App\Models\AnimalPet;
use App\Models\Article;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Class work with authentication and Admin main page
class AuthController extends Controller
{
    public function welcome()
    {
        $title = __('messages.main_page');

        return view('index', compact(
                'title',
            )
        );
    }

    // Admin Main Page
    public function index()
    {
        $title = __('messages.main_page'); //тут тоже надо добавить страницу юзера

        $user_count = User::query()->count();
        $city_count = City::query()->count();
        $country_count = Country::query()->count();
        $address_count = Address::query()->count();
        $animal_count = Animal::query()->count();
        $animal_pet_count = AnimalPet::query()->count();

        return view('admin.index', compact(
                'title',

                'user_count', 'city_count', 'country_count', 'address_count', 'animal_count', 'animal_pet_count'
            )
        );
    }

    // Enter into an account page (ONLY VIEW)
    public function login()
    {
        $title = __('messages.auth.login');

        return view('auth.login', compact('title'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $user = User::registerUser($request);

        if (!$user) {
            return to_route('register.show')->with('error', __('messages.user.error.store'));
        }

        Auth::login($user);

        return redirect()->route('user.home')->with('success', __('messages.user.success.store'));
    }

    // Store information in session
    public function auth(LoginRequest $request)
    {
//        if(auth()->user()->role == \App\Enums\Role::ADMIN){ //условие для того является ли админ
            $is_accepted = Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $request->remember);

        if (!$is_accepted) {
            return back()->with('error', __('messages.auth.error'));
        }

        $redirectRoute = Auth::user()->role == Role::ADMIN ? 'admin.home' : 'user.home';
        return to_route($redirectRoute)->with('success', __('messages.auth.success'));
    }

    // Logout from the account
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
