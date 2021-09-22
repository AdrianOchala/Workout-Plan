<?php

use App\Article;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<15; $i++){

        Article::create([
            'author_id'=>4, 'title'=>'Testowy tytuł artykułu',
            'content'=>"<p>Tu wpisz treść artykułu.</p>",
            'description'=>'opis dla artykułu',
            'date'=>'2021-09-20'
        ]);
        }
    }
}
