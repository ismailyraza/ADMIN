<?php

// database/seeders/UsersTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'), // Ensure to use bcrypt for password hashing
        ]);

        User::create([
            'email' => 'user1@example.com',
            'password' => bcrypt('password123'),
        ]);

        User::create([
            'email' => 'user2@example.com',
            'password' => bcrypt('password123'),
        ]);
    }
}
