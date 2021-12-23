<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'title' => 'Deneme',
            'category_id'=>'2',
            'image'=>'https://images.pexels.com/photos/1114690/pexels-photo-1114690.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500',
            'content' => 'deneme bu ılk dnsakdssndlskaşndlaskş',
            'slug'=> 'Deneme'
        ]);
    }
}
