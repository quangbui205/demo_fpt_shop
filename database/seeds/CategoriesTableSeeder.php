<?php

use Illuminate\Database\Seeder;

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
        $category->id =1;
        $category->name = 'Phone';
        $category->save();
        $category = new \App\Category();
        $category->id =2;
        $category->name = 'Laptop';
        $category->save();
        $category = new \App\Category();
        $category->id =3;
        $category->name = 'Clock';
        $category->save();
        $category = new \App\Category();
        $category->id =4;
        $category->name = 'Accessories';
        $category->save();
    }
}
