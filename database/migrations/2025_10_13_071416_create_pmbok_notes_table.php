<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pmbok_notes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('project_id')->nullable()->constrained()->onDelete('cascade'); // Made nullable
            $table->string('process_id'); // e.g., "4.1", "4.2", etc.
            $table->string('process_name');
            $table->text('notes')->nullable();
            $table->boolean('productive')->default(true); // true = productive, false = unproductive
            $table->timestamps();

            //            $table->unique(['user_id', 'project_id', 'process_id']); // This still works with nullable
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pmbok_notes');
    }
};
