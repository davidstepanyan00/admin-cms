<?php

namespace App\Services\Auth\Repositories;

use App\Models\User;
use App\Services\Auth\Dtos\IndexUserDto;
use App\Services\Auth\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    public function query(): Builder
    {
        return User::query();
    }

    public function create(array $data): User
    {
        /**
         * @var User
         */
        return $this->query()->create($data);
    }

    public function update(array $data, int $userId): User
    {
        /**
         * @var User
         */
        return $this->query()
            ->where('id', $userId)
            ->update($data);
    }

    public function getOne(int $userId, array $relations = []): User
    {
        /**
         * @var User
         */
        return $this->query()
            ->where('id', $userId)
            ->with($relations)
            ->firstOrFail();
    }

    public function index(IndexUserDto $dto, array $relations = []): LengthAwarePaginator
    {
        $query = $this->query();

        $query->where(
            DB::raw('CONCAT_WS(" ", `last_name`, `first_name`)'),
            'like',
            '%' . $dto->q . '%'
        );

        $query->with($relations);

        return $query->paginate(
            $dto->pagination->perPage,
            ['*'],
            'page',
            $dto->pagination->page
        );
    }

    public function editLockUser(int $userId, bool $lock): void
    {
        $this->query()
            ->where('id', $userId)
            ->update(['lock' => $lock]);
    }

}
