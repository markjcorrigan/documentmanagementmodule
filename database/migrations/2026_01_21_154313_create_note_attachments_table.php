<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('note_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('note_id')->constrained()->onDelete('cascade');
            $table->string('filename'); // Original filename
            $table->string('path'); // Storage path
            $table->string('type'); // image, document
            $table->string('mime_type');
            $table->unsignedBigInteger('size'); // File size in bytes
            $table->timestamps();

            $table->index(['note_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('note_attachments');
    }
};
