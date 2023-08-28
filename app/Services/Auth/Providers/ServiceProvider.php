<?php

namespace App\Services\Auth\Providers;

use App\Services\Auth\Repositories\Interfaces\OauthClientRepositoryInterface;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Auth\Repositories\OauthClientRepository;
use App\Services\Auth\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider as ParentServiceProvider;

class ServiceProvider extends ParentServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->bind(
            OauthClientRepositoryInterface::class,
            OauthClientRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
