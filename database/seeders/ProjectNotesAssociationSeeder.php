<?php

// In database/seeders/ProjectNotesAssociationSeeder.php

namespace Database\Seeders;

use App\Models\PmbokNote;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectNotesAssociationSeeder extends Seeder
{
    public function run()
    {
        // Get all users
        $users = User::all();

        foreach ($users as $user) {
            // Get or create a default project for each user
            $project = Project::firstOrCreate(
                [
                    'user_id' => $user->id,
                    'name' => 'Default Project',
                ],
                [
                    'description' => 'Default project for existing notes',
                    'status' => 'active',
                ]
            );

            // Associate all user's notes with this project
            PmbokNote::where('user_id', $user->id)
                ->whereNull('project_id')
                ->update(['project_id' => $project->id]);
        }

        $this->command->info('Associated all notes with projects successfully!');
    }
}
