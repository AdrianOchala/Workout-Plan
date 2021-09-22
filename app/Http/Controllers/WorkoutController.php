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
        return Workout::where('author_id',$userId)->get();
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
            'public'=>true,
            'type_id'=>$request->type
        ]);
    }
}
