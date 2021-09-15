<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\ReportComment;
use App\ReportOpinion;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function getArticleComments($id){
        return Comment::with(['author'])->where('article_id',$id)->get();
    }
    public function addComment(Request $request){
    $today = date("Y-m-d");
        return Comment::create([
                'author_id'=> $request->authorId,
                'article_id'=>$request->targetId,
                'content'=> $request->comment,
                'date'=> $today,
        ]);
    }
    public function reportComment(Request $request){
    $user_id = Auth::user()->id;
        return ReportComment::create([
                'user_id'=>$user_id,
                'comment_id'=>$request->targetIndex,
                'reason'=>$request->reason,
        ]);
    }
    public function reportOpinion(Request $request){
    $user_id = Auth::user()->id;
        return ReportOpinion::create([
                'user_id'=>$user_id,
                'opinion_id'=>$request->targetIndex,
                'reason'=>$request->reason,
        ]);
    }

}
