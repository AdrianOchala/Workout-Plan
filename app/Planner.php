<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planner extends Model
{
            public $timestamps=false;
            protected $fillable = [
                        'user_id','monday','tuesday','wednesday','thursday','friday','saturday','sunday',
                    ];
            public function monday(){
                 return $this->belongsTo('App\Workout','monday');
            }
            public function tuesday(){
                             return $this->belongsTo('App\Workout','tuesday');
                        }
            public function wednesday(){
                             return $this->belongsTo('App\Workout','wednesday');
                        }
            public function thursday(){
                             return $this->belongsTo('App\Workout','thursday');
                        }
            public function friday(){
                             return $this->belongsTo('App\Workout','friday');
                        }
            public function saturday(){
                             return $this->belongsTo('App\Workout','saturday');
                        }
            public function sunday(){
                             return $this->belongsTo('App\Workout','sunday');
                        }

}
