<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_genre', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');  // Define post_id
            $table->unsignedBigInteger('genre_id'); // Define genre_id
            // $table->timestamps();

            // Set foreign key constraints
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('genre_id')->references('id')->on('genre')->onDelete('cascade');

            // Add unique constraint to avoid duplicate entries
            $table->unique(['post_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_genre');
    }
};
