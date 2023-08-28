<?php

namespace App\Services\Spatie\Repositories;

use App\Classes\BaseConstants;
use App\Models\User;
use App\Services\Spatie\Repositories\Interfaces\RoleRepositoryInterface;

class RoleRepository implements RoleRepositoryInterface
{
    public function assignRoleAdmin(User $user): void
    {
        $user->assignRole(BaseConstants::ROLE_ADMIN);
    }

}
