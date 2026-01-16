<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin role
        $superAdminRole = Role::query()->updateOrCreate(['name' => 'Super Admin']);
        $permissions = Permission::all()->pluck('name')->toArray();
        $superAdminRole->givePermissionTo($permissions);

        // Create LiveChat role AND assign 'live chat' permission
        $liveChatRole = Role::query()->updateOrCreate(['name' => 'LiveChat']);

        // Find the 'live chat' permission and assign it to LiveChat role
        $liveChatPermission = Permission::where('name', 'live chat')->first();
        if ($liveChatPermission) {
            $liveChatRole->givePermissionTo($liveChatPermission);
        } else {
            // Create it if it doesn't exist
            $liveChatPermission = Permission::create(['name' => 'live chat']);
            $liveChatRole->givePermissionTo($liveChatPermission);
        }
    }
}