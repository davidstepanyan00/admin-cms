<?php

namespace App\Services\Spatie\Repositories;

use App\Models\ModelHasPermission;
use App\Services\Spatie\Repositories\Interfaces\ModelHasPermissionRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class ModelHasPermissionRepository implements ModelHasPermissionRepositoryInterface
{
    public function query(): Builder
    {
        return ModelHasPermission::query();
    }

    public function addPermissionsToModel(array $permissionsIds, string $modelId, string $modelType): void
    {
        $data = [];

        foreach ($permissionsIds as $permissionId) {
            $data[] = [
              'model_type' => $modelType,
              'model_id' => $modelId,
              'permission_id' => $permissionId,
            ];
        }

        $this->query()->insert($data);
    }

    public function deleteAllPermissionsToModel(string $modelId, string $modelType): void
    {
        $this->query()
            ->where('model_id', $modelId)
            ->where('model_type', $modelType)
            ->delete();
    }
}
