<?php

namespace App\Services\Admin\Commands;

use App\Exceptions\UserNotSavedException;
use App\Models\User;
use App\Services\Auth\Dtos\CreateUserDto;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Spatie\Repositories\Interfaces\RoleRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Throwable;

class CreateAdminUserCommand extends Command
{
    protected $signature = 'create:admin';

    protected $description = 'Create admin user';

    private string $email = 'admin';
    private string $password = 'admin';

    /**
     * @throws UserNotSavedException
     */
    public function handle(
        UserRepositoryInterface $userRepository,
        RoleRepositoryInterface $roleRepository,
    ): void {
        Db::beginTransaction();

        try {
            $user = User::createStatic(CreateUserDto::fromParams($this->email, $this->password));

            $user = $userRepository->create($user);

            $roleRepository->assignRoleAdmin($user);

            Db::commit();
        } catch (Throwable $e) {
            Db::rollBack();
            throw new UserNotSavedException();
        }
    }
}
