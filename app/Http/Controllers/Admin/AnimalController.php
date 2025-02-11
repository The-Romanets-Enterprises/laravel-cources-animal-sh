<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalRequest;
use App\Models\Animal;
use Illuminate\Http\Request;

// Class work with authentication and Admin main page
class AnimalController extends Controller
{
    // Admin Main Page
    public function index(Request $request)
    {

        $title = __('messages.animal.plural');

        $animals = Animal::query();

        $animals->orderBy('name', 'ASC')->get();
        $animals = $animals->paginate(config('settings.paginate'));

        return view('admin.animal.index', compact(
            'title',
            'animals',

        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.animal.create');
        $animals = Animal::all();
        return view('admin.animal.create', compact('title', 'animals'));
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


    public function show(Animal $animal)
    {
        //
    }


    public function edit(Animal $animal)
    {
        $title = __('messages.animal.edit', ['animal' => $animal->name]);
        $animals = Animal::all();
        return view('admin.animal.edit', compact('title', 'animal', 'animals'));
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
        return $redirect->with('success', __('messages.request.success.destroy'));
    }
}
