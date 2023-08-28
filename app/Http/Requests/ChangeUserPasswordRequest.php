<?php

namespace App\Http\Requests;

use App\Http\Requests\Rules\CustomPasswordRule;
use App\Models\User;
use Illuminate\Http\Request;

class ChangeUserPasswordRequest extends Request
{
    public const PASSWORD = 'password';
    public const CONFIRM_PASSWORD = 'confirmPassword';

    public function authorize(): bool
    {
        return $this->user()->can('changePassword', [User::class]);
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
