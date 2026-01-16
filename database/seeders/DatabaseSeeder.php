<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            SiteSettingSeeder::class,
            SearchTableSeeder::class,
            HeroesSeeder::class,
            ServiceSeeder::class,
            ResumesSeeder::class,
            SkillsSeeder::class,
            BlogPostSeeder::class,
            // JokecatSeeder and JokesTableSeeder are called separately in the command
        ]);

        Schema::enableForeignKeyConstraints();
    }
}