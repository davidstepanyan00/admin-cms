<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\FailedChangeUserPasswordException;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeUserPasswordRequest;
use App\Services\Auth\Actions\ChangeUserPasswordAction;
use App\Services\Auth\Dtos\ChangeUserPasswordDto;
use Illuminate\Http\JsonResponse;

class PasswordController extends Controller
{
    /**
     * @throws FailedChangeUserPasswordException
     */
    public function changeUserPassword(
        ChangeUserPasswordRequest $request,
        ChangeUserPasswordAction $action,
    ): JsonResponse {
        $dto = ChangeUserPasswordDto::fromRequest($request);

        $action->run($dto);

        return $this->responseSuccess();
    }
}
