<?php

namespace App\Services\Auth\Dtos;

use App\Http\Requests\ChangeUserPasswordRequest;
use Spatie\LaravelData\Data;

class ChangeUserPasswordDto extends Data
{
    public int $userId;

    public string $password;

    public static function fromRequest(ChangeUserPasswordRequest $request): self
    {
        return self::from([
            'userId' => $request->user()->id,
            'password' => $request->getPassword(),
        ]);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }
}
