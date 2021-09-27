<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserMeasurment extends Model
{
    public $timestamps = false;
    protected $fillable = [
                    'user_id','date','weight','neck','bicepsL','bicepsR','wristL','wristR','chest','waist','stomach','crimson','hips','thighL','thighR','calfL','calfR'
                ];
}
