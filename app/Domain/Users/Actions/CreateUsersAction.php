<?php

namespace App\Domain\Users\Actions;

use App\Domain\Users\Models\Users;

class CreateUsersAction
{
    public function execute(array $fields): Users
    {
        $Users = new Users();
        $Users->fill($fields);
        $Users->save();

        return $Users;
    }
}