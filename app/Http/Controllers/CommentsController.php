<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Opinion;
use App\ReportComment;
use App\ReportOpinion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
//    public function getArticleComments($id){
//        return Comment::with(['author'])->where('article_id',$id)->get();
//    }
    public function addComment(Request $request){
    date_default_timezone_set('Europe/Warsaw');
    $today = date("Y-m-d H:i:s");
        return Comment::create([
                'author_id'=> $request->authorId,
                'article_id'=>$request->targetId,
                'content'=> $request->comment,
                'date'=> $today,
        ]);
    }
    public function addOpinion(Request $request){
        date_default_timezone_set('Europe/Warsaw');
        $today = date("Y-m-d H:i:s");
            return Opinion::create([
                    'author_id'=> $request->authorId,
                    'workout_id'=>$request->targetId,
                    'content'=> $request->comment,
                    'mark'=>$request->mark,
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
    public function deleteComment(Request $request){
        return Comment::where('id',$request->id)->delete();
    }
    public function deleteOpinion(Request $request){
        return Opinion::where('id',$request->id)->delete();
    }
    public function getArticleComments(Request $request, $id){
        $comments = Comment::with(['author'])->where('article_id',$id)->orderBy('date','desc')->paginate($request->total);
        $count = count($comments);
        return [$comments, $count];

    }
    public function getWorkoutOpinions(Request $request, $id){
        return Opinion::with(['author'])->where('workout_id',$id)->orderBy('date','desc')->paginate($request->total);
    }
    public function getWorkoutRatings($id){
        $opinions = Opinion::where('workout_id',$id)->get();
        $workoutRating = 0;
        $opinionsLength = count($opinions);
        if($opinionsLength > 0){
                    for ($i = 0;$i<$opinionsLength;$i++){
                        $workoutRating = $workoutRating + $opinions[$i]->mark;
                    }
                    $workoutRating = round($workoutRating/$opinionsLength,2);
        }
        return [$workoutRating];
    }


}
