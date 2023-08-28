<?php

namespace App\Models;

use App\Services\Auth\Dtos\ChangeUserPasswordDto;
use App\Services\Auth\Dtos\CreateUserDto;
use App\Services\Auth\Dtos\UpdateUserDto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @property int $id,
 * @property string $email,
 * @property string $password,
 * @property string $first_name,
 * @property string $last_name,
 * @property bool $lock,
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'lock',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createModel(CreateUserDto $dto): array
    {
        return [
            'email' => $dto->getEmail(),
            'password' => Hash::make($dto->getPassword()),
            'first_name' => $dto->getFirstName(),
            'last_name' => $dto->getLastName(),
        ];
    }

    public static function updateModel(UpdateUserDto $dto): array
    {
        return [
            'email' => $dto->getEmail(),
            'password' => Hash::make($dto->getPassword()),
            'first_name' => $dto->getFirstName(),
            'last_name' => $dto->getLastName(),
        ];
    }

    public static function changePasswordModel(ChangeUserPasswordDto $dto): array
    {
        return [
            'password' => Hash::make($dto->getPassword()),
        ];
    }
}
