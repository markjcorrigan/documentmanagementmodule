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
        // Create jokes table structure (SQL file will populate it)
        Schema::create('jokes', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('jokecat_id')->nullable();
            $table->boolean('is_ok')->default(false);
            $table->boolean('is_favorite')->default(false);
            $table->timestamps();

            // Add index for jokecat_id (but no foreign key constraint to avoid issues)
            $table->index('jokecat_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jokes');
    }
};
