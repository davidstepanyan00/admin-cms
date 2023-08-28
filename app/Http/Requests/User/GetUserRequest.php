<?php

namespace App\Http\Requests\User;

use App\Models\User;

class GetUserRequest extends UserRequest
{
    public const ID = 'id';

    public function authorize(): bool
    {
        return $this->user()->can('showInfo', [User::class]);
    }

    public function rules(): array
    {
        return [];
    }

    public function getUserId(): int
    {
        return $this->route(self::ID);
    }
}
