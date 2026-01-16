<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('log_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('log_id')->constrained()->onDelete('cascade');
            $table->string('filename');
            $table->string('path');
            $table->string('type'); // 'image' or 'document'
            $table->string('mime_type');
            $table->unsignedBigInteger('size'); // file size in bytes
            $table->timestamps();

            // Index for performance
            $table->index('log_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_attachments');
    }
};