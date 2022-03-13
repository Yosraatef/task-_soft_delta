<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('services')->insert(array(
                                        0 =>
                                            array(
                                                'id'            => 1,
                                                'title'         => 'test test test',
                                                'content'       => 'test test test test test test',
                                                'sort'          => '1',
                                                'created_at'    => '2021-12-21 10:10:06',
                                                'updated_at'    => '2021-12-21 10:10:06',
                                            ),
                                        1 =>
                                            array(
                                                'id'         => 2,
                                                'title'         => 'test2 test2 test2',
                                                'content'       => 'test test test test test test',
                                                'sort'          => '2',
                                                'created_at' => '2021-12-21 16:05:07',
                                                'updated_at' => '2021-12-18 16:05:07',
                                            ),
                                        2 =>
                                            array(
                                                'id'         => 3,
                                                'title'         => 'test3 test3 test3',
                                                'content'       => 'test test test test test test',
                                                'sort'          => '3',
                                                'created_at' => '2021-12-21 16:05:07',
                                                'updated_at' => '2021-12-21 16:05:07',
                                            ),
                                    ));
    }
}
