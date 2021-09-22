<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public $timestamps = false;
    protected $fillable = [
                'author_id', 'title', 'plan', 'likes', 'follows', 'public', 'type_id',
            ];
}
