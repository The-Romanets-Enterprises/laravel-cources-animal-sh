<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalPetRequest;
use App\Models\Animal;
use App\Models\AnimalPet;
use App\Models\Photo;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnimalPetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('messages.animal_pet.plural');

        $animal_pets = AnimalPet::query()->orderBy('created_at', 'desc');
        $animal_pets = $animal_pets->paginate(config('settings.paginate'));

        return view('admin.animal_pet.index', compact(
            'title',
            'animal_pets',
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('messages.animal_pet.create');

        $animals = Animal::query()->orderBy('name')->get();
        $users = User::query()->orderBy('lastname')->get();

        return view('admin.animal_pet.create', compact(
            'title',
            'animals',
            'users',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalPetRequest $request)
    {
        $animalPet = AnimalPet::createAnimalPet($request);

        if (!$animalPet) {
            return redirect()->route('admin.animal-pets.index')
                ->with('error', __('messages.animal_pet.error.store'));
        }

        // Логируем полученные данные
        Log::info('Store Photos: ' . json_encode($request->input('photos')));
        Log::info('Store Videos: ' . json_encode($request->input('videos')));

        if ($request->has('photos')) {
            Log::info('Processing photos...');
            foreach ($request->input('photos', []) as $path) {
                if ($path && Storage::disk('public')->exists($path)) {
                    Log::info("Moving photo: $path");
                    $newPath = 'animal_pets/photos/' . basename($path);
                    Storage::disk('public')->move($path, $newPath);
                    Photo::createFromPath($newPath, $animalPet->id, AnimalPet::class);
                } else {
                    Log::info("Photo path invalid or missing: " . ($path ?? 'null'));
                }
            }
        } else {
            Log::info('No photos in request');
        }

        if ($request->has('videos')) {
            Log::info('Processing videos...');
            foreach ($request->input('videos', []) as $path) {
                if ($path && Storage::disk('public')->exists($path)) {
                    Log::info("Moving video: $path");
                    $newPath = 'animal_pets/videos/' . basename($path);
                    Storage::disk('public')->move($path, $newPath);
                    Video::createFromPath($newPath, $animalPet->id);
                } else {
                    Log::info("Video path invalid or missing: " . ($path ?? 'null'));
                }
            }
        } else {
            Log::info('No videos in request');
        }

        return redirect()->route('admin.animal-pets.index')
            ->with('success', __('messages.animal_pet.success.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(AnimalPet $animal_pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnimalPet $animal_pet)
    {
        $title = __('messages.animal_pet.edit', ['animal_pet' => $animal_pet->name]);

        $animals = Animal::query()->orderBy('name')->get();
        $users = User::query()->orderBy('lastname')->get();

        // Получаем уже загруженные видео
        // Формируем данные для FilePond
        $photosFiles = $animal_pet->photos->map(function ($photo) {
            $mime = mime_content_type(storage_path('app/public/' . $photo->path));
            Log::info("Photo MIME type: $mime for path: " . $photo->path);
            return [
                'source' => asset('storage/' . $photo->path),
                'options' => [
                    'type' => 'local',
                    'file' => ['name' => basename($photo->path), 'type' => $mime]
                ]
            ];
        })->toArray();
        $videosFiles = $animal_pet->videos->map(function ($video) {
            $mime = mime_content_type(storage_path('app/public/' . $video->path));
            Log::info("Video MIME type: $mime for path: " . $video->path);
            return [
                'source' => asset('storage/' . $video->path),
                'options' => [
                    'type' => 'local',
                    'file' => ['name' => basename($video->path), 'type' => $mime]
                ]
            ];
        })->toArray();


        return view('admin.animal_pet.edit', compact(
            'title',
            'animal_pet',
            'animals',
            'users',
            'photosFiles',
            'videosFiles',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalPetRequest $request, AnimalPet $animal_pet)
    {
        // Обновляем и получаем результат (true)
        $result = AnimalPet::updateAnimalPet($request, $animal_pet);

        $redirect = to_route('admin.animal-pets.index');

        // Получаем текущие пути из FilePond
        $newPhotoPaths = $request->input('photos', []);
        $newVideoPaths = $request->input('videos', []);

        // Логируем для отладки
        Log::info('New Photo Paths: ' . json_encode($newPhotoPaths));
        Log::info('New Video Paths: ' . json_encode($newVideoPaths));

        $existingPhotos = $animal_pet->photos->pluck('path')->toArray();
        $photosToDelete = array_diff($existingPhotos, array_filter($newPhotoPaths, 'is_string'));
        foreach ($photosToDelete as $path) {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $animal_pet->photos()->where('path', $path)->delete();
        }

        $existingVideos = $animal_pet->videos->pluck('path')->toArray();
        $videosToDelete = array_diff($existingVideos, array_filter($newVideoPaths, 'is_string'));
        foreach ($videosToDelete as $path) {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $animal_pet->videos()->where('path', $path)->delete();
        }

        if ($request->has('photos')) {
            foreach ($newPhotoPaths as $path) {
                if ($path && Storage::disk('public')->exists($path) && !in_array($path, $existingPhotos)) {
                    $newPath = 'animal_pets/photos/' . basename($path);
                    Storage::disk('public')->move($path, $newPath);
                    Photo::createFromPath($newPath, $animal_pet->id, AnimalPet::class);
                }
            }
        }

        if ($request->has('videos')) {
            foreach ($newVideoPaths as $path) {
                if ($path && Storage::disk('public')->exists($path) && !in_array($path, $existingVideos)) {
                    $newPath = 'animal_pets/videos/' . basename($path);
                    Storage::disk('public')->move($path, $newPath);
                    Video::createFromPath($newPath, $animal_pet->id);
                }
            }
        }

        if (!$result) {
            return $redirect->with('error', __('messages.animal_pet.error.update'));
        }

        return $redirect->with('success', __('messages.animal_pet.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalPet $animal_pet)
    {
        $redirect = redirect()->back();

        $is_destroyed = AnimalPet::deleteAnimalPet($animal_pet);

        if ($is_destroyed === null)
        {
            return $redirect->with('error', __('messages.animal_pet.error.destroy'));
        }

        return $redirect->with('success', __('messages.animal_pet.success.destroy'));
    }
}
