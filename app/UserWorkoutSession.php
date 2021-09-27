<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkoutSession extends Model
{
public $timestamps = false;
   protected $fillable = [
                   'user_id','workout_id','content','date',
               ];
               public function user(){
                    return $this->belongsTo('App\User','user_id');
               }
               public function workout(){
                    return $this->belongsTo('App\Workout','workout_id');
               }
}
