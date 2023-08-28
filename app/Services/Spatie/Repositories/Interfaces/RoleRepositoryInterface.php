<?php

namespace App\Services\Spatie\Repositories\Interfaces;


use App\Models\User;

interface RoleRepositoryInterface
{
    public function assignRoleAdmin(User $user): void;
}
