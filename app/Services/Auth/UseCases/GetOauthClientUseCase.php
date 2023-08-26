<?php

namespace App\Services\Auth\UseCases;

use App\Abstracts\UseCase;
use App\Models\OauthClient;
use App\Services\Auth\Repositories\Interfaces\OauthClientRepositoryInterface;

class GetOauthClientUseCase extends UseCase
{
    public function __construct(protected OauthClientRepositoryInterface $oauthClientRepository)
    {
    }

    public function run(): OauthClient
    {
        return $this->oauthClientRepository->getOauthClient();
    }
}
