<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public $timestamps = false;
    protected $fillable = [
                'author_id', 'title', 'plan','description', 'likes', 'follows','rating', 'public', 'type_id',
            ];
            protected $casts = [
              'public' => 'boolean',
            ];

            public function author(){
                 return $this->belongsTo('App\User','author_id');
            }
            public function type(){
                return $this->belongsTo('App\WorkoutType','type_id');
            }
}
