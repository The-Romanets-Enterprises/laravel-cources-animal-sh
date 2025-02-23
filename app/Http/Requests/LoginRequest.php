<?php

namespace App\Http\Requests;

use App\Rules\Auth\CheckCredentialsRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Определяет, авторизован ли пользователь для выполнения запроса.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Правила валидации запроса.
     */
    public function rules()
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', new CheckCredentialsRule($this->email)],
        ];
    }
}
