<?php

// database/migrations/xxxx_xx_xx_create_sessions_table.php
// database/migrations/xxxx_xx_xx_create_sessions_table.php
// database/migrations/xxxx_xx_xx_create_sessions_table.php
// database/migrations/xxxx_xx_xx_create_sessions_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Use string for session IDs
            $table->text('payload'); // Session payload
            $table->integer('last_activity'); // Last activity timestamp
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
