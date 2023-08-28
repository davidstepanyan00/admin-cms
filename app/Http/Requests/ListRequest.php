<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

abstract class ListRequest extends Request
{
    const PER_PAGE_DEFAULT = 25;

    const PER_PAGE = 'perPage';
    const PAGE = 'page';
    const Q = 'q';

    public function rules(): array
    {
        return [
            self::PER_PAGE => [
                'integer',
                'max:100',
                'min:10',
            ],
            self::PAGE => [
                'integer',
                'nullable'
            ],
            self::Q => [
                'string',
                'nullable'
            ],
        ];
    }

    public function getPage(): int
    {
        return $this->get(self::PAGE) ?? 1;
    }

    public function getPerPage(): int
    {
        return $this->get(self::PER_PAGE) ?? self::PER_PAGE_DEFAULT;
    }

    public function getQ(): ?string
    {
        return $this->get(self::Q);
    }
}
