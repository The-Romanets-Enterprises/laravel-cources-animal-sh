<?php

namespace App\Http\Requests;

use App\Enums\Sex;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnimalPetRequest extends FormRequest
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
            'animal_id' => ['required', 'integer', 'exists:animals,id'],
            'sex' => ['required', Rule::enum(Sex::class)],
            'name' => ['required', 'string'],
            'description' => ['required'],
            'birth_date' => ['required'],
            'is_sterilized' => ['required', 'boolean'],
            'has_vaccination' => ['required', 'boolean'],
            'wool_type' => ['required', 'string', 'max:100'],
            'character' => ['required'],
            'is_confirmed' => ['required', 'boolean'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
        ];
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'is_sterilized' => $this->has('is_sterilized') ? 1 : 0,
            'has_vaccination' => $this->has('has_vaccination') ? 1 : 0,
            'is_confirmed' => $this->has('is_confirmed') ? 1 : 0,
        ]);
    }
}
