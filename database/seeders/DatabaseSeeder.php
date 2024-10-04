<?php

// database/seeders/DatabaseSeeder.php
// database/seeders/DatabaseSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            GroupsTableSeeder::class,
            PhasesTableSeeder::class,
            MessagesTableSeeder::class,
        ]);
    }
}
