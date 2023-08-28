<?php

namespace App\Services\Auth\Actions;

use App\Abstracts\Action;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Auth\Resources\UserResource;

class GetUserAction extends Action
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function run(int $userId): UserResource
    {
        $user = $this->userRepository->getOne($userId, ['permissions']);

        return new UserResource($user);
    }
}
