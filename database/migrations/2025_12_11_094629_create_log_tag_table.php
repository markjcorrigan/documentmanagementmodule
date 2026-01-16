<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;



return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('log_id')->constrained('logs')->onDelete('cascade');
            $table->foreignId('tag_id')->constrained('tags')->onDelete('cascade');  // Changed: 'tag' → 'tags'
            $table->timestamps();

            // Prevent duplicate tag assignments
            $table->unique(['log_id', 'tag_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_tag');
    }
};
