<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('protected_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('path')->unique(); // Full path relative to protected disk
            $table->string('parent_path')->nullable(); // Parent directory path
            $table->enum('type', ['file', 'folder'])->default('file');
            $table->string('extension')->nullable();
            $table->string('mime_type')->nullable();
            $table->bigInteger('size')->default(0); // Size in bytes
            $table->string('resource')->nullable(); // Top-level folder (scientology, lrh, etc.)
            $table->text('description')->nullable();
            $table->json('metadata')->nullable(); // For additional info
            $table->timestamp('file_modified_at')->nullable();
            $table->timestamps();

            $table->index('parent_path');
            $table->index('resource');
            $table->index('type');
        });
    }

    public function down()
    {
        Schema::dropIfExists('protected_files');
    }
};