<?php

namespace App\Http\Requests\User;

use App\Models\User;

class UpdateUserRequest extends UserRequest
{
    public const ID = 'id';

    public function authorize(): bool
    {
        return $this->user()->can('update', [User::class]);
    }

    public function getUserId(): int
    {
        return $this->route(self::ID);
    }
}
