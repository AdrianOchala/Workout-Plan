<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
   protected $fillable = [
                   'author_id','article_id','content','mark','date',
               ];
}
