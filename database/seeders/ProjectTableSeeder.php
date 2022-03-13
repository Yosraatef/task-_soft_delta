<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('projects')->insert(array(
                                           0 =>
                                               array(
                                                   'id'            => 1,
                                                   'title'         => 'test test test',
                                                   'content'       => 'test test test test test test',
                                                   'project_value' => '10.8',
                                                   'time_build'    => '30',
                                                   'sort'          => '1',
                                                   'is_featured'   => 'yes',
                                                   'map_url'       => 'https://www.google.com/maps/d/u/0/embed?mid=1Ox-TcIboJ--SLiI5E0aTluq2M_c&ie=UTF8&hl=en&msa=0&ll=29.310949660158244%2C47.951889354492195&spn=0.209582%2C0.291824&z=11&output=embed',
                                                   'created_at'    => '2021-08-03 10:10:06',
                                                   'updated_at'    => '2021-08-03 10:10:06',
                                               ),
                                           1 =>
                                               array(
                                                   'id'            => 2,
                                                   'title'         => 'test2 test2 test2',
                                                   'content'       => 'test test test test test test',
                                                   'project_value' => '15.5',
                                                   'time_build'    => '40',
                                                   'sort'          => '2',
                                                   'is_featured'   => 'no',
                                                   'map_url'       => 'https://www.google.com/maps/d/u/0/embed?mid=1Ox-TcIboJ--SLiI5E0aTluq2M_c&ie=UTF8&hl=en&msa=0&ll=29.310949660158244%2C47.951889354492195&spn=0.209582%2C0.291824&z=11&output=embed',
                                                   'created_at'    => '2021-08-18 16:05:07',
                                                   'updated_at'    => '2021-08-18 16:05:07',
                                               ),
                                           2 =>
                                               array(
                                                   'id'            => 3,
                                                   'title'         => 'test3 test3 test3',
                                                   'content'       => 'test test test test test test',
                                                   'project_value' => '14.6',
                                                   'time_build'    => '50',
                                                   'sort'          => '3',
                                                   'is_featured'   => 'yes',
                                                   'map_url'       => 'https://www.google.com/maps/d/u/0/embed?mid=1Ox-TcIboJ--SLiI5E0aTluq2M_c&ie=UTF8&hl=en&msa=0&ll=29.310949660158244%2C47.951889354492195&spn=0.209582%2C0.291824&z=11&output=embed',
                                                   'created_at'    => '2021-08-18 16:05:07',
                                                   'updated_at'    => '2021-08-18 16:05:07',
                                               ),
                                       ));
    }
}
