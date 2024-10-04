<?php

// database/seeders/PhasesTableSeeder.php
// database/seeders/MessagesTableSeeder.php
// database/seeders/MessagesTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessagesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('messages')->insert([
            [
                'user_id' => 1,
                'group_id' => 1, // Ensure this matches an existing group
                'phase_id' => 1, // Ensure this matches an existing phase
                'message' => 'Welcome to Group A Phase 1!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more messages as needed
        ]);
    }
}
