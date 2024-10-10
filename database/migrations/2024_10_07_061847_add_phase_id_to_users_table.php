<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhaseIdToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add phase_id column
            $table->unsignedBigInteger('phase_id')->nullable()->after('id');

            // Optional: Add a foreign key constraint
            $table->foreign('phase_id')->references('id')->on('phases')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['phase_id']); // Drop foreign key constraint if exists
            $table->dropColumn('phase_id');    // Drop the column
        });
    }
}
