<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('messages.country.plural');
        $countries = Country::query();

        $countries->orderBy('name');
        $countries = $countries->paginate(config('settings.paginate'));

        return view('admin.country.index', compact(
            'title',
            'countries'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('messages.country.create');

        return view('admin.country.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        $country = Country::createCountry($request);
        $redirect = to_route('admin.countries.index');

        if (!$country) {
            return $redirect->with('error', __('messages.country.error.store'));
        }

        return $redirect->with('success', __('messages.country.success.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
        $title = __('messages.country.edit', ['country' => $country->name]);

        return view('admin.country.edit', compact('title', 'country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryRequest $request, Country $country)
    {
        $country = Country::updateCountry($request, $country);

        $redirect = to_route('admin.countries.index');

        if (!$country) {
            return $redirect->with('error', __('messages.country.error.update'));
        }

        return $redirect->with('success', __('messages.country.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $redirect = redirect()->back();

        $is_destroyed = Country::deleteCountry($country);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.country.error.destroy'));
        }

        return $redirect->with('success', __('messages.country.success.destroy'));
    }
}
