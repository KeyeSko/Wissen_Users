<?php

namespace App\Http\ApiV1\Modules\UserBooks\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateUserBooksRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'status' => ['required', 'string'],
            'book_id' => ['required', 'integer'],
            'user_id' => ['required', 'integer'],
            'read_date' => ['nullable', 'date'],
            'abandon_date' => ['nullable', 'date'],
        ];
    }
}
