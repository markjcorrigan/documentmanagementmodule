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
        $indexes = DB::select("SHOW INDEX FROM protected_files");
        $existingIndexes = [];
        foreach ($indexes as $index) {
            $existingIndexes[$index->Key_name] = true;
        }

        // Only add indexes that don't exist
        Schema::table('protected_files', function (Blueprint $table) use ($existingIndexes) {
            if (!isset($existingIndexes['protected_files_parent_path_index'])) {
                $table->index('parent_path', 'protected_files_parent_path_index');
            }

            if (!isset($existingIndexes['protected_files_resource_index'])) {
                $table->index('resource', 'protected_files_resource_index');
            }

            if (!isset($existingIndexes['protected_files_type_index'])) {
                $table->index('type', 'protected_files_type_index');
            }

            if (!isset($existingIndexes['protected_files_name_index'])) {
                $table->index('name', 'protected_files_name_index');
            }

            if (!isset($existingIndexes['protected_files_path_index'])) {
                $table->index('path', 'protected_files_path_index');
            }

            if (!isset($existingIndexes['protected_files_extension_index'])) {
                $table->index('extension', 'protected_files_extension_index');
            }
        });
    }

    public function down()
    {
        // Remove indexes if they exist
        Schema::table('protected_files', function (Blueprint $table) {
            $table->dropIndexIfExists('protected_files_parent_path_index');
            $table->dropIndexIfExists('protected_files_resource_index');
            $table->dropIndexIfExists('protected_files_type_index');
            $table->dropIndexIfExists('protected_files_name_index');
            $table->dropIndexIfExists('protected_files_path_index');
            $table->dropIndexIfExists('protected_files_extension_index');
        });
    }
};
