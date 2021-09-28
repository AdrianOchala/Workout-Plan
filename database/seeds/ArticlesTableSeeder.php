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
            'author_id'=>4, 'title'=>'Lorem ipsum',
            'content'=>"<p>Tu wpisz treść artykułu.</p>",
            'description'=>'Curabitur et eleifend libero. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer at viverra enim. Fusce pretium orci sit amet sagittis sodales. Integer auctor urna ullamcorper, venenatis purus mattis, pulvinar metus.',
            'date'=>`2021-09+$i`
        ]);
        }
    }
}
