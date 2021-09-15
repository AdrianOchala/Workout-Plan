<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportOpinion extends Model
{
    protected $fillable = [
                    'user_id','opinion_id','reason'
                ];
                public function user(){
                    return $this->belongsTo('App\User');
                }
                public function opinion(){
                    return $this->belongsTo('App\Opinion');
                }
}
