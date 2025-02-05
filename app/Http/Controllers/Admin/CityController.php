<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('messages.city.plural');
        $cities = City::query();

        $cities->orderBy('name');
        $cities = $cities->paginate(config('settings.paginate'));

        return view('admin.city.index', compact(
            'title',
            'cities'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('messages.city.create');

        return view('admin.city.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityRequest $request)
    {
        $city = City::createCity($request);
        $redirect = to_route('admin.cities.index');

        if (!$city) {
            return $redirect->with('error', __('messages.city.error.store'));
        }

        return $redirect->with('success', __('messages.city.success.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(City $city)
    {
        $title = __('messages.city.edit', ['city' => $city->name]);

        return view('admin.city.edit', compact('title', 'city'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityRequest $request, City $city)
    {
        $city = City::updateCity($request, $city);

        $redirect = to_route('admin.cities.index');

        if (!$city) {
            return $redirect->with('error', __('messages.city.error.update'));
        }

        return $redirect->with('success', __('messages.city.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $redirect = redirect()->back();

        $is_destroyed = City::deleteCity($city);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.city.error.destroy'));
        }

        return $redirect->with('success', __('messages.city.success.destroy'));
    }
}
