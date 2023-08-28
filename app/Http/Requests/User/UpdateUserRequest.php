<?php

namespace App\Http\Requests\User;

class UpdateUserRequest extends UserRequest
{
    public const ID = 'id';

    public function getUserId(): int
    {
        return $this->route(self::ID);
    }
}
