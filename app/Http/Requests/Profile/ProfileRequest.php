<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'name' => ['required', 'max:255'],
            'lastname' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . auth()->id()],
            'phone' => ['nullable', 'max:20'],

            'city_id' => ['required', 'integer', 'exists:cities,id'],
            'address' => ['required', 'max:255'],
            'post_index' => ['required', 'max:15'],
        ];
    }
}
