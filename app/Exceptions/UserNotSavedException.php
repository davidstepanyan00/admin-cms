<?php

namespace App\Exceptions;

class UserNotSavedException extends BusinessLogicException
{
    public function getStatus(): int
    {
        return self::USER_NOT_SAVED;
    }

    public function getStatusMessage(): string
    {
        return __('errors.user_not_save');
    }
}
