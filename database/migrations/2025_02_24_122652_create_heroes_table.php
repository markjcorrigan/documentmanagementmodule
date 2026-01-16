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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('profession')->nullable();
            $table->text('short_description')->nullable();
            $table->string('photo')->nullable();
            $table->string('resume')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('linkin_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('YOE')->nullable();
            $table->string('PC')->nullable();
            $table->string('HC')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
