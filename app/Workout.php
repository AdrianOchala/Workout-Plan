<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public $timestamps = false;
    protected $fillable = [
                'author_id', 'title', 'plan','description', 'likes', 'follows', 'public', 'type_id',
            ];

            public function author(){
                 return $this->belongsTo('App\User','author_id');
            }
}
