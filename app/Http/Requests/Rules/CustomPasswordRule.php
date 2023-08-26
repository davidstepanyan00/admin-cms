<?php

namespace App\Http\Requests\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomPasswordRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        $pattern = '/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$/';

        return preg_match($pattern, $value);
    }

    public function message(): string
    {
        return 'Пароль должен содержать как минимум одну заглавную букву, одну цифру и один специальный символ.';
    }
}
