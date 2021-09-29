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
        for($j=1;$j<17;$j++){
            for($i=1;$i<3;$i++){
                ArticleCategory::create([
                    'category_id'=>rand(1,9) ,
                    'article_id'=>$j
                ]);
            }
        }
    }
}
