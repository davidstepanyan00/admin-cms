<?php

namespace App\Http\Requests\User;

use App\Models\User;

class CreateUserRequest extends UserRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', [User::class]);
    }
}
