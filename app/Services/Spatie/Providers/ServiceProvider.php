<?php

namespace App\Services\Spatie\Providers;

use App\Services\Spatie\Repositories\Interfaces\ModelHasPermissionRepositoryInterface;
use App\Services\Spatie\Repositories\Interfaces\PermissionRepositoryInterface;
use App\Services\Spatie\Repositories\Interfaces\RoleRepositoryInterface;
use App\Services\Spatie\Repositories\ModelHasPermissionRepository;
use App\Services\Spatie\Repositories\PermissionRepository;
use App\Services\Spatie\Repositories\RoleRepository;
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
            RoleRepositoryInterface::class,
            RoleRepository::class,
        );

        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class,
        );

        $this->app->bind(
            ModelHasPermissionRepositoryInterface::class,
            ModelHasPermissionRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
