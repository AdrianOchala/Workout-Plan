<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkout extends Model
{
        public $timestamps = false;
        protected $fillable = [
                'user_id','workout_id',
            ];

        public function workout(){
            return $this->belongsTo('App\Workout','workout_id');
        }
}
