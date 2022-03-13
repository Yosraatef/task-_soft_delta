<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'show_site',
            'show_admins',
            'create_admins',
            'edit_admins',
            'delete_admins',
            'show_profile',
            'show_settings',
            'show_home',
            'show_contacts',
            'delete_contacts',
            'show_roles',
            'create_roles',
            'edit_roles',
            'delete_roles',
            'show_log',
            'show_tasks',
            'create_tasks',
            'edit_tasks'
        ];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
