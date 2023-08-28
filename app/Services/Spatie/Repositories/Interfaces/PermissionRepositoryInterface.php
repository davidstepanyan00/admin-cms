<?php

namespace App\Services\Spatie\Repositories\Interfaces;

use App\Models\User;

interface PermissionRepositoryInterface
{
    public function hasModuleAdministration(User $user): bool;
}
