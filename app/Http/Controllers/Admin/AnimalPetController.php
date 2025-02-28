<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalPetRequest;
use App\Http\Requests\PhotoRequest;
use App\Http\Requests\VideoRequest;
use App\Models\Animal;
use App\Models\AnimalPet;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Http\Request;

class AnimalPetController extends Controller
{
    public function index(Request $request)
    {
        $title = __('messages.animal_pet.plural');

        $animalPets = AnimalPet::query();

        $animalPets->orderBy('name');
        $animalPets = $animalPets->paginate(config('settings.paginate'));

        return view('admin.animal_pet.index', compact(
            'title',

            'animalPets'
        ));
    }

    public function create()
    {
        $animalPet = new AnimalPet();
        $title = __('messages.animal_pet.create');
        $animals = Animal::orderBy('name')->get();

        return view('admin.animal_pet.create', compact('title','animalPet', 'animals'));
    }

    public function store(AnimalPetRequest $request, PhotoRequest $photoRequest, VideoRequest $videoRequest)
    {
        $user = auth()->user();
        $animalPet = AnimalPet::createAnimalPet($request, $user);

        $redirect = to_route('admin.animal_pets.index');

        if (!$animalPet) {
            return $redirect->with('error', __('messages.animal_pet.error.store'));
        }

        if ($photoRequest->hasFile('photos')) {
            $this->handlePhotoUpload($animalPet, $photoRequest);
        }

        if ($videoRequest->hasFile('videos')) {
            $this->handleVideoUpload($animalPet, $videoRequest);
        }

        return $redirect->with('success', __('messages.animal_pet.success.store'));
    }

    public function edit(AnimalPet $animalPet)
    {
        $title = __('messages.animal_pet.edit',['animal_pet' => $animalPet->name]);
        $animals = Animal::orderBy('name')->get();

        return view('admin.animal_pet.edit', compact('title', 'animalPet', 'animals'));
    }

    public function update(AnimalPetRequest $request, AnimalPet $animalPet, PhotoRequest $photoRequest, VideoRequest $videoRequest)
    {
        $animalPet = AnimalPet::updateAnimalPet($request, $animalPet);

        $redirect = to_route('admin.animal_pets.index');

        if (!$animalPet) {
            return $redirect->with('error', __('messages.animal_pet.error.update'));
        }
        if ($request->filled('photos_to_delete')) {
            foreach ($request->input('photos_to_delete') as $photoId) {
                $photo = Photo::find($photoId);
                if ($photo && $photo->imageable_id === $animalPet->id) {
                    Photo::deleteFileFromStorage($photo->path);
                    $photo->delete();
                }
            }
        }

        if ($request->filled('videos_to_delete')) {
            foreach ($request->input('videos_to_delete') as $videoId) {
                $video = Video::find($videoId);
                if ($video && $video->animal_pet_id === $animalPet->id) {
                    Photo::deleteFileFromStorage($video->path);
                    $video->delete();
                }
            }
        }

        if ($photoRequest->hasFile('photos')) {
            $this->handlePhotoUpload($animalPet, $photoRequest);
        }

        if ($videoRequest->hasFile('videos')) {
            $this->handleVideoUpload($animalPet, $videoRequest);
        }

        return $redirect->with('success', __('messages.animal_pet.success.update'));
    }

    public function destroy(AnimalPet $animalPet)
    {
        $redirect = redirect()->back();

        $is_destroyed = AnimalPet::deleteAnimalPet($animalPet);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.animal_pet.error.my-self'));
        }

        return $redirect->with('success', __('messages.animal_pet.success.destroy'));
    }

    protected function handlePhotoUpload(AnimalPet $animalPet, PhotoRequest $photoRequest)
    {
        if ($photoRequest->hasFile('photos')) {
            Photo::createPhoto($photoRequest->merge([
                'imageable_id' => $animalPet->id,
                'imageable_type' => AnimalPet::class,
            ]));
        }
    }

    protected function handleVideoUpload(AnimalPet $animalPet, VideoRequest $videoRequest)
    {
        if ($videoRequest->hasFile('videos')) {
            Video::createVideo($videoRequest->merge([
                'animal_pet_id' => $animalPet->id,
            ]));
        }
    }
}
