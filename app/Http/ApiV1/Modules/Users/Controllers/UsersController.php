<?php

namespace App\Http\ApiV1\Modules\Users\Controllers;

use App\Domain\Users\Actions\CreateUsersAction;
use App\Http\ApiV1\Modules\Users\Queries\UsersQuery;
use App\Http\ApiV1\Modules\Users\Requests\CreateUsersRequest;
use App\Http\ApiV1\Modules\Users\Resources\UsersResource;

class UsersController
{
    public function create(CreateUsersRequest $request, CreateUsersAction $action): UsersResource
    {
        return new UsersResource($action->execute($request->validated()));
    }

    public function get(int $id, UsersQuery $query): UsersResource
    {
        return new UsersResource($query->findOrFail($id));
    }
}