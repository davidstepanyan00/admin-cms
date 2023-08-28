<?php

namespace App\Services\Auth\Repositories\Interfaces;

use App\Models\User;
use App\Services\Auth\Dtos\IndexUserDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    public function query(): Builder;

    public function create(array $data): User;

    public function update(array $data, int $userId): User;

    public function getOne(int $userId, array $relations = []): User;

    public function index(IndexUserDto $dto, array $relations = []): LengthAwarePaginator;

    public function editLockUser(int $userId, bool $lock): void;
}
