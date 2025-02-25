<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $title = __('messages.user.profile');
        return view('user.profile', compact('user', 'title'));
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();

//        if ($request->hasFile('photo')) {
//            $path = $request->file('photo')->store('users/photos', 'public');
//            $data['photo'] = $path;
//        }

        $user->update([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phone' => $data['phone'],
//            'photo' => $data['photo'] ?? $user->photo,
        ]);

        Address::updateOrCreate(
            ['user_id' => $user->id],
            [
                'city_id' => $data['city_id'],
                'address' => $data['address'],
            ]
        );

        return to_route('user.profile')->with('success', __('messages.user.success.update-profile'));
    }
}
