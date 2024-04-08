<?php

namespace App\Domain\UserBooks\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\UserBooks\Models\Tests\Factories\UserBooksFactory;
use Carbon\CarbonInterface;

class UserBooks extends Model
{
    protected $table = 'userbooks';

    protected $primaryKey = 'record_id';

    protected $fillable = [
        'user_id',
        'book_id',
        'status',
        'read_date',
        'abandon_date',
        'rating'
    ];

    // Определите отношение между книгой и ее владельцем (пользователем)
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public static function factory(): UserBooksFactory
    {
        return UserBooksFactory::new();
    }
}