<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\AnimalPet;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.video.plural');

        $videos = Video::query();

        $videos->orderBy('path');
        $videos = $videos->paginate(config('settings.paginate'));

        return view('admin.video.index', compact(
            'title',

            'videos',
        ));
    }

    public function create()
    {
        $title = __('messages.video.create');
        $animal_pets = AnimalPet::all();

        return view('admin.video.create', compact('title','animal_pets'));
    }

    public function store(VideoRequest $request)
    {
        $video = Video::createVideo($request);

        $redirect = to_route('admin.videos.index');

        if (!$video) {
            return $redirect->with('error', __('messages.video.error.store'));
        }

        return $redirect->with('success', __('messages.video.success.store'));
    }

    public function edit(Video $video)
    {
        $title = __('messages.video.edit',['video' => $video->path]);
        $animal_pets = AnimalPet::all();

        return view('admin.video.edit', compact('title', 'video', 'animal_pets'));
    }

    public function update(VideoRequest $request, Video $video)
    {
        $video = Video::updateVideo($request, $video);

        $redirect = to_route('admin.videos.index');

        if (!$video) {
            return $redirect->with('error', __('messages.video.error.update'));
        }

        return $redirect->with('success', __('messages.video.success.update'));
    }

    public function destroy(Video $video)
    {
        $redirect = redirect()->back();

        $is_destroyed = Video::deleteVideo($video);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.video.error.my-self'));
        }

        return $redirect->with('success', __('messages.video.success.destroy'));
    }
}
