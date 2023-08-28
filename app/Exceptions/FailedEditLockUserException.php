<?php

namespace App\Exceptions;

class FailedEditLockUserException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::FAILED_EDIT_LOCK_USER;
    }

    public function getStatusMessage(): string
    {
        return __('errors.failed_edit_lock_user');
    }
}
