<?php

namespace App\Http\ApiV1\Modules\UserBooks\Queries;

use App\Domain\UserBooks\Models\UserBooks;
use Ensi\QueryBuilderHelpers\Filters\DateFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserBooksQuery extends QueryBuilder
{
    public function __construct()
    {
        // Связь с моделью
        parent::__construct(UserBooks::query());

        // Разрешить сортировать по параметрам
        $this->allowedSorts(['user_id', 'book_id']);

        // Сортировка по умолчанию
        $this->defaultSort('-user_id');

        // Разрешить поиск по параметрам
        $this->allowedFilters([
            AllowedFilter::exact('user_id'),
            AllowedFilter::exact('book_id'),

            //...DateFilter::make('created_at')->exact()->lte()->gte(),
            //...DateFilter::make('updated_at')->exact()->lte()->gte(),
        ]);
    }
}