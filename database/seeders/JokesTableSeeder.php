<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JokesTableSeeder extends Seeder
{
    public function run()
    {
        $sqlPath = database_path('seeders/jokes.sql');

        if (! file_exists($sqlPath)) {
            $this->command->error('❌ jokes.sql not found');

            return;
        }

        $this->command->info('📖 Importing jokes...');

        // Clear existing jokes
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('jokes')->truncate();
        if (DB::getSchemaBuilder()->hasTable('user_joke_favorites')) {
            DB::table('user_joke_favorites')->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Import via MySQL command line
        $mysqlPath = 'C:\\xampp\\mysql\\bin\\mysql.exe';
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        $passwordArg = $password ? "-p{$password}" : '';

        $command = "\"{$mysqlPath}\" -u {$username} {$passwordArg} --force {$database} < \"{$sqlPath}\" 2>&1";

        exec($command, $output, $returnCode);

        $count = DB::table('jokes')->count();

        if ($count >= 10000) {
            $this->command->info("🎉 Successfully imported {$count} jokes!");
        } else {
            $this->command->warn("⚠️  Only {$count} jokes imported");
        }
    }
}
