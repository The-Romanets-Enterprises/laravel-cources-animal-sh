<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.animal.plural');

        $animals = Animal::query();

        $animals->orderBy('name');
        $animals = $animals->paginate(config('settings.paginate'));

        return view('admin.animal.index', compact(
            'title',

            'animals'
        ));
    }

    public function create()
    {
        $title = __('messages.animal.create');

        return view('admin.animal.create', compact('title'));
    }

    public function store(AnimalRequest $request)
    {
        $animal = Animal::createAnimal($request);

        $redirect = to_route('admin.animals.index');

        if (!$animal) {
            return $redirect->with('error', __('messages.animal.error.store'));
        }

        return $redirect->with('success', __('messages.animal.success.store'));
    }

    public function edit(Animal $animal)
    {
        $title = __('messages.animal.edit',['animal' => $animal->name]);

        return view('admin.animal.edit', compact('title', 'animal'));
    }

    public function update(AnimalRequest $request, Animal $animal)
    {
        $animal = Animal::updateAnimal($request, $animal);

        $redirect = to_route('admin.animals.index');

        if (!$animal) {
            return $redirect->with('error', __('messages.animal.error.update'));
        }

        return $redirect->with('success', __('messages.animal.success.update'));
    }

    public function destroy(Animal $animal)
    {
        $redirect = redirect()->back();

        $is_destroyed = Animal::deleteAnimal($animal);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.animal.error.my-self'));
        }

        return $redirect->with('success', __('messages.animal.success.destroy'));
    }
}
