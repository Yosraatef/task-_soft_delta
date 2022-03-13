<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert(['name'       => json_encode([
            'ar' => 'الإدارة العليا',
            'en' => 'General Management',
        ]),
                                     'guard_name' => 'web',
                                    ]);
    }
}
