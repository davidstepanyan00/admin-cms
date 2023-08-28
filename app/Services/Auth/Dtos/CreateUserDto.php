<?php

namespace App\Services\Auth\Dtos;

use App\Http\Requests\User\CreateUserRequest;

class CreateUserDto extends UserDto
{
    public static function fromRequest(CreateUserRequest $request): self
    {
        return self::from(... $request->all());
    }

    public static function fromParams(string $email, string $password): self
    {
        return self::from([
            'email' => $email,
            'password' => $password,
        ]);
    }
}
