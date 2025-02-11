<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Animal_PetRequest;
use App\Models\Animal;
use App\Models\User;
use App\Models\Animal_pet;
use Illuminate\Http\Request;



// Class work with authentication and Admin main page
class Animal_PetController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.request.plural');

        $animal_pets = Animal_pet::query();

        $animal_pets->orderBy('name', 'ASC');
        $animal_pets = $animal_pets->paginate(config('settings.paginate'));

        return view('admin.request.index', compact(
            'title',

            'animal_pets'
        ));
    }

    public function create()
    {
        $title = __('messages.request.create');
        $users = User::all();
        $animals = Animal::all();

        return view('admin.request.create', compact('title','users', 'animals'));
    }

    public function store(Animal_PetRequest $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $animal_pet = Animal_pet::createAnimal_pet($request, $user);

        $redirect = to_route('admin.requests.index');

        if (!$animal_pet) {
            return $redirect->with('error', __('messages.request.error.store'));
        }

        return $redirect->with('success', __('messages.request.success.store'));
    }

    public function edit(Animal_pet $animal_pet)
    {
        $title = __('messages.request.edit',['animal_pet' => $animal_pet->name]);
        $users = User::all();
        $animals = Animal::all();

        return view('admin.request.edit', compact('title', 'animal_pet', 'users', 'animals'));
    }

    public function update(Animal_PetRequest $request, Animal_pet $animal_pet)
    {
        $animal_pet = Animal_pet::updateAnimal_pet($request, $animal_pet);

        $redirect = to_route('admin.requests.index');

        if (!$animal_pet) {
            return $redirect->with('error', __('messages.request.error.update'));
        }

        return $redirect->with('success', __('messages.request.success.update'));
    }

    public function destroy(Animal_pet $animal_pet)
    {
        $redirect = redirect()->back();

        $is_destroyed = Animal_pet::deleteAnimal_pet($animal_pet);
        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.request.error.destroy'));
        }

        return $redirect->with('success', __('messages.request.success.destroy'));
    }
}
