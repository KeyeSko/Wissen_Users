<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Users::create([
            'username' => 'user1',
            'password_hash' => bcrypt('password1'),
            'email' => 'user1@example.com',
            'role' => 'user',
        ]);

        Users::create([
            'username' => 'user2',
            'password_hash' => bcrypt('password2'),
            'email' => 'user2@example.com',
            'role' => 'admin',
        ]);
    }
}
