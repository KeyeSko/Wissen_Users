<?php

namespace App\Domain\UserBooks\Models\Tests\Factories;

use App\Domain\UserBooks\Models\UserBooks;
use App\Domain\Users\Models\Users;
use Ensi\LaravelTestFactories\BaseModelFactory;



class UserBooksFactory extends BaseModelFactory
{ 
    protected $model = UserBooks::class;

    public function definition(): array
    {
        return [
            'user_id' => Users::factory()->create()->id,
            'book_id' => $this->faker->randomDigitNotNull(),
            'status' => 'reading',
            'rating' => $this->faker->randomDigitNotNull(),
            'read_date' => '2024-04-17',
            'abandon_date' => '2024-04-17',
        ];
    }
}