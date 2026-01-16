<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JokecatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Clean',
                'description' => 'Family-friendly jokes suitable for all ages',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dad Jokes',
                'description' => 'Classic groan-worthy dad jokes and puns',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'One-Liners',
                'description' => 'Short and punchy one-line jokes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Knock-Knock',
                'description' => 'Classic knock-knock jokes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Puns',
                'description' => 'Wordplay and pun-based humor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Tech/Programming',
                'description' => 'Jokes about technology, coding, and programmers',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Dark Humor',
                'description' => 'Jokes with darker or edgier themes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Observational',
                'description' => 'Jokes about everyday life and situations',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Riddles',
                'description' => 'Brain teasers and riddle-based jokes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Animal Jokes',
                'description' => 'Jokes featuring animals',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Food Jokes',
                'description' => 'Jokes about food and eating',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Sports',
                'description' => 'Jokes about sports and athletes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Work/Office',
                'description' => 'Jokes about work and office life',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kids',
                'description' => 'Simple jokes perfect for children',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Classic',
                'description' => 'Timeless classic jokes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('jokecats')->insert($categories);
    }
}
