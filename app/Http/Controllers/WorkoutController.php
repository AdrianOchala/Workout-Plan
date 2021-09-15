<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workout;
use Illuminate\Support\Facades\Auth;

class WorkoutController extends Controller
{
    public function getUserWorkouts(){
    $userId = Auth::user()->id;
        return Workout::where('author_id',$userId)->get();
    }
}
