<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class RecaptchaRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret'   => env('RECAPTCHA_SECRET_KEY'),
            'response' => $value,
        ]);

        return $response->json('success') === true;
    }

    public function message(): string
    {
        return 'Проверка reCAPTCHA не пройдена.';
    }
}
