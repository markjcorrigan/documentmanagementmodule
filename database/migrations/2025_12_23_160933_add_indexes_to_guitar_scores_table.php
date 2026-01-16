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
            if (!isset($existingIndexes['guitar_scores_composer_index'])) {
                $table->index('composer', 'guitar_scores_composer_index');
            }

            if (!isset($existingIndexes['guitar_scores_performer_index'])) {
                $table->index('performer', 'guitar_scores_performer_index');
            }

            if (!isset($existingIndexes['guitar_scores_name_index'])) {
                $table->index('name', 'guitar_scores_name_index');
            }

            if (!isset($existingIndexes['guitar_scores_title_index'])) {
                $table->index('title', 'guitar_scores_title_index');
            }

            if (!isset($existingIndexes['guitar_scores_working_on_index'])) {
                $table->index('working_on', 'guitar_scores_working_on_index');
            }

            if (!isset($existingIndexes['guitar_scores_interested_in_index'])) {
                $table->index('interested_in', 'guitar_scores_interested_in_index');
            }

            if (!isset($existingIndexes['guitar_scores_path_index'])) {
                $table->index('path', 'guitar_scores_path_index');
            }
        });
    }

    public function down()
    {
        // Remove indexes if they exist
        Schema::table('guitar_scores', function (Blueprint $table) {
            $table->dropIndexIfExists('guitar_scores_composer_index');
            $table->dropIndexIfExists('guitar_scores_performer_index');
            $table->dropIndexIfExists('guitar_scores_name_index');
            $table->dropIndexIfExists('guitar_scores_title_index');
            $table->dropIndexIfExists('guitar_scores_working_on_index');
            $table->dropIndexIfExists('guitar_scores_interested_in_index');
            $table->dropIndexIfExists('guitar_scores_path_index');
        });
    }
};