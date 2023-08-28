<?php

namespace App\Exceptions;

class FailedUpdateUserException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::FAILED_UPDATE_USER;
    }

    public function getStatusMessage(): string
    {
        return __('errors.failed_update_user');
    }
}
