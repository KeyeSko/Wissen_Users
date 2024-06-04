<?php

namespace App\Http\ApiV1\Modules\UserBooks\Controllers;

use App\Domain\UserBooks\Actions\CreateUserBooksAction;
use App\Http\ApiV1\Modules\UserBooks\Queries\UserBooksQuery;
use App\Http\ApiV1\Modules\UserBooks\Requests\CreateUserBooksRequest;
use App\Http\ApiV1\Modules\UserBooks\Resources\UserBooksResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;

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

    public function getBooks(int $id, UserBooksQuery $query)
    {
        $books = new UserBooksResource($query->findOrFail($id));
        $book_response = Http::get($url = 'http://' .env('BOOKS_SERVICE_ADDR', 'localhost').
        ':'.env('BOOKS_SERVICE_PORT',8888).'/api/v1/books/books/' .$books["book_id"]);

        if($book_response->failed()) {
            return $book_response;
        }

        $book_response = $book_response->json();
        
        $books = $books->toArray($books);
        $books["title"] = $book_response['data']['title'];

        //$_response = Http::get($url = 'http://' .env('BOOKS_SERVICE_ADDR', 'localhost').
        //':'.env('BOOKS_SERVICE_PORT',8888).'/api/v1/books/books/' .$books["book_id"]);

        //if($book_response->failed()) {
        //    return $book_response;
        //}


        return $books;
    }
}