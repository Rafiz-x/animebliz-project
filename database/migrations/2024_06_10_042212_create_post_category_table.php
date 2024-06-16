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
        Schema::create('post_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');  // Define post_id
            $table->unsignedBigInteger('category_id'); // Define genre_id
            // $table->timestamps();

            // Set foreign key constraints
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

            // Add unique constraint to avoid duplicate entries
            $table->unique(['post_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_category');
    }
};
