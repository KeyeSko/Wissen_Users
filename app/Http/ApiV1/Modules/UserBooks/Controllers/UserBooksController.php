<?php

namespace App\Http\ApiV1\Modules\UserBooks\Controllers;

use App\Domain\UserBooks\Actions\CreateUserBooksAction;
use App\Http\ApiV1\Modules\UserBooks\Queries\UserBooksQuery;
use App\Http\ApiV1\Modules\UserBooks\Requests\CreateUserBooksRequest;
use App\Http\ApiV1\Modules\UserBooks\Resources\UserBooksResource;

class UserBooksController
{
    public function create(CreateUserBooksRequest $request, CreateUserBooksAction $action): UserBooksResource
    {
        return new UserBooksResource($action->execute($request->validated()));
    }

    public function get(int $id, UserBooksQuery $query): UserBooksResource
    {
        return new UserBooksResource($query->findOrFail($id));
    }
}