<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::find(1);
        $permissions = Permission::get();
        foreach ($permissions as $permission) {
            \DB::table('role_has_permissions')->insert([
                                                           'role_id'       => $role->id,
                                                           'permission_id' => $permission->id,
                                                       ]);
        }
    }
}
