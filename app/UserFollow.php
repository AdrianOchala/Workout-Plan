<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFollow extends Model
{
    public $timestamps = false;
            protected $fillable = [
                    'user_id','workout_id',
                ];


}
