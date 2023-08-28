<?php

namespace App\Services\Auth\Policies;

use App\Models\User;
use App\Services\Spatie\Repositories\Interfaces\PermissionRepositoryInterface;

class UserPolicy
{
    public function __construct(protected PermissionRepositoryInterface $permissionRepository)
    {
    }

    public function create(User $user): bool
    {
        if ($this->userIsLocked($user)) {
            return false;
        }

        if (!$this->permissionRepository->hasModuleAdministration($user)) {
            return false;
        }

        return true;
    }

    public function update(User $user): bool
    {
        if ($this->userIsLocked($user)) {
            return false;
        }

        if (!$this->permissionRepository->hasModuleAdministration($user)) {
            return false;
        }

        return true;
    }

    public function showList(User $user): bool
    {
        if ($this->userIsLocked($user)) {
            return false;
        }

        if (!$this->permissionRepository->hasModuleAdministration($user)) {
            return false;
        }

        return true;
    }

    public function showInfo(User $user): bool
    {
        return $this->userIsLocked($user);
    }

    public function changePassword(User $user): bool
    {
        return $this->userIsLocked($user);
    }

    private function lockEdit(User $user): bool
    {
        if ($this->userIsLocked($user)) {
            return false;
        }

        if (!$this->permissionRepository->hasModuleAdministration($user)) {
            return false;
        }

        return true;
    }

    private function userIsLocked(User $user): bool
    {
        return $user->lock;
    }

}
