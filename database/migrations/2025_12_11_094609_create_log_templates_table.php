<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_templates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->foreignId('log_category_id')->nullable()->constrained('log_categories')->onDelete('set null');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->boolean('is_public')->default(false);
            $table->timestamps();

            // Indexes for performance
            $table->index('user_id');
            $table->index('log_category_id');
            $table->index('is_public');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_templates');
    }
};