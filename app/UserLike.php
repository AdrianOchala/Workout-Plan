<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLike extends Model
{
    public $timestamps = false;
                protected $fillable = [
                        'user_id','workout_id',
                    ];
}
