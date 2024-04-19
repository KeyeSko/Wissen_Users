<?php

namespace App\Domain\Users\Models;

use Illuminate\Database\Eloquent\Model;
use App\Domain\Users\Models\Tests\Factories\UsersFactory;
use Carbon\CarbonInterface;

class Users extends Model
{
    protected $table = 'users';

    protected $primaryKey = 'id';

    protected $fillable = [
        'username',
        'password_hash',
        'email',
        'role'
    ];

    // Определите отношение между пользователем и его книгами
    public function userBooks()
    {
        return $this->hasMany(UserBooks::class, 'user_id', 'user_id');
    }
    public static function factory(): UsersFactory
    {
        return UsersFactory::new();
    }
}