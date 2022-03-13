<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('contact_us')->insert(array(
                                             0 =>
                                                 array(
                                                     'id'         => 1,
                                                     'name'       => 'test',
                                                     'email'      => 'test@gmail.com',
                                                     'phone'      => '4444444444',
                                                     'message'    => 'test test test',
                                                     'created_at' => '2021-08-03 10:10:06',
                                                     'updated_at' => '2021-08-03 10:10:06',
                                                 ),
                                             1 =>
                                                 array(
                                                     'id'         => 2,
                                                     'name'       => 'test2',
                                                     'email'      => 'test2@gmail.com',
                                                     'phone'      => '55555555555',
                                                     'message'    => 'test test test',
                                                     'created_at' => '2021-08-18 16:05:07',
                                                     'updated_at' => '2021-08-18 16:05:07',
                                                 ),
                                             2 =>
                                                 array(
                                                     'id'         => 3,
                                                     'name'       => 'test3',
                                                     'email'      => 'test3@gmail.com',
                                                     'phone'      => '2222222222',
                                                     'message'    => 'test test test',
                                                     'created_at' => '2021-08-18 16:05:07',
                                                     'updated_at' => '2021-08-18 16:05:07',
                                                 ),
                                         ));
    }
}
