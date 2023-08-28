<?php

namespace App\Services\Auth\Actions;

use App\Abstracts\Action;
use App\Exceptions\FailedUpdateUserException;
use App\Models\User;
use App\Services\Auth\Dtos\UpdateUserDto;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Auth\Resources\UserResource;
use App\Services\Spatie\Repositories\Interfaces\ModelHasPermissionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

class UpdateUserAction extends Action
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected ModelHasPermissionRepositoryInterface $modelHasPermissionRepository,
    ) {
    }

    /**
     * @throws FailedUpdateUserException
     */
    public function run(UpdateUserDto $dto): UserResource
    {
        Db::beginTransaction();
        try {
            $user = $this->userRepository->update(User::updateModel($dto), $dto->getUserId());

            $this->modelHasPermissionRepository->deleteAllPermissionsToModel($user->id, User::class);

            $this->modelHasPermissionRepository->addPermissionsToModel(
                $dto->modulesIds,
                $user->id,
                User::class
            );
            Db::commit();
        } catch (Throwable $e) {
            Db::rollBack();
            throw new FailedUpdateUserException();
        }

        return new UserResource($user);
    }
}
