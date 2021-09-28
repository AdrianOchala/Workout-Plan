<?php

namespace App\Http\Controllers;
use App\Category;
use App\Article;
use App\ArticleCategory;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller
{
    public function getArticleCategories(){
        return Category::get();
    }
    public function addArticle(Request $request){
        $user_id = Auth::user()->id;
        date_default_timezone_set('Europe/Warsaw');
        $today = date("Y-m-d H:i:s");

        DB::beginTransaction();
        try{
            Article::create([
                            'author_id'=> $user_id,
                            'title'=>$request->title,
                            'content'=>$request->content,
                            'description'=>$request->description,
                            'date'=>$today,
                            'workout_id'=>$request->workout,
                    ]);
            $article = Article::where('author_id',$user_id)->where('title',$request->title)->first();
            $categories = $request->category;
            $articleCategories = [];
            foreach($categories as $c){
                array_push($articleCategories, ['category_id'=>$c, 'article_id'=>$article->id]);
            }
            ArticleCategory::insert($articleCategories);
            DB::commit();
            return response()->json([
                                   'msg' => 'Udało się dodać artykuł!',
                               ],200);
        }catch(\Throwable $th){
            DB::rollback();
            return response()->json([
                                   'msg' => 'Nie udało się dodać artykułu, spróbuj później.',
                               ],401);
        }
    }
    public function editArticle(Request $request){
        DB::beginTransaction();
                try{
                    Article::where('id',$request->id)->update([
                                    'title'=>$request->title,
                                    'content'=>$request->content,
                                    'description'=>$request->description,
                                    'workout_id'=>$request->workout,
                            ]);
                    ArticleCategory::where('article_id',$request->id)->delete();
                    $categories = $request->category;
                    $articleCategories = [];
                    foreach($categories as $c){
                        array_push($articleCategories, ['category_id'=>$c, 'article_id'=>$request->id]);
                    }
                    ArticleCategory::insert($articleCategories);

                    DB::commit();
                    return response()->json([
                                           'msg' => 'Udało się edytować artykuł!',
                                       ],200);
                }catch(\Throwable $th){
                    DB::rollback();
                    return response()->json([
                                           'msg' => 'Nie udało się edytować artykułu, spróbuj później.',
                                       ],401);
                }
    }
    public function deleteArticle(Request $request){
       return Article::where('id',$request->id)->delete();
    }
    public function getLatestArticles(){
       return Article::with(['author','categories'])->orderBy('date','desc')->take(4)->get();
    }
    public function getArticle($id){
        return Article::with(['author','categories','workout'])->where('id',$id)->get();
    }
    public function getArticlesForPagination(Request $request){
        return Article::with(['author','categories'])->orderBy('date','desc')->paginate($request->total);

    }
    public function getUserArticlesForPagination(Request $request){
        $user_id = Auth::user()->id;
        return Article::with(['author','categories'])->where('author_id',$user_id)->orderBy('date','desc')->paginate($request->total);

    }




}
