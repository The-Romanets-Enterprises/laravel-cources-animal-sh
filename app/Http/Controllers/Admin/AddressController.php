<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index(Request $request)
    {

        $title = __('messages.address.plural');

        $addresses = Address::query();

        $addresses->orderBy('address');
        $addresses = $addresses->paginate(config('settings.paginate'));

        return view('admin.address.index', compact(
            'title',

            'addresses',
        ));
    }

    public function create()
    {
        $title = __('messages.address.create');
        $users = User::orderBy('lastname')->get();
        $cities = City::orderBy('name')->get();

        return view('admin.address.create', compact('title','users', 'cities'));
    }

    public function store(AddressRequest $request)
    {
        $user = User::findOrFail($request->input('user_id'));
        $address = Address::createAddress($request, $user);

        $redirect = to_route('admin.addresses.index');

        if (!$address) {
            return $redirect->with('error', __('messages.address.error.store'));
        }

        return $redirect->with('success', __('messages.address.success.store'));
    }

    public function edit(Address $address)
    {
        $title = __('messages.address.edit',['address' => $address->address]);
        $users = User::orderBy('name')->get();
        $cities = City::orderBy('name')->get();

        return view('admin.address.edit', compact('title', 'address', 'users', 'cities'));
    }

    public function update(AddressRequest $request, Address $address)
    {
        $address = Address::updateAddress($request, $address);

        $redirect = to_route('admin.addresses.index');

        if (!$address) {
            return $redirect->with('error', __('messages.address.error.update'));
        }

        return $redirect->with('success', __('messages.address.success.update'));
    }

    public function destroy(Address $address)
    {
        $redirect = redirect()->back();

        $is_destroyed = Address::deleteAddress($address);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.address.error.my-self'));
        }

        return $redirect->with('success', __('messages.address.success.destroy'));
    }
}
