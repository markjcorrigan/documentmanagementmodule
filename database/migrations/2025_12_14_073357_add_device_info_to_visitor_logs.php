<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('visitor_logs', function (Blueprint $table) {
            // Add browser and platform info (if not already present)
            if (!Schema::hasColumn('visitor_logs', 'browser')) {
                $table->string('browser')->nullable()->after('user_agent');
            }

            if (!Schema::hasColumn('visitor_logs', 'platform')) {
                $table->string('platform')->nullable()->after('browser');
            }

            if (!Schema::hasColumn('visitor_logs', 'is_mobile')) {
                $table->boolean('is_mobile')->default(false)->after('platform');
            }

            if (!Schema::hasColumn('visitor_logs', 'is_tablet')) {
                $table->boolean('is_tablet')->default(false)->after('is_mobile');
            }

            if (!Schema::hasColumn('visitor_logs', 'is_desktop')) {
                $table->boolean('is_desktop')->default(true)->after('is_tablet');
            }

            if (!Schema::hasColumn('visitor_logs', 'device')) {
                $table->string('device')->nullable()->after('is_desktop');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visitor_logs', function (Blueprint $table) {
            $columns = ['browser', 'platform', 'is_mobile', 'is_tablet', 'is_desktop', 'device'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('visitor_logs', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};