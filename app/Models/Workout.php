<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;
    protected $fillable = [
            'author_id', 'title', 'plan', 'likes', 'follows', 'public', 'type_id',
        ];
}
