<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Address;
use App\Models\Animal;
use App\Models\AnimalPet;
use App\Models\City;
use App\Models\Country;
use App\Models\Photo;
use App\Models\User;
use App\Models\Video;
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
        $title = __('messages.main_page');

        $user_count = User::query()->count();
        $country_count = Country::query()->count();
        $city_count = City::query()->count();
        $animal_count = Animal::query()->count();
        $animal_pet_count = AnimalPet::query()->count();
        $address_count = Address::query()->count();
//        $photo_count = Photo::query()->count();
//        $video_count = Video::query()->count();

        return view('admin.index', compact(
                'title',
                'user_count',
                'country_count',
                'city_count',
                'animal_count',
                'animal_pet_count',
                'address_count',
//                'photo_count',
//                'video_count'
            )
        );
    }

    public function register()
    {
        return view('auth.register', ['title' => __('messages.register.register')]);
    }

    public function signup(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone' => $request->phone,
        ]);

        if (!$user) {
            return back()->with('error', __('messages.register.error'));
        }

        Auth::login($user, true);
        return to_route('index')->with('success', __('messages.register.success'));

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

        if (!$is_accepted) {
            return back()->with('error', __('messages.auth.error'));
        }

        $redirectRoute = Auth::user()->role == Role::ADMIN ? 'admin.home' : 'index';
        return to_route($redirectRoute)->with('success', __('messages.auth.success'));
    }

    // Logout from the account
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('success', __('messages.auth.logout.success'));
    }
}
