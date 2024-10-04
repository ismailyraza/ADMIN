<?php

// database/seeders/GroupsTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsTableSeeder extends Seeder
{
    public function run()
    {
        Group::create(['name' => 'Group A']);
        Group::create(['name' => 'Group B']);
        Group::create(['name' => 'Group C']);
    }
}
