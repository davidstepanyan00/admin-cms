<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

abstract class UserRequest extends FormRequest
{
    public const FIRST_NAME = 'firstName';
    public const LAST_NAME = 'lastName';
    public const EMAIL = 'email';
    public const MODULES_IDS = 'modulesIds';
    public const MODULE_ID = 'modulesIds.*';

    public function rules(): array
    {
        return [
            self::FIRST_NAME => [
                'string',
                'required',
            ],
            self::LAST_NAME => [
                'string',
                'required',
            ],
            self::EMAIL => [
                'email',
                'required',
            ],
            self::MODULES_IDS => [
                'array',
                'required',
            ],
            self::MODULE_ID => [
                'int',
            ],
        ];
    }
}
