<?php

namespace App\Http\Controllers\Admin;

use App\Enum\Sex;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnimalRequest;
//use App\Models\Article;
use App\Models\Animal;
use App\Models\Animal_pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Class work with authentication and Admin main page
class AnimalController extends Controller
{
    // Admin Main Page
    public function index(Request $request)
    {
        $sex = $request->enum('sex', Sex::class);

        $title = __('messages.request.plural');

        $animal = Animal::query();
       if ($sex) {     //filtering by gender
           $animal->where('role', $sex);
       }
        $animal->orderBy('created_at', 'DESC');
        $animal = $animal->paginate(config('settings.paginate'));

        return view('admin.index', compact(
            'title',
            'sex',
            'animal',

        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.request.create');

        return view('admin.request.create', compact('title'));
    }


    public function store(AnimalRequest $request)
    {
        $animal = Animal::createAnimal($request);

        $redirect = to_route('admin.requests.index');

        if (!$animal) {
            return $redirect->with('error', __('messages.request.error.store'));
        }

        return $redirect->with('success', __('messages.request.success.store'));
    }


    public function show(Animal $animal)
    {
        //
    }


    public function edit(Animal $animal)
    {
        $title = __('messages.request.edit', ['animal' => $animal->name]);

        return view('admin.request.edit', compact('title', 'animal'));
    }


    public function update(AnimalRequest $request, Animal $animal)
    {
        $animal = Animal::updateAnimal($request, $animal);

        $redirect = to_route('admin.requests.index');

        if (!$animal) {
            return $redirect->with('error', __('messages.request.error.update'));
        }

        return $redirect->with('success', __('messages.request.success.update'));
    }


    public function destroy(Animal $animal)
    {
        $redirect = redirect()->back();
        return $redirect->with('success', __('messages.request.success.destroy'));
    }
}
