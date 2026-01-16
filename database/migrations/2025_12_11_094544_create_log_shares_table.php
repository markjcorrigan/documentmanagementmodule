<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('log_id')->constrained()->onDelete('cascade');
            $table->foreignId('shared_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('shared_with')->constrained('users')->onDelete('cascade');
            $table->enum('permission', ['view', 'edit'])->default('view');
            $table->boolean('can_reshare')->default(false);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            // Prevent duplicate shares
            $table->unique(['log_id', 'shared_with']);

            // Indexes for performance
            $table->index('log_id');
            $table->index('shared_with');
            $table->index('expires_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_shares');
    }
};