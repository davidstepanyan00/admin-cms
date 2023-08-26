<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\Actions\LoginAction;
use App\Services\Auth\Dtos\LoginDto;
use App\Services\Auth\Resources\CredentialsResource;

class AuthController extends Controller
{
    public function login(
        LoginRequest $request,
        LoginAction $action,
    ): CredentialsResource {
        $dto  = LoginDto::fromRequest($request);

        return $action->run($dto);
    }
}
