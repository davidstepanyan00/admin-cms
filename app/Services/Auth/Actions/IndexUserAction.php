<?php

namespace App\Services\Auth\Actions;

use App\Abstracts\Action;
use App\Services\Auth\Dtos\IndexUserDto;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Auth\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexUserAction extends Action
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    public function run(IndexUserDto $dto): AnonymousResourceCollection
    {
        $users = $this->userRepository->index($dto, ['permissions']);

        return UserResource::collection($users);
    }
}
