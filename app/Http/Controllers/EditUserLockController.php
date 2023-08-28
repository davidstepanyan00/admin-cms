<?php

namespace App\Http\Controllers;

use App\Exceptions\FailedEditLockUserException;
use App\Http\Requests\EditUserLockRequest;
use App\Services\Auth\Actions\EditUserLockAction;
use Illuminate\Http\JsonResponse;

class EditUserLockController extends Controller
{
    /**
     * @throws FailedEditLockUserException
     */
    public function __invoke(
        EditUserLockRequest $request,
        EditUserLockAction $action,
    ): JsonResponse {
        $action->run($request->getId(), $request->getLock());

        return $this->responseSuccess();
    }
}
