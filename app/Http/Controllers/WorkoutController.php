<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opinion;
use App\Planner;
use App\Workout;
use App\UserLike;
use App\UserFollow;
use App\WorkoutType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WorkoutController extends Controller
{
    public function getUserWorkouts(){
        $userId = Auth::user()->id;
        return Workout::with(['author','type'])->where('author_id',$userId)->orderBy('id','desc')->get();
    }
    public function getUserWorkoutsForPagination(Request $request){
        $userId = Auth::user()->id;
        return Workout::with(['author','type'])->where('author_id',$userId)->orderBy('id','desc')->paginate($request->total);
    }
    public function getUserFollowedWorkoutsForPagination(Request $request){
        $userId = Auth::user()->id;
        $workouts = UserFollow::where('user_id',$userId)->select('workout_id')->get();
        Log::info($workouts);
        return Workout::with(['author'])->whereIn('id',$workouts)->orderBy('id','desc')->paginate($request->total);
    }
    public function getUserFollowedWorkouts(){
        $userId = Auth::user()->id;
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
    public function editWorkout(Request $request){
            return Workout::where('id',$request->workout_id)->update([
                'title'=>$request->title,
                'plan'=>$request->plan,
                'description'=>$request->description,
                'public'=>$request->public,
                'type_id'=>$request->type
            ]);
        }
    public function deleteWorkout(Request $request){
        return Workout::where('id',$request->id)->delete();
    }
    public function getPublicWorkoutsForPagination(Request $request){
        return Workout::with(['author'])->where('public',true)->orderBy('id','desc')->paginate($request->total);
    }
    public function getWorkout($id){
        $userId = Auth::user()->id;
        $workout = Workout::with(['author','type'])->where('id',$id)->get();
        $isLiked = UserLike::where('user_id',$userId)->where('workout_id',$id)->exists();
        $isFollowed = UserFollow::where('user_id',$userId)->where('workout_id',$id)->exists();

        return [$workout, $isLiked, $isFollowed];
    }
    public function likeWorkout($id){
        $userId = Auth::user()->id;
        DB::beginTransaction();
            try {
                UserLike::create([
                     'user_id'=>$userId,
                     'workout_id'=>$id
                ]);
                Workout::where('id',$id)->increment('likes');
                DB::commit();
                return response()->json([
                       'msg' => 'Poprawnie zalajkowano plan',
                ],201);
            }catch (\Throwable $th){
                DB::rollback();
                return response()->json([
                       'msg' => 'Wprowadzone dane nie są poprawne',
                ],401);
            }
    }
    public function unlikeWorkout($id){
        $userId = Auth::user()->id;
        DB::beginTransaction();
            try {
                UserLike::where('user_id',$userId)->where('workout_id',$id)->delete();
                Workout::where('id',$id)->decrement('likes');
                DB::commit();
                return response()->json([
                       'msg' => 'Poprawnie odlajkowano plan',
                ],201);
            }catch (\Throwable $th){
                DB::rollback();
                return response()->json([
                       'msg' => 'Wprowadzone dane nie są poprawne',
                ],401);
            }
    }
    public function followWorkout($id){
        $userId = Auth::user()->id;
        DB::beginTransaction();
            try {
                UserFollow::create([
                     'user_id'=>$userId,
                     'workout_id'=>$id
                ]);
                Workout::where('id',$id)->increment('follows');
                DB::commit();
                return response()->json([
                       'msg' => 'Poprawnie zaobserowano plan',
                ],201);
            }catch (\Throwable $th){
                DB::rollback();
                return response()->json([
                       'msg' => 'Wprowadzone dane nie są poprawne',
                ],401);
            }
    }
    public function unfollowWorkout($id){
        $userId = Auth::user()->id;
        DB::beginTransaction();
            try {
                UserFollow::where('user_id',$userId)->where('workout_id',$id)->delete();
                Workout::where('id',$id)->decrement('follows');
                DB::commit();
                return response()->json([
                       'msg' => 'Poprawnie przestałeś obserwować ten plan',
                ],201);
            }catch (\Throwable $th){
                DB::rollback();
                return response()->json([
                       'msg' => 'Wprowadzone dane nie są poprawne',
                ],401);
            }
    }
    public function getBestWorkouts(){
        return Workout::with(['author','type'])->orderBy('rating','desc')->take(4)->get();
    }

    public function getPlanedWorkouts(){
    $userId = Auth::user()->id;
        return Planner::with(['monday','tuesday','wednesday','thursday','friday','saturday','sunday'])->where('user_id',$userId)->get();
    }
    public function editPlanner(Request $request){
    $userId = Auth::user()->id;
    $isWorkout = Planner::where('user_id',$userId)->exists();
        if($isWorkout){
            return Planner::where('user_id',$userId)->update([
                        'monday'=>$request->monday,
                        'tuesday'=>$request->tuesday,
                        'wednesday'=>$request->wednesday,
                        'thursday'=>$request->thursday,
                        'friday'=>$request->friday,
                        'saturday'=>$request->saturday,
                        'sunday'=>$request->sunday
                    ]);
        }else{
            return Planner::create([
                                    'user_id'=>$userId,
                                    'monday'=>$request->monday,
                                    'tuesday'=>$request->tuesday,
                                    'wednesday'=>$request->wednesday,
                                    'thursday'=>$request->thursday,
                                    'friday'=>$request->friday,
                                    'saturday'=>$request->saturday,
                                    'sunday'=>$request->sunday
                                ]);
        }

    }
    public function getTodaysWorkout(){
        $userId = Auth::user()->id;
        $today = date('l');
        $workoutId = Planner::where('user_id',$userId)->value($today);
        if($workoutId){
            return Workout::where('id',$workoutId)->get();
        }else{
            return response()->json([
                                   'msg' => 'Brak ćwiczeń',
                            ],202);
        }
    }
}
