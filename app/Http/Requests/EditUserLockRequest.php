<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditUserLockRequest extends Request
{
    public const LOCK = 'lock';
    public const ID = 'id';

    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return [
            self::LOCK => [
                'bool',
                'required',
            ],
        ];
    }

    public function getId(): int
    {
        return $this->route(self::ID);
    }

    public function getLock(): bool
    {
        return $this->get(self::LOCK);
    }
}
