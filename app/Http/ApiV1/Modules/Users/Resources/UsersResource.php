<?php

namespace App\Http\ApiV1\Modules\Users\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin todo
 */
class UsersResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        // todo
        return [
            'user_id' => $this->user_id,
            'username' => $this->username,
            'password_hash' => $this->password_hash,
            'email' => $this->email,
            'role' => $this->role,
        ];
    }
}