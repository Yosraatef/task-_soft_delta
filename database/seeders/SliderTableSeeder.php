<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sliders')->insert(array(
                                             0 =>
                                                 array(
                                                     'id'         => 1,
                                                     'sort'       => 1,
                                                     'title'       => 'test',
                                                     'active'      => 'yes',
                                                     'created_at' => '2021-08-03 10:10:06',
                                                     'updated_at' => '2021-08-03 10:10:06',
                                                 ),
                                             1 =>
                                                 array(
                                                     'id'         => 2,
                                                     'sort'       => 2,
                                                     'title'       => 'test',
                                                     'active'      => 'yes',
                                                     'created_at' => '2021-08-03 10:10:06',
                                                     'updated_at' => '2021-08-03 10:10:06',
                                                 ),
                                             2 =>
                                                 array(
                                                     'id'         => 3,
                                                     'sort'       => 3,
                                                     'title'       => 'test',
                                                     'active'      => 'yes',
                                                     'created_at' => '2021-08-03 10:10:06',
                                                     'updated_at' => '2021-08-03 10:10:06',
                                                 ),
                                         ));
    }
}
