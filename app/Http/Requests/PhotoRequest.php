<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
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
            'path' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'imageable_id' => ['required', 'integer', 'exists:' . $this->imageable_table() . ',id'],
            'imageable_type' => ['required', 'string', 'in:App\\Models\\User,App\\Models\\AnimalPet'],
        ];
    }

    protected function imageable_table()
    {
        $type = $this->input('imageable_type');
        if ($type == 'App\\Models\\AnimalPet') {
            return 'animal_pets';
        }
        if ($type == 'App\\Models\\User') {
            return 'users';
        }
        return '';
    }
}
