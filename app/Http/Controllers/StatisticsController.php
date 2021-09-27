<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserWorkoutSession;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    public function addStatistics(Request $request){
        $userId = Auth::user()->id;
         date_default_timezone_set('Europe/Warsaw');
         $today = date("Y-m-d");
        return UserWorkoutSession::create([
            'user_id'=>$userId,
            'workout_id'=>$request->index,
            'date'=>$today,
            'content'=>$request->plan
        ]);
    }
    public function getUserStats(){
        $userId = Auth::user()->id;
        return UserWorkoutSession::with(['workout'])->where('user_id',$userId)->get();
    }
}
