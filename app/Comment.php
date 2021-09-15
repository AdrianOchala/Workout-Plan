<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $fillable = [
                    'author_id','article_id','content','date',
         ];

         public function author(){
              return $this->belongsTo('App\User','author_id');
         }
}
