<?php

namespace App\Http\ApiV1\Modules\UserBooks\Resources;

use App\Http\ApiV1\Support\Resources\BaseJsonResource;

/**
 * @mixin todo
 */
class UserBooksResource extends BaseJsonResource
{
    public function toArray($request): array
    {
        // todo
        return [
            'record_id' => $this->record_id,
            'user_id' => $this->user_id,
            'book_id' => $this->book_id,
            'status' => $this->status,
            'read_date' => $this->read_date,
            'abandon_date' => $this->abandon_date,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}