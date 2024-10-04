<?php

// database/seeders/PhasesTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Phase;

class PhasesTableSeeder extends Seeder
{
    public function run()
    {
        Phase::create(['name' => 'Phase 1']);
        Phase::create(['name' => 'Phase 2']);
        Phase::create(['name' => 'Phase 3']);
    }
}
