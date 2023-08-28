<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ListRequest;
use App\Models\User;

class IndexUserRequest extends ListRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('showList', [User::class]);
    }
}
