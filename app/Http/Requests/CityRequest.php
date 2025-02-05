<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
        $cityId = $this->route('city')?->id ?? 'NULL'; // Берём ID города из маршрута (если редактируем)

        return [
            'name' => [
                'required',
                'max:255',
                // Проверка уникальности, исключаем сам редактируемый город
                "unique:cities,name,$cityId,id,country_id," . $this->country_id,
            ],
            'country_id' => ['required', 'integer', 'exists:countries,id'],
        ];
    }
}
