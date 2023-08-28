<?php

namespace App\Services\Auth\Dtos;

use App\Http\Requests\LoginRequest;
use Spatie\LaravelData\Data;

class LoginDto extends Data
{
    public string $email;
    public string $password;

    public static function fromRequest(LoginRequest $request): self
    {
        return self::from([
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ]);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
