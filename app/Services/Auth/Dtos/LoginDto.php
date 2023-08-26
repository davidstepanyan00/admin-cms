<?php

namespace App\Services\Auth\Dtos;

use App\Http\Requests\LoginRequest;

class LoginDto
{
    public function __construct(
        public string $email,
        public string $password
    ) {
    }

    public static function fromRequest(LoginRequest $request): self
    {
        return new self(
            email: $request->get('email'),
            password: $request->get('password'),
        );
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
