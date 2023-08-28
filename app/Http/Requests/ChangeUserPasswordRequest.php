<?php

namespace App\Http\Requests;

use App\Http\Requests\Rules\CustomPasswordRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChangeUserPasswordRequest extends Request
{
    public const PASSWORD = 'password';
    public const CONFIRM_PASSWORD = 'confirmPassword';

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            self::PASSWORD => [
              'string',
              'required',
              'min:8',
              'max:8',
               new CustomPasswordRule(),
            ],

            self::CONFIRM_PASSWORD => [
                'same:password',
                'required',
            ]
        ];
    }

    public function getPassword(): string
    {
        return $this->get(self::PASSWORD);
    }
}
