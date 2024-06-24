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
        Schema::table('posts', function (Blueprint $table) {            
            // Add or modify the 'who_created' column to be nullable and position it after 'publish'
            $table->unsignedBigInteger('who_created')->nullable()->after('publish');

            // Add a foreign key constraint with onDelete('set null')
            $table->foreign('who_created')->references('id')->on('admins')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['who_created']);
            $table->dropColumn('who_created');
        });
    }
};
