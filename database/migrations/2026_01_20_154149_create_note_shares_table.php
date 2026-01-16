<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('note_shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id')->constrained()->onDelete('cascade');
            $table->foreignId('shared_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('shared_with')->constrained('users')->onDelete('cascade');
            $table->enum('permission', ['view', 'edit'])->default('view');
            $table->boolean('can_reshare')->default(false);
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();

            $table->unique(['note_id', 'shared_with']);
            $table->index(['shared_with', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('note_shares');
    }
};
