<?php

namespace App\Http\ApiV1\Modules\Users\Requests;

use App\Http\ApiV1\Support\Requests\BaseFormRequest;

class CreateUsersRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'username' => ['required', 'string'],
            'password_hash' => ['required', 'string'],
            'email' => ['required', 'string'],
            'role' => ['required', 'string'],
        ];
    }
}
