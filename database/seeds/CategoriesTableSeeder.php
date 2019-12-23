<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new \App\Category();
        $category->name = 'Nhạc trẻ';
        $category->save();

        $category = new \App\Category();
        $category->name = 'Rap Việt';
        $category->save();

        $category = new \App\Category();
        $category->name = 'Nhạc Remix';
        $category->save();

        $category = new \App\Category();
        $category->name = 'Nhạc Âu Mỹ';
        $category->save();

        $category = new \App\Category();
        $category->name = 'Nhạc Hàn';
        $category->save();
    }
}
