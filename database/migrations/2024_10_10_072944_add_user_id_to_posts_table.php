<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('posts', function (Blueprint $table) {
        // Check if the column already exists
        if (!Schema::hasColumn('posts', 'user_id')) {
            $table->unsignedBigInteger('user_id')->after('id'); // Adding user_id after the id column
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Optional: Foreign key constraint
        }
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Drop the foreign key constraint
            $table->dropColumn('user_id'); // Remove the user_id column
        });
    }
}
