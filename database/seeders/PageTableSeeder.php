<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = ['about_us','contacts'];

        foreach ($pages as $page) {
            \DB::table('pages')->insert([
                'title'     => json_encode([
                    'ar' =>$page,
                    'en' => $page
                                          ]),
                'content'     => json_encode([
                    'ar' =>'تست',
                    'en' => 'test'
                                          ])
               
               
            ]);
        }
    }
}