<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\LogoutRequest;
use App\Services\Auth\Actions\LoginAction;
use App\Services\Auth\Actions\LogoutAction;
use App\Services\Auth\Dtos\LoginDto;
use App\Services\Auth\Resources\CredentialsResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @throws AuthenticationException
     */
    public function login(
        LoginRequest $request,
        LoginAction $action,
    ): CredentialsResource {
        $dto  = LoginDto::fromRequest($request);

        return $action->run($dto);
    }

    public function logout(
        LogoutRequest $request,
        LogoutAction $action,
    ): JsonResponse {
        $action->run($request->user());

        return $this->responseSuccess();
    }
}
