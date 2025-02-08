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
            'description' => ['nullable', 'string'],
            'is_confirmed' => ['required', 'boolean'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'birth_date' => ['required', 'date', 'before_or_equal:today'],
            'is_sterilized' => ['required', 'boolean'],
            'has_vaccination' => ['required', 'boolean'],
            'wool_type' => ['nullable', 'string'],
            'character' => ['nullable', 'string'],
        ];
    }
}
