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
            'username' => $this->faker->userName(),
            'password_hash' => $this->faker->text(10),
            'email' => $this->faker->text(15),
            'role' => $this->faker->text(5),
        ];
    }
}