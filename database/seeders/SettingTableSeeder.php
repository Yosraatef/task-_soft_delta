<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->insert([
                                           'title' => json_encode([
                                               'ar' => 'ثق',
                                               'en' => 'Thiq',
                                           ])
                                       ]);
    }
}
