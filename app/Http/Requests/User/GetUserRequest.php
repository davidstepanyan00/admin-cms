<?php

namespace App\Http\Requests\User;

class GetUserRequest extends UserRequest
{
    public const ID = 'id';

    public function rules(): array
    {
        return [];
    }

    public function getUserId(): int
    {
        return $this->route(self::ID);
    }
}
