<?php

namespace App\Services\Spatie\Repositories;

use App\Classes\BaseConstants;
use App\Models\User;
use App\Services\Spatie\Repositories\Interfaces\PermissionRepositoryInterface;

class PermissionRepository implements PermissionRepositoryInterface
{
    public function hasModuleAdministration(User $user): bool
    {
        return $user->hasPermissionTo(BaseConstants::MODULE_ADMINISTRATION);
    }
}
