<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
       protected $fillable = [
                   'name','level','description','author_id',
               ];
}
