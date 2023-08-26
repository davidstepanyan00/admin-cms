<?php

namespace App\Services\Auth\Actions;

use App\Abstracts\Action;
use App\Services\Auth\Dtos\LoginDto;
use App\Services\Auth\Resources\CredentialsResource;
use App\Services\Auth\UseCases\GetOauthClientUseCase;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Http;

class LoginAction extends Action
{
    public function __construct(
        protected GetOauthClientUseCase $getOauthClientUseCase,
    ) {
    }

    /**
     * @throws AuthenticationException
     */
    public function run(LoginDto $dto): CredentialsResource
    {
        $email = $dto->getEmail();
        $password = $dto->getPassword();

        $oauthClient = $this->getOauthClientUseCase->run();

        $response = Http::asForm()->post(config('app_passport_url') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => $oauthClient->id,
            'client_secret' => $oauthClient->secret,
            'username' => $email,
            'password' => $password,
            'scope' => '*',
        ]);


        $data = json_decode($response->getBody()->getContents());

        if (!isset($data) || property_exists($data, 'errors')) {
            throw new AuthenticationException();
        }

        return new CredentialsResource($data);
    }
}
