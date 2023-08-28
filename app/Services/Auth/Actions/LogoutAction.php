<?php

namespace App\Services\Auth\Actions;

use App\Abstracts\Action;
use App\Models\User;

class LogoutAction extends Action
{
    public function run(User $user): void
    {
        $user->token()->revoke();
    }
}
