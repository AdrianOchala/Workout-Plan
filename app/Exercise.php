<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
        public $timestamps = false;
       protected $fillable = [
                   'name','difficulty','description','author_id',
               ];
}
