<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Http\Requests\Profile\ProfileRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cities = City::orderBy('name')->get();
        $title = __('messages.user.profile');
        return view('user.profile', compact('user', 'cities', 'title'));
    }

    public function update(ProfileRequest $request)
    {
        $user = Auth::user();
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $photoRequest = new PhotoRequest([
                'photo' => [$request->file('photo')],
                'imageable_id' => $user->id,
                'imageable_type' => User::class,
            ]);

            Photo::createPhoto($photoRequest);
        }

        if ($request->filled('photos_to_delete')) {
            foreach ($request->input('photos_to_delete') as $photoId) {
                $photo = Photo::find($photoId);
                if ($photo && $photo->imageable_id === $user->id && $photo->imageable_type === User::class) {
                    Photo::deleteFileFromStorage($photo->path);
                    $photo->delete();
                }
            }
        }

        $user->update($data);

        Address::updateOrCreate(
            ['user_id' => $user->id],
            [
                'city_id' => $data['city_id'],
                'address' => $data['address'],
                'post_index' => $data['post_index'],
            ]
        );

        return to_route('user.profile')->with('success', __('messages.user.success.update-profile'));
    }

    public function delete()
    {
        $user = Auth::user();

        if ($user->photos->isNotEmpty()) {
            foreach ($user->photos as $photo) {
                Photo::deleteFileFromStorage($photo->path);
                $photo->delete();
            }
        }

        if ($user->address) {
            $user->address->delete();
        }

        $user->delete();
        Auth::logout();

        return redirect()->route('user.login.show')->with('success', 'Ваш аккаунт был успешно удалён');
    }
}
