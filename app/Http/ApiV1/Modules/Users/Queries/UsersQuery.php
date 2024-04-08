<?php

namespace App\Http\ApiV1\Modules\Users\Queries;

use App\Domain\Users\Models\Users;
use Ensi\QueryBuilderHelpers\Filters\DateFilter;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UsersQuery extends QueryBuilder
{
    public function __construct()
    {
        // Связь с моделью
        parent::__construct(Users::query());

        // Разрешить сортировать по параметрам
        $this->allowedSorts(['user_id', 'username']);

        // Сортировка по умолчанию
        $this->defaultSort('-user_id');

        // Разрешить поиск по параметрам
        $this->allowedFilters([
            AllowedFilter::exact('user_id'),
            AllowedFilter::exact('username'),

            //...DateFilter::make('created_at')->exact()->lte()->gte(),
            //...DateFilter::make('updated_at')->exact()->lte()->gte(),
        ]);
    }
}