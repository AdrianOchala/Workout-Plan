<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exercise;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    public function getExercises(){
    $userId = Auth::user()->id;
        return Exercise::whereIn('author_id',[$userId, 1])->get();
    }
    public function addNewExercise(Request $request){
    $userId = Auth::user()->id;
        $exist = Exercise::where('name',$request->name)->exists();
        if($exist){
            response()->json([
                   'msg' => 'Istnieje już takie ćwiczenie',
            ],401);
        }else{
            return Exercise::create([
                'name'=>$request->name,
                'difficulty'=>$request->difficulty,
                'description'=>$request->description,
                'author_id'=>$userId,
            ]);
        }
    }
}
