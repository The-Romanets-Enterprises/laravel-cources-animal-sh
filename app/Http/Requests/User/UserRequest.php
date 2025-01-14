<?php

namespace App\Http\Requests\User;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        /** @var User $user */
        $user = $this->route('user');

        return [
            'email' => ['required', 'max:255', 'email', Rule::unique('users')->ignore($user)],
            'name' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'phone' => ['required', 'max:20'],
            'role' => ['required', Rule::enum(Role::class)],
            'password' => ['nullable', 'max:255', 'confirmed'],
        ];
    }
}
