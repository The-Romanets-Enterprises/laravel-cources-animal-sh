<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\AnimalPet;
use App\Models\Animal;
use App\Models\Address;
//use App\Models\Photo;
use App\Models\User;
//use App\Models\Video;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

// Class work with authentication and Admin main page
class AuthController extends Controller
{

    public function welcome()
    {

        $title = __('messages.main_page');

        return view('welcome', compact(
                'title',
            )
        );
    }

    // Admin Main Page
    public function index()
    {
        $title = __('messages.main_page');
        $address_count = Address::query()->count();
//        $video_count = Video::query()->count();
//        $photo_count = Photo::query()->count();
        $animalPet_count = AnimalPet::query()->count();
        $animal_count = Animal::query()->count();
        $user_count = User::query()->count();

        return view('admin.index', compact(
                'title',
                'user_count',
                'animal_count',
                'animalPet_count',
                'address_count',
//                'video_count',
//                'photo_count',
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
    public function register()
    {
        return view('auth.register');
    }

    public function reg(RegisterRequest $request)
    {
        $user = User::create([
            'email' => $request->email,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);

        if (!$user) {
            return back()->with('error', __('messages.register.error'));
        }

        Auth::login($user, true);
        return to_route('index')->with('success', __('messages.register.success'));

    }

    public function store(RegisterRequest $request)
    {
        $is_accepted = User::registerUser($request);

        if ($is_accepted)
        {
            session()->flash('error', __('messages.register.success'));
            return redirect()->route('admin.home');
        }

        return redirect()-> back()->with('error', __('messages.register.error'));
    }
    // Logout from the account
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.show');
    }

    public function forgotPassword()
    {
        $title = __('messages.auth.forgot_password');

        return view('auth.forgot-password', compact('title'));
    }

    public function forgotPasswordStore(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));

        return back()->with('success', trans($status));
    }

    public function passwordReset(Request $request)
    {
        $title = __('messages.auth.reset_password');

        return view('admin.auth.reset-password', compact('title'));
    }

    public function passwordResetStore(ResetPasswordRequest $request)
    {
        $status = Password::reset($request->validated(), function (User $user) use ($request) {
            $user->forceFill([
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(60),
            ])->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('admin.login.show')->with('success', __($status));
        }

        return back()->withInput($request->only('email'))->withErrors(['email'=> __($status)]);
    }
}
