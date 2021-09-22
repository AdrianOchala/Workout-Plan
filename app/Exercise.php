<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
        public $timestamps = false;
       protected $fillable = [
                   'name','level','description','author_id',
               ];
}
