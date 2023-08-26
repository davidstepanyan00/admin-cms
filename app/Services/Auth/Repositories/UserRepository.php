<?php

namespace App\Services\Auth\Repositories;

use App\Models\User;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class UserRepository implements UserRepositoryInterface
{
    public function model(): Builder
    {
        return User::query();
    }
}
