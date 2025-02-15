<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\Video;
use Illuminate\Http\Request;

// Class work with authentication and Admin main page
class VideoController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.video.plural');

        $videos = Video::query();

        $videos->orderBy('created_at', 'ASC');
        $videos = $videos->paginate(config('settings.paginate'));

        return view('admin.country.index', compact(
            'title',

            'videos',
        ));
    }

    public function create()
    {
        $title = __('messages.video.create');

        return view('admin.video.create', compact('title'));
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
        $title = __('messages.video.edit',['video' => $video->animal_pet_id]);

        return view('admin.video.edit', compact('title', 'video'));
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
            return $redirect->with('error', __('messages.video.error.destroy'));
        }

        return $redirect->with('success', __('messages.video.success.destroy'));
    }
}
