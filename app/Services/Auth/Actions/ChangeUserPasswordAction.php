<?php

namespace App\Services\Auth\Actions;

use App\Abstracts\Action;
use App\Exceptions\FailedChangeUserPasswordException;
use App\Models\User;
use App\Services\Auth\Dtos\ChangeUserPasswordDto;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use Throwable;

class ChangeUserPasswordAction extends Action
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws FailedChangeUserPasswordException
     */
    public function run(ChangeUserPasswordDto $dto): void
    {
        try {
            $this->userRepository->update(User::changePasswordModel($dto), $dto->getUserId());
        } catch (Throwable $e) {
            throw new FailedChangeUserPasswordException();
        }
    }
}
