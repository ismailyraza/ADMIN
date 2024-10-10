<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key for users table
            $table->foreignId('phase_id')->constrained()->onDelete('cascade'); // Foreign key for phases table
            $table->string('type'); // Type of post
            $table->string('title'); // Title of the post
            $table->text('description'); // Description of the post
            $table->string('location')->nullable(); // Location of the event (optional)
            $table->decimal('latitude', 10, 7)->nullable(); // Latitude (optional)
            $table->decimal('longitude', 10, 7)->nullable(); // Longitude (optional)
            $table->time('event_time')->nullable(); // Event time (optional)
            $table->date('event_date')->nullable(); // Event date (optional)
            $table->string('url')->nullable(); // URL (optional)
            $table->decimal('price', 8, 2)->nullable(); // Price (optional)
            $table->string('cover_image')->nullable(); // Cover image (optional)
            $table->boolean('is_visible')->default(true); // Visibility of the post
            $table->foreignId('voyage_id')->nullable(); // Optional foreign key for voyage
            $table->string('deep_link_url')->nullable(); // Deep link URL (optional)
            $table->timestamps(); // Created and updated timestamps
            $table->softDeletes(); // Soft deletes
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
