<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\UserRequest;
use App\Models\User;
use App\Rules\Auth\MatchOldPasswordRule;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $role = $request->enum('role', Role::class);

        $title = __('messages.user.plural');

        $users = User::query();
        if ($role) {
            $users->where('role', $role);
        }
        $users->orderBy('created_at', 'DESC');
        $users = $users->get();

        return view('admin.user.index', compact(
            'title',
            'role',

            'users',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.user.create');

        return view('admin.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = User::createUser($request);

        $redirect = to_route('admin.users.index');

        if (!$user) {
            return $redirect->with('error', __('messages.user.error.store'));
        }

        return $redirect->with('success', __('messages.user.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $title = __('messages.user.edit', ['user' => $user->name]);

        return view('admin.user.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {
        $user = User::updateUser($request, $user);

        $redirect = to_route('admin.users.index');

        if (!$user) {
            return $redirect->with('error', __('messages.user.error.update'));
        }

        return $redirect->with('success', __('messages.user.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        $redirect = redirect()->back();

        if (!auth()->user()->is_superadmin) {
            return $redirect->with('error', __('messages.user.error.restricted'));
        }

        $is_destroyed = User::deleteUser($user);

        if ($is_destroyed === null) {
            return $redirect->with('error', __('messages.user.error.my-self'));
        }

        return $redirect->with('success', __('messages.user.success.destroy'));
    }

    public function changePassword()
    {
        $title = __('messages.user.change-password');

        return view('admin.user.change-password', compact('title'));
    }

    public function passwordStore(ChangePasswordRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $user->password = Hash::make($request->new_password);
        $user->update();

        return to_route('admin.home')->with('success', __('messages.user.success.change-password'));
    }
}