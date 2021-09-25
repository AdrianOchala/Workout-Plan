<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
        public $timestamps=false;
        protected $fillable = [
                    'author_id','title','content','description','date','workout_id','views',
                ];

        public function author(){
                return $this->belongsTo('App\User','author_id');
        }
        public function categories(){
            return $this->belongsToMany('App\Category','article_category');
        }
        public function workout(){
            return $this->belongsTo('App\Workout','workout_id');
        }

}
