<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\PhotoRequest;
use App\Models\Photo;
use Illuminate\Http\Request;

// Class work with authentication and Admin main page
class PhotoController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.photo.plural');

        $photos = Photo::query();

        $photos->orderBy('created_at', 'ASC');
        $photos = $photos->paginate(config('settings.paginate'));

        return view('admin.photo.index', compact(
            'title',

            'photos',
        ));
    }

    public function create()
    {
        $title = __('messages.photo.create');

        return view('admin.photo.create', compact('title'));
    }

    public function store(PhotoRequest $request)
    {
        $photos = Photo::createPhoto($request);

        $redirect = to_route('admin.photos.index');

        if (!$photos) {
            return $redirect->with('error', __('messages.photo.error.store'));
        }

        return $redirect->with('success', __('messages.photo.success.store'));
    }

    public function edit(Photo $photo)
    {
        $title = __('messages.photo.edit',['photo' => $photo->imageable_id]);

        return view('admin.photo.edit', compact('title', 'photo'));
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

        $is_destroyed = Photo::deleteVideo($photo);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.photo.error.destroy'));
        }

        return $redirect->with('success', __('messages.photo.success.destroy'));
    }

}
