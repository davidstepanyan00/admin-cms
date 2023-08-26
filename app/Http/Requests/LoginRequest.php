<?php

namespace App\Http\Requests;

use App\Http\Requests\Rules\CustomPasswordRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public const EMAIL = 'email';
    public const PASSWORD = 'password';

    public function rules(): array
    {
        return [
            self::EMAIL => [
                'email',
                'required',
                'unique:users,email',
            ],

            self::PASSWORD => [
                'string',
                'min:8',
                'max:20',
                new CustomPasswordRule
            ],
        ];
    }
}
