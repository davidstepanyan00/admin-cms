<?php

namespace App\Services\Auth\Dtos;

use Spatie\LaravelData\Data;

abstract class UserDto extends Data
{
    public ?int $userId;
    public string $email;
    public string $password;
    public ?array $modulesIds;
    public ?string $firstName;
    public ?string $lastName;

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }
}
