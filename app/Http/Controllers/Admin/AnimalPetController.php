<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalPetRequest;
use App\Models\Animal;
use App\Models\AnimalPet;
use App\Models\User;
use Illuminate\Http\Request;

class AnimalPetController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.animal_pet.plural');

        $animalPets = AnimalPet::query();

        $animalPets->orderBy('animal_id');
        $animalPets = $animalPets->paginate(config('settings.paginate'));

        return view('admin.animal_pet.index', compact(
            'title',

            'animalPets'
        ));
    }

    public function create()
    {
        $title = __('messages.animal_pet.create');
        $users = User::all();
        $animals = Animal::all();

        return view('admin.animal_pet.create', compact('title','users', 'animals'));
    }

    public function store(AnimalPetRequest $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $animalPet = AnimalPet::createAnimalPet($request, $user);

        $redirect = to_route('admin.animal_pets.index');

        if (!$animalPet) {
            return $redirect->with('error', __('messages.animal_pet.error.store'));
        }

        return $redirect->with('success', __('messages.animal_pet.success.store'));
    }

    public function edit(AnimalPet $animalPet)
    {
        $title = __('messages.animal_pet.edit',['animal_pet' => $animalPet->name]);
        $users = User::all();
        $animals = Animal::all();

        return view('admin.animal_pet.edit', compact('title', 'animalPet', 'users', 'animals'));
    }

    public function update(AnimalPetRequest $request, AnimalPet $animalPet)
    {
        $animalPet = AnimalPet::updateAnimalPet($request, $animalPet);

        $redirect = to_route('admin.animal_pets.index');

        if (!$animalPet) {
            return $redirect->with('error', __('messages.animal_pet.error.update'));
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
}
