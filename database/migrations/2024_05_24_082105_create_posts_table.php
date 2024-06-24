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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->boolean('publish');
            $table->string('slug');
            $table->string('imdb_id')->nullable();
            $table->string('tmdb_id')->nullable();
            $table->string('mal_id')->nullable();
            $table->string('title');
            $table->string('type');
            $table->boolean('is_anime');
            $table->text('synopsis');
            $table->string('rating_type');
            $table->decimal('rating', 3, 1); // assuming rating is a decimal
            $table->date('release_date');
            $table->string('location'); // assuming location is a 2-letter country code
            $table->json('posters');
            $table->json('backdrops');
            $table->json('genres')->nullable();
            $table->json('categories')->nullable();
            $table->timestamps();
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
