<?php

namespace App\Services\Auth\Repositories\Interfaces;

use App\Models\OauthClient;
use Illuminate\Database\Eloquent\Builder;

interface OauthClientRepositoryInterface
{
    public function model(): Builder;

    public function getOauthClient(): OauthClient;
}
