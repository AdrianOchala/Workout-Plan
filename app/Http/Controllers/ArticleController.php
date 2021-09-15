<?php

namespace App\Http\Controllers;
use App\Category;
use App\Article;
use App\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function getArticleCategories(){
        return Category::get();
    }
    public function addArticle(Request $request){
        $user_id = Auth::user()->id;
        $today = date("Y-m-d");

        DB::beginTransaction();
        try{
            Article::create([
                            'author_id'=> $user_id,
                            'title'=>$request->title,
                            'content'=>$request->content,
                            'description'=>$request->description,
                            'date'=>$today,
                    ]);
            $article = Article::where('author_id',$user_id)->where('title',$request->title)->first();
            $categories = $request->category;
            $articleCategories = [];
            foreach($categories as $c){
                array_push($articleCategories, ['category_id'=>$c, 'article_id'=>$article->id]);
            }
            ArticleCategory::insert($articleCategories);
            DB::commit();
            return 'done';
        }catch(\Throwable $th){
            DB::rollback();
            return 'not done';
        }
    }
    public function getArticles(){
       return Article::with(['author','categories'])->get();
    }
    public function getArticle($id){
        return Article::with(['author','categories'])->where('id',$id)->get();
    }




}
