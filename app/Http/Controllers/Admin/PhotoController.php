<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\AnimalPet;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.photo.plural');

        $photos = Photo::query();

        $photos->orderBy('path');
        $photos = $photos->paginate(config('settings.paginate'));

        return view('admin.photo.index', compact(
            'title',

            'photos',
        ));
    }

    public function create()
    {
        $title = __('messages.photo.create');
        $animalPets = AnimalPet::orderBy('name')->get();;
        $users = User::orderBy('name')->get();;

        return view('admin.photo.create', compact('title','animalPets', 'users'));
    }

    public function store(PhotoRequest $request)
    {
        $photo = Photo::createPhoto($request);

        $redirect = to_route('admin.photos.index');

        if (!$photo) {
            return $redirect->with('error', __('messages.photo.error.store'));
        }

        return $redirect->with('success', __('messages.photo.success.store'));
    }

    public function edit(Photo $photo)
    {
        $title = __('messages.photo.edit',['photo' => $photo->path]);
        $animalPets = AnimalPet::orderBy('name')->get();
        $users = User::orderBy('name')->get();

        return view('admin.photo.edit', compact('title', 'photo', 'animalPets', 'users'));
    }

    public function update(PhotoRequest $request, Photo $photo)
    {
        $photo = Photo::updatePhoto($request, $photo);

        $redirect = to_route('admin.photos.index');

        if (!$photo) {
            return $redirect->with('error', __('messages.photo.error.update'));
        }

        return $redirect->with('success', __('messages.photo.success.update'));
    }

    public function destroy(Photo $photo)
    {
        $redirect = redirect()->back();

        $is_destroyed = Photo::deletePhoto($photo);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.photo.error.my-self'));
        }

        return $redirect->with('success', __('messages.photo.success.destroy'));
    }
}
