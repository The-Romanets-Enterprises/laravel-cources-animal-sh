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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('messages.animal_pet.plural');

        $animal_pets = AnimalPet::query();

        $animal_pets->orderBy('created_at', 'desc');
        $animal_pets = $animal_pets->paginate(config('settings.paginate_pets'));

        return view('admin.animal_pet.index', compact(
            'title',
            'animal_pets'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('messages.animal_pet.create');

        $animals = Animal::query()->get();
        $users = User::query()->get();

        return view('admin.animal_pet.create', compact('title', 'animals', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnimalPetRequest $request)
    {
        $animal = AnimalPet::createAnimalPet($request);
        $redirect = to_route('admin.animal-pets.index');

        if (!$animal) {
            return $redirect->with('error', __('messages.animal_pet.error.store'));
        }

        return $redirect->with('success', __('messages.animal_pet.success.store'));
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
        $animals = Animal::query()->get();
        $users = User::query()->get();

        return view('admin.animal_pet.edit', compact('title', 'animal_pet', 'animals', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnimalPetRequest $request, AnimalPet $animal_pet)
    {
        $animal_pet = AnimalPet::updateAnimalPet($request, $animal_pet);

        $redirect = to_route('admin.animal-pets.index');

        if (!$animal_pet) {
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

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.animal_pet.error.destroy'));
        }

        return $redirect->with('success', __('messages.animal_pet.success.destroy'));
    }
}
