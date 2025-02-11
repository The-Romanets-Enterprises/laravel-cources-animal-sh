<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use App\Models\Country;
use App\Models\City;
use Illuminate\Http\Request;


// Class work with authentication and Admin main page
class CityController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.city.plural');

        $cities = City::query();

        $cities->orderBy('name', 'ASC');
        $cities = $cities->paginate(config('settings.paginate'));

        return view('admin.city.index', compact(
            'title',

            'cities',
        ));
    }

    public function create()
    {
        $title = __('messages.city.create');
        $countries = Country::all();

        return view('admin.city.create', compact('title','countries'));
    }

    public function store(CityRequest $request)
    {
        $city = City::createCity($request);

        $redirect = to_route('admin.cities.index');

        if (!$city) {
            return $redirect->with('error', __('messages.city.error.store'));
        }

        return $redirect->with('success', __('messages.city.success.store'));
    }

    public function edit(City $city)
    {
        $title = __('messages.city.edit',['city' => $city->name]);
        $countries = Country::all();

        return view('admin.city.edit', compact('title', 'city', 'countries'));
    }

    public function update(CityRequest $request, City $city)
    {
        $city = City::updateCity($request, $city);

        $redirect = to_route('admin.cities.index');

        if (!$city) {
            return $redirect->with('error', __('messages.city.error.update'));
        }

        return $redirect->with('success', __('messages.city.success.update'));
    }

    public function destroy(City $city)
    {
        $redirect = redirect()->back();

        $is_destroyed = City::deleteCity($city);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.city.error.my-self'));
        }

        return $redirect->with('success', __('messages.city.success.destroy'));
    }
}
