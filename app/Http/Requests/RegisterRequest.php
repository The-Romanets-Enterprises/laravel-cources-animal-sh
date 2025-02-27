<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\RecaptchaRule;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'alpha', 'min:2', 'max:255'],
            'lastname' => ['required', 'string', 'alpha', 'min:2', 'max:255'], // Фамилия обязательна!
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:32', 'confirmed'], // Проверка пароля + подтверждение
            'g-recaptcha-response' => ['required', new RecaptchaRule()], // reCAPTCHA v2
            'terms' => ['accepted'], // Чекбокс политики
        ];
    }
}
