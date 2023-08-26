<?php

namespace App\Services\Auth\Repositories;

use App\Models\OauthClient;
use App\Services\Auth\Repositories\Interfaces\OauthClientRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OauthClientRepository implements OauthClientRepositoryInterface
{
    public function model(): Builder
    {
        return OauthClient::query();
    }

    public function getOauthClient(): OauthClient
    {
        /**
         * @var OauthClient $oauthClient
         */
        $oauthClient = $this->model()
            ->where('id', config('passport.grant_client.id'))
            ->first();

        if (!$oauthClient) {
            throw new ModelNotFoundException();
        }

        return $oauthClient;
    }
}
