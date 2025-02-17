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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('messages.photo.plural');
        $photos = Photo::query();

        $photos->orderBy('created_at', 'desc');
        $photos = $photos->paginate(config('settings.paginate'));

        return view('admin.photo.index', compact(
            'title',
            'photos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('messages.photo.create');

        $users = User::all()->map(function ($user) {
            return (object) [
                'id' => $user->id,
                'name' => $user->full_name
            ];
        });
        $animals = AnimalPet::select('id', 'name')->get();

        return view('admin.photo.create', compact(
            'title',
            'users',
            'animals',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoRequest $request)
    {
        $photo = Photo::createPhoto($request);
        $redirect = to_route('admin.photos.index');

        if (!$photo)
        {
            return $redirect->with('error', __('messages.photo.error.store'));
        }

        return $redirect->with('success', __('messages.photo.success.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $title = __('messages.photo.edit', ['photo' => $photo->id]);
        $users = User::all()->map(function ($user) {
            return (object) [
                'id' => $user->id,
                'name' => $user->full_name
            ];
        });
        $animals = AnimalPet::select('id', 'name')->get();

        return view('admin.photo.edit', compact(
            'title',
            'photo',
            'users',
            'animals',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoRequest $request, Photo $photo)
    {
        $photo = Photo::updatePhoto($request, $photo);

        $redirect = to_route('admin.photos.index');

        if (!$photo)
        {
            return $redirect->with('error', __('messages.photo.error.update'));
        }

        return $redirect->with('success', __('messages.photo.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        $redirect = redirect()->back();

        $is_destroyed = Photo::deletePhoto($photo);

        if ($is_destroyed === null)
        {
            return $redirect->with('error', __('messages.photo.error.destroy'));
        }

        return $redirect->with('success', __('messages.photo.success.destroy'));
    }
}
