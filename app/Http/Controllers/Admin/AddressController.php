<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = __('messages.address.plural');

        $addresses = Address::query();
        $addresses->orderBy('created_at', 'desc');

        $addresses = $addresses->paginate(config('settings.paginate'));

        return view('admin.address.index', compact(
            'title',
            'addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = __('messages.address.create');

        $users = User::query()->orderBy('lastname')->get();
        $cities = City::query()->orderBy('name')->get();

        return view('admin.address.create', compact(
            'title',
            'users',
            'cities',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddressRequest $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $animal = Address::createAddress($request, $user);

        $redirect = to_route('admin.addresses.index');

        if (!$animal)
        {
            return $redirect->with('error', __('messages.address.error.store'));
        }

        return $redirect->with('success', __('messages.address.success.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        $title = __('messages.address.edit');

        $users = User::query()->orderBy('lastname')->get();
        $cities = City::query()->orderBy('name')->get();

        return view('admin.address.edit', compact(
            'title',
            'address',
            'users',
            'cities',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AddressRequest $request, Address $address)
    {
        $animal = Address::updateAddress($request, $address);
        
        $redirect = to_route('admin.addresses.index');

        if (!$animal)
        {
            return $redirect->with('error', __('messages.address.error.update'));
        }

        return $redirect->with('success', __('messages.address.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        $redirect = redirect()->back();

        $is_destroyed = Address::deleteAddress($address);

        if ($is_destroyed === null)
        {
            return $redirect->with('error', __('messages.address.error.destroy'));
        }

        return $redirect->with('success', __('messages.address.success.destroy'));
    }
}
