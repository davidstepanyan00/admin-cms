<?php

namespace App\Services\Auth\Dtos;

use App\Classes\Dtos\PaginationParamsDto;
use App\Http\Requests\User\IndexUserRequest;
use Spatie\LaravelData\Data;

class IndexUserDto extends Data
{
    public PaginationParamsDto $pagination;
    public string $q;

    public static function fromRequest(IndexUserRequest $request): self
    {
        return self::from([
            'q' =>  $request->getQ(),
            'pagination' => new PaginationParamsDto($request->getPerPage(), $request->getPage()),
        ]);
    }
}
