<?php

namespace App\Services\Auth\Actions;

use App\Abstracts\Action;
use App\Exceptions\FailedEditLockUserException;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use Throwable;

class EditUserLockAction extends Action
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {
    }

    /**
     * @throws FailedEditLockUserException
     */
    public function run(string $userId, bool $lock): void
    {
        try {
            $this->userRepository->editLockUser($userId, $lock);
        } catch (Throwable $e) {
            throw new FailedEditLockUserException();
        }
    }
}
