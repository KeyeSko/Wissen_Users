<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserBooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Примеры связей книг с пользователями
        UserBooks::create([
            'user_id' => 1,
            'book_id' => 1,
            'status' => 'read',
            'read_date' => '2023-01-01',
            'rating' => 4,
        ]);
        UserBooks::create([
            'user_id' => 1,
            'book_id' => 2,
            'status' => 'unread',
        ]);
    }
}
