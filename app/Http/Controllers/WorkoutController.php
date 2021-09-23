<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use App\WorkoutType;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function getUserWorkouts(){
    $userId = Auth::user()->id;
        return Workout::with(['author'])->where('author_id',$userId)->get();
    }
    public function getWorkoutTypes(){
        return WorkoutType::get();
    }
    public function addWorkout(Request $request){
     $userId = Auth::user()->id;
       return  Workout::create([
            'author_id'=>$userId,
            'title'=>$request->title,
            'plan'=>$request->plan,
            'description'=>$request->description,
            'public'=>true,
            'type_id'=>$request->type
        ]);
    }

    public function getPublicWorkouts(){
        return Workout::where('public',true)->get();
    }
    public function getWorkout($id){
        return Workout::with(['author','type'])->where('id',$id)->get();
    }
}
