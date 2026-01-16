<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('visitor_logs', function (Blueprint $table) {
            // Visitor classification
            $table->enum('visitor_type', ['user', 'anonymous', 'bot'])->default('anonymous');
            $table->string('bot_type', 50)->nullable()->comment('search, social, monitoring, scraper, security, unknown');

            // Device/browser info
            $table->string('browser', 50)->nullable();
            $table->string('platform', 50)->nullable();

            // Request details
            $table->string('referrer', 500)->nullable();
            $table->string('request_method', 10)->nullable();
            $table->boolean('is_ajax')->default(false);

            // Additional metadata
            $table->string('session_id', 100)->nullable();
            $table->boolean('is_mobile')->default(false);

            // Indexes for faster queries
            $table->index('visitor_type');
            $table->index('connected_at');
            $table->index(['visitor_type', 'connected_at']);
            $table->index('bot_type');
            $table->index('browser');
        });
    }

    public function down(): void
    {
        Schema::table('visitor_logs', function (Blueprint $table) {
            // Remove columns
            $table->dropColumn([
                'visitor_type', 'bot_type', 'browser', 'platform',
                'referrer', 'request_method', 'is_ajax',
                'session_id', 'is_mobile'
            ]);

            // Drop indexes
            $table->dropIndex(['visitor_type']);
            $table->dropIndex(['connected_at']);
            $table->dropIndex(['visitor_type', 'connected_at']);
            $table->dropIndex(['bot_type']);
            $table->dropIndex(['browser']);
        });
    }
};