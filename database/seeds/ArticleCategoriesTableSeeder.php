<?php

use Illuminate\Database\Seeder;
use App\ArticleCategory;

class ArticleCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($j=1;$j<15;$j++){
            for($i=1;$i<6;$i++){
                ArticleCategory::create([
                    'category_id'=>$i ,
                    'article_id'=>$j
                ]);
            }
        }
    }
}
