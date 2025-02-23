<?php

namespace App\Rules\Auth;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Hash;

class CheckCredentialsRule implements ValidationRule
{
    private string $email;

    public function __construct(?string $email)
    {
        $this->email = $email ?? ''; // Если email = null, присваиваем пустую строку
    }

    /**
     * Валидация учетных данных.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::where('email', $this->email)->first();

        if (!$user || !Hash::check($value, $user->password)) {
            $fail(__('messages.user.error.invalid-credentials')); // Одно сообщение вместо двух
        }
    }
}
