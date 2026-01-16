<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration: Create guitar_scores table
 *
 * Stores classical guitar score files
 * Follows the same pattern as protected_files table
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guitar_scores', function (Blueprint $table) {
            $table->id();

            // Basic file information (same as protected_files)
            $table->string('name');                     // Filename
            $table->text('path');                       // Relative path from protectedGuitar folder
            $table->text('parent_path')->nullable();    // Parent directory path
            $table->enum('type', ['file', 'folder']);   // File or folder

            // File-specific fields
            $table->string('extension', 10)->nullable();     // pdf, zip, etc.
            $table->string('mime_type', 100)->nullable();    // MIME type
            $table->bigInteger('size')->nullable();          // File size in bytes

            // Guitar score metadata
            $table->string('composer')->nullable()->index();   // Composer name
            $table->string('title')->nullable()->index();      // Score title
            $table->string('performer')->nullable()->index();  // Who's playing it
            $table->text('notes')->nullable();                 // Additional notes

            // Tracking fields
            $table->boolean('interested_in')->default(false)->index();  // Scores you're interested in (max ~50)
            $table->boolean('working_on')->default(false)->index();     // Scores you're actively working on (max ~10)

            // Timestamps
            $table->timestamp('file_modified_at')->nullable();  // Last modified time from filesystem
            $table->timestamps();                               // created_at, updated_at

            // Indexes for performance
            $table->index('type');
            $table->index('extension');
            $table->index('parent_path');
            $table->index(['type', 'extension']);

            // Full-text search
            $table->fullText(['name', 'composer', 'title', 'performer', 'notes']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guitar_scores');
    }
};