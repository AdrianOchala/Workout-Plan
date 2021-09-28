<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserMeasurment;
use Illuminate\Support\Facades\Auth;

class MeasurmentsController extends Controller
{
    public function getMeasurments(){
        $userId = Auth::user()->id;
        return UserMeasurment::where('user_id', $userId)->get();
    }
    public function addNewMeasurment(Request $request){
     $userId = Auth::user()->id;
     date_default_timezone_set('Europe/Warsaw');
     $today = date("Y-m-d");
        return UserMeasurment::create([
            'user_id'=>$userId,
            'date'=>$today,
            'weight'=>$request->weight,
            'neck'=>$request->neck,
            'bicepsL'=>$request->bicepsL,
            'bicepsR'=>$request->bicepsR,
            'wristL'=>$request->wristL,
            'wristR'=>$request->wristR,
            'chest'=>$request->chest,
            'waist'=>$request->waist,
            'stomach'=>$request->stomach,
            'crimson'=>$request->crimson,
            'hips'=>$request->hips,
            'thighL'=>$request->thighL,
            'thighR'=>$request->thighR,
            'calfL'=>$request->calfL,
            'calfR'=>$request->calfR
        ]);
    }
    public function deleteMeasurment(Request $request){
        return UserMeasurment::where('id',$request->index)->delete();
    }
    public function getUserWeight(){
        $userId = Auth::user()->id;
        return UserMeasurment::where('user_id',$userId)->orderBy('date','asc')->select('weight','date')->get();
    }
}
