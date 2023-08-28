<?php

namespace App\Services\Spatie\Repositories\Interfaces;

interface ModelHasPermissionRepositoryInterface
{
    public function addPermissionsToModel(array $permissionsIds, string $modelId, string $modelType): void;

    public function deleteAllPermissionsToModel(string $modelId, string $modelType): void;
}
