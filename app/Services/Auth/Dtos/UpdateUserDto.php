<?php

namespace App\Services\Auth\Dtos;

use App\Http\Requests\User\UpdateUserRequest;

class UpdateUserDto extends UserDto
{
    public static function fromRequest(UpdateUserRequest $request): self
    {
        return self::from(...[
                $request->all(),
                'id' => $request->getUserId()
            ],
        );
    }
}
