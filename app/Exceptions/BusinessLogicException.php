<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

abstract class BusinessLogicException extends Exception
{
    public const VALIDATION_FAILED = 422;
    public const NOT_AUTHENTICATED = 403;
    public const SERVER_ERROR = 500;

    public const USER_NOT_SAVED = 601;
    public const FAILED_UPDATE_USER = 602;
    public const FAILED_EDIT_LOCK_USER = 603;

    private int $httpStatusCode = Response::HTTP_BAD_REQUEST;

    public function getHttpStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    abstract public function getStatus(): int;

    abstract public function getStatusMessage(): string;
}
