<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnimalPet;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AnimalPet $animalPet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AnimalPet $animalPet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AnimalPet $animalPet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AnimalPet $animalPet)
    {
        //
    }
}
