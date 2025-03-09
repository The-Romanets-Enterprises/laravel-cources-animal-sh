<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalPetRequest;
use App\Models\Animal;
use App\Models\Photo;
use App\Models\Video;
use App\Models\User;
use App\Models\AnimalPet;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Log;
use Illuminate\Support\Str;
use Illuminate\Http\Request;



// Class work with authentication and Admin main page
class AnimalPetController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.request.plural');

        $animalPets = AnimalPet::query();

        $animalPets->orderBy('created_at', 'ASC');
        $animalPets = $animalPets->paginate(config('settings.paginate'));

        return view('admin.animalPet.index', compact(
            'title',

            'animalPets'
        ));
    }

    public function create()
    {
        $title = __('messages.request.create');
        $users = User::query()->orderBy('firstname', 'ASC')->get();
        $animals = Animal::query()->orderBy('name')->get();

        return view('admin.animalPet.create', compact('title','users', 'animals'));
    }

    public function store(AnimalPetRequest $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $animalPet = AnimalPet::createAnimalPet($request, $user);

        $redirect = to_route('admin.animal-pets.index');

        if (!$animalPet) {
            return $redirect->with('error', __('messages.request.error.store'));
        }

        return $redirect->with('success', __('messages.request.success.store'));
    }

    public function edit(AnimalPet $animalPet)
    {
        $title = __('messages.request.edit',['animalPet' => $animalPet->id]);
        $users = User::query()->get();
        $animals = Animal::query()->get();

        return view('admin.animalPet.edit', compact('title', 'animalPet', 'users', 'animals'));
    }

    public function update(AnimalPetRequest $request, AnimalPet $animalPet)
    {
        $animalPet = AnimalPet::updateAnimalPet($request, $animalPet);

        $redirect = to_route('admin.animal-pets.index');

        if (!$animalPet) {
            return $redirect->with('error', __('messages.request.error.update'));
        }

        return $redirect->with('success', __('messages.request.success.update'));
    }

    public function destroy(AnimalPet $animalPet)
    {
        $redirect = redirect()->back();

        $is_destroyed = AnimalPet::deleteAnimalPet($animalPet);
        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.request.error.destroy'));
        }

        return $redirect->with('success', __('messages.request.success.destroy'));
    }
}
