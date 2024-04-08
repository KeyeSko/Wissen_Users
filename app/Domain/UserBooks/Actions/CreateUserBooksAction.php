<?php

namespace App\Domain\UserBooks\Actions;

use App\Domain\UserBooks\Models\UserBooks;

class CreateUserBooksAction
{
    public function execute(array $fields): UserBooks
    {
        $UserBooks = new UserBooks();
        $UserBooks->fill($fields);
        $UserBooks->save();

        return $UserBooks;
    }
}