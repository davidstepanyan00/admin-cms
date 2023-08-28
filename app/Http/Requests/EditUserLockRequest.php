<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Http\Request;

class EditUserLockRequest extends Request
{
    public const LOCK = 'lock';
    public const ID = 'id';

    public function authorize(): bool
    {
        return $this->user()->can('lockEdit', [User::class]);
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
