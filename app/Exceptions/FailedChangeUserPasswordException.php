<?php

namespace App\Exceptions;

class FailedChangeUserPasswordException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::FAILED_CHANGE_USER_PASSWORD;
    }

    public function getStatusMessage(): string
    {
        return __('failed_change_user_password');
    }
}
