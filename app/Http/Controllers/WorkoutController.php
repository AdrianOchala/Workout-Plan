<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use App\UserWorkout;
use App\WorkoutType;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function getUserWorkoutsForPagination(Request $request){
        $userId = Auth::user()->id;
        return Workout::with(['author'])->where('author_id',$userId)->orderBy('id','desc')->paginate($request->total);
    }
    public function getUserFollowedWorkoutsForPagination(Request $request){
        $userId = Auth::user()->id;
        $workouts = UserWorkout::where('user_id',$userId)->value('workout_id');

        return Workout::with(['author'])->where('id',$workouts)->orderBy('id','desc')->paginate($request->total);
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
            'public'=>$request->public,
            'type_id'=>$request->type
        ]);
    }

    public function getPublicWorkoutsForPagination(Request $request){
        return Workout::with(['author'])->where('public',true)->orderBy('id','desc')->paginate($request->total);
    }
    public function getWorkout($id){
        return Workout::with(['author','type'])->where('id',$id)->get();
    }
}
