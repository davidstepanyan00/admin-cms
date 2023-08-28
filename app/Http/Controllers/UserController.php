<?php

namespace App\Http\Controllers;

use App\Exceptions\FailedUpdateUserException;
use App\Exceptions\UserNotSavedException;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\GetUserRequest;
use App\Http\Requests\User\IndexUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Services\Auth\Actions\CreateUserAction;
use App\Services\Auth\Actions\GetUserAction;
use App\Services\Auth\Actions\IndexUserAction;
use App\Services\Auth\Actions\UpdateUserAction;
use App\Services\Auth\Dtos\CreateUserDto;
use App\Services\Auth\Dtos\IndexUserDto;
use App\Services\Auth\Dtos\UpdateUserDto;
use App\Services\Auth\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @throws UserNotSavedException
     */
    public function create(
        CreateUserRequest $request,
        CreateUserAction $action,
    ): UserResource {
        $dto = CreateUserDto::fromRequest($request);

        return $action->run($dto);
    }

    /**
     * @throws FailedUpdateUserException
     */
    public function update(
        UpdateUserRequest $request,
        UpdateUserAction $action,
    ): UserResource {
        $dto = UpdateUserDto::fromRequest($request);

        return $action->run($dto);
    }

    public function show(
        GetUserRequest $request,
        GetUserAction $action,
    ): UserResource {
        return $action->run($request->getUserId());
    }

    public function index(
        IndexUserRequest $request,
        IndexUserAction $action,
    ): AnonymousResourceCollection {
        $dto = IndexUserDto::fromRequest($request);

        return $action->run($dto);
    }
}
