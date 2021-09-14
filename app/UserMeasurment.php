<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeasurment extends Model
{
    protected $fillable = [
                    'user_id','content','date',
                ];
}
