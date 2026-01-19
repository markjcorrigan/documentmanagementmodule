<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Get all existing indexes
        $indexes = DB::select("SHOW INDEX FROM guitar_scores");
        $existingIndexes = [];
        foreach ($indexes as $index) {
            $existingIndexes[$index->Key_name] = true;
        }

        // Only add indexes that don't exist
        Schema::table('guitar_scores', function (Blueprint $table) use ($existingIndexes) {
            // Add name index if it doesn't exist (this is the only one missing from original migration)
            if (!isset($existingIndexes['guitar_scores_name_index'])) {
                $table->index('name', 'guitar_scores_name_index');
            }

            // Note: composer, performer, title, working_on, interested_in already have indexes from the create migration
            // Note: path is too long (1000 chars) to index efficiently, so we're skipping it
        });
    }

    public function down()
    {
        // Remove indexes if they exist
        Schema::table('guitar_scores', function (Blueprint $table) {
            $table->dropIndexIfExists('guitar_scores_name_index');
        });
    }
};