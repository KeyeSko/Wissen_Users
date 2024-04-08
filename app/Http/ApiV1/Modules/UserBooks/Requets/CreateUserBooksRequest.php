<?php

namespace App\Http\ApiV1\Modules\UserBooks\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateUserBooksRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'string'],
            'book_id' => ['required', 'string'],
            'status' => ['required', 'string'],
        ];
    }
}
