<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VideoRequest;
use App\Models\AnimalPet;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('messages.video.plural');
        $videos = Video::query();

        $videos->orderBy('created_at', 'desc');
        $videos = $videos->paginate(config('settings.paginate'));

        return view('admin.video.index', compact(
            'title',
            'videos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('messages.video.create');
        $animal_pets = AnimalPet::query()->orderBy('name')->get();

        return view('admin.video.create', compact('title', 'animal_pets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
        $video = Video::createVideo($request);
        $redirect = to_route('admin.videos.index');

        if (!$video) {
            return $redirect->with('error', __('messages.video.error.store'));
        }

        return $redirect->with('success', __('messages.video.success.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        $title = __('messages.video.edit');
        $animal_pets = AnimalPet::query()->orderBy('name')->get();

        return view('admin.video.edit', compact('title', 'video', 'animal_pets'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VideoRequest $request, Video $video)
    {
        $video = Video::updateVideo($request, $video);
        $redirect = to_route('admin.videos.index');

        if (!$video) {
            return $redirect->with('error', __('messages.video.error.update'));
        }

        return $redirect->with('success', __('messages.video.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
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
