<?php

use App\Category;
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
           Category::create(['name'=>'Zdrowie']);
           Category::create(['name'=>'Dieta']);
           Category::create(['name'=>'FBW']);
           Category::create(['name'=>'Split']);
           Category::create(['name'=>'Mobilność']);
           Category::create(['name'=>'Suplementacja']);
           Category::create(['name'=>'Kalistenika']);
           Category::create(['name'=>'Ćwiczenia w domu']);
           Category::create(['name'=>'Kontuzje']);
       }
}
