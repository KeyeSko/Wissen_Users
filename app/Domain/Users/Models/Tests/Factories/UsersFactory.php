<?php

namespace App\Domain\Users\Models\Tests\Factories;

use App\Domain\Users\Models\Users;
use Ensi\LaravelTestFactories\BaseModelFactory;

class UsersFactory extends BaseModelFactory
{
    protected $model = Users::class;

    public function definition(): array
    {
        return [
            'username' => $this->faker->name(),
            'password_hash' => $this->faker->text(10),
            'email' => $this->faker->email(),
            'role' => "user",
        ];
    }
}