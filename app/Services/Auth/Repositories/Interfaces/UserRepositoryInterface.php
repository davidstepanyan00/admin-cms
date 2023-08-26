<?php

namespace App\Services\Auth\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface UserRepositoryInterface
{
    public function model(): Builder;
}
