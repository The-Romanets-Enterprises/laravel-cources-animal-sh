<?php

namespace App\Http\Requests;

use App\Enum\Sex;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class Animal_PetRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'description' => ['nullable', 'string'],
            'character' => ['nullable', 'string'],
            'wool_type' => ['nullable', 'string'],
            'sex' => ['required', Rule::enum(Sex::class)],
            'birth_date' => ['required', 'date', 'before_or_equal:today'],
            'is_confirmed' => ['required', 'boolean'],
            'is_sterilized' => ['required', 'boolean'],
            'has_vaccination' => ['required', 'boolean'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'is_confirmed'=> $this->boolean('is_confirmed'),
            'is_sterilized'=> $this->boolean('is_sterilized'),
            'has_vaccination'=> $this->boolean('has_vaccination'),
        ]);
    }
}
