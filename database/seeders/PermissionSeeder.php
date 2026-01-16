<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'access dashboard',
            'impersonate',

            // Users
            'view users',
            'create users',
            'update users',
            'delete users',

            // Roles
            'view roles',
            'create roles',
            'update roles',
            'delete roles',

            // Permissions
            'view permissions',
            'create permissions',
            'update permissions',
            'delete permissions',

            // Posts
            'add post',
            'store post',
            'edit post',
            'update post',
            'delete post',
            'all post',
            'all postsbyauthor',

            // Experience
            'edit experience',
            'update experience',
            'delete experience',
            'store experience',
            'all experience',
            'my experience',

            // Hero
            'all hero',
            'update hero',

            // Services
            'all service',
            'add service',
            'store service',
            'edit service',
            'update service',
            'delete service',

            // Work
            'all work',
            'add work',
            'store work',
            'edit work',
            'update work',
            'delete work',

            // Education
            'all education',

            // Skills
            'add skill',
            'store skill',
            'all skill',
            'update skill',
            'edit skill',
            'delete skill',

            // Testimonies
            'add testimony',
            'store testimony',
            'all testimony',
            'edit testimony',
            'update testimony',
            'delete testimony',

            // Settings
            'all setting',
            'update setting',

            // Contact
            'all contact',
            'delete contact',

            // Comments
            'update comment',

            // Documents
            'document uploads',
            'document upload',
            'download byshortname',
            'documents destroy',
            'documents edit',
            'documents update',

            // Images - ACTUALLY ADD THESE (not just comments)
            'image upload',
            'images destroy',
            'images edit',
            'images update',

            // Reverb Super User View Only
            'reverb viewer',

            // Misc
            'portfolio dash',
            'blog approved',
            'pmwaysearch',
            'file demo',
            'mycv noaccess',

            'live chat',
            'visitor analytics',
            'manage images',
            'manage assets',
            'protected storage',

            // Joke Management
            'joketable backup',
            'joke management',
			
			'manage assets',

        ];

        foreach ($permissions as $permission) {
            Permission::query()->updateOrCreate([
                'name' => $permission,
            ]);
        }

    }
}