<?php

namespace App\Classes\Dtos;

use Spatie\LaravelData\Data;

class PaginationParamsDto extends Data
{
    public function __construct(
        public int $perPage,
        public int $page
    ) {
    }
}
