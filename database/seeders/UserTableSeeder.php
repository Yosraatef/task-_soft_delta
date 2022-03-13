<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([
                                        'name'     => json_encode([
                                                        'ar' => 'أدمن',
                                                        'en' => 'admin'
                                                                  ]),
                                        'email'    => 'info@domain.com',
                                        'phone'    => '50733441',
                                        'password' => bcrypt('123'),
                                        'status'   => 1,
                                    ] , 
                                );
        \DB::table('users')->insert([
                                    'name'     => json_encode([
                                        'ar' => 'يسرا ',
                                        'en' => 'yosra'
                                                  ]),
                                    'email'    => 'yosra@gmail.com',
                                    'phone'    => '50733441',
                                    'password' => bcrypt('123'),
                                    'status'   => 1,
                                ] 
                            );
    \DB::table('users')->insert([
                                'name'     =>  json_encode([
                                    'ar' => 'احمد',
                                    'en' => 'ahmed'
                                              ]),
                                'email'    => 'ahmed@gmail.com',
                                'phone'    => '50733441',
                                'password' => bcrypt('123'),
                                'status'   => 1,
                            ] 
                        );
    }
}
