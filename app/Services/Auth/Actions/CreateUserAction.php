<?php

namespace App\Services\Auth\Actions;

use App\Abstracts\Action;
use App\Exceptions\UserNotSavedException;
use App\Models\User;
use App\Services\Auth\Dtos\CreateUserDto;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Auth\Resources\UserResource;
use App\Services\Spatie\Repositories\Interfaces\ModelHasPermissionRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateUserAction extends Action
{
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected ModelHasPermissionRepositoryInterface $modelHasPermissionRepository,
    ) {
    }

    /**
     * @throws UserNotSavedException
     */
    public function run(CreateUserDto $dto): UserResource
    {
        Db::beginTransaction();
        try {
            $user = $this->userRepository->create(User::createModel($dto));

            $this->modelHasPermissionRepository->addPermissionsToModel(
                $dto->modulesIds,
                $user->id,
                User::class
            );
            Db::commit();
        } catch (Throwable $e) {
            Db::rollBack();
            throw new UserNotSavedException();
        }

        return new UserResource($user);
    }
}
