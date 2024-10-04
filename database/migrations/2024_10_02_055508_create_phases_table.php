<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_phases_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhasesTable extends Migration
{
    public function up()
    {
        Schema::create('phases', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the phase
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('phases');
    }
}
