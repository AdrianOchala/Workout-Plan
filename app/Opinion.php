<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    public $timestamps = false;
   protected $fillable = [
                   'author_id','workout_id','content','mark','date',
               ];
               public function author(){
                             return $this->belongsTo('App\User','author_id');
                        }
}
